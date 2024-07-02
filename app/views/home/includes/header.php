<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Mall</title>
    <link rel="stylesheet" href="../app/views/home/includes/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="/" class="logo">
            <img src="https://themewagon.github.io/MiniStore/images/main-logo.png" alt="">
        </a>
        <ul class="navmenu">
            <li><a href="/">Trang Chủ</a></li>
            <li><a href="/product">Sản Phẩm</a></li>
            <li><a href="/contact">Liên Hệ</a></li>
            <li><a href="/about">Về Chúng tôi </a></li>
        </ul>
        <ul class="navicon">
            <li><a href="/cart"><box-icon name='cart'></box-icon><span>1</span></a></li>
            <li><a href="/login">Login</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <box-icon name='user'></box-icon>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" style="width: 80%;" href="/profile">Profile</a></li>
                    <li><a class="dropdown-item" style="width: 80%;" href="/order">Order</a></li>
                    <li><a class="dropdown-item" style="width: 80%;" href="/checkout">Checkout</a></li>
                    <li><a class="dropdown-item" style="width: 80%;" href="#">Logout</a></li>

                </ul>
            </li>
        </ul>

    </header>