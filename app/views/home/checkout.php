<?php
include_once "includes/header.php";
include_once "includes/navbar.php";

function formatVND($number)
{
    return number_format($number, 0, '', '.') . 'đ';
}

$total = 0;
$groupedProducts = [];
$product_names = [];

$carts = $_SESSION['cart'] ?? [];

foreach ($carts as $productId => $product) {
    $groupedProducts[$productId] = [
        'product' => $product,
        'quantity' => $product['quantity'],
        'total_price' => $product['price'] * $product['quantity'],
        'size' => $product['size'],
    ];
    
    $total += $groupedProducts[$productId]['total_price'];
    $product_names[] = $product['name'];
    $product_size[] = $product['size'];
}
?>

<div class="container checkout-section" style="min-height: 34.25rem;">
    <div class="row">
        <div class="col-md-6">
            <h2>Xác nhận thanh toán</h2>
            <ul class="nav nav-tabs" id="checkoutTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="true">
                        <b>Thông tin và Phương thức thanh toán</b>
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="checkoutTabsContent">
                <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="address-tab">
                    <form class="mt-3" method="post" action="/payment?id=<?php echo $_GET['id']; ?>">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="firstName" name="full_name" value="<?php echo htmlspecialchars($_SESSION['user']['full_name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['user']['email'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($_SESSION['user']['address']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($_SESSION['user']['phone']); ?>" required>
                        </div>
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars(implode(', ', $product_names)); ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <input type="hidden" name="size" value="<?php echo implode(', ', $product_size); ?>">
                        <div class="mt-3">
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
                    <?php foreach ($groupedProducts as $productInfo) : ?>
                        <?php $product = $productInfo['product']; ?>
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" class="img-fluid border" style="width: 50px;">
                                <span><?php echo htmlspecialchars($product['name']); ?></span><br>
                                <span class="text-muted d-block mt-2">Số lượng: <?php echo $productInfo['quantity']; ?></span>
                                <span class="text-muted d-block mt-2">Size: <?php echo $productInfo['product']['size']; ?></span>
                            </div>
                            <span class="text-muted d-block mt-2"><b><?php echo formatVND($productInfo['total_price']); ?></b></span>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Tổng cộng:</span>
                        <span class="fw-semibold"><?php echo formatVND($total) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>
