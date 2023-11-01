<?php
require 'database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si los campos obligatorios están vacíos
    if (empty($email) || empty($username) || empty($password)) {
        $message = 'Por favor, completa todos los campos obligatorios.';
    } else {
        // Verificar si el correo electrónico o nombre de usuario ya están registrados
        $sql = "SELECT * FROM usuarios WHERE email = :email OR username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            if ($existingUser['email'] === $email) {
                $message = 'Este correo electrónico ya está registrado. Por favor, utiliza otro.';
            } elseif ($existingUser['username'] === $username) {
                $message = 'Este nombre de usuario ya está en uso. Por favor, elige otro.';
            }
        } else {
            // Ni el correo electrónico ni el nombre de usuario están en uso, procede con el registro
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO usuarios (email, contraseña, username) VALUES (:email, :password, :username)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':username', $username);

            if ($stmt->execute()) {
                $message = 'Usuario creado con éxito';
            } else {
                $message = 'Ocurrió un error al crear el usuario';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FLORA</title>
    <link rel="stylesheet" href="css/registro.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logo-flora-header.png" type="image/x-icon">
</head>
<body>

<div class="login-box">
    <img src="img/logo-flora.jpg" class="avatar" alt="Avatar Image">
    <h1>Espacio Cultural</h1>

    <form action="registro.php" method="post">
        <?php if (!empty($message)): ?>
            <?php if ($message === 'Usuario creado con éxito'): ?>
                <div class="success-alert"><?= $message ?></div>
            <?php else: ?>
                <div class="alert"><?= $message ?></div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="email">
        <label for="email">Email</label>
        <img src="img/email.svg" alt="">
        </div>
<input type="email" placeholder="Ingrese su email" name="email" required class="input-field">

        <label for="username">Nombre de Usuario</label>
        <input type="text" placeholder="Ingrese su nombre de usuario" name="username">
        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ingrese su contraseña" name="password">
        <input type="submit" value="enviar">
        <div class="loginindex">
            <a href="index.php" role="button">Volver</a>
        </div>
    </form>

    <div class="ig">
        <a href="https://instagram.com/flora.espaciocultural?igshid=MzRlODBiNWFlZA==">
            <img src="img/ig.svg" alt="log" width="40px">
        </a>
    </div>
</div>
</body>

<script src="assets/registro.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>
