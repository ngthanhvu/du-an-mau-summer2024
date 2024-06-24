<?php
// HomeController.php

class HomeController
{

    public function index()
    {
        include __DIR__ . '/../../app/views/home/index.php';
    }

    public function about()
    {
        include  __DIR__ . '/../../app/views/home/about.php';
    }

    public function admin()
    {
        include __DIR__ . '/../../app/views/admin/index.php';
    }
    public function users()
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $users = $user->getAllUsers();
        include __DIR__ . '/../../app/views/admin/users.php';
    }
}
