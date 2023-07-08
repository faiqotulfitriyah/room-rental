<?php
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
// connect to database
include_once("../config.php");

// fetch data 
$menresult = mysqli_query($conn, "SELECT * FROM room WHERE room_gender = 'Men'");
$womenresult = mysqli_query($conn, "SELECT * FROM room WHERE room_gender = 'Women'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/room.style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
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
            font-size: 23px;
        }

        button {
            background-color: salmon; 
            border: none;
            border-radius: 10px;
            padding: 12px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 20px 2px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        a.add {
            color: white;
        }

        table {
            margin: 30px;
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
                        <a href="index.php" class="active">
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
                        <a href="../income/index.php">
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
        <div class="title">Room Data</div>
        <div class="text">
            <div class="content">
                <h3>Men's Room</h3>
                <table>
                    <tr>
                        <th>Room ID</th>
                        <th>Room Label</th>
                        <th>Room Location</th>
                        <th>Room Gender</th>
                        <th>Room Window</th>
                        <th>Room Monthly Price</th>
                        <th>Room Availibility</th>
                        <th>Room Description</th>
                        <th>Action</th>
                    </tr>
                    <?php while($room_data = mysqli_fetch_array($menresult)) { ?>
                    <tr>
                        <td>
                            <?= $room_data['room_id']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_label']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_location']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_gender']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_window']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_monthly_price']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_availability']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_description']; ?>
                        </td>
                        <td><a href="edit.php?room_id=<?= $room_data['room_id']; ?>"><i class='bx bx-edit' style="font-size: 20px;"></i></a> 
                            <a href="delete.php?room_id=<?= $room_data['room_id'];?>"
                                onclick="return confirm('Delete the data?');"><i class='bx bx-trash' style="font-size: 20px;"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                
                </table>
                <button class="add"><a href="add.php" class="add">Add New Room</a></button>
                <table>
                    <h3>Women's Room</h3>
                    <tr>
                        <th>Room ID</th>
                        <th>Room Label</th>
                        <th>Room Location</th>
                        <th>Room Gender</th>
                        <th>Room Window</th>
                        <th>Room Monthly Price</th>
                        <th>Room Availibility</th>
                        <th>Room Description</th>
                        <th>Action</th>
                    </tr>
                    <?php while($room_data = mysqli_fetch_array($womenresult)) { ?>
                    <tr>
                        <td>
                            <?= $room_data['room_id']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_label']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_location']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_gender']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_window']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_monthly_price']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_availability']; ?>
                        </td>
                        <td>
                            <?= $room_data['room_description']; ?>
                        </td>
                        <td><a href="edit.php?room_id=<?= $room_data['room_id']; ?>"><i class='bx bx-edit' style="font-size: 20px;"></i></a> 
                            <a href="delete.php?room_id=<?= $room_data['room_id'];?>"
                                onclick="return confirm('Delete the data?');"><i class='bx bx-trash' style="font-size: 20px;"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <button class="add"><a href="add.php" class="add">Add New Room</a></button>
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