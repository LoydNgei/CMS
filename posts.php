<?php 

include("includes/database.php");
include("includes/config.php");
include("includes/functions.php");
include("includes/header.php");
secure();


if (isset($_GET['delete'])){
    if ($stm = $connect->prepare('DELETE FROM posts WHERE id = ?')) {
        $stm->bind_param('i', $_GET['delete']);
        $stm->execute();

        set_message("A post " . $_GET['delete'] . " has been deleted");
        header("Location: posts.php");
        $stm->close();
        die();
    }
    else {
        echo "Could not prepare statement";
    }
}




if ($stm = $connect->prepare('SELECT * FROM posts')){
    $stm->execute();

    $result = $stm->get_result();


    if ($result->num_rows > 0) {
    






?>




<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-4xl">
            <h1 class="text-2xl font-bold text-center mb-4">Posts Management</h1>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                     <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Id</th>
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-left">Author</th>
                        <th class="py-3 px-6 text-left">Content</th>
                        <th class="py-3 px-6 text-center">Edit | Delete</th>
                    </tr>
                </thead>

                <tbody class="text-gray-600 text-sm font-light">
                    <!-- conditional check -->
                    <?php while($record = mysqli_fetch_assoc($result)){ ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($record['id']) ?></td>
                        <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($record['title']) ?></td>
                        <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($record['author']) ?></td>
                        <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($record['content']) ?></td>
                        <td class="py-3 px-6 text-center">
                            <a class="text-blue-500 hover:text-blue-700 mr-2" href="posts_edit.php?id=<?php echo htmlspecialchars($record['id']); ?>">Edit</a>
                            <a class="text-red-500 hover:text-red-700" href="posts.php?delete=<?php echo htmlspecialchars($record['id']); ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="flex justify-end mt-4">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="posts_add.php">Add new Post</a>
            </div>
        </div>
    </div> 
</div>


<!-- The footer section -->

<?php

    } else 
    {
        echo "No posts found";
    }

    $stm->close();

} else {
    echo "Could not prepare statement";
}

include("includes/footer.php")
?>


