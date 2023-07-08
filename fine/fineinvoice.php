<?php 
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
// connect to database
include_once("../config.php");

// get fine id 
$fine_id = $_GET['fine_id'];

// query for getting booking table data 
$tfine = mysqli_query($conn, "SELECT * FROM fine WHERE fine_id = '$fine_id'");
$result = mysqli_fetch_assoc($tfine);
$fine_id = $result['fine_id'];
$property = $result['property'];
$price = $result['price'];
$book_id = $result['book_id'];

$tbooking = mysqli_query($conn, "SELECT tenant_id FROM booking WHERE book_id = '$book_id'");
$result = mysqli_fetch_assoc($tbooking);
$tenant_id = $result['tenant_id'];

$ttenant = mysqli_query($conn, "SELECT * FROM tenant WHERE tenant_id = '$tenant_id'");
$result = mysqli_fetch_assoc($ttenant);
$tenant_name = $result['tenant_name'];
$tenant_address = $result['tenant_address'];
$tenant_phone = $result['tenant_phone'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<link rel='stylesheet' type='text/css' href='../css/invoice.style.css' />
	<script type='text/javascript' src='../js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='../js/example.js'></script>
	<title>Rent Invoice</title>
	
</head>

<body>

	<div id="page-wrap">
<textarea id="header">ROOM RENTAL INVOICE</textarea>
		<div id="identity">
		
            <textarea id="address" readonly>SkyBlue Room Rental
Jalan Ki Hajar Dewantara
Jababeka, 17550
Phone: (+62)82112648551</textarea>

            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="../images/skyblue.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		<p class="customer-title">Bill To:</p>
		<div id="customer">

            <span id="customer-info">
				
				<table class="meta">
                <tr>
                    <td class="meta-head">Name</td>
                    <td><textarea><?= $tenant_name; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Address</td>
                    <td><textarea><?= $tenant_address; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Phone</td>
                    <td><textarea><?= $tenant_phone; ?></textarea></td>
                </tr>
            	</table>
			</span>
            
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Property</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Fee(s)</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><textarea><?= $property; ?></textarea></td>
		      <td class="description"><textarea></textarea></td>
		      <td class="cost"><textarea>Rp<?= number_format($price, 0, ',', '.'); ?>,-</textarea></td>
		      <td class="fee"><textarea></textarea></td>
		      <td class="price"><textarea>Rp<?= number_format($price, 0, ',', '.'); ?>,-</textarea></td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><textarea>Rp<?= number_format($price, 0, ',', '.'); ?>,-</textarea></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><textarea>Rp<?= number_format($price, 0, ',', '.'); ?>,-</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">Rp. 0</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value"><textarea>Rp<?= number_format($price, 0, ',', '.'); ?>,-</textarea></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms & Conditions</h5>
		  <textarea>
Thank you for your business. Please send payment within 7 Days. 
Finance Charge of 1.5% will be made on unpaid balances after 7 days.</textarea>
		</div>
	
	</div>
	
</body>

</html>