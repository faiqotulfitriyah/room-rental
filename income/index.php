<?php
// connect to database and check for session
include_once("../config.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}

// fetch data for create graph 
if( isset( $_POST['view'] )) {
    $month =  $_POST['month'];
    //query for getting number of men and women rooms that have been booked in respective month
    $row = mysqli_query($conn, "SELECT COUNT(book_id) FROM booking WHERE room_id LIKE 'M%' && MONTHNAME(today_date) ='$month'");
    $row2 = mysqli_query($conn, "SELECT COUNT(book_id) FROM booking WHERE room_id LIKE 'W%' && MONTHNAME(today_date) ='$month'");
    $countmen = mysqli_fetch_array($row);
    $countwomen = mysqli_fetch_array($row2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/room.style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- create a chart to show room booked in respective month -->
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Gender', 'Room booked ', { role: 'style' }],
            ['Men\'s Room', <?= (int)$countmen['0']; ?>, '#19589b'],
            ['Women\'s Room', <?= (int)$countwomen['0']; ?>, '#ffe149']
        ]);

        // chart options
        var options = {'title':'Booked Rooms in <?= $month; ?>',
                       'width':650,
                       'height':400};

        // instantiate chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        }
        </script>
    <title>Room Rental Web App</title>
    <style>
        th {
            padding: 10px 16px;
            background-color: skyblue;
        }

        td {
            padding: 6px 16px;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        a {
            text-decoration: none;
            color: black;
        }

        p {
            font-size: 16px;
            margin: 0px 0px 40px 60px;
        }

        button {
            background-color: salmon; 
            border: none;
            border-radius: 10px;
            padding: 8px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            margin: 10px 10px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        select {
            font-size: 14.5px;
        }

        a.add {
            color: white;
        }

        table {
            margin: 30px 60px;
        }

        h3 {
            margin-left: 30px;
        }

        hr {
            border-top: 1.5px solid black;
            margin: 20px 0;
        }
    </style>
</head>

<body>
<!-- ---------- Sidebar Section ---------- -->
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../images/skyblue.png" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">SkyBlue</span>
                    <span class="profession">Administrator</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../index.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../room/index.php">
                            <i class='bx bx-bed icon'></i>
                            <span class="text nav-text">Room</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="../tenant/index.php">
                            <i class='bx bx-group icon'></i>
                            <span class="text nav-text">Tenant</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../book/index.php">
                            <i class='bx bx-book-add icon'></i>
                            <span class="text nav-text">Booking</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../fine/index.php">
                            <i class='bx bx-money icon'></i>
                            <span class="text nav-text">Fine</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index.php" class="active">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Income Report</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav> 
<!-- ---------- End of Sidebar Section ---------- -->

<!-- ---------- Content Section ---------- -->

    <section class="home">
        <div class="title">Income Report</div>
        <div class="text">
            <div class="content">
                <h2>Monthly Income</h2>
                <label for="month">Choose a month:</label>
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <?php 
                    $montharray = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    ?>
                    <select id="month" name="month">
                        <?php for ($i=0; $i < count($montharray); $i++) { ?>
                            <option value="<?= $montharray[$i]; ?>" <?php if( isset( $month ) && $month == $montharray[$i]) echo "selected"; ?>> <?= $montharray[$i]; ?> </option> 
                        <?php } ?>
                    </select>   
                    <button type="submit" name="view">View</button>
                   
                    <div id="chart_div"></div>
                    <?php 
                    if( isset( $_POST['view'] )) { ?>
                    <table>
                        <h3>Men's Room Booking Details</h3>
                        <tr>
                        <th>Book ID</th>
                        <th>Room Label</th>
                        <th>Booked for (months)</th>
                        <th>Room Cost</th>
                        <th>Fine (if any)</th>
                        </tr>
                            <?php 
                            $mrow = mysqli_query($conn, "SELECT booking.book_id AS book_id, booking.today_date AS today_date, booking.room_id as room_id, booking.book_start_date AS start_date, booking.book_end_date AS end_date, fine.price AS fine_price FROM booking LEFT JOIN fine ON booking.book_id = fine.book_id WHERE booking.room_id LIKE 'M%' && MONTHNAME(today_date) ='$month'");
                            $totalroom = array();
                            $totalfine = array();
                            foreach($mrow as $m) { 
                                $start_date = $m['start_date'];
                                $mdate = date_create("$start_date");
                                $end_date = $m['end_date'];
                                $mdate2 = date_create("$end_date");
                                $interval = $mdate->diff($mdate2);
                                $mmonth = $interval->m;
                                $room_cost = 1000000 * (int)$mmonth;
                                $totalroom[] = $room_cost;
                                $totalfine[] = $m['fine_price'];
                            ?>
                            <tr>
                                <td><?= $m['book_id']; ?></td>
                                <td><?= $m['room_id']; ?></td>
                                <td><?= $mmonth; ?></td>
                                <td>Rp<?= number_format($room_cost , 0, ',', '.'); ?>,-</td>
                                <td>Rp<?= number_format($m['fine_price'] , 0, ',', '.'); ?>,- </td>
                            </tr>
                            <?php } 
                            $mtotalincome = array_sum($totalroom) + array_sum($totalfine);
                            ?>
                    </table>
                    <p>Total income from Men's Room in <?= $month; ?>: Rp<?= number_format($mtotalincome, 0, ',', '.');?>,- </p>
                    <table>
                        <h3>Women's Room Booking Details</h3>
                        <tr>
                        <th>Book ID</th>
                        <th>Room Label</th>
                        <th>Booked for (months)</th>
                        <th>Room Cost</th> 
                        <th>Fine (if any)</th> 
                        </tr>
                            <?php 
                            $wrow = mysqli_query($conn, "SELECT booking.book_id AS book_id, booking.today_date AS today_date, booking.room_id as room_id, booking.book_start_date AS start_date, booking.book_end_date AS end_date, fine.price AS fine_price FROM booking LEFT JOIN fine ON booking.book_id = fine.book_id WHERE booking.room_id LIKE 'W%' && MONTHNAME(today_date) ='$month'");
                            $totalroom = array();
                            $totalfine = array();
                            foreach($wrow as $w) { 
                                $start_date = $w['start_date'];
                                $wdate = date_create("$start_date");
                                $end_date = $w['end_date'];
                                $wdate2 = date_create("$end_date");
                                $interval = $wdate->diff($wdate2);
                                $wmonth = $interval->m;
                                $room_cost = 1000000 * (int)$wmonth;
                                $totalroom[] = $room_cost;
                                $totalfine[] = $w['fine_price'];
                            ?>
                            <tr>
                                <td><?= $w['book_id']; ?></td>
                                <td><?= $w['room_id']; ?></td>
                                <td><?= $wmonth; ?></td>
                                <td>Rp<?= number_format($room_cost , 0, ',', '.'); ?>,- </td>
                                <td>Rp<?= number_format($w['fine_price'] , 0, ',', '.'); ?>,- </td>
                            </tr>
                            <?php }
                            $wtotalincome = array_sum($totalroom) + array_sum($totalfine);
                            ?> 
                    </table>
                    <p>Total income from Women's Room in <?= $month; ?>: Rp<?= number_format($wtotalincome, 0, ',', '.'); ?>,- </p>
                    <h3>Total income in <?= $month; ?>: Rp<?= number_format($mtotalincome + $wtotalincome, 0, ',', '.'); ?>,- </h3>
                    <?php } ?>
                    <hr>
                    </form>
            </div>
        </div>
    </section>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            modeText = body.querySelector(".mode-text");
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>
</html>