<?php
// HomeController.php
// include __DIR__ . '/../../app/models/User.php';
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

    public function adduser()
    {

        include __DIR__ . '/../../app/views/admin/adduser.php';
    }

    public function updateUser()
    {
        include __DIR__ . '/../../app/views/admin/updateUser.php';
    }
}
