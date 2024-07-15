<?php

// require __DIR__ . '/../../includes/vendor/autoload.php';

// date_default_timezone_set('Asia/Ho_Chi_Minh');

// // Lấy dữ liệu trả về từ VNPAY
// $vnp_HashSecret = "51CNF74EOXHO7VEELB0W6Z8P6PI8G4MZ"; // Chuỗi bí mật

// if (isset($_GET['vnp_SecureHash']) && isset($_GET['vnp_TxnRef']) && isset($_GET['vnp_ResponseCode'])) {
//     $vnp_SecureHash = $_GET['vnp_SecureHash'];
//     unset($_GET['vnp_SecureHashType']);
//     unset($_GET['vnp_SecureHash']);
//     ksort($_GET);
//     $hashData = "";
//     foreach ($_GET as $key => $value) {
//         $hashData .= '&' . urlencode($key) . '=' . urlencode($value);
//     }
//     $hashData = trim($hashData, '&');

//     $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

//     if ($secureHash === $vnp_SecureHash) {
//         $orderId = $_GET['vnp_TxnRef'];
//         $vnp_ResponseCode = $_GET['vnp_ResponseCode'];

//         // Sử dụng các lớp để xử lý đơn hàng và người dùng
//         include_once __DIR__ . '/../../app/models/Payment.php';
//         include_once __DIR__ . '/../../app/models/Order.php';
//         include_once __DIR__ . '/../../app/models/User.php';
//         include_once __DIR__ . '/../../app/models/Mail.php';
//         include_once __DIR__ . '/../../app/models/Cart.php'; // Thêm model Cart

//         $payment = new Payment();
//         $order = new Order();
//         $user = new User();
//         $mail = new Mail();
//         $cart = new Cart();

//         // Lấy thông tin đơn hàng và người dùng
//         $orderDetails = $order->getOrderDetailsByOrderId($orderId);
//         $userInfo = $user->getUserByOrderId($orderId);
//         $userEmail = $userInfo['email'];
//         $userFullName = $userInfo['full_name']; // Cập nhật tên cột cho đúng
//         $userId = $userInfo['id']; // Lấy ID người dùng

//         if ($vnp_ResponseCode == '00') {
//             // Thanh toán thành công
//             $status = '2'; // Trạng thái đã thanh toán
//             $payment->updateOrderStatus($orderId, $status);

//             // Gửi email xác nhận
//             $emailResult = $mail->sendOrderConfirmation(
//                 $userEmail,
//                 $userFullName,
//                 $orderDetails
//             );

//             if (!$emailResult['success']) {
//                 echo 'Lỗi khi gửi email: ' . $emailResult['error'];
//             }

//             // Xóa giỏ hàng
//             $cart->deleteCartUserId($userId); // Xóa giỏ hàng của người dùng

//             // Chuyển hướng đến trang cảm ơn
//             header("Location: /order?id=" . $userId);
//             exit();
//         } else {
//             // Cập nhật trạng thái đơn hàng thất bại
//             $status = 'thất bại';
//             $payment->updateOrderStatus($orderId, $status);
//             echo "Giao dịch bị lỗi!";
//         }
//     } else {
//         echo "Chữ ký không hợp lệ!";
//     }
// } else {
//     echo "Thiếu các tham số bắt buộc!";
// }




require __DIR__ . '/../../includes/vendor/autoload.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');

// Lấy dữ liệu trả về từ VNPAY
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
        include_once __DIR__ . '/../../app/models/Cart.php'; // Thêm model Cart

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
        # lỗi lấy thông tin sản phẩm và tổng giá
        $total = isset($orderDetails['total']) ? $orderDetails['total'] : 0;
        $productName = isset($orderDetails['product_name']) ? $orderDetails['product_name'] : '';

        if ($vnp_ResponseCode == '00') {
            $status = '2'; // Trạng thái đã thanh toán
            $payment->updateOrderStatus($orderId, $status);

            $payment->createBill($userFullName, $userEmail, $userPhone, $userAddress, $orderId, $productName, $total, $status, $userId);

            $emailResult = $mail->sendOrderConfirmation(
                $userEmail,
                $userFullName,
                $orderDetails
            );

            if (!$emailResult['success']) {
                echo 'Lỗi khi gửi email: ' . $emailResult['error'];
            }

            $cart->deleteCartUserId($userId); // Xóa giỏ hàng của người dùng

            header("Location: /thankyou.php");
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
