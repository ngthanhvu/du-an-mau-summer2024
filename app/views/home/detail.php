<?php include_once "includes/header.php" ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <?php
            function formatVND($number)
            {
                return number_format($number, 0, '', '.',) . 'đ';
            }
            ?>
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/uploads/<?php echo $detailProduct['image'] ?>" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">Category: <?php echo $detailProduct['category_id'] ?></div>
                <h1 class="display-5 fw-bolder"><?php echo $detailProduct['product_name'] ?></h1>
                <div class="fs-5 mb-5">
                    <span>Giá: <?php echo formatVND($detailProduct['price']) ?></span>
                </div>
                <p class="lead"><?php echo $detailProduct['description'] ?></p>
                <form action="/add_to_cart" method="post">
                    <div class="d-flex">
                        <input type="hidden" name="product_id" value="<?php echo $detailProduct['id']; ?>">
                        <input type="hidden" name="user_id" value="<?php if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) {
                                                                        echo ($_SESSION['user']['id']);
                                                                    } ?>">
                        <input type="hidden" name="image" value="<?php echo $detailProduct['image']; ?>">
                        <input type="hidden" name="name" value="<?php echo $detailProduct['product_name']; ?>">
                        <input type="hidden" name="price" value="<?php echo $detailProduct['price']; ?>">
                        <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="number" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Related items section-->

<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Các sản phẩm tương tự</h2>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($recommendProduct as $value) {
            ?>
                <div class="col mb-5">
                    <a href="/detail?id=<?php echo $value['id'] ?>" class="text-decoration-none text-black">
                        <div class="card h-100">
                            <img class="card-img-top" src="/uploads/<?php echo $value['image'] ?>" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $value['product_name'] ?></h5>
                                    <?php echo $value['price'] ?>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
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
<!-- ... -->
<?php include_once "includes/footer.php" ?>