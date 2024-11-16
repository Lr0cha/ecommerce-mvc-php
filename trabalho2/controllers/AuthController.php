<?php
require_once('./models/User.php');

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User(); //instancia a model user p/ controlador
    }

    public function login($email, $password) {
        if (!$this->userModel->isValidEmail($email)) {
            $_SESSION['error_message'] = 'Email inválido!';
            header('Location: index.php?action=login');
            exit;
        }

        $user = $this->userModel->authenticate($email, $password);
        if ($user) {
            $_SESSION['user'] = $user; // Guarda o usuário na sessão iniciada
            sleep(1);
            header('Location: index.php?action=home');
            exit;
        } else {
            $_SESSION['error_message'] = 'Credenciais incorretas!';
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function register($name, $email, $cpf, $password, $phone, $birth, $address) {
        if (!$this->userModel->isValidEmail($email)) {
            $_SESSION['error_message'] = 'Email inválido!';
            sleep(1);
            header('Location: index.php?action=register');
            exit;
        }
    
        if ($this->userModel->emailExists($email)) {
            $_SESSION['error_message'] = 'Email já está em uso!';
            sleep(1);
            header('Location: index.php?action=register');
            exit;
        }
    
        if ($this->userModel->register($name, $email, $cpf, $password, $phone, $birth, $address)) {
            sleep(1);
            header('Location: index.php?action=login');
            exit;
        } else {
            $_SESSION['error_message'] = 'Erro ao cadastrar. Tente novamente.';
            sleep(1);
            header('Location: index.php?action=register');
            exit;
        }
    }
    
}
