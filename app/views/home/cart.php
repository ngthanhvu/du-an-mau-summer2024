<?php include_once "includes/header.php" ?>

<section class="yourcart-section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Giỏ hàng</h2>
                <hr>
                <?php
                // var_dump($cartss);
                function formatVND($number)
                {
                    return number_format($number, 0, '', '.') . 'đ';
                }

                // Check if $_SESSION['cart'] is set and not empty
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $carts = $_SESSION['cart'];
                    foreach ($carts as $cart) {
                ?>
                        <div class="cart-item">
                            <div class="image-placeholder">
                                <img src="/uploads/<?php echo $cart['image'] ?>" width="100" height="100" alt="Product Image">
                            </div>
                            <div class="item-details">
                                <h5><?php echo $cart['name'] ?></h5>
                                <p>Quantity: 1</p>
                            </div>
                            <div class="item-price">
                                <p><?php echo formatVND($cart['price']) ?></p>
                                <a href="#" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<p>Giỏ hàng của bạn đang trống. Ấn vào đây để mua hàng <a href="/product">Here</a></p>';
                }
                ?>
            </div>
            <div class="col-md-4">
                <div class="order-summary">
                    <h4>Tóm tắt đơn hàng</h4>
                    <input type="text" class="form-control" placeholder="Nhập mã giảm giá ở đây">
                    <div class="d-flex justify-content-between">
                        <p>Tổng phụ</p>
                        <p>$188</p>
                    </div>
                    <div class="d-flex justify-content-between total">
                        <p>Tổng cộng</p>
                        <p>$188</p>
                    </div>
                    <button class="btn btn-dark btn-block">Tiếp tục đến trang thanh toán</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "includes/footer.php" ?>
