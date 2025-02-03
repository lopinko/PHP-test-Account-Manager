<?php 
include 'header.php'; 
require 'UserManager.php';
$userManager = new UserManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    $result = $userManager->registerUser($username, $password, $fullname, $email);

    if ($result === true) {
        session_start();
        $_SESSION['success_message'] = "Sikeres regisztráció! Most már bejelentkezhetsz.";
        header("Location: login.php");
        exit();
    } else {
        $error = $result;
    }
}
?>

    <div class="container">
        <h2>Regisztráció</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Felhasználónév" required>
            <input type="password" name="password" placeholder="Jelszó" required>
            <input type="text" name="fullname" placeholder="Teljes név" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Regisztráció</button>
        </form>
    </div>

</body>
</html>
