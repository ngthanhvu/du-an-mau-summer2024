<?php
class LoginRegister
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function register($data)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($data['username'])) {
                $errors['username'] = "Username không được để trống!";
            }

            if (empty($data['email'])) {
                $errors['email'] = "Email không được để trống!";
            }

            if (empty($data['phone'])) {
                $errors['phone'] = "Phone không được để trống!";
            }

            if (empty($data['password'])) {
                $errors['password'] = "Password không được để trống!";
            }

            if (empty($data['confirm_password'])) {
                $errors['confirm_password'] = "Confirm password không được để trống!";
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $errors['confirm_password'] = "Confirm password không trùng khớp!";
                }
            }
        }

        if (empty($errors)) {
            $sql = "INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['username'],
                $data['email'],
                $data['phone'],
                password_hash($data['password'], PASSWORD_DEFAULT)
            ]);
            return ['success' => true];
        }

        return ['success' => false, 'errors' => $errors, 'data' => $data];
    }
}
