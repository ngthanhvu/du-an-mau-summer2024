<?php include_once "includes/header.php" ?>
<section class="yourcart-section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Giỏ hàng</h2>
                <hr>
                <div class="cart-item">
                    <div class="image-placeholder">
                        <img src="https://via.placeholder.com/100" alt="Natural Honey Bottle">
                    </div>
                    <div class="item-details">
                        <h5>Natural Honey Bottle</h5>
                        <p>Size: L</p>
                        <p>Quantity: 1</p>
                        <p>by Vendor Name</p>
                    </div>
                    <div class="item-price">
                        <p>$99</p>
                        <a href="#" class="btn btn-danger">Remove</a>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="image-placeholder">
                        <img src="https://via.placeholder.com/100" alt="Natural Honey Bottle">
                    </div>
                    <div class="item-details">
                        <h5>Natural Honey Bottle</h5>
                        <p>Size: S</p>
                        <p>Quantity: 1</p>
                        <p>by Vendor Name</p>
                    </div>
                    <div class="item-price">
                        <p>$89</p>
                        <a href="#" class="btn btn-danger">Remove</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="order-summary">
                    <h4>Order Summary</h4>
                    <input type="text" class="form-control" placeholder="Enter coupon code here">
                    <div class="d-flex justify-content-between">
                        <p>Subtotal</p>
                        <p>$188</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Shipping</p>
                        <p>Calculated at the next step</p>
                    </div>
                    <div class="d-flex justify-content-between total">
                        <p>Total</p>
                        <p>$188</p>
                    </div>
                    <button class="btn btn-dark btn-block">Continue to checkout</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end card  -->
<?php include_once "includes/footer.php" ?>