<?php

$conn = new mysqli('localhost', 'root', '', 'erp');

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
        <h1 class="text-3xl font-bold">Create Client</h1>
        <div class="bg-white p-4 rounded shadow border my-4 flex flex-col" id="create">
            <form method="POST" action="create_client.php" class="flex-grow flex flex-col ">
                <div class="flex items-center">
                    <label for="title" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Title</label>
                    <input name="title" required class="w-2/3 p-2 border-b focus:outline-none"
                        placeholder="Title of the poll"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="name" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Name</label>
                    <input name="name" required class="w-2/3 p-2 border-b focus:outline-none"
                        placeholder="Name of the client"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="contact_info" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Contact
                        Info</label>
                    <input name="contact_info" required class="w-2/3 p-2 border-b focus:outline-none"
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
                            echo '<option value="' . $property['id'] . '">' . $property['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="flex items-center mt-4">
                    <label for="type" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Type</label>
                    <select name="type" class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="Buyer">Buyer</option>
                        <option value="Tenant">Tenant</option>
                        <option value="Investor">Investor</option>
                    </select>
                </div>


                <div class="flex items-center mt-4">
                    <label for="status" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Status</label>
                    <select name="status" class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="flex items-center mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create
                    </button>
                </div>
            </form>

        </div>


        <h1 class="text-3xl font-bold">Create Property</h1>

        <div class="bg-white p-4 rounded shadow my-4 flex flex-col border" id="create">

            <form method="POST" action="create_property.php" class="flex-grow flex flex-col ">
                <div class="flex items-center">
                    <label for="name" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Name</label>
                    <input name="name" required class="w-2/3 p-2 border-b focus:outline-none"
                        placeholder="Name of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="price" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Price</label>
                    <input name="price" required class="w-2/3 p-2 border-b focus:outline-none"
                        placeholder="Price of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="location" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Location</label>
                    <input name="location" required class="w-2/3 p-2 border-b focus:outline-none"
                        placeholder="Location of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="type" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Type</label>
                    <select name="type" required class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="House">House</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Condo">Condo</option>
                        <option value="Townhouse">Townhouse</option>
                        <option value="Duplex">Duplex</option>
                        <option value="Triplex">Triplex</option>
                        <option value="Fourplex">Fourplex</option>
                    </select>
                </div>
                <div class="flex items-center mt-4">
                    <label for="size" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Size</label>
                    <input name="size" class="w-2/3 p-2 border-b focus:outline-none"
                        placeholder="Size of the property"></input>
                </div>
                <div class="flex items-center mt-4">
                    <label for="status" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Status</label>
                    <select name="status" class="w-2/3 p-2 border-b focus:outline-none">
                        <option value="Available">Available</option>
                        <option value="Sold">Sold</option>
                        <option value="Rented">Rented</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <div class="flex items-center mt-4">
                    <label for="features" class="block w-1/3 text-gray-700 text-sm font-semibold mr-2">Features</label>
                    <input name="features" class="w-2/3 p-2 border-b focus:outline-none"
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
                            echo '<option value="' . $owner['id'] . '">' . $owner['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="flex items-center mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white p-2 rounded focus:outline-none hover:bg-blue-400">Create</button>
                </div>
            </form>
        </div>



        <h1 class="text-3xl font-bold">All Clients</h1>
        <div class="flex flex-col w-full my-4 overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-100 border-b-2 border-gray-400">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Contact Info</th>
                        <th class="px-4 py-2">Interested Property</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $clients = $conn->query("SELECT c.id, c.name, c.contact_info, p.name as property_name, c.type, c.status FROM clients c LEFT JOIN properties p ON c.interested_property = p.id")->fetch_all(MYSQLI_ASSOC);
                    foreach ($clients as $client) {
                        ?>
                        <tr class="border-b border-gray-400">
                            <td class="px-4 py-2"><?php echo $client['name']; ?></td>
                            <td class="px-4 py-2"><?php echo $client['contact_info']; ?></td>
                            <td class="px-4 py-2"><?php echo $client['property_name']; ?></td>
                            <td class="px-4 py-2"><?php echo $client['type']; ?></td>
                            <td class="px-4 py-2"><?php echo $client['status']; ?></td>
                            <td class="px-4 py-2">
                                <a href="edit_client.php?id=<?php echo $client['id']; ?>"
                                    class="text-blue-500 hover:text-blue-700 hover:underline">Edit</a>
                                <a href="delete_client.php?id=<?php echo $client['id']; ?>"
                                    class="text-red-500 hover:text-red-700 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h1 class="text-3xl font-bold">All Properties</h1>
        <div class="flex flex-col w-full my-4 overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-100 border-b-2 border-gray-400">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Size</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $properties = $conn->query("SELECT * FROM properties")->fetch_all(MYSQLI_ASSOC);
                    foreach ($properties as $property) {
                        ?>
                        <tr class="border-b border-gray-400">
                            <td class="px-4 py-2"><?php echo $property['name']; ?></td>
                            <td class="px-4 py-2"><?php echo $property['price']; ?></td>
                            <td class="px-4 py-2"><?php echo $property['location']; ?></td>
                            <td class="px-4 py-2"><?php echo $property['type']; ?></td>
                            <td class="px-4 py-2"><?php echo $property['size']; ?> sqft</td>
                            <td class="px-4 py-2"><?php echo $property['status']; ?></td>
                            <td class="px-4 py-2">
                                <a href="edit_property.php?id=<?php echo $property['id']; ?>"
                                    class="text-blue-500 hover:text-blue-700 hover:underline">Edit</a>
                                <a href="delete_property.php?id=<?php echo $property['id']; ?>"
                                    class="text-red-500 hover:text-red-700 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>


    </div>


    <div class="my-16"></div>



</body>

</html>