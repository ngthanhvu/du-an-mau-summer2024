<?php
require_once 'config/config.php';
require_once 'includes/database.php';

require_once 'app/controllers/Controller.php';
require_once 'app/controllers/AdminController.php';


$request_uri = $_SERVER['REQUEST_URI'];
$base_path = parse_url($request_uri, PHP_URL_PATH);


switch ($base_path) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/product':
        $controller = new HomeController();
        $controller->product();
        break;
    case '/checkout':
        $controller = new HomeController();
        $controller->checkout();
        break;
    case '/contact':
        $controller = new HomeController();
        $controller->contact();
        break;
    case '/order':
        $controller = new HomeController();
        $controller->order();
        break;
    case '/login':
        $controller = new HomeController();
        $controller->login();
        break;
    case '/register':
        $controller = new HomeController();
        $controller->register();
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
    default:
        http_response_code(404);
        include_once '404.html';
        break;
}
