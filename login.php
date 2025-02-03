<?php 
include 'header.php'; 
require 'UserManager.php';
$userManager = new UserManager();

session_start();
if (isset($_SESSION['success_message'])) {
    echo "<p style='color:green; text-align:center;'>{$_SESSION['success_message']}</p>";
    unset($_SESSION['success_message']); // Üzenet törlése, hogy ne jelenjen meg többször
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($userManager->login($username, $password)) {
        header("Location: profile.php");
        exit();
    } else {
        $error = "Hibás felhasználónév vagy jelszó!";
    }
}
?>

    <div class="container">
        <h2>Bejelentkezés</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Felhasználónév" required>
            <input type="password" name="password" placeholder="Jelszó" required>
            <button type="submit">Bejelentkezés</button>
        </form>
    </div>

</body>
</html>
