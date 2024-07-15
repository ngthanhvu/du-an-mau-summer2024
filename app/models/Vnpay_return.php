<?php

require __DIR__ . '/../../includes/vendor/autoload.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');

$vnp_HashSecret = "51CNF74EOXHO7VEELB0W6Z8P6PI8G4MZ"; // Chuỗi bí mật

if (isset($_GET['vnp_SecureHash']) && isset($_GET['vnp_TxnRef']) && isset($_GET['vnp_ResponseCode'])) {
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    unset($_GET['vnp_SecureHashType']);
    unset($_GET['vnp_SecureHash']);
    ksort($_GET);
    $hashData = "";
    foreach ($_GET as $key => $value) {
        $hashData .= '&' . urlencode($key) . '=' . urlencode($value);
    }
    $hashData = trim($hashData, '&');

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    if ($secureHash === $vnp_SecureHash) {
        $orderId = $_GET['vnp_TxnRef'];
        $vnp_ResponseCode = $_GET['vnp_ResponseCode'];

        include_once __DIR__ . '/../../app/models/Payment.php';
        include_once __DIR__ . '/../../app/models/Order.php';
        include_once __DIR__ . '/../../app/models/User.php';
        include_once __DIR__ . '/../../app/models/Mail.php';
        include_once __DIR__ . '/../../app/models/Cart.php';

        $payment = new Payment();
        $order = new Order();
        $user = new User();
        $mail = new Mail();
        $cart = new Cart();
        
        // Lấy thông tin đơn hàng và người dùng
        $orderDetails = $order->getOrderDetailsByOrderId($orderId);
        $userInfo = $user->getUserByOrderId($orderId);
        $userEmail = $userInfo['email'];
        $userFullName = $userInfo['full_name'];
        $userId = $userInfo['id'];
        $userPhone = $userInfo['phone'];
        $userAddress = $userInfo['address'];
        
        // Tính tổng giá trị đơn hàng
        $total = array_reduce($orderDetails, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Ghép tên sản phẩm và số lượng thành chuỗi
        $productDetails = implode(', ', array_map(function($item) {
            return $item['product_name'] . ' (x' . $item['quantity'] . ')';
        }, $orderDetails));

        if ($vnp_ResponseCode == '00') {
            $status = '2'; // Trạng thái đã thanh toán
            $payment->updateOrderStatus($orderId, $status);

            $payment->createBill($userFullName, $userEmail, $userPhone, $userAddress, $orderId, $productDetails, $total, $status, $userId);

            $emailResult = $mail->sendOrderConfirmation(
                $userEmail,
                $userFullName,
                $orderDetails
            );

            if (!$emailResult['success']) {
                echo 'Lỗi khi gửi email: ' . $emailResult['error'];
            }

            // Xóa giỏ hàng
            $cart->deleteCartUserId($userId);
            header("Location: /order?id=" . $userId);
            exit();
        } else {
            $status = 'thất bại';
            $payment->updateOrderStatus($orderId, $status);
            echo "Giao dịch bị lỗi!";
        }
    } else {
        echo "Chữ ký không hợp lệ!";
    }
} else {
    echo "Thiếu các tham số bắt buộc!";
}
?>
