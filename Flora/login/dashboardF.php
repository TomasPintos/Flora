<?php
session_start(); // Inicia la sesión si aún no está iniciada

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Definir la función para obtener el nombre del usuario
    function obtenerNombreDeUsuario($conn, $user_id) {
        $stmt = $conn->prepare('SELECT username FROM usuarios WHERE id = :user_id');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['username'];
        } else {
            return 'Nombre de usuario no encontrado';
        }
    }

  
    require 'database.php';

    // Obtener el nombre de usuario
    $user_name = obtenerNombreDeUsuario($conn, $user_id);
} else {
   
    // El usuario no está logeado, puedes redirigirlo a la página de inicio de sesión
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="icon" href="img/logo-flora-header.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styleD.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   
</head>
<body>

<header class="header">
       <h2>Bienvenido, <?php echo $user_name; ?>!</h2>
     
</header>
<h3>Seleccione una categoría para completar su formulario</h3>
<div class="form">
    <a href="../formulario/index.php">Música</a>
        <a href="../formulario/danza.php">Danza</a>
        <a href="../formulario/teatro.php">Teatro/Arte Circense</a>
        <a href="../formulario/cine.php">Cine Y Audiovisual</a>
        <a href="../formulario/literatura.php">Literatura</a>
        <a href="../formulario/gastronomia.php">Gastronomía</a>
        <a href="../formulario/artesanias.php">Artesanías</a>
        <a href="../formulario/artesplasticas.php">Arte Plásticas</a>
</div>

</body>
</html>