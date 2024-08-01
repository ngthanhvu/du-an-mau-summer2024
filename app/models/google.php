<?php
require_once __DIR__ . '/../../google/vendor/autoload.php';
include_once __DIR__ . '/../../includes/database.php';
include_once __DIR__ . '/../../config/config.php';

class Google
{
    private $client;
    private $db;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setClientId(CLIENT_ID);
        $this->client->setClientSecret(CLIENT_SECRET);
        $this->client->setRedirectUri(REDIRECT_URI);
        $this->client->addScope('email');
        $this->client->addScope('profile');

        try {
            $this->db = db_connect();
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    public function googleLogin()
    {
        // Create URL for Google OAuth authentication
        $authUrl = $this->client->createAuthUrl();
        var_dump($authUrl);
        header('Location: ' . $authUrl);
        exit();
    }

    public function googleCallback()
    {
        if (isset($_GET['code'])) {
            try {
                // Exchange authorization code for access token
                $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
                $this->client->setAccessToken($token);

                // Get user info from Google
                $google_oauth = new Google_Service_Oauth2($this->client);
                $google_account_info = $google_oauth->userinfo->get();
                $email = $google_account_info->email;
                $name = $google_account_info->name;
                // $phone = $google_account_info->phone_number;
                $google_id = $google_account_info->id;

                // Check if user already exists in the database
                $user = $this->getUserByEmail($email);

                if ($user) {
                    // User exists, log them in
                    $_SESSION['user'] = $user;
                    header('Location: /');
                    exit();
                } else {
                    // User does not exist, register them
                    $data = [
                        'username' => $name,
                        'email' => $email,
                        // 'phone' => $phone,
                        'google_id' => $google_id,
                    ];
                    // var_dump($data);
                    $result = $this->registerFromGoogle($data);

                    if ($result['success']) {
                        $_SESSION['user'] = $result['user'];
                        header('Location: /');
                        exit();
                    } else {
                        // Log errors for debugging
                        error_log(print_r($result['errors'], true));
                        // var_dump($result['errors']);
                        header('Location: /register');
                        exit();
                    }
                }
            } catch (Exception $e) {
                // Log any exceptions for debugging
                error_log($e->getMessage());
                header('Location: /login');
                exit();
            }
        } else {
            // Handle cases where 'code' is not set
            header('Location: /login');
            exit();
        }
    }

    private function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function registerFromGoogle($data)
    {
        $errors = [];

        try {
            $sql = "INSERT INTO users (username, email, google_id) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['username'],
                $data['email'],
                $data['google_id'],
            ]);
            // Fetch the newly created user
            $user = $this->getUserByEmail($data['email']);
            return ['success' => true, 'user' => $user];
        } catch (PDOException $e) {
            $errors['db'] = "Lỗi khi thêm người dùng: " . $e->getMessage();
            return ['success' => false, 'errors' => $errors];
        }
    }
}
