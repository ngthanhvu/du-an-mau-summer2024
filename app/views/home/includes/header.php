<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $url = $_SERVER['REQUEST_URI'];
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($url == "/") {
            echo "Trang chủ";
        } elseif ($url == "/product" || $url == "/product?page=" . $page) {
            echo "Sản phẩm";
        } elseif ($url == "/contact") {
            echo "Liên hệ";
        } elseif ($url == "/about") {
            echo "Về chúng tôi";
        } elseif ($url == "/admin") {
            echo "Admin - Dashboard";
        } elseif ($url == '/cart') {
            echo "Giỏ hàng";
        } elseif ($url == '/checkout') {
            echo "Thanh toán";
        } elseif ($url == '/order') {
            echo "Lịch sử đơn hàng";
        } elseif ($url == '/checkout') {
            echo "Thanh toán";
        } elseif ($url == '/add-order') {
            echo "Thanh toán đơn hàng";
        } elseif ($url == '/login' || $url == '/admin/users/login') {
            echo "Đăng nhập";
        } elseif ($url == '/register' || $url == '/admin/users/register') {
            echo "Đăng ký";
        } elseif ($url == '/reset-password') {
            echo "Quên mật khẩu";
        } elseif ($url == '/very-otp') {
            echo "Xác thực OTP";
        } else {
            if ($url == '/detail?id=' . $_GET['id']) {
                echo "Chi tiết sản phẩm";
            } elseif ($url == '/profile?id=' . $_GET['id']) {
                echo "Thông tin cá nhân";
            } elseif ($url == "/product?id=" . $_GET['id']) {
                echo "Sản phẩm";
            } else {
                echo "MiniStore.";
            }
        }
        ?>
    </title>
    <link rel="icon" id="favicon" href="https://static.tacdn.com/favicon.ico?v2" type="image/x-icon">
    <link rel="stylesheet" href="<?php
                                    $geturl = $_SERVER['REQUEST_URI'];
                                    if ($geturl == "/admin/users/login" || $geturl == "/admin/users/register") {
                                        echo '/app/views/home/includes/css/style.css';
                                    } else {
                                        echo '../app/views/home/includes/css/style.css';
                                    }
                                    ?>">
    <script src="https://kit.fontawesome.com/de27554dbd.js" crossorigin="anonymous"></script>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
    .navmenu a {
        color: #000;
    }

    <?php
    $url = $_SERVER['REQUEST_URI'];
    if ($url == "/") {
        echo '.navmenu a {color: #fff;}';
        echo '.navicon i {color: #fff;}';
        echo '.login-buton {color: #fff;}';
    } else {
        echo '
        .navmenu a:hover {color: #000;}
        .navicon a {color: #000;}';
    }
    ?>
</style>

<body>
    <header style="z-index: 100;">
        <a href="/" class="logo">
            <img src="https://bizweb.dktcdn.net/100/483/998/themes/904984/assets/logo.png?1720275862057" alt="">
        </a>
        <ul class="navmenu">
            <li><a href="/">Trang Chủ</a></li>
            <li><a href="/product">Sản Phẩm</a></li>
            <li><a href="/contact">Liên Hệ</a></li>
            <li><a href="/about">Về Chúng tôi </a></li>
            <?php
            if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == "admin") {
                echo '<li><a href="/admin">Admin</a></li>';
            }
            ?>
        </ul>
        <ul class="navicon">
            <li><a style="color: #333;" href="/cart"><i class="bi bi-bag"></i> <span>
                        <?php if (isset($_SESSION['cart'])) {
                            echo count($_SESSION['cart']);
                            // var_dump($_SESSION['cart']);
                        } else {
                            echo "0";
                        } ?>
                    </span></a></li>
            <?php
            if (empty($_SESSION['user'])) {
                echo '<li><a href="/login" class="login-buton">Login</a></li>';
            } else {
                echo '<li class="nav-item dropdown">
                <a style="color: #333;" href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item text-dark" style="width: 80%;" href="/profile?id=' . $_SESSION['user']['id'] . '">Profile</a></li>
                    <li><a class="dropdown-item text-dark" style="width: 80%;" href="/order?id=' . $_SESSION['user']['id'] . '">Order</a></li>
                    <li><a class="dropdown-item text-dark" style="width: 80%;" href="/checkout">Checkout</a></li>
                    <li><a class="dropdown-item text-dark" style="width: 80%;" href="/logout">Logout</a></li>

                </ul>
            </li>';
            }
            ?>

        </ul>
    </header>