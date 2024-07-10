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
            die("Connection failed: " . $e->getMessage());
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

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            $_SESSION['cart'][] = $data;
            return ['success' => true];
        } catch (PDOException $e) {
            // Log the SQL query for debugging
            error_log("SQL Error: " . $e->getMessage());
            error_log("SQL Query: " . $sql);
            error_log("Parameters: " . json_encode($data));
            return ['success' => false, 'errors' => $e->getMessage()];
        }
    }

}
