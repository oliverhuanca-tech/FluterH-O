const boton = document.querySelector("#btn-confirmar");

function confirmarEncargo() {
  const mensaje = document.querySelector("#mensaje");

  mensaje.textContent =
    "Encargo recibido - te atiende Oliver Oscar Huanca Mamani";

  mensaje.classList.remove("oculto");
}

boton.addEventListener("click", confirmarEncargo);