<?php
include_once __DIR__ . '/../../includes/database.php';
class User
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

    public function getUser()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getUserId($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function updateProfile($id, $data)
    {
        $sql = "UPDATE users SET address = :address WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
