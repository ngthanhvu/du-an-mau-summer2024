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
    case '/shop':
        $controller = new HomeController();
        $controller->shop();
        break;
    case '/contact':
        $controller = new HomeController();
        $controller->contact();
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
    case '/admin/adduser': 
        $controller = new HomeController();
        $controller->adduser();
        break;
    // case '/admin/users':
    //     $controller = new AdminController();
    //     $controller->users();
    //     break;
    case '/admin/update':
        $controller = new HomeController();
        $controller->updateUser();
        break;
    // case '/admin/users/delete':
    //     $controller = new AdminController();
    //     $controller->delete($_GET['id']);
    //     break;
    case '/admin/users/register':
        $controller = new AdminController();
        $controller->register();
        break;
    // case '/admin/users/update':
    //     $controller = new AdminController();
    //     $controller->update($_POST['id'], $_POST['username'], $_POST['full_name'], $_POST['level']);
    //     break;
    default:
        http_response_code(404);
        include_once '404.html';
        break;
}
