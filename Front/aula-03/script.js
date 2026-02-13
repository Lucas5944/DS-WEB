//criando o contador de item
var contadoritem = 0

function adicionar(){

    //incrementando o contador

    contadoritem ++

    let novoItem = document.createElement("li");//cria o novo item

    //adiciono texto ao meu item
    novoItem.textContent = contadoritem + " - " + prompt("digite o nome da tabela");

    //atribuo um id 
    novoItem.setAttribute("id", contadoritem);//

    //criar um boa de remover
   let botaoremover = document.createElement('button');
   botaoremover.textContent = 'remover'; //
   botaoremover.setAttribute('onclick', `removeritem(${contadoritem})`);

   novoItem.appendChild (botaoremover)
   document.getElementById('lista').appendChild(novoItem)

   
}

function removeritem(itemLista){
    var item = document.getElementById(itemLista);
    document.getElementById("lista").removeChild (item);
}   
