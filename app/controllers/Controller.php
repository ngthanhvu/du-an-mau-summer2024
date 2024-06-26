<?php
// HomeController.php
// include __DIR__ . '/../../app/models/User.php';
class HomeController
{

    public function index()
    {
        include __DIR__ . '/../../app/views/home/index.php';
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

    public function shop()
    {
        include __DIR__ . '/../../app/views/home/shop.php';
    }

    public function contact()
    {
        include __DIR__ . '/../../app/views/home/contact.php';
    }
}
