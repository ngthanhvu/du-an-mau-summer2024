<?php
include_once __DIR__ . '/../../includes/database.php';

class Cart
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

    public function getCart()
    {
        $sql = "SELECT * FROM `cart`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addCart($data)
    {
        try {
            $sql = "SELECT * FROM `cart` WHERE `product_id` = ? AND `user_id` = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$data['product_id'], $data['user_id']]);
            $existingCart = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingCart) {
                $newQuantity = $existingCart['quantity'] + $data['quantity'];
                $sql = "UPDATE `cart` SET `quantity` = ? WHERE `id` = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$newQuantity, $existingCart['id']]);

                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['product_id'] == $data['product_id'] && $item['user_id'] == $data['user_id']) {
                        $item['quantity'] = $newQuantity;
                        break;
                    }
                }
            } else {
                $sql = "INSERT INTO `cart` (`product_id`, `user_id`, `quantity`, `name`, `image`, `price`) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    $data['product_id'],
                    $data['user_id'],
                    $data['quantity'],
                    $data['name'],
                    $data['image'],
                    $data['price']
                ]);

                $data['id'] = $this->db->lastInsertId();

                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                $_SESSION['cart'][] = $data;
            }
            return ['success' => true];
        } catch (PDOException $e) {
            error_log("Lỗi SQL: " . $e->getMessage());
            error_log("Câu lệnh SQL: " . $sql);
            error_log("Tham số: " . json_encode($data));
            return ['success' => false, 'errors' => $e->getMessage()];
        }
    }

    public function deleteCart($id)
    {
        $sql = "DELETE FROM `cart` WHERE `id` = ?";
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute([$id])) {
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['id'] == $id) {
                        unset($_SESSION['cart'][$key]);
                        break;
                    }
                }
            }

            return ['success' => true];
        } else {
            return ['success' => false, 'errors' => $stmt->errorInfo()];
        }
    }

    public function deleteCartUserId($user_id)
    {
        $sql = "DELETE FROM `cart` WHERE `user_id` = ?";
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute([$user_id])) {
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['user_id'] == $user_id) {
                        unset($_SESSION['cart'][$key]);
                        break;
                    }
                }
            }
            return ['success' => true];
        } else {
            return ['success' => false, 'errors' => $stmt->errorInfo()];
        }
    }

}