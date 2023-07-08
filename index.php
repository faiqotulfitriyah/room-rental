<?php 
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Room Rental Web App</title>
</head>
<body>
<!-- ---------- Sidebar Section ---------- -->
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="images/skyblue.png" alt="">
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
                        <a href="index.php" class="active">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="room/index.php">
                            <i class='bx bx-bed icon'></i>
                            <span class="text nav-text">Room</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="tenant/index.php">
                            <i class='bx bx-group icon'></i>
                            <span class="text nav-text">Tenant</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="book/index.php">
                            <i class='bx bx-book-add icon'></i>
                            <span class="text nav-text">Booking</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="fine/index.php">
                            <i class='bx bx-money icon'></i>
                            <span class="text nav-text">Fine</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="income/index.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Income Report</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
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
        <div class="title">Dashboard</div>
        <div class="text">SkyBlue Room Rental</div>
        <video autoplay loop muted src="lobby.mp4"></video>
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