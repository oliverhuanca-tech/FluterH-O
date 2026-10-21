const formulario = document.querySelector("#form-horno");
const aviso = document.querySelector("#aviso-horno");

function revisarPedido(event) {
  const nombre = document.querySelector("#nombre").value;
  const correo = document.querySelector("#correo").value;
  const pedido = document.querySelector("#pedido").value;

  if (nombre === "" || correo === "") {
    event.preventDefault();

    aviso.textContent = "Sin tu nombre y tu correo no anotamos el pedido.";

    aviso.classList.add("error");
    aviso.classList.remove("exito");
  } else if (correo.includes("@") === false) {
    event.preventDefault();

    aviso.textContent =
      "A ese correo le falta el arroba - corregilo antes de enviar.";

    aviso.classList.add("error");
    aviso.classList.remove("exito");
  } else {
    aviso.textContent = "Pedido tomado - te atiende Oliver Oscar Huanca Mamani";

    aviso.classList.add("exito");
    aviso.classList.remove("error");
  }
}

formulario.addEventListener("submit", revisarPedido);
