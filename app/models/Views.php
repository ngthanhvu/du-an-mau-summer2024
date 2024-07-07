<?php
include_once __DIR__ . '/../../includes/database.php';
class Views
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

    public function viewProduct()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
