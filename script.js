const botonTema = document.querySelector("#btn-tema");

botonTema.addEventListener("click", function () {
  document.body.classList.toggle("oscuro");

  if (document.body.classList.contains("oscuro")) {
    botonTema.textContent = "☀️ Modo día";
  } else {
    botonTema.textContent = "🌙 Modo oscuro";
  }
});

const botonMenu = document.querySelector("#btn-menu");
const listaMenu = document.querySelector("nav ul");

botonMenu.addEventListener("click", function () {
  listaMenu.classList.toggle("menu-abierto");
});

const formularioContacto = document.querySelector("#form-contacto");
const avisoContacto = document.querySelector("#aviso-contacto");

function revisarFormulario(event) {
  const nombre = document.querySelector("#nombre").value;
  const correo = document.querySelector("#correo").value;

  const asunto = document.querySelector("#asunto").value;

  if (nombre === "") {
    event.preventDefault();

    avisoContacto.textContent = "Por favor, escribe tu nombre.";
    avisoContacto.classList.add("error");
    avisoContacto.classList.remove("exito");
  } else if (correo.includes("@") === false) {
    event.preventDefault();

    avisoContacto.textContent = "Por favor, escribe un correo valido.";
    avisoContacto.classList.add("error");
    avisoContacto.classList.remove("exito");
  } else if (asunto === "") {
    event.preventDefault();

    avisoContacto.textContent =
      "Por favor, selecciona el motivo de la consulta.";
    avisoContacto.classList.add("error");
    avisoContacto.classList.remove("exito");
  }

  //else {
  //   avisoContacto.textContent =
  //     "Consulta recibida. Pronto nos comunicaremos contigo.";
  //   avisoContacto.classList.add("exito");
  //   avisoContacto.classList.remove("error");
  // }
}

formularioContacto.addEventListener("submit", revisarFormulario);
