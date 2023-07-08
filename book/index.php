<?php 
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
// connect to database
include_once("../config.php");

// fetch data 
$paidresult = mysqli_query($conn, "SELECT * FROM booking WHERE book_status = 'Paid'");
$unpaidresult = mysqli_query($conn, "SELECT * FROM booking WHERE book_status = 'Unpaid'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/book.style.css">
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
                        <a href="index.php" class="active">
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
        <div class="title">Booking Data</div>
        <div class="text">
            <div class="content">
                <table class="paid">
                    <h3>Paid Books</h3>
                    <tr>
                        <th>Book ID</th>
                        <th>Book Date</th>
                        <th>Room ID</th>
                        <th>Tenant ID</th>
                        <th>Book Start Date</th>
                        <th>Book End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php while($book_data = mysqli_fetch_array($paidresult)) { ?>
                    <tr>
                        <td><?= $book_data['book_id']; ?></td>
                        <td><?= $book_data['today_date']; ?></td>
                        <td><?= $book_data['room_id']; ?></td>
                        <td><?= $book_data['tenant_id']; ?></td>
                        <td><?= $book_data['book_start_date']; ?></td>
                        <td><?= $book_data['book_end_date']; ?></td>
                        <td><?= $book_data['book_status']; ?></td>
                        <td><a href="invoice.php?book_id=<?= $book_data['book_id']; ?>"><i class='bx bx-printer' style="font-size:20px;"></i></a> | <a href="edit.php?book_id=<?= $book_data['book_id']; ?>"><i class='bx bx-edit' style="font-size: 20px;"></i></a>| <a href="delete.php?book_id=<?= $book_data['book_id']; ?>" onclick="return confirm('Delete the data?');"><i class='bx bx-trash' style="font-size: 20px;"></i></a>| <a href="status.php?book_id=<?= $book_data['book_id'];?>&amp;stats=paid" onclick="return confirm('Set this book status to unpaid?');">Set to unpaid <i class='bx bx-x-circle' style="font-size:20px;"></i></a> </td>
                    </tr>
                    <?php } ?>
                </table>
                <table class="unpaid">
                    <h3>Unpaid Books</h3>
                    <tr>
                        <th>Book ID</th>
                        <th>Book Date</th>
                        <th>Room ID</th>
                        <th>Tenant ID</th>
                        <th>Book Start Date</th>
                        <th>Book End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php while($book_data = mysqli_fetch_array($unpaidresult)) { ?>
                    <tr>
                        <td><?= $book_data['book_id']; ?></td>
                        <td><?= $book_data['today_date']; ?></td>
                        <td><?= $book_data['room_id']; ?></td>
                        <td><?= $book_data['tenant_id']; ?></td>
                        <td><?= $book_data['book_start_date']; ?></td>
                        <td><?= $book_data['book_end_date']; ?></td>
                        <td><?= $book_data['book_status']; ?></td>
                        <td><a href="invoice.php?book_id=<?= $book_data['book_id']; ?>"><i class='bx bx-printer' style="font-size:20px;"></i></a> | <a href="edit.php?book_id=<?= $book_data['book_id']; ?>"><i class='bx bx-edit' style="font-size: 20px;"></i></a>| <a href="delete.php?book_id=<?= $book_data['book_id']; ?>" onclick="return confirm('Delete the data?');"><i class='bx bx-trash' style="font-size: 20px;"></i></a>| <a href="status.php?book_id=<?= $book_data['book_id'];?>&amp;stats=unpaid" onclick="return confirm('Set this book status to paid?');">Set to paid <i class='bx bx-check-circle' style="font-size:20px;"></i></a> </td>
                    </tr>
                    <?php } ?>
                </table>
                <button><a href="add.php" class="add">Book a room</a></button>
            </div>             
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