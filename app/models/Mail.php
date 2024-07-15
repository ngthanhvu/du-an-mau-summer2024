<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../includes/vendor/autoload.php';

class Mail
{
    public function sendOrderConfirmation($to, $fullName, $orderDetails)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Thay bằng host SMTP của bạn
            $mail->SMTPAuth = true;
            $mail->Username = 'ngthanhvu205@gmail.com'; // Thay bằng email của bạn
            $mail->Password = 'ncyp agwy mzvc zrwk'; // Thay bằng mật khẩu email của bạn
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Thay bằng port SMTP của bạn

            // Người gửi và người nhận
            $mail->setFrom('support@ministore.com', 'MiniStore');
            $mail->addAddress($to, $fullName);

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = 'Xác nhận đơn hàng';
            $mail->Body = $this->createEmailBody($fullName, $orderDetails);
            $mail->AltBody = 'Đơn hàng đã được đặt thành công.';

            $mail->send();
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $mail->ErrorInfo];
        }
    }

    // private function createEmailBody($fullName, $orderDetails)
    // {
    //     function formatVND($number)
    //     {
    //         return number_format($number, 0, '.', '.') . ' đ';
    //     }

    //     $body = "<h1>Chào $fullName,</h1>";
    //     $body .= "<p>Cảm ơn bạn đã đặt hàng!</p>";
    //     $body .= "<h2>Chi tiết đơn hàng:</h2>";
    //     $body .= "<ul>";
    //     foreach ($orderDetails as $detail) {
    //         $total = $detail['price'] * $detail['quantity'];
    //         $body .= "<li>{$detail['product_name']} - Số lượng: {$detail['quantity']} - Giá: " . formatVND($total) . "</li>";
    //     }
    //     $body .= "</ul>";
    //     return $body;
    // }

    private function createEmailBody($fullName, $orderDetails)
    {
        // Hàm định dạng số tiền sang đơn vị VND
        function formatVND($number)
        {
            return number_format($number, 0, '.', '.') . ' đ';
        }

        // Tính tổng số tiền thanh toán
        $totalAmount = array_reduce($orderDetails, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $body = '<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6em;
            background-color: #f0f0f0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            color: #007bff;
        }
        .order-details {
            color: #007bff;
        }
        .order-item {
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .order-item strong {
            color: #333;
        }
        .order-item span {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Chào ' . $fullName . ',</h1>
        <p>Cảm ơn bạn đã đặt hàng!</p>
        <h2 class="order-details">Chi tiết đơn hàng:</h2>
        <ul style="list-style-type: none; padding: 0;">';

        foreach ($orderDetails as $detail) {
            $total = $detail['price'] * $detail['quantity'];
            $body .= '
        <li class="order-item">
            <strong>' . $detail['product_name'] . '</strong><br>
            <span>Số lượng: ' . $detail['quantity'] . '</span><br>
            <span>Giá: ' . formatVND($total) . '</span>
        </li>';
        }

        $body .= '
            <strong>Tổng thanh toán:</strong><br>
            <span>Giá: ' . formatVND($totalAmount) . '</span>
        </ul>
    </div>
</body>
</html>';

        return $body;
    }
}
