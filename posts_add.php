<?php 

include("includes/database.php");
include("includes/config.php");
include("includes/functions.php");
include("includes/header.php");
secure();


if (isset($_POST['title'])) {
    if($stm = $connect->prepare('INSERT INTO posts (title, content, author, date) VALUES (?, ?, ?, ?)')) {
        $stm->bind_param('ssss', $_POST['title'], $_POST['content'], $_POST['author'], $_POST['date']);
        $stm->execute();

        set_message("A new post " . $_SESSION['title'] . " has been added");
        header('Location: posts.php');
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
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Add Post</h1>
            <form method="POST">

                <!-- Title input -->
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Author input -->
                <div class="mb-6">
                    <label for="author" class="block text-gray-700 font-semibold mb-2">Author</label>
                    <input type="text" id="author" name="author" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Content input -->
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
                    <textarea name="content" id="content" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Active select -->
                <div class="mb-6">
                    <label for="date" class="block text-gray-700 font-semibold mb-2">Date</label>
                    <input type="date" id="date" name="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add Post</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- The footer section -->

<?php

include("includes/footer.php")
?>




