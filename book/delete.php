<?php
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}

// connect to database
include_once("../config.php");
 
// get selected room id and delete data
$book_id = $_GET['book_id'];
$result = mysqli_query($conn, "DELETE FROM booking WHERE book_id='$book_id'");
header("Location:index.php");
?>
