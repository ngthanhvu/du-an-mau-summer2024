<?php 
include_once "includes/header.php"; ?>

<section class="yourcart-section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Giỏ hàng</h2>
                <hr>
                <?php
                function formatVND($number)
                {
                    return number_format($number, 0, '', '.') . 'đ';
                }

                $carts = $cartss;
                if ($carts) {
                    foreach ($carts as $cart) {
                ?>
                        <div class="cart-item">
                            <div class="image-placeholder">
                                <img src="/uploads/<?php echo $cart['image'] ?>" width="100" height="100" alt="Product Image">
                            </div>
                            <div class="item-details">
                                <h5><?php echo $cart['name'] ?></h5>
                                <p>Số lượng: <?php echo $cart['quantity'] ?></p>
                            </div>
                            <div class="item-price">
                                <p><?php echo formatVND($cart['price']) ?></p>
                                <a href="/delete-cart?id=<?php echo $cart['id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<p class="text-center">Giỏ hàng trống</p>';
                }
                ?>
            </div>
            <div class="col-md-4">
                <div class="order-summary">
                    <h4>Tóm tắt đơn hàng</h4>
                    <input type="text" class="form-control" placeholder="Nhập mã giảm giá ở đây">
                    <div class="d-flex justify-content-between">
                        <p>Tổng phụ</p>
                        <p><?php
                            $subtotal = 0;
                            foreach ($carts as $cart) {
                                $subtotal += $cart['price'] * $cart['quantity'];
                            }
                            echo formatVND($subtotal);
                            ?></p>
                    </div>
                    <div class="d-flex justify-content-between total">
                        <p>Tổng cộng</p>
                        <p><?php echo formatVND($subtotal) ?></p>
                    </div>
                    <form action="/add-order?id=<?php echo isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 'No user ID found'; ?>" method="post">
                        <?php
                        foreach ($carts as $index => $cart) {
                        ?>
                            <input type="hidden" name="carts[<?php echo $index; ?>][product_id]" value="<?php echo $cart['product_id']; ?>">
                            <input type="hidden" name="carts[<?php echo $index; ?>][name]" value="<?php echo $cart['name']; ?>">
                            <input type="hidden" name="carts[<?php echo $index; ?>][quantity]" value="<?php echo $cart['quantity']; ?>">
                            <input type="hidden" name="carts[<?php echo $index; ?>][price]" value="<?php echo $cart['price']; ?>">
                            <!-- <input type="hidden" name="carts[<?php echo $index; ?>][image]" value="<?php echo $cart['image']; ?>"> -->
                        <?php
                        }
                        if(empty($carts)){
                            echo "<p class='text-center'>Giỏ hàng trống</p>";
                        }
                        ?>
                        <button class="btn btn-dark btn-block" type="submit">Tiếp tục đến trang thanh toán</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "includes/footer.php" ?>