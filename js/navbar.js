function mostrarMenu() {
  const menu = document.getElementById("menuSuspenso");

  // Alterna a classe "ativo" -> abre/fecha com animação
  menu.classList.toggle("ativo");
}

// Fecha o menu ao clicar fora dele
document.addEventListener("click", function (event) {
  const menu = document.getElementById("menuSuspenso");
  const userDiv = document.querySelector(".user");

  /* 
     Aqui estamos dizendo:
     - Se o clique NÃO foi dentro do menu
     - E também NÃO foi dentro do ícone do usuário
     => Então fecha o menu (remove a classe "ativo")
  */
  if (!menu.contains(event.target) && !userDiv.contains(event.target)) {
    menu.classList.remove("ativo");
  }
});
