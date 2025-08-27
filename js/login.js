//Usar o let siginifica: "Guarda isso na memória, pode mudar depois se precisar"

let card = document.querySelector(".card");
let loginButton = document.querySelector(".loginButton");
let cadastroButton = document.querySelector(".cadastroButton");

// Quando o botão de Login é clicado:
// Remove a classe 'cadastroActive' (se estiver ativa)
// Adiciona a classe 'loginActive' para exibir a tela de login
loginButton.onclick = () => {
    card.classList.remove("cadastroActive")
    card.classList.add("loginActive")
}
// Quando o botão de Cadastro é clicado:
// Remove a classe 'loginActive' (se estiver ativa)
// Adiciona a classe 'cadastroActive' para exibir a tela de cadastro
cadastroButton.onclick = () => {
    card.classList.remove("loginActive")
    card.classList.add("cadastroActive")
}
