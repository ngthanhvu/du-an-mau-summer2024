<?php
class User
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getUser()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getUserId($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    public function DeleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = $id";
        $this->db->query($sql);
    }

    public function AddUser($username, $password, $full_name, $level)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $level = $_POST['level'];
            $sql = "INSERT INTO users (username, password, full_name, level) VALUES ('$username', '$password', '$full_name', '$level')";
            $this->db->query($sql);
        }
    }

    public function UpdateUser($id ,$username, $full_name, $level)
    {
        $id = $_POST['id'];
        $sql = "UPDATE users SET username = '$username', full_name = '$full_name', level = '$level' WHERE id = $id";
        $this->db->query($sql);
    }
}
