const botonTema = document.querySelector("#btn-tema");

botonTema.addEventListener("click", function () {
    document.body.classList.toggle("oscuro");

    if (document.body.classList.contains("oscuro")) {
    botonTema.textContent = "☀️ Modo día";
    } else {
        botonTema.textContent = "🌙 Modo oscuro";
    }
    
});