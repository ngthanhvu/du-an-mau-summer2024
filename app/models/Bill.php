<?php
include_once __DIR__ . '/../../includes/database.php';

class Bill
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

    public function getBill()
    {
        $sql = "SELECT * FROM `bill`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function userBill($user_id)
    {
        $sql = "SELECT * FROM `bill` WHERE `user_id` = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteBill($id)
    {
        $sql = "DELETE FROM `bill` WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
