<?php
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}

// connect to database
include_once("../config.php");
 
// get selected room id and delete data
$fine_id = $_GET['fine_id'];
$result = mysqli_query($conn, "DELETE FROM fine WHERE fine_id='$fine_id'");
header("Location:index.php");
?>
