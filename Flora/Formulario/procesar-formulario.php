<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; // Cambia a la dirección del servidor de la base de datos
    $username = "root"; // Cambia a tu nombre de usuario de la base de datos
    $password = ""; // Cambia a tu contraseña de la base de datos
    $dbname = "forrmulario-flora"; // Cambia al nombre de tu base de datos

    // Conecta a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $nombre_artista = $_POST["nombre"];
    $imagen_temporal = $_FILES["foto"]["tmp_name"];
    $nombre_imagen = "artistas/" . $_FILES["foto"]["name"]; // Ruta donde se almacenará la imagen

    // Mover la imagen a la ruta especificada
    move_uploaded_file($imagen_temporal, $nombre_imagen);

    // Inserta los datos en la tabla `artistas` sin la columna "escenario"
    $sql = "INSERT INTO `artistas` (nombre, biografia, foto, duracion, descripcion, dni, nacimiento, elementos) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssss", $nombre_artista, $_POST["biografia"], $nombre_imagen, $_POST["tiempo"], $_POST["descripcion"], $_POST["dni"], $_POST["fecha_nacimiento"], $_POST["elementos_presentacion"]);

        if ($stmt->execute()) {
            // Redirigir a dashboard.php y pasar la ruta de la imagen, nombre y DNI como parámetros
            header("Location: dashboard.php?ruta_imagen=" . urlencode($nombre_imagen) . "&nombre=" . urlencode($nombre_artista) . "&dni=" . urlencode($_POST["dni"]));
            exit();
        } else {
            echo "Error al insertar los datos en la base de datos: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>
