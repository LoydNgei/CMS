<?php


// $servername = 'mysql.db.mdbgo.com';
// $username = 'loyd_loyd';
// $password = '@Smag9110';
// $dbname = 'loyd_cms';

// $connect = mysqli_connect($servername, $username, $password, $dbname);


// if (mysqli_connect_errno()) {
//     exit("Failed to connect to MySQL: " . mysqli_connect_error());
// }

?>

<?php
$servername = 'mysql.db.mdbgo.com';
$username = 'loyd_loyd';
$password = '@Smag9110';
$dbname = 'loyd_cms';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
