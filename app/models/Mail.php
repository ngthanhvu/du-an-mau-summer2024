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
<<<<<<< HEAD
            unset($_SESSION['coupon']);
=======
>>>>>>> feature
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $mail->ErrorInfo];
        }
    }

<<<<<<< HEAD
=======

    //     private function createEmailBody($fullName, $orderDetails)
    //     {
    //         // Hàm định dạng số tiền sang đơn vị VND
    //         function formatVND($number)
    //         {
    //             return number_format($number, 0, '.', '.') . ' đ';
    //         }

    //         // Tính tổng số tiền thanh toán
    //         $totalAmount = array_reduce($orderDetails, function ($carry, $item) {
    //             return $carry + ($item['price'] * $item['quantity']);
    //         }, 0);

    //         $body = '<!DOCTYPE html>
    // <html lang="vi">
    // <head>
    //     <meta charset="UTF-8">
    //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    //     <title>Chi tiết đơn hàng</title>
    //     <style>
    //         body {
    //             font-family: Arial, sans-serif;
    //             line-height: 1.6em;
    //             background-color: #f0f0f0;
    //             padding: 20px;
    //             color: #333;
    //         }
    //         .container {
    //             max-width: 600px;
    //             margin: 0 auto;
    //             background-color: #fff;
    //             padding: 20px;
    //             border-radius: 5px;
    //             box-shadow: 0 0 10px rgba(0,0,0,0.1);
    //         }
    //         .header {
    //             color: #007bff;
    //         }
    //         .order-details {
    //             color: #007bff;
    //         }
    //         .order-item {
    //             margin-bottom: 10px;
    //             border-bottom: 1px solid #ccc;
    //             padding-bottom: 10px;
    //         }
    //         .order-item strong {
    //             color: #333;
    //         }
    //         .order-item span {
    //             color: #666;
    //         }
    //     </style>
    // </head>
    // <body>
    //     <div class="container">
    //         <h1 class="header">Chào ' . $fullName . ',</h1>
    //         <p>Cảm ơn bạn đã đặt hàng!</p>
    //         <h2 class="order-details">Chi tiết đơn hàng:</h2>
    //         <ul style="list-style-type: none; padding: 0;">';

    //         foreach ($orderDetails as $detail) {
    //             $total = $detail['price'] * $detail['quantity'];
    //             $body .= '
    //         <li class="order-item">
    //             <strong>' . $detail['product_name'] . '</strong><br>
    //             <span>Số lượng: ' . $detail['quantity'] . '</span><br>
    //             <span>Giá: ' . formatVND($total) . '</span>
    //         </li>';
    //         }

    //         $body .= '
    //             <strong>Tổng thanh toán:</strong><br>
    //             <span>Giá: ' . formatVND($totalAmount) . '</span>
    //         </ul>
    //     </div>
    // </body>
    // </html>';

    //         return $body;
    //     }

>>>>>>> feature
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

<<<<<<< HEAD
        $coupon = isset($_SESSION['coupon']) ? $_SESSION['coupon'] : null;

        $total_final = $coupon ? $totalAmount - $coupon['discount_amount'] : $totalAmount;

=======
>>>>>>> feature
        // Thiết lập locale cho tiếng Việt
        setlocale(LC_TIME, 'vi_VN.UTF-8');

        // Định dạng ngày giờ
        $formatter = new IntlDateFormatter(
            'vi_VN',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Asia/Ho_Chi_Minh',
            IntlDateFormatter::GREGORIAN,
            'EEEE, d MMMM yyyy \'lúc\' h:mm a'
        );
        $formattedDate = $formatter->format(new DateTime());

        $body = '<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            color: #007bff;
        }
        .order-details {
            margin-top: 20px;
        }
        .order-title {
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .text-right {
            text-align: right;
        }
        .total td {
            font-weight: bold;
        }
        .your-details {
            margin-top: 20px;
        }
        .fw-bold {
            font-weight: bold;
        }
        .share-section {
            margin-top: 20px;
            text-align: center;
            background-color: #28a745;
            padding: 20px;
            border-radius: 5px;
            color: #ffffff;
        }
        .share-section a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 10px;
        }
        .account-button {
            margin-top: 20px;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }
        .order-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Cảm ơn bạn, ' . $fullName . '!</h1>
        </div>
        <div class="order-details">
            <div class="order-title">
                <h3>Đơn hàng của bạn</h3>
                <p>' . $formattedDate . '</p>
            </div>
            <table class="table">
                <tbody>';

        foreach ($orderDetails as $detail) {
            $total = $detail['price'] * $detail['quantity'];
            $body .= '
                    <tr>
                        <td>' . $detail['product_name'] . '</td>
                        <td class="text-right">' . formatVND($total) . '</td>
                    </tr>';
        }

        $body .= '
                    <tr class="total">
<<<<<<< HEAD
                        <td>Giảm giá:</td>
                        <td class="text-right">' . formatVND($coupon['discount_amount']) . '</td>
                    </tr>
                    <tr class="total">
                        <td>Tổng:</td>
                        <td class="text-right">' . formatVND($total_final) . '</td>
=======
                        <td>Tổng:</td>
                        <td class="text-right">' . formatVND($totalAmount) . '</td>
>>>>>>> feature
                    </tr>
                </tbody>
            </table>
            <hr>
            <p>Bạn thấy có gì sai không?? <a href="#">Hãy liên hệ chúng tôi</a> và chúng tôi sẽ sẵn sàng trợ giúp</p>
        </div>
        <div class="share-section">
            <h3>Chia sẻ website chúng tôi đến bạn bè của bạn</h3>
            <p>Chia sẻ URL duy nhất của bạn với bạn bè và mỗi khi họ đăng ký, bạn sẽ nhận được mã giảm giá đặc biệt</p>
        </div>
        <div class="account-button">
            <a href="#" class="btn" style="color:#fff; text-decoration: none;">Trở lại mua hàng</a>
        </div>
        <div class="order-footer">
            <p>Cảm ơn bạn vì đã là một khách hàng tuyệt vời.</p>
        </div>
    </div>
</body>
</html>';

        return $body;
    }



    public function sendOtpMail($to, $otp)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ngthanhvu205@gmail.com';
            $mail->Password = 'ncyp agwy mzvc zrwk';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Người gửi và người nhận
            $mail->setFrom('support@ministore.com', 'MiniStore');
            $mail->addAddress($to);

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = 'OTP for Password Reset';
            $mail->Body = 'Your OTP for password reset is: ' . $otp;
            $mail->AltBody = 'Your OTP for password reset is: ' . $otp;

            $mail->send();
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $mail->ErrorInfo];
        }
    }
}
