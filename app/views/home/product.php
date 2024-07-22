<?php
include_once "includes/header.php";
?>
<style>
    .product-card1 {
        overflow: hidden;
        position: relative;
    }

    .product-card1 img {
        transition: transform 0.3s ease;
    }

    .product-card1:hover img {
        transform: scale(1.1);
    }

    .sidebar {
        border-right: 1px solid #ddd;
        padding-right: 15px;
    }

    .sidebar h5 {
        margin-top: 20px;
    }

    .sidebar a {
        text-decoration: none;
        color: #000;
        display: block;
        margin-bottom: 10px;
    }

    .sidebar a:hover {
        color: #007bff;
    }

    .card-img-wrapper {
        overflow: hidden;
        height: 200px;
    }

    .card {
        height: 300px;
    }
</style>

<section class="shop1 text-center">
    <h1 class="text-center mt-5">Sản phẩm</h1>
    <p class="text-center">
        Các sản phẩm có tại website của chúng tôi.
    </p>
</section>

<div class="container">
    <!-- <h1 class="mt-4">Áo Bóng Đá</h1> -->
    <div class="row">
        <div class="col-md-3 sidebar">
            <h5>Danh Mục</h5>
            <?php
            foreach ($danhmuc as $category) {
            ?>
                <a href="/category?id=<?php echo $category['id']; ?>" class="text-decoration-none text-black"><?php echo $category['name']; ?></a>
            <?php
            }
            ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php
                function formatVND($number)
                {
                    return number_format($number, 0, '', '.',) . 'đ';
                }
                echo "<pre>";
                // var_dump($danhmuc);  
                echo "</pre>";
                foreach ($sanpham as $product) {
                ?>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="/detail?id=<?php echo $product['id']; ?>" class="text-decoration-none text-black">
                            <div class="card product-card1">
                                <div class="card-img-wrapper">
                                    <img src="/uploads/<?php echo $product['image']; ?>" class="card-img-top" alt="Product 1" width="100%">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-left small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                    <p class="card-text"><?php echo formatVND($product['price']); ?> <del class="text-decoration-line-through text-danger">385.000đ</del></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
                <!-- Add more product cards here -->
            </div>
        </div>
    </div>
</div>

<?php
include_once "includes/footer.php";
?>