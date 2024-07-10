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
                <h1 class="display-5 fw-bolder"><?php echo $detailProduct['name'] ?></h1>
                <div class="fs-5 mb-5">
                    <span>Giá: <?php echo formatVND($detailProduct['price']) ?></span>
                </div>
                <p class="lead"><?php echo $detailProduct['description'] ?></p>
                <form action="/add_to_cart" method="post">
                    <div class="d-flex">
                        <input type="hidden" name="product_id" value="<?php echo $detailProduct['id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                        <input type="hidden" name="image" value="<?php echo $detailProduct['image']; ?>">
                        <input type="hidden" name="name" value="<?php echo $detailProduct['name']; ?>">
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
<!-- ... -->
<?php include_once "includes/footer.php" ?>