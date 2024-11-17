<?php
// Inclui o autoload para carregar as classes
require_once('config.php');

// Inicia ou retoma sessão
session_start();


// variável está declarada e é diferente de null
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

// Verifica qual controlador e ação executar com switch case
switch ($action) {

    case 'home':
        include('views/home.php');
        break;
    
    case 'catalog':
        $controller = new ProductController();
        if($_GET['section']){
            $controller->showCatalog($_GET['section']);
        }else{
            include('views/catalog.php');
        }
        break;
    
    case 'list':
        $controller = new ProductController();
        $controller->listAll();
        break;
    
    case 'cart':
        $controller = new SaleController();
        if($_GET['function'] == 'addToCart'){
            $controller->addToCart($_GET['description']);
        }
        else if($_GET['function'] == 'showCart'){
            $controller->showCart();
        }
        else{
            $controller->removeItemCart($_GET['id']);
        }
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController = new AuthController();
            $authController->login($_POST['email'], $_POST['password']);
        } else {
            include('views/login.php');
        }
        break;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController = new AuthController();
            $authController->register($_POST['name'], $_POST['email'],$_POST['cpf'], $_POST['password'], $_POST['phone'],$_POST['birth'],$_POST['address']);
        } else {
            include('views/register.php');
        }
        break;
    
    case 'checkout':
        $controller = new SaleController();
        $controller->checkout();
        break;
        
    case 'logout':
        session_destroy();
        header('Location: index.php?action=home');
        exit;
        break;

    default:
        echo "Ação não reconhecida!";
        break;    
}
?>
