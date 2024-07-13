<?php
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<div class="container mt-5" style="min-height: 34.25rem;">
    <div class="row">
        <?php
        echo "<pre>";
        // print_r($order_details);
        echo "</pre>";
        ?>
        <div class="col-md-6">
            <h2>Xác nhận thanh toán</h2>
            <ul class="nav nav-tabs" id="checkoutTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="true"><b>Thông tin và địa chỉ</b></button>
                </li>
            </ul>
            <div class="tab-content" id="checkoutTabsContent">
                <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="address-tab">
                    <form class="mt-3">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="firstName" name="full_name" value="<?php echo $_SESSION['user']['username']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['user']['phone']; ?>">
                        </div>
                        <ul class="nav nav-tabs" id="checkoutTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="true"><b>Phương thức thanh toán</b></button>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <form class="needs-validation" method="post" action="">
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="payment" type="radio" class="custom-control-input" value="cod" checked>
                                        <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="payment" type="radio" class="custom-control-input" value="vnpay">
                                        <label class="custom-control-label" for="debit">VNPAY</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark">Tiến hành thanh toán</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="col-md-6">
            <h2>Giỏ hàng</h2>
            <div class="card">
                <div class="card-body">
                    <?php
                    function formatVND($number)
                    {
                        return number_format($number, 0, '', '.') . 'đ';
                    }

                    $total = 0;
                    $groupedProducts = [];

                    foreach ($order_details['orders'] as $order) {
                        foreach ($order['order_details'] as $detail) {
                            $productId = $detail['product_id'];
                            if (!isset($groupedProducts[$productId])) {
                                $groupedProducts[$productId] = [
                                    'product' => $detail['product'],
                                    'quantity' => 0,
                                    'total_price' => 0
                                ];
                            }
                            $groupedProducts[$productId]['quantity'] += $detail['quantity'];
                            $groupedProducts[$productId]['total_price'] += $detail['price'] * $detail['quantity'];
                        }
                    }

                    foreach ($groupedProducts as $productInfo) {
                        $product = $productInfo['product'];
                        $total += $productInfo['total_price'];
                    ?>
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="/uploads/<?php echo $product['image']; ?>" alt="Product Image" class="img-fluid border" style="width: 50px;">
                                <span><?php echo $product['name']; ?></span><br>
                                <span class="text-muted d-block mt-2">Số lượng: <?php echo $productInfo['quantity']; ?></span>
                            </div>
                            <span class="text-muted d-block mt-2"><b><?php echo formatVND($productInfo['total_price']); ?></b></span>
                        </div>
                        <hr>
                    <?php
                    }
                    ?>
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Tổng cộng:</span>
                        <span class="fw-semibold""><?php echo formatVND($total) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php" ?>