<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FLORA</title>
    <link rel="stylesheet" href="css/styleindex.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logo-flora-header.png" type="image/x-icon">


</head>
<body >
<?php if (!empty($user)): ?>
    
    <a href="logout.php">Logout</a>
<?php else: ?>

    <div class="login-box">

        <img src="img/logo-flora.jpg" width="100px" class="avatar" alt="Avatar Image">
        <h1 class="titulo-index">Bienvenido a Espacio Cultural Flora</h1>

        <div class="loginindex">
            <a class="btn btn-primary" href="login.php" role="button">Login</a>
        </div>

        <div class="registroindex">
            <a class="btn btn-primary" href="registro.php" role="button">Registro</a>
        </div>
        
        <div class="ig">
            <a href="https://instagram.com/flora.espaciocultural?igshid=MzRlODBiNWFlZA==">
                <img src="img/ig.svg" alt="log" width="40px">
            </a>
        </div>
    </div>
<?php endif; ?>

</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>
