<?php
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}

// connect to database
include_once("../config.php");
 
// get selected tenant id and delete data
$tenant_id = $_GET['tenant_id'];
$result = mysqli_query($conn, "DELETE FROM tenant WHERE tenant_id='$tenant_id'");
header("Location:index.php");
?>

