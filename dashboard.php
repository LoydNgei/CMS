<?php 

include("includes/database.php");
include("includes/config.php");
include("includes/functions.php");
include("includes/header.php");
secure();

?>

<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-md text-center">
            <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
            <div class="space-y-4">
                <a href="users.php" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Users Management</a>
                <a href="posts.php" class="block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Posts Management</a>
            </div>
        </div> 
    </div>
</div>

<!-- The footer section -->

<?php
include("includes/footer.php");
?>
