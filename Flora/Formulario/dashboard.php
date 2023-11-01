<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/styleDashboard.css">
    <title>Flora</title>
    <link rel="icon" href="IMG/logo-flora1.jpg" type="image/x-icon">
</head>
<body>
    <header class="header">
       <img src="IMG/logo-flora.png" width="100px" alt="">
    </header>

    <div class="container">
        <div class="section-container">
            <div class="image-container">
                <?php
                if (isset($_GET['ruta_imagen'])) {
                    $ruta_imagen = $_GET['ruta_imagen'];
                    echo '<img src="' . $ruta_imagen . '" alt="Imagen Enviada" style="max-width: 200px;">';
                }
                ?>
            </div>
            <div class="info-container">
                <?php
                // Mostrar el nombre y el DNI
                if (isset($_GET['nombre']) && isset($_GET['dni'])) {
                    $nombre = $_GET['nombre'];
                    $dni = $_GET['dni'];
                    echo '<p><strong>Nombre:</strong> ' . $nombre . '</p>';
                    echo '<p><strong>DNI:</strong> ' . $dni . '</p>';
                }
                ?>
            </div>
            <div class="info">
                <h1>Estado:</h1>
                <p class="estado-pendiente">pendiente:</p>
            </div>
        </div>
    </div>
    <div class="inicio">
        <a href="../login/index.php">Inicio</a>
    </div>
    <script src="assets/index.js"></script>
</body>
</html>
