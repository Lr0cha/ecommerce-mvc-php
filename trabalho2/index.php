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
        $controller->showCatalog($_GET['section']);
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
