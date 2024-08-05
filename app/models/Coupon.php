<?php
include_once __DIR__ . '/../../includes/database.php';

class Coupon
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = db_connect();
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    public function addCoupon($data)
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (empty($data['code'])) {
                $errors['code'] = 'Vui lý nhập mã giảm giá';
            }

            if (empty($data['discount_amount'])) {
                $errors['discount_amount'] = 'Vui lý điền số tiền giảm giá';
            }

            if (empty($data['max_uses'])) {
                $errors['max_uses'] = 'Vui lý điền số lần sử dụng tối đa';
            }

            if (empty($data['end_date'])) {
                $errors['end_date'] = 'Vui lý điền ngày kết thúc';
            }

            if (empty($errors)) {
                try {
                    $sql = "INSERT INTO coupons (code, discount_amount, max_uses, end_date) VALUES (?, ?, ?, ?)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([
                        $data['code'],
                        $data['discount_amount'],
                        $data['max_uses'],
                        $data['end_date']
                    ]);
                    return ['success' => true];
                } catch (PDOException $e) {
                    $errors['db'] = "Lỗi khi thêm mã giảm giá: " . $e->getMessage();
                }
            }
            return ['success' => false, 'errors' => $errors, 'data' => $data];
        }
    }
}
