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


    public function sendOtp($email)
    {
        $data = [
            'email' => $email ?? '',
        ];

        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $result = $user->sendOtp($data);

        if ($result['success']) {
            $_SESSION['email'] = $data['email'];
            header('Location: /very-otp');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/home/forgotpassword.php';
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

    #user
    public function getUser()
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $users = $user->getUser();
        $url = $_SERVER['REQUEST_URI'];
        if ($url == '/admin/User') {
            include_once __DIR__ . '/../../app/views/admin/adminUser.php';
        } elseif ($url == '/test') {
            include_once __DIR__ . '/../../app/views/home/test.php';
        }
    }

    public function getUserId($id)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $users = $user->getUserId($id);
        $url = $_SERVER['REQUEST_URI'];
        if ($url == '/checkout?id=' . $id) {
            include_once __DIR__ . '/../../app/views/home/checkout.php';
        }
    }

    public function deleteUser($id)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $user->deleteUser($id);
        header('Location: /admin/User');
    }

    #product
    public function getProduct()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $recordsPerPage = 8; //chỉnh sửa số lượng nội dung hiển thị trên 1 trang

        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $totalProducts = $product->getTotalProducts();
        $totalPages = ceil($totalProducts / $recordsPerPage);

        $offset = ($currentPage - 1) * $recordsPerPage;

        $products = $product->getProduct($offset, $recordsPerPage);

        include_once __DIR__ . '/../../app/views/admin/adminProduct.php';
    }

    public function getCategory()
    {
        include_once __DIR__ . '/../../app/models/Category.php';
        $category = new Category();
        $categories = $category->getCategory();
        include_once __DIR__ . '/../../app/views/admin/adminCategory.php';
    }

    public function getProductId($id)
    {
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $products = $product->getProductId($id);
        include_once __DIR__ . '/../../app/views/admin/update/updateProduct.php';
    }

    public function recommendProduct($id)
    {
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $recommendProduct = $product->recommendProduct($id);
        include_once __DIR__ . '/../../app/views/home/detail.php';
    }

    public function addProducts()
    {
        $data = [
            'product_name' => $_POST['product_name'] ?? '',
            'price' => $_POST['price'] ?? '',
            'quantity' => $_POST['quantity'] ?? '',
            'description' => $_POST['description'] ?? '',
            'image' => $_POST['image'] ?? '',
            'category_id' => $_POST['category_id'] ?? '',
            'size' => $_POST['size'] ?? '',
        ];
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $result = $product->addProduct($data);

        if ($result['success']) {
            header('Location: /admin/product');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/admin/add/addProduct.php';
        }
    }

    public function deleteProduct($id)
    {
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $product->deleteProduct($id);
        header('Location: /admin/product');
    }

    public function updateProduct($id, $data)
    {
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $product->updateProduct($id, $data);
        header('Location: /admin/product');
    }

    public function updateProfile($id, $data)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $user->updateProfile($id, $data);
        header('Location: /profile?id=' . $id);
    }

    public function addCategory()
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'image' => $_POST['image'] ?? '',
        ];
        include_once __DIR__ . '/../../app/models/Category.php';
        $category = new Category();
        $result = $category->addCategory($data);
        if ($result['success']) {
            header('Location: /admin/category');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/admin/add/addCategory.php';
        }
    }

    public function addCart()
    {
        if (empty($_SESSION['user']['id'])) {
            header('Location: /login');
        }
        $data = [
            'user_id' => $_SESSION['user']['id'] ?? '',
            'product_id' => $_POST['product_id'] ?? '',
            'quantity' => $_POST['quantity'] ?? '',
            'name' => $_POST['name'] ?? '',
            'image' => $_POST['image'] ?? '',
            'price' => $_POST['price'] ?? '',
            'size' => $_POST['size'] ?? '',
        ];
        include_once __DIR__ . '/../../app/models/Cart.php';
        $cart = new Cart();
        $result = $cart->addCart($data);
        if ($result['success']) {
            header('Location: /cart');
        } else {
            $errors = $result['errors'];
            echo 'Lỗi: ' . $errors;
        }
    }


    public function deleteCart($id)
    {
        include_once __DIR__ . '/../../app/models/Cart.php';
        $cart = new Cart();
        $cart->deleteCart($id);
        header('Location: /cart');
    }
}
