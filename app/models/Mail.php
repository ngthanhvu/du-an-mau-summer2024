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

    private function createEmailBody($fullName, $orderDetails)
    {
        function formatVND($number)
        {
            return number_format($number, 0, '.', '.') . ' đ';
        }

        $body = "<h1>Chào $fullName,</h1>";
        $body .= "<p>Cảm ơn bạn đã đặt hàng!</p>";
        $body .= "<h2>Chi tiết đơn hàng:</h2>";
        $body .= "<ul>";
        foreach ($orderDetails as $detail) {
            $total = $detail['price'] * $detail['quantity'];
            $body .= "<li>{$detail['product_name']} - Số lượng: {$detail['quantity']} - Giá: " . formatVND($total) . "</li>";
        }
        $body .= "</ul>";
        return $body;
    }
}
