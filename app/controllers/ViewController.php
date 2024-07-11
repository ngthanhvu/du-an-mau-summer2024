<?php

class ViewController
{
    public function viewProduct()
    {
        include __DIR__ . '/../../app/models/Views.php';
        $view = new Views();
        $sanpham = $view->viewProduct();
        include __DIR__ . '/../../app/views/home/product.php';
    }

    public function viewProductId($id)
    {
        include __DIR__ . '/../../app/models/Views.php';
        include __DIR__ . '/../../app/models/Product.php';
        $view = new Views();
        $detailProduct = $view->viewProductId($id);
        $product = new Product();
        $recommendProduct = $product->recommendProduct($id);
        include __DIR__ . '/../../app/views/home/detail.php';
    }

    public function viewCategory()
    {
        include __DIR__ . '/../../app/models/Views.php';
        $view = new Views();
        $categories = $view->viewCategory();
        include __DIR__ . '/../../app/views/admin/add/addProduct.php';
    }

    public function viewCart()
    {
        include __DIR__ . '/../../app/models/Views.php';
        $view = new Views();
        $cartss = $view->viewCart();
        include __DIR__ . '/../../app/views/home/cart.php';
    }

    public function viewUserId($id)
    {
        include __DIR__ . '/../../app/models/Views.php';
        $view = new Views();
        $users = $view->viewUserId($id);
        include __DIR__ . '/../../app/views/home/profile.php';
    }
}
