<?php 

include("includes/database.php");
include("includes/config.php");
include("includes/functions.php");
include("includes/header.php");
secure();


if (isset($_POST['username'])) {
    if($stm = $connect->prepare('INSERT INTO users (username, email, password, active) VALUES (?, ?, ?, ?)')) {
        $hashed = sha1($_POST['password']);
        $stm->bind_param('ssss', $_POST['username'], $_POST['email'], $hashed, $_POST['active']);
        $stm->execute();

        set_message("A new user " . $_SESSION['username'] . " has been added");
        header('Location: users.php');
        $stm->close();
        die();

    } else {
        echo "Could not prepare statement!";
    }
}

?>


<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Add User</h1>
            <form method="POST">
                <!-- Username input -->
                <div class="mb-6">
                    <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Email input -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Password input -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Active select -->
                <div class="mb-6">
                    <label for="active" class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select name="active" id="active" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- The footer section -->

<?php

include("includes/footer.php")
?>




