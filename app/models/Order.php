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
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    public function getOrder($offset = 0, $limit = 10)
    {
        $sql = "SELECT * FROM `orders` LIMIT :offset, :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotalOrders()
    {
        $sql = "SELECT COUNT(*) as count FROM `orders`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function addOrder($data)
    {
        try {
            $user_id = $_SESSION['user']['id'];
            $total = 0;
            foreach ($data['carts'] as $cart) {
                $total += $cart['price'] * $cart['quantity'];
            }
            $status = '1';

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

    public function deleteOrder($id)
    {
        try {
            $this->db->beginTransaction();

            // Xóa các chi tiết đơn hàng trước
            $sql = "DELETE FROM `order_details` WHERE `order_id` = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);

            // Sau đó xóa đơn hàng
            $sql = "DELETE FROM `orders` WHERE `id` = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);

            $this->db->commit();

            return ['success' => true];
        } catch (PDOException $e) {
            $this->db->rollBack();
            die("Lỗi khi xóa đơn hàng: " . $e->getMessage());
        }
    }

    public function order_detail($user_id)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE `id` = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$user_id]);
            $user = $stmt->fetch();

            if (!$user) {
                throw new Exception("Người dùng không tồn tại.");
            }

            $sql = "SELECT * FROM `orders` WHERE `user_id` = ? AND `status` = 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$user_id]);
            $orders = $stmt->fetchAll();

            if (!$orders) {
                throw new Exception("Người dùng này không có đơn hàng chưa thanh toán.");
            }

            $order_details = [];
            foreach ($orders as $order) {
                $order_id = $order['id'];
                $sql = "SELECT * FROM `order_details` WHERE `order_id` = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$order_id]);
                $details = $stmt->fetchAll();

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
