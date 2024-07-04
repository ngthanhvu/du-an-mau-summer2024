<?php
include_once __DIR__ . '/../../includes/database.php';
class Product
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

    public function getProduct()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function addProduct($data)
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($data['name'])) {
                $errors['name'] = "Tên sản phẩm không được để trống";
            }

            if (empty($data['price'])) {
                $errors['price'] = "Giá sản phẩm không được để trống";
            }

            if (empty($data['quantity'])) {
                $errors['quantity'] = "Số lượng sản phẩm không được để trống";
            }

            if (empty($data['description'])) {
                $errors['description'] = "Mô tả sản phẩm không được để trống";
            }

            if (empty($data['image'])) {
                $errors['image'] = "Hình ảnh sản phẩm không được để trống";
            }
        }

        if (empty($errors)) {
            try {
                $sql = "INSERT INTO products (name, price, quantity, description, image) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    $data['name'],
                    $data['price'],
                    $data['quantity'],
                    $data['description'],
                    $data['image']
                ]);
                return ['success' => true];
            } catch (PDOException $e) {
                $errors['db'] = "Lỗi khi thêm sản phẩm: " . $e->getMessage();
            }
        }

        return ['success' => false, 'errors' => $errors, 'data' => $data];
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
