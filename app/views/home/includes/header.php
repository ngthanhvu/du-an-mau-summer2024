<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Mall</title>
    <link rel="stylesheet" href="../app/views/home/includes/css/style.css">
    <script src="https://kit.fontawesome.com/de27554dbd.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="/" class="logo">
            <!-- <img src="https://themewagon.github.io/MiniStore/images/main-logo.png" alt=""> -->
            <svg width="200" height="60" xmlns="http://www.w3.org/2000/svg">
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
                </style>
                <text x="10" y="40" font-family="Open Sans" font-size="40" font-weight="500" fill="#333">ShopMall</text>
                <circle cx="190" cy="35" r="3" fill="lightblue" />
            </svg>
        </a>
        <ul class="navmenu">
            <li><a href="/">Trang Chủ</a></li>
            <li><a href="/product">Sản Phẩm</a></li>
            <li><a href="/contact">Liên Hệ</a></li>
            <li><a href="/about">Về Chúng tôi </a></li>
            <?php
            if (isset($_SESSION['user']['username']) == "admin") {
                echo '<li><a href="/admin">Admin</a></li>';
            }
            ?>
        </ul>
        <ul class="navicon">
            <li><a style="color: #fff;" href="/cart"><i class="bi bi-bag"></i> <span>1</span></a></li>
            <?php
            if (empty($_SESSION['user'])) {
                echo '<li><a style="color: #fff;" href="/login">Login</a></li>';
            } else {
                echo '<li class="nav-item dropdown">
                <a style="color: #fff;" href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" style="width: 80%;" href="/profile">Profile</a></li>
                    <li><a class="dropdown-item" style="width: 80%;" href="/order">Order</a></li>
                    <li><a class="dropdown-item" style="width: 80%;" href="/checkout">Checkout</a></li>
                    <li><a class="dropdown-item" style="width: 80%;" href="/logout">Logout</a></li>

                </ul>
            </li>';
            }
            // session_destroy();
            ?>

        </ul>
    </header>