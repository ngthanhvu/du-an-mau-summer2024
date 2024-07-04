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
    public function login()
    {
        include __DIR__ . '/../../app/views/home/login.php';
    }

    public function register()
    {
        include __DIR__ . '/../../app/views/home/register.php';
    }

    public function logout()
    {
        include __DIR__ . '/../../app/views/home/logout.php';
    }

    public function product()
    {
        include __DIR__ . '/../../app/views/home/product.php';
    }

    public function contact()
    {
        include __DIR__ . '/../../app/views/home/contact.php';
    }

    public function checkout()
    {
        include __DIR__ . '/../../app/views/home/checkout.php';
    }

    public function order()
    {
        include __DIR__ . '/../../app/views/home/order.php';
    }

    public function cart()
    {
        include __DIR__ . '/../../app/views/home/cart.php';
    }

    public function detail()
    {
        include __DIR__ . '/../../app/views/home/detail.php';
    }

    public function about()
    {
        include __DIR__ . '/../../app/views/home/about.php';
    }

    # admin template controller

    public function adminProduct()
    {
        include __DIR__ . '/../../app/views/admin/adminProduct.php';
    }

    public function addProduct()
    {
        include __DIR__ . '/../../app/views/admin/add/addProduct.php';
    }

    public function adminUser()
    {
        include __DIR__ . '/../../app/views/admin/adminUser.php';
    }

}
