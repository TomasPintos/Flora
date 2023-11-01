<?php
session_start(); // Inicia la sesión

require 'database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si los campos de usuario y contraseña están vacíos
    if (empty($username) || empty($password)) {
        $message = 'Por favor, completa todos los campos obligatorios.';
    } else {
        // Cambia la consulta para buscar por nombre de usuario
        $records = $conn->prepare('SELECT id, email, contraseña FROM usuarios WHERE username = :username');
        $records->bindParam(':username', $username);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (is_array($results) > 0 && password_verify($password, $results['contraseña'])) {
            $_SESSION['user_id'] = $results['id'];
            $_SESSION['user'] = $results; // Almacena la información del usuario en $_SESSION
            header("Location: dashboardF.php"); // Redirige al usuario a la página de dashboard
            exit(); // Asegura que se detenga la ejecución del script después de la redirección
        } else {
            // Si la consulta no devuelve resultados, el usuario no existe
            $message = 'Nombre de usuario o contraseña incorrectos.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FLORA</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logo-flora-header.png" type="image/x-icon">

</head>
<body>

<div class="login-box">
    <img src="img/logo-flora.jpg" class="avatar" alt="Avatar Image">
    <h1>Espacio Cultural</h1>

    <!-- Agrega este div para mostrar el mensaje de error -->
    <?php if (!empty($message)): ?>
        <div class="error-message">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="username">Usuario</label>
        <input type="text" placeholder="usuario" name="email">
        <label for="password">Contraseña</label>
        <input type="password" placeholder="Contraseña" name="password">
        <input type="submit" value="enviar">
        <div class="nocuenta">
            <a href="registro.php">No tienes cuenta?</a>
        </div>
    </form>

    <div class="ig">
        <a href="https://instagram.com/flora.espaciocultural?igshid=MzRlODBiNWFlZA==">
            <img src="img/ig.svg" alt="log" width="40px">
        </a>
    </div>
</div>




<script>

    function mostrarMensajeError() {
        const mensajeError = document.querySelector('.error-message');
        mensajeError.classList.remove('hidden');
        setTimeout(function () {
            mensajeError.classList.add('hidden');
        }, 5000); // Ocultar después de 5 segundos (5000 ms)
    }


    document.addEventListener('DOMContentLoaded', function () {
        <?php if (!empty($message)): ?>
        mostrarMensajeError(); // Mostrar el mensaje si existe
        <?php endif; ?>
    });
</script>

</body>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</html>
