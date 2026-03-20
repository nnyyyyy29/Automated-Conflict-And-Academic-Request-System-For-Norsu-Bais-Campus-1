<?php
session_start();
include("../../model/db.php");

if(!isset($_SESSION['user'])){
    header("Location: ../../src/index.php");
}
$user = $_SESSION['user'];
?>

<h2>Welcome <?php echo $user['fullname']; ?></h2>

<a href="request.php">Submit Academic Request</a><br>
<a href="conflict.php">Report Conflict</a>
