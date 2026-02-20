
var contadoritem = 0

function cadastro(){

   

    contadoritem ++

    var novoAluno = document.createElement('li')

    var novoNome = document.getElementById('nome').value;
    var novoEmail = document.getElementById('email').value;
    var novoRM = document.getElementById('RM').value;
    var novoTelefone = document.getElementById('telefone').value;
    var novoTurma = document.getElementById('turma').value;
   
  
    //novoAluno.textContent = contadoritem + " - "  + novoNome + ' - ' + novoEmail + ' - ' + novoRM + ' - ' + novoTelefone + ' - ' + novoTurma;

    novoAluno.innerHTML = contadoritem + " <br> "  + novoNome + ' <br> ' + novoEmail + ' <br> ' + novoRM + ' <br> ' + novoTelefone + ' <br> ' + novoTurma;

    novoAluno.setAttribute("id", contadoritem);

    
   let botaoremover = document.createElement('button');
   botaoremover.textContent = 'remover'; 
   botaoremover.setAttribute('onclick', `removeritem(${contadoritem})`);

   novoAluno.appendChild (botaoremover)
   document.getElementById('listaAlunos').appendChild(novoAluno)

   
}

function removeritem(itemLista){
    var item = document.getElementById(itemLista);
    document.getElementById("listaAlunos").removeChild (item);
}   