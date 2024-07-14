<?php
require_once 'config/config.php';
require_once 'includes/database.php';

require_once 'app/controllers/Controller.php';
require_once 'app/controllers/AdminController.php';
require_once 'app/controllers/ViewController.php';


$request_uri = $_SERVER['REQUEST_URI'];
$base_path = parse_url($request_uri, PHP_URL_PATH);


switch ($base_path) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/product':
        $controller = new HomeController();
        $viewcontroller = new ViewController();
        $viewcontroller->viewProduct();
        break;
        $controller->product();
        break;
    case '/checkout':
        $controller = new HomeController();
        $get = new AdminController();
        $get->order_detail(isset($_GET['id']) ? $_GET['id'] : null);
        break;
        $controller->checkout();
        break;
    case '/contact':
        $controller = new HomeController();
        $controller->contact();
        break;
    case '/order':
        $controller = new HomeController();
        $controllers = new AdminController();
        $controllers->userBill(isset($_GET['id']) ? $_GET['id'] : null);
        break;
        $controller->order();
        break;
    case '/profile':
        $controller = new HomeController();
        $controllers = new ViewController();
        $controllers->viewUserId($_GET['id']);
        break;
        $controller->profile();
        break;
    case '/cart':
        $controller = new HomeController();
        $controllers = new ViewController();
        $controllers->viewCart();
        break;
        $controller->cart();
        break;
    case '/detail':
        $controller = new HomeController();
        $controllers = new ViewController();
        $controllers->viewProductId($_GET['id']);
        break;
        $controller->detail();
        break;
    case '/about':
        $controller = new HomeController();
        $controller->about();
        break;
    case '/login':
        $controller = new HomeController();
        $controller->login();
        break;
    case '/register':
        $controller = new HomeController();
        $controller->register();
        break;
    case '/logout':
        $controller = new HomeController();
        $controller->logout();
        break;
    case '/admin':
        $controller = new HomeController();
        $controller->admin();
        break;
    case '/admin/users/register':
        $controller = new AdminController();
        $controller->register();
        break;
    case '/admin/users/login':
        $controller = new AdminController();
        $controller->login();
        break;
    case '/test':
        $controller = new HomeController();
        $controllers = new AdminController();
        $controllers->getUser();
        break;
        $controller->test();
        break;

        #admin template
    case '/admin/product':
        $controller = new HomeController();
        $controllers = new AdminController();
        $controllers->getProduct();
        break;
        $controller->adminProduct();
        break;
    case '/admin/product/add':
        $controller = new HomeController();
        $controllers = new ViewController();
        $controllers->viewCategory();
        break;
        $controller->addProduct();
        break;
    case '/admin/product/addProduct':
        $controllers = new AdminController();
        $controllers->addProducts();
        break;
    case '/admin/product/update':
        $controllers = new AdminController();
        $controllers->getProductId($_GET['id']);
        break;
    case '/admin/product/updateProduct':
        $controllers = new AdminController();
        $controllers->updateProduct($_GET['id'], $_POST);
        break;
    case '/admin/product/delete':
        $controllers = new AdminController();
        $controllers->deleteProduct($_GET['id']);
        break;
    case '/admin/User':
        $controller = new HomeController();
        $controllers = new AdminController();
        $controllers->getUser();
        break;
        $controller->adminUser();
        break;
    case '/admin/User/delete':
        $controllers = new AdminController();
        $controllers->deleteUser($_GET['id']);
        break;
    case '/admin/category':
        $controller = new HomeController();
        $controllers = new AdminController();
        $controllers->getCategory();
        $controller->adminCategory();
        break;
    case '/admin/category/add':
        $controller = new HomeController();
        $controller->addCategory();
        break;
    case '/admin/category/addCategory':
        $controllers = new AdminController();
        $controllers->addCategory();
        break;
    case '/admin/order':
        $controller = new HomeController();
        $controllers = new AdminController();
        $controllers->getOrder();
        break;
        $controller->adminOrder();
        break;
    case '/admin/order/delete':
        $controllers = new AdminController();
        $controllers->deleteOrder($_GET['id']);
        break;
    case '/admin/bill':
        $controller = new HomeController();
        $controllers = new AdminController();
        $controllers->getBill();
        break;
        $controller->adminBill();
        break;
        #end admin tempalte

    case '/add_to_cart':
        $controller = new AdminController();
        $controller->addCart();
        break;
    case '/delete-cart':
        $controller = new AdminController();
        $controller->deleteCart($_GET['id']);
        break;
    case '/add-order':
        $controller = new AdminController();
        $controller->addOrder();
        break;
    case '/update-profile':
        $controller = new AdminController();
        $controller->updateProfile($_GET['id'], $_POST);
        break;
    case '/payment':
        $controller = new AdminController();
        $controller->payment();
        break;
    default:
        http_response_code(404);
        include_once '404.html';
        break;
}
