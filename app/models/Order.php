<?php
include_once __DIR__ . '/../../includes/database.php';

class Order
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = db_connect();
        } catch (PDOException $e) {
            die("Kết nối thất bị: " . $e->getMessage());
        }
    }

    public function addOrder($data)
    {
        try {
            $user_id = $_SESSION['user']['id'];
            $total = 0;
            foreach ($data['carts'] as $cart) {
                $total += $cart['price'] * $cart['quantity'];
            }
            # 3 trạng thái:
            # 1: Chưa thanh toán
            # 2: Đã thanh toán
            # 3: Hủy thanh toán
            $status = 'Chưa thanh toán';

            $sql = "INSERT INTO `orders` (`user_id`, `total`, `status`) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$user_id, $total, $status]);
            $order_id = $this->db->lastInsertId();

            foreach ($data['carts'] as $cart) {
                $sql = "INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`) VALUES (?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$order_id, $cart['product_id'], $cart['quantity'], $cart['price']]);
            }
            return ['success' => true];
        } catch (PDOException $e) {
            die("Lỗi khi thêm đơn hàng: " . $e->getMessage());
        }
    }

    public function order_detail($user_id)
    {
        try {
            // Lấy thông tin người dùng từ `user_id`
            $sql = "SELECT * FROM `users` WHERE `id` = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$user_id]);
            $user = $stmt->fetch();

            if (!$user) {
                throw new Exception("Người dùng không tồn tại.");
            }

            // Lấy thông tin các đơn hàng chưa thanh toán từ `user_id`
            $sql = "SELECT * FROM `orders` WHERE `user_id` = ? AND `status` = 'Chưa thanh toán'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$user_id]);
            $orders = $stmt->fetchAll();

            if (!$orders) {
                throw new Exception("Người dùng này không có đơn hàng chưa thanh toán.");
            }

            $order_details = [];
            foreach ($orders as $order) {
                // Lấy thông tin chi tiết đơn hàng từ `order_id` trong bảng `order_details`
                $order_id = $order['id'];
                $sql = "SELECT * FROM `order_details` WHERE `order_id` = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$order_id]);
                $details = $stmt->fetchAll();

                // Lấy thông tin sản phẩm từ `product_id` trong bảng `products`
                foreach ($details as &$detail) {
                    $product_id = $detail['product_id'];
                    $sql = "SELECT * FROM `products` WHERE `id` = ?";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([$product_id]);
                    $product = $stmt->fetch();
                    $detail['product'] = $product;
                }

                $order['order_details'] = $details;
                $order_details[] = $order;
            }

            return [
                'user' => $user,
                'orders' => $order_details
            ];
        } catch (PDOException $e) {
            die("Lỗi khi lấy thông tin đơn hàng: " . $e->getMessage());
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
