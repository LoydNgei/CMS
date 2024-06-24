<?php 

include("includes/database.php");
include("includes/config.php");
include("includes/functions.php");


if(isset($_SESSION['id'])) {
	header("Location: dashboard.php");
	die();
}

include("includes/header.php");

if (isset($_POST['email'])) {
	if ($stm = $connect->prepare('SELECT * FROM users WHERE email = ? AND password = ? AND active = 1')){
		$hashed = sha1($_POST['password']);
		$stm->bind_param('ss', $_POST['email'], $hashed);
		$stm->execute();
		$result = $stm->get_result();
		$user = $result->fetch_assoc();

		// var_dump($user);

		if ($user) {
			$_SESSION['id'] = $user['id'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['username'] = $user['username'];

			set_message("You have successfully logged in " . $_SESSION['username']);
			

			header('Location: dashboard.php');
			die();
		} else {
			echo "Incorrect email or password";
		}
		$stm->close();
	} else {
		echo 'Could not prepare statement';
	}
}
?>

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Contact Us</h2>
            <form method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="w-full px-4 py-2 mt-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Sign in<button>
                </div>
            </form>
        </div>
    </div>
</body>


<!-- The footer section -->

<?php

include("includes/footer.php")

?>


