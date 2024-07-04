<?php
class AdminController
{
    public function register()
    {
        $data = [
            'username' => $_POST['username'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'password' => $_POST['password'] ?? '',
            'confirm_password' => $_POST['confirm_password'] ?? '',
        ];

        include_once __DIR__ . '/../../app/models/Register.php';
        $loginRegister = new LoginRegister();
        $result = $loginRegister->register($data);

        if ($result['success']) {
            header('Location: /login');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/home/register.php';
        }
    }

    public function login()
    {
        $data = [
            'username' => $_POST['username'] ?? '',
            'password' => $_POST['password'] ?? '',
        ];

        include_once __DIR__ . '/../../app/models/Register.php';
        $loginRegister = new LoginRegister();
        $result = $loginRegister->login($data);

        if ($result['success']) {
            $_SESSION['user'] = $result['user'];
            header('Location: /');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/home/login.php';
        }
    }

    public function getUser()
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $users = $user->getUser();
        include_once __DIR__ . '/../../app/views/admin/adminUser.php';
    }
}
