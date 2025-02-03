<?php
include 'header.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

    <div class="container">
        <h2>Profil</h2>
        <p>Üdvözlünk <?php echo htmlspecialchars($_SESSION['user']);  ?> !</p>
        <a href="logout.php"><button>Kijelentkezés</button></a>
    </div>

</body>
</html>
