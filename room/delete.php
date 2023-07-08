<?php
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}

// connect to database
include_once("../config.php");
 
// get selected room id and delete data
$room_id = $_GET['room_id'];
$result = mysqli_query($conn, "DELETE FROM room WHERE room_id='$room_id'");
header("Location:index.php");
?>
