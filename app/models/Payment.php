<?php
include_once __DIR__ . '/../../includes/database.php';

class Payment
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

    public function updateOrderStatus($orderId, $status)
    {
        $sql = "UPDATE orders SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$status, $orderId]);
    }

    public function createBill($fullName, $email, $phone, $address, $orderId, $productName, $total, $status, $user_id)
    {
        $sql = "INSERT INTO bill (full_name, email, phone, address, order_id, product_name, total, status, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$fullName, $email, $phone, $address, $orderId, $productName, $total, $status, $user_id]);
    }
}
