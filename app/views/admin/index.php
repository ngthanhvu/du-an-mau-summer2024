<?php include_once "includes/header.php";
if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] != "admin") {
    header("Location: /");
}
?>


<!-- Main Content -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
    <h1>Dashboard</h1>
    <p>Chào mừng đến trang quản trị!</p>
</main>


<?php include_once "includes/footer.php" ?>