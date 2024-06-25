<?php
class AdminController
{

    public function users()
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $users = $user->getUser();
        include __DIR__ . '/../../app/views/admin/users.php';
    }

    public function delete($id)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $user->DeleteUser($id);
        header('Location: /admin/users');
    }

    public function add($username, $password, $full_name, $level)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $user->AddUser($username, $password, $full_name, $level);
        header('Location: /admin/users');
    }

    public function update($id, $username, $full_name, $level)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $user->UpdateUser($id, $username, $full_name, $level);
        header('Location: /admin/users');
    }
}
