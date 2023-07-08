<?php 
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
// connect to database
include_once("../config.php");
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
            font-size: 16px;
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
            margin: 20px 30px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        a.add {
            color: white;
        }

        table {
            margin: 30px;
        }

        ol.property {
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
                        <a href="../book/index.php">
                            <i class='bx bx-book-add icon'></i>
                            <span class="text nav-text">Booking</span>
                        </a>
                    </li>

                    <li class="nav-link" >
                        <a href="index.php" class="active">
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
        <div class="title">Fine Data</div>
        <div class="text">
            <div class="content">
                <p>Fine is a sum of money to be paid if tenant brokes properties.</p>
                <p>List of properties: </p>
                <ol class="property">
                    <?php 
                    $rows = mysqli_query($conn, "SELECT property_name FROM property");
                    foreach ($rows as $row) { ?>
                    <li><?= $row['property_name']; ?></li>
                    <?php } ?>
                </ol>

                <table>
                    <tr>
                        <th>Book ID</th>
                        <th>Fine ID</th>
                        <th>Property</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $rows = mysqli_query($conn, "SELECT * FROM fine");
                        foreach($rows as $row) { ?>
                        <tr>
                        <td><?= $row['book_id']; ?></td>
                        <td><?= $row['fine_id']; ?></td>
                        <td><?= $row['property']; ?></td>
                        <td>Rp<?= number_format($row['price'], 0, ',', '.'); ?>,- </td>
                        <td><a href="fineinvoice.php?fine_id=<?= $row['fine_id']; ?>"><i class='bx bx-printer' style="font-size:20px;"></i></a> | <a href="edit.php?fine_id=<?= $row['fine_id']; ?>"><i class='bx bx-edit' style="font-size: 20px;"></i></a>| <a href="delete.php?fine_id=<?= $row['fine_id']; ?>" onclick="return confirm('Delete the data?');"><i class='bx bx-trash' style="font-size: 20px;"></i></a></td>
                        </tr>
                        <?php } ?>
                </table>
                <button class="submit" name="add"><a href="add.php" class="add">Add new fine</button>
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