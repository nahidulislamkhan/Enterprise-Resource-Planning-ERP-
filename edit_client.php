<?php

$conn = new mysqli('localhost', 'root', '', 'erp');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $contactInfo = $_POST["contact_info"];
    $interestedProperty = !empty($_POST["interested_property"]) ? $_POST["interested_property"] : 'NULL';
    $type = $_POST["type"];
    $status = $_POST["status"];

    $q = "UPDATE clients SET name = '$name', contact_info = '$contactInfo', interested_property = $interestedProperty, type = '$type', status = '$status' WHERE id = $id";
    $results = $conn->query($q);

    echo $results == 1 ? 'Client edited successfully!' : 'Client editing failed!';
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/index.css">


</head>

<body>
    <header class="sticky top-0 w-full">
        <div class="flex flex-wrap items-center justify-center w-full px-4 mx-auto py-2.5 border-b shadow bg-white">
            <a href="index.php"
                class="flex self-center text-xl font-semibold whitespace-nowrap hover:text-blue-500 ">Home</a>
        </div>
    </header>



    <div class="w-full max-w-4xl flex flex-col mx-auto p-4">
        <h1 class="text-3xl font-bold">Edit Client</h1>
        <div class="bg-white p-4 rounded shadow border my-4 flex flex-col" id="create">
            <form method="POST" action="edit_client.php" class="flex-grow flex flex-col ">
                <?php
                $id = $_GET["id"] ?? null;
                if ($id) {
                    $client = $conn->query("SELECT * FROM clients WHERE id = $id")->fetch_assoc();
                }
                ?>
                <input type="hidden" name="id" value="<?php echo $client['id'] ?? ''; ?>">
                <div class="flex items-center">
                    <label for="title" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Title</label>
                    <input name="title" required class="w-2/3 p-2 border-b focus:outline-none"
                        value="<?php echo $client['name'] ?? ''; ?>" placeholder="Title of the poll"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="name" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Name</label>
                    <input name="name" required class="w-2/3 p-2 border-b focus:outline-none"
                        value="<?php echo $client['name'] ?? ''; ?>" placeholder="Name of the client"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="contact_info" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Contact
                        Info</label>
                    <input name="contact_info" required class="w-2/3 p-2 border-b focus:outline-none"
                        value="<?php echo $client['contact_info'] ?? ''; ?>"
                        placeholder="Contact information of the client"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="interested_property"
                        class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Interested Property</label>
                    <select name="interested_property" class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="">No interested property</option>
                        <?php
                        $properties = $conn->query("SELECT * FROM properties")->fetch_all(MYSQLI_ASSOC);
                        foreach ($properties as $property) {
                            $selected = $client['interested_property'] == $property['id'] ? 'selected' : '';
                            echo '<option value="' . $property['id'] . '"' . $selected . '>' . $property['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="flex items-center mt-4">
                    <label for="type" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Type</label>
                    <select name="type" class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="Buyer" <?php echo $client['type'] == 'Buyer' ? 'selected' : ''; ?>>Buyer</option>
                        <option value="Tenant" <?php echo $client['type'] == 'Tenant' ? 'selected' : ''; ?>>Tenant
                        </option>
                        <option value="Investor" <?php echo $client['type'] == 'Investor' ? 'selected' : ''; ?>>Investor
                        </option>
                    </select>
                </div>


                <div class="flex items-center mt-4">
                    <label for="status" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Status</label>
                    <select name="status" class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="Active" <?php echo $client['status'] == 'Active' ? 'selected' : ''; ?>>Active
                        </option>
                        <option value="Inactive" <?php echo $client['status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive
                        </option>
                    </select>
                </div>

                <div class="flex items-center mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Edit
                    </button>
                </div>
            </form>

        </div>



    </div>


    <div class="my-16"></div>



</body>

</html>