<?php
include_once __DIR__ . '/../../includes/database.php';
require_once __DIR__ . '/../../google/vendor/autoload.php';
class LoginRegister
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
            try {
                $sql = "INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    $data['username'],
                    $data['email'],
                    $data['phone'],
                    password_hash($data['password'], PASSWORD_DEFAULT),
                ]);
                return ['success' => true];
            } catch (PDOException $e) {
                $errors['db'] = "Lỗi khi thêm người dùng: " . $e->getMessage();
            }
        }

        return ['success' => false, 'errors' => $errors, 'data' => $data];
    }

    public function login($data)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($data['username'])) {
                $errors['username'] = "Username không được để trống!";
            }

            if (empty($data['password'])) {
                $errors['password'] = "Password không được để trống!";
            }
        }

        if (empty($errors)) {
            try {
                $sql = "SELECT * FROM users WHERE username = ?";
                $stmt = $this->db->prepare($sql);

                if ($stmt) {
                    $stmt->execute([$data['username']]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user) {
                        if (password_verify($data['password'], $user['password'])) {
                            $_SESSION['user'] = $user;
                            return ['success' => true, 'user' => $user];
                        } else {
                            $errors['login'] = "Password không đúng!";
                        }
                    } else {
                        $errors['login'] = "Không tìm thấy người dùng với username này!";
                    }
                } else {
                    $errors['db'] = "Lỗi chuẩn bị câu lệnh SQL.";
                }
            } catch (PDOException $e) {
                $errors['db'] = "Lỗi khi thực thi truy vấn: " . $e->getMessage();
            }
        }

        return ['success' => false, 'errors' => $errors, 'data' => $data];
    }

}
