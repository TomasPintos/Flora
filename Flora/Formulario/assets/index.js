
document.getElementById('foto').addEventListener('change', function () {
    var imagenPrev = document.getElementById('imagen_previa');
    var archivo = this.files[0];

    if (archivo) {
        var lector = new FileReader();

        lector.onload = function (e) {
            imagenPrev.src = e.target.result;
            imagenPrev.style.display = 'block';
        };

        lector.readAsDataURL(archivo);
    } else {
        imagenPrev.src = "#";
        imagenPrev.style.display = 'none';
    }
});
