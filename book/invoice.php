<?php 
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}

include_once("../config.php");

// get book id from previous book
$book_id = $_GET['book_id'];

// query for getting booking table data 
$tbooking = mysqli_query($conn, "SELECT * FROM booking WHERE book_id = '$book_id'");
$rbooking = mysqli_fetch_assoc($tbooking);
$book_id = $rbooking['book_id'];
$today_date = $rbooking['today_date'];
$start_date = $rbooking['book_start_date'];
$end_date = $rbooking['book_end_date'];

// getting interval between book start date and end date 
$diff = abs(strtotime($start_date) - strtotime($end_date));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
$price = number_format(1000000 * $months , 0, ',', '.');

// converting ymd format to readable month
$inv_date = date('j F, Y', strtotime($today_date));
$due_date = date('j F, Y', strtotime($today_date. ' + 7 days'));

$tenant_id = $rbooking['tenant_id'];
$room_id = $rbooking['room_id'];

//query for getting tenant table data 
$ttenant = mysqli_query($conn, "SELECT * FROM tenant WHERE tenant_id = '$tenant_id'");
$rtenant = mysqli_fetch_assoc($ttenant);
$tenant_name = $rtenant['tenant_name'];
$tenant_address = $rtenant['tenant_address'];
$tenant_phone = $rtenant['tenant_phone'];

//query for getting room table data 
$troom = mysqli_query($conn, "SELECT * FROM room WHERE room_id = '$room_id'");
$rroom = mysqli_fetch_assoc($troom);
$room_label = $rroom['room_label'];
$room_gender = $rroom['room_gender'];
$room_location = $rroom['room_location'];
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
            <table class="meta">
                <tr>
                    <td class="meta-head">Invoice No</td>
                    <td><textarea>INV00<?= $book_id; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Invoice Date</td>
                    <td><textarea><?= $inv_date; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Due Date</td>
                    <td><textarea><?= $due_date; ?></textarea></div></td>
                </tr>
            </table>
		
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
		      <td class="item-name"><textarea><?= $room_label; ?></textarea></td>
		      <td class="description"><textarea><?= $room_gender; ?>'s Room located at <?= $room_location; ?>

Monthly price: Rp. 1.000.000
Rent for: <?php printf("%d months\n", $months); ?></textarea></td>
		      <td class="cost"><textarea>Rp. <?= $price; ?></textarea></td>
		      <td class="fee"><textarea></textarea></td>
		      <td class="price"><textarea>Rp. <?= $price; ?></textarea></td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><textarea>Rp. <?= $price; ?></textarea></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><textarea>Rp. <?= $price; ?></textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">Rp. 0</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value"><textarea>Rp. <?= $price; ?></textarea></td>
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