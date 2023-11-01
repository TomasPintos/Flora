<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styleF.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-flora1.jpg" type="image/x-icon">
    <title>Flora</title>
</head>
<body>
    <header class="header">
        <h1>Artes Plásticas</h1>
    </header>
    <div class="content">
        <section class="formulario">
            <h2>Rider Técnico del Artista</h2>
            <form action="procesar-formulario.php" method="post" enctype="multipart/form-data">
                <label for="foto">Foto en buena calidad del grupo/artista:</label>
                <input type="file" id="foto" name="foto" accept="image/*" required>
                <img id="imagen_previa" src="#" alt="Imagen previa" style="display: none; max-width: 200px; max-height: 200px; border-radius: 10px;">

                <label for="nombre">Nombre del Artista:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="biografia">Biografía Personal del artista:</label>
                <input type="text" id="biografia" name="biografia" required>

                <label for="tiempo">Tiempo estimado de la duración de la presentación en minutos:</label>
                <input type="number" id="tiempo" name="tiempo" min="1" max="120" step="1" required>

                <label for="descripcion">Breve descripción de la presentación a realizar:</label>
                <input type="text" id="descripcion" name="descripcion" required>

                <label for="dni">DNI:</label>
                <input type="number" id="dni" name="dni" required>

                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

                <label for="elementos_presentacion">Descripción de los elementos que se requieren a la hora de la presentación:</label>
                <input type="text" id="elementos_presentacion" name="elementos_presentacion" required>

                <input type="hidden" name="imagen_artista" id="imagen_artista">
                <button type="submit">Enviar</button>
            </form>
        </section>
    </div>
    <div class="sidebar">
    <div class="logo">
            <img src="IMG/logo-flora.png" alt="Logo de la marca">
        </div>
        <a href="index.php">Música</a>
        <a href="danza.php">Danza</a>
        <a href="teatro.php">Teatro/Arte Circense</a>
        <a href="cine.php">Cine Y Audiovisual</a>
        <a href="literatura.php">Literatura</a>
        <a href="gastronomia.php">Gastronomía</a>
        <a href="artesanias.php">Artesanías</a>
        <a href="artesplasticas.php">Artes Plásticas</a>
    </div>
</body>
<script src="assets/index.js"></script>
</html>
