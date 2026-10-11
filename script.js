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
