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
        $view = new Views();
        $detailProduct = $view->viewProductId($id);
        include __DIR__ . '/../../app/views/home/detail.php';
    }
}
?>