<?php include 'header.php'; ?>

    <div class="container">
        <h2>Üdvözlünk a Felhasználókezelő Rendszerben</h2>
        <p>Használd a fenti menüt a navigációhoz!</p>
    </div>

</body>
</html>


<!-- 
mysql kód:

CREATE DATABASE user_management;
USE user_management;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
); -->
