<?php
require_once('./database/Database.php');

class User extends Database { // herança para o BD
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }

    // Função para autenticar o usuário
    public function authenticate($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) { // verifica hash
            return $user;
        }

        return false;
    }

    // Função para registrar um novo usuário
    public function register($name, $email, $cpf, $password, $phone, $birth, $address) {
        $name = htmlspecialchars(trim($name)); // Sanitiza o nome
        if ($this->emailExists($email)) {
            return false;
        }
    
        $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Cria hash para a senha
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (name, email, cpf, password, phone, birth_date, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $cpf, $passwordHash, $phone, $birth, $address]);
    }
    

    public function emailExists($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }

    // validar o formato do email
    public function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
?>
