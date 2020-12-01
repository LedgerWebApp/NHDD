<?php
$user=$_GET['a'];
define('server','localhost:3307');// defining hostname
define('username','root'); // defining username
define('password' ,''); // defining Password
define('databasename', 'NHDD');// defining database name
$connection = mysqli_connect(server,username,password,databasename);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "DELETE FROM expenses WHERE RegDate = '$user'";

if (mysqli_query($connection, $sql)) {
    mysqli_close($connection);
    header('Location: view_expense_categorywise.php');
    exit;
} else {
    echo "Error deleting record";
}
?>
