<?php

$conn = new mysqli('localhost', 'root', '', 'erp');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $location = $_POST["location"];
    $type = $_POST["type"];
    $size = $_POST["size"];
    $status = $_POST["status"];
    $owner_id = !empty($_POST["owner_id"]) ? $_POST["owner_id"] : 'NULL';

    $q = "UPDATE properties SET name = '$name', price = '$price', location = '$location', type = '$type', size = '$size', status = '$status', owner_id = $owner_id WHERE id = $id";
    $results = $conn->query($q);

    echo $results == 1 ? 'Property edited successfully!' : 'Property editing failed!';
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
        <h1 class="text-3xl font-bold">Edit Property</h1>

        <div class="bg-white p-4 rounded shadow my-4 flex flex-col border" id="create">
            <?php
            $id = $_GET["id"];
            if (isset($_GET["id"])) {
                $q = "SELECT * FROM properties WHERE id = $id";
                $result = $conn->query($q);
                $property = $result->fetch_assoc();
            }
            ?>

            <form method="POST" action="edit_property.php?id=<?php echo $id; ?>" class="flex-grow flex flex-col ">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="flex items-center">
                    <label for="name" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Name</label>
                    <input name="name" required class="w-2/3 p-2 border-b focus:outline-none"
                        value="<?php echo $property['name'] ?? ''; ?>" placeholder="Name of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="price" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Price</label>
                    <input name="price" required class="w-2/3 p-2 border-b focus:outline-none"
                        value="<?php echo $property['price'] ?? ''; ?>" placeholder="Price of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="location" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Location</label>
                    <input name="location" required class="w-2/3 p-2 border-b focus:outline-none"
                        value="<?php echo $property['location'] ?? ''; ?>"
                        placeholder="Location of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="type" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Type</label>
                    <select name="type" required class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="House" <?php echo $property['type'] == 'House' ? 'selected' : ''; ?>>House</option>
                        <option value="Apartment" <?php echo $property['type'] == 'Apartment' ? 'selected' : ''; ?>>
                            Apartment</option>
                        <option value="Condo" <?php echo $property['type'] == 'Condo' ? 'selected' : ''; ?>>Condo</option>
                        <option value="Townhouse" <?php echo $property['type'] == 'Townhouse' ? 'selected' : ''; ?>>
                            Townhouse</option>
                        <option value="Duplex" <?php echo $property['type'] == 'Duplex' ? 'selected' : ''; ?>>Duplex
                        </option>
                        <option value="Triplex" <?php echo $property['type'] == 'Triplex' ? 'selected' : ''; ?>>Triplex
                        </option>
                        <option value="Fourplex" <?php echo $property['type'] == 'Fourplex' ? 'selected' : ''; ?>>Fourplex
                        </option>
                    </select>
                </div>
                <div class="flex items-center mt-4">
                    <label for="size" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Size</label>
                    <input name="size" class="w-2/3 p-2 border-b focus:outline-none"
                        value="<?php echo $property['size'] ?? ''; ?>" placeholder="Size of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="status" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Status</label>
                    <select name="status" class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="Available" <?php echo $property['status'] == 'Available' ? 'selected' : ''; ?>>
                            Available</option>
                        <option value="Sold" <?php echo $property['status'] == 'Sold' ? 'selected' : ''; ?>>Sold</option>
                        <option value="Rented" <?php echo $property['status'] == 'Rented' ? 'selected' : ''; ?>>Rented
                        </option>
                        <option value="Pending" <?php echo $property['status'] == 'Pending' ? 'selected' : ''; ?>>Pending
                        </option>
                    </select>
                </div>
                <div class="flex items-center mt-4">
                    <label for="features" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Features</label>
                    <input name="features" class="w-2/3 p-2 border-b focus:outline-none"
                        value="<?php echo $property['features'] ?? ''; ?>"
                        placeholder="Features of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="owner_id" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Owner
                        ID</label>
                    <select name="owner_id" class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="">No owner</option>
                        <?php
                        $owners = $conn->query("SELECT * FROM clients")->fetch_all(MYSQLI_ASSOC);
                        foreach ($owners as $owner) {
                            $selected = $property['owner_id'] == $owner['id'] ? 'selected' : '';
                            echo '<option value="' . $owner['id'] . '" ' . $selected . '>' . $owner['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="flex items-center mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white p-2 rounded focus:outline-none hover:bg-blue-400">Update</button>
                </div>
            </form>
        </div>

    </div>


    <div class="my-16"></div>



</body>

</html>