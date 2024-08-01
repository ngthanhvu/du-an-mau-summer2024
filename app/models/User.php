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
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($data['username'])) {
                $errors['username'] = "Username không được để trống";
            }

            if (empty($data['email'])) {
                $errors['email'] = "Email không được để trống";
            }

            if (empty($data['phone'])) {
                $errors['phone'] = "Phone không được để trống";
            }

            if (empty($data['address'])) {
                $errors['address'] = "Address không được để trống";
            }

            if (empty($data['full_name'])) {
                $errors['full_name'] = "Họ tên không được để trống";
            }

            if (count($errors) == 0) {
                try {
                    $sql = "UPDATE users SET username = :username, email = :email, phone = :phone, full_name = :full_name, address = :address WHERE id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([
                        ':username' => $data['username'],
                        ':email' => $data['email'],
                        ':phone' => $data['phone'],
                        ':full_name' => $data['full_name'],
                        ':address' => $data['address'],
                        ':id' => $id
                    ]);

                    return ['success' => true];
                } catch (\Throwable $th) {
                    return ['success' => false, 'errors' => $th->getMessage()];
                }
            }
            return ['success' => false, 'errors' => $errors, 'data' => $data];
        }
    }

    public function getUserByOrderId($orderId)
    {
        $sql = "SELECT u.id, u.email, u.full_name, u.phone, u.address FROM users u 
                JOIN orders o ON u.id = o.user_id 
                WHERE o.id = :orderId";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['orderId' => $orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($data)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($data['password'])) {
                $errors['password'] = "Password không được để trống";
            }

            if (empty($data['confirm_password'])) {
                $errors['confirm_password'] = "Confirm password không được để trống";
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $errors['confirm_password'] = "Confirm password phải trùng với password";
                }
            }

            if (count($errors) == 0) {
                try {
                    $sql = "UPDATE users SET password = :password WHERE id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([
                        ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
                        ':id' => $data['id']
                    ]);
                    return ['success' => true];
                } catch (\Throwable $th) {
                    return ['success' => false, 'errors' => $th->getMessage()];
                }
            }
            return ['success' => false, 'errors' => $errors];
        }
    }

    public function sendOtp($data)
    {
        $errors = [];

        include_once __DIR__ . '/../../app/models/Mail.php';

        $mail = new Mail();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($data['email'])) {
                $errors['email'] = "Email không được để trống";
            }

            if (count($errors) == 0) {
                try {
                    $otp = random_int(100000, 999999);
                    $sql = "UPDATE users SET otp = :otp, created_at = NOW() WHERE email = :email";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([
                        ':otp' => $otp,
                        ':email' => $data['email']
                    ]);
                    $mail->sendOtpMail($data['email'], $otp);
                    return ['success' => true];
                } catch (\Throwable $th) {
                    return ['success' => false, 'errors' => $th->getMessage()];
                }
            }
            return ['success' => false, 'errors' => $errors, 'data' => $data];
        }
    }

    public function checkOtp($data)
    {
        $sql = "SELECT id FROM users WHERE email = :email AND otp = :otp AND created_at > NOW() - INTERVAL 50 MINUTE";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':email' => $data['email'],
            ':otp' => $data['otp']
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return ['success' => true, 'user_id' => $user['id']];
        } else {
            return ['success' => false, 'message' => 'Invalid OTP or OTP expired'];
        }
    }
}
