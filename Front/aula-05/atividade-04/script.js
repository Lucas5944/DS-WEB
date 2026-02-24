var area = document.getElementById("area")
var mensagem = document.getElementById("mensagem")


area.addEventListener("click", function(){
mensagem.textContent = "Clique simples detectado!";
 area.style.background = "white"
});

area.addEventListener("dblclick", function(){
        area.style.background  = "lightgreen";
});

area.addEventListener("mouseenter", function(){
mensagem.textContent = "O mouse entrou na área!";
});

area.addEventListener("mouseleave", function(){
mensagem.textContent = "O mouse saiu da área!";
});

var posicao =document.getElementById("posicao")
area.addEventListener("mousemove", function(event){
posicao.textContent = "X:" + event.clientX + " Y:"
+ event.clientY;
});

area.addEventListener("contextmenu", function(event){
   
  event.preventDefault();

    alert("Botão direito clicado!");
});

