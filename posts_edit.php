<?php 

include("includes/database.php");
include("includes/config.php");
include("includes/functions.php");
include("includes/header.php");
secure();

if (isset($_POST['title'])) {
    if($stm = $connect->prepare('UPDATE posts SET title = ?, content = ?, date = ? WHERE id = ?')) {
        $stm->bind_param('sssi', $_POST['title'], $_POST['content'], $_POST['date'], $_GET['id']);
        $stm->execute();

        $stm->close();
    
        set_message("A post " . $_GET['id'] . " has been updated");
        header('Location: posts.php');
        die();
    } else {
        echo "Could not prepare post update statement!";
    }
}

if (isset($_GET['id'])){
    if($stm = $connect->prepare('SELECT * FROM posts WHERE id = ?')) {
        $stm->bind_param('i', $_GET['id']);
        $stm->execute();

        $result = $stm->get_result();
        $post = $result->fetch_assoc();

        if ($post) {
?>

<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Post</h1>
            <form method="POST">
                <!-- Title input -->
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Author input -->
                <div class="mb-6">
                    <label for="author" class="block text-gray-700 font-semibold mb-2">Author</label>
                    <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($post['author']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Content input -->
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
                    <textarea name="content" id="content" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($post['content']); ?></textarea>
                </div>

                <!-- Date select -->
                <div class="mb-6">
                    <label for="date" class="block text-gray-700 font-semibold mb-2">Date</label>
                    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($post['date']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Edit Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
        }
        $stm->close();
    } else {
        echo "Could not prepare statement!";
    }
} else {
    echo "No post selected";
    die();
}

include("includes/footer.php");
?>
