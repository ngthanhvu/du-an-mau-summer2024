<?php
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<div class="container mt-5">
        <div class="row">
            <!-- Address Form -->
            <div class="col-md-6">
                <h2>Checkout</h2>
                <ul class="nav nav-tabs" id="checkoutTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="true">Address</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">Payment</button>
                    </li>
                </ul>
                <div class="tab-content" id="checkoutTabsContent">
                    <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <form class="mt-3">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address">
                            </div>
                            <div class="mb-3">
                                <label for="apartment" class="form-label">Apartment, suite, etc. (optional)</label>
                                <input type="text" class="form-control" id="apartment">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city">
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country">
                                    <option selected>Other</option>
                                    <!-- Add more country options here -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="zipCode" class="form-label">Zip code</label>
                                <input type="text" class="form-control" id="zipCode">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="saveInfo">
                                <label class="form-check-label" for="saveInfo">Save contact information</label>
                            </div>
                            <button type="submit" class="btn btn-dark">Continue to shipping</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-md-6">
                <h2>Your cart</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="https://via.placeholder.com/50" alt="Product Image" class="img-fluid">
                                <span>Natural Honey Bottle</span>
                                <span>Size: L</span>
                                <span>by Vendor Name</span>
                            </div>
                            <span>$99</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="https://via.placeholder.com/50" alt="Product Image" class="img-fluid">
                                <span>Natural Honey Bottle</span>
                                <span>Size: S</span>
                                <span>by Vendor Name</span>
                            </div>
                            <span>$89</span>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="coupon" class="form-label">Enter coupon code here</label>
                            <input type="text" class="form-control" id="coupon">
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>$188</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Shipping</span>
                            <span>Calculated at next step</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Total</span>
                            <span>$188</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once "includes/footer.php" ?>