<?php
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}

// include database connection file
include_once("../config.php");
 
// Get id from URL to delete that user
$book_id = $_GET['book_id'];
$status = $_GET['stats'];
if($status == 'unpaid') {
    $update = mysqli_query($conn, "UPDATE booking SET book_status = 'Paid' WHERE book_id = '$book_id'");
}
if($status == 'paid') {
    $update = mysqli_query($conn, "UPDATE booking SET book_status = 'Unpaid' WHERE book_id = '$book_id'");
}
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>

