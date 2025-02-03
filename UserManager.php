<?php
class UserManager {
    private $pdo;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'user_management';
        $username = 'root';  
        $password = '';      

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function registerUser($username, $password, $fullname, $email) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, fullname, email) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$username, $hashedPassword, $fullname, $email]);
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>
