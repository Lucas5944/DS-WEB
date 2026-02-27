var pacman = document.getElementById("pacman");
var comida = document.getElementById("comida");
var placar = document.getElementById("placar");
var fantasminha = document.getElementById("fantasminha");

var X = window.innerWidth / 2;
var Y = window.innerHeight / 2;

var comidaX = 200;
var comidaY = 200;
var pontos = 0;

let fantasminhaX = 100;
let fantasminhaY = 100;
let speed = 1;

function moverFantasminha() {

  if (fantasminhaX < X) {
    fantasminhaX += speed;
  } else if (fantasminhaX > X) {
    fantasminhaX -= speed;
  }

  if (fantasminhaY < Y) {
    fantasminhaY += speed;
  } else if (fantasminhaY > Y) {
    fantasminhaY -= speed;
  }

  fantasminha.style.marginLeft = fantasminhaX + "px";
  fantasminha.style.marginTop = fantasminhaY + "px";
}

function verificarColisaoFantasminha() {

  var distanciaX = Math.abs(X - fantasminhaX);
  var distanciaY = Math.abs(Y - fantasminhaY);

  if (distanciaX < 40 && distanciaY < 40) {
    gameOver();
  }
}

function gameOver() {
  document.getElementById("tela-morte").style.display = "flex";
}

function reiniciar() {
  location.reload();
}

function gameLoop() {
  moverFantasminha();
   verificarColisaoFantasminha()
  requestAnimationFrame(gameLoop);
}

gameLoop();

function desenhar() {
  pacman.style.marginLeft = X + "px";
  pacman.style.marginTop = Y + "px";

  comida.style.marginLeft = comidaX + "px";
  comida.style.marginTop = comidaY + "px";
}

document.addEventListener("keydown", function (event) {
  var tecla = event.key.toLowerCase();
  var velocidade = 20;

  if (tecla == "w") {
    Y -= velocidade;
    pacman.style.transform = "rotate(-90deg)";
  }
  if (tecla == "s") {
    Y += velocidade;
    pacman.style.transform = "rotate(90deg)";
  }
  if (tecla == "a") {
    X -= velocidade;
    pacman.style.transform = "rotate(180deg)";
  }
  if (tecla == "d") {
    X += velocidade;
    pacman.style.transform = "rotate(0deg)";
  }

  verificarColisao();
  desenhar();
});

function verificarColisao() {

  var distanciaX = Math.abs(X - comidaX);
  var distanciaY = Math.abs(Y - comidaY);

  if (distanciaX < 40 && distanciaY < 40) {
    pontos++;
    placar.innerText = pontos;

    comidaX = Math.floor(Math.random() * (window.innerWidth - 50));
    comidaY = Math.floor(Math.random() * (window.innerHeight - 100)) + 50;
  }
}

