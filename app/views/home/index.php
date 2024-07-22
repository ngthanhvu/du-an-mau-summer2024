<?php include_once "includes/header.php" ?>
<section class="section-1">
    <div class="container">
        <img src="https://bizweb.dktcdn.net/100/483/998/themes/904984/assets/slider_1.jpg?1720275862057" alt="">
    </div>
</section>
<section class="section-2 mt-5">
    <div class="container">
        <div class="row">
            <?php
            foreach ($danhmuc as $value) {
            ?>
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-info">
                            <h3><?php echo $value['name'] ?></h3>
                            <p>Áo bóng đá, giày bóng đá, tất bóng đá,...</p>
                            <a href="#" class="btn btn-custom">Mua Ngay</a>
                        </div>
                        <div class="product-image">
                            <img src="/uploads/<?php echo $value['image'] ?>" alt="Đồ bóng đá">
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
function formatVND($number)
{
    return number_format($number, 0, '', '.',) . 'đ';
}
$product = new Product();
$sp = $product->select(3);
$sp2 = $product->select(4);
$sp3 = $product->select(5);
?>
<section class="section-3">
    <div class="container">
        <h2 class="my-4"><?php echo $sp[0]['name'] ?></h2>
        <div class="row">
            <?php
            foreach ($sp as $key => $value) {

            ?>
                <div class="col-md-2">
                    <a href="/detail?id=<?php echo $value['id'] ?>" class="text-decoration-none text-black">
                        <div class="card border-0">
                            <img src="/uploads/<?php echo $value['image'] ?>" class="border">
                            <div class="card-body">
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <p class="card-title text-left"><?php echo $value['product_name'] ?></p>
                                <p class="card-text text-left"><span class="text-decoration-line-through">300.000đ</span>
                                    <span class="text-danger"><?php echo formatVND($value['price']) ?></span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>

<section class="section-4">
    <div class="container">
        <h2 class="my-4"><?php echo $sp2[0]['name']  ?></h2>
        <div class="row">
            <?php
            foreach ($sp2 as $key => $value) {
            ?>
                <div class="col-md-2">
                    <a class="text-decoration-none text-black" href="/detail?id=<?php echo $value['id'] ?>">
                        <div class="card border-0">
                            <img src="/uploads/<?php echo $value['image'] ?>" class="border">
                            <div class="card-body">
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <p class="card-title text-left"><?php echo $value['product_name'] ?></p>
                                <p class="card-text text-left"><span class="text-decoration-line-through">300.000đ</span>
                                    <span class="text-danger"><?php echo formatVND($value['price']) ?></span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<section class="section-5">
    <div class="container">
        <h2 class="my-4"><?php echo $sp3[0]['name']  ?></h2>
        <div class="row">
            <?php
            foreach ($sp3 as $key => $value) {
            ?>
                <div class="col-md-2">
                    <a class="text-decoration-none text-black" href="/detail?id=<?php echo $value['id'] ?>">
                        <div class="card border-0">
                            <img src="/uploads/<?php echo $value['image'] ?>" class="border">
                            <div class="card-body">
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <p class="card-title text-left"><?php echo $value['product_name'] ?></p>
                                <p class="card-text text-left"><span class="text-decoration-line-through">300.000đ</span>
                                    <span class="text-danger"><?php echo formatVND($value['price']) ?></span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<section class="section-6 mt-5">
    <div class="home-two-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 content_banner">
                    <div class="title_banner">
                        <h3>
                            ĐẶT IN ÁO LIÊN HỆ NGAY
                        </h3>
                        <span>Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox
                            để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt</span>
                    </div>

                    <div class="group-banner">
                        <a class="banner-1" href="#" title="ĐẶT IN ÁO LIÊN HỆ NGAY">
                            <img class="img-responsive lazyload loaded" src="//bizweb.dktcdn.net/100/483/998/themes/904984/assets/twobanner_1.png?1720275862057" data-src="//bizweb.dktcdn.net/100/483/998/themes/904984/assets/twobanner_1.png?1720275862057" width="350" height="204" alt="Handmade" data-was-processed="true">
                        </a>
                        <div class="des">
                            <a href="#" class="lien-he btn btn-danger mb-4 btn-lg" title="Xem thêm">Liên hệ ngay</a>
                            <p>Hỗ trợ, tư vấn ngay qua messenger FB hoặc qua SĐT: 0528503503
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 content_banner_2">
                    <a href="#" title="">
                        <img class="img-responsive lazyload loaded" src="//bizweb.dktcdn.net/100/483/998/themes/904984/assets/twobanner_2.png?1720275862057" data-src="//bizweb.dktcdn.net/100/483/998/themes/904984/assets/twobanner_2.png?1720275862057" alt="Hang Thể Thao" data-was-processed="true" width="100%">
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "includes/footer.php" ?>