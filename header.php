<?php session_start(); ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználókezelő</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Kezdőlap</a>
        <a href="register.php">Regisztráció</a>
        <a href="login.php">Bejelentkezés</a>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="profile.php">Profil</a>
            <a href="logout.php">Kijelentkezés</a>
        <?php endif; ?>
    </nav>
