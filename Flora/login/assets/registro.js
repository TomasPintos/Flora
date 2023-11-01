function alert() {
    var alert = document.getElementById("message");
    alert.style.display = "block";
    setTimeout(function () {
        alert.style.display = "none";
    }, 5000); // 5000 milisegundos = 5 segundos
}