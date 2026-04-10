var divResposta = document.getElementById("resposta");

var inputPedido   = document.getElementById("pedido_id");
var inputProduto   = document.getElementById("produto_id");
var inputQuantidade   = document.getElementById("quantidade");
var inputQuantidade   = document.getElementById("preco");



document.addEventListener('DOMContentLoaded', getPedido_item);
document.getElementById('botaoEnviar').addEventListener('click',postPedido_item);
async function getPedido_item() {
    var requisicao = await fetch("http://localhost/cafeteria-api/pedido_item");
    var resposta = await requisicao.json();

    console.log(resposta)

    // Gera as linhas automaticamente para todos os itens do array
   const dados = resposta.data || resposta;

    const linhas = dados.map(item => `
       <tr>
            <td>${item.id}</td>
            <td>${item.pedido_id}</td>
            <td>${item.produto_id}</td>
            <td>${item.quantidade}</td>
            <td>${item.preco}</td>
            <td><button onclick="deletePedidos(${item.id})">Deletar</button></td>
        </tr>
    `).join("");
    
    console.log(linhas)
    divResposta.innerHTML = `
       <table class="sua-classe">
        <thead>
            <tr>
                <th colspan="7" style="text-align: center; text-transform: uppercase;">Gerenciamento de Pedidos</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>pedido</th>
                <th>produto</th>
                <th>quantidade</th>
                <th>preco</th>
                <th colspan='2'>Ações</th>
            </tr>
        </thead>
        <tbody>
            ${linhas}
        </tbody>
    </table>
    `;

}

async function postPedido_item() {
     var requisicao = await fetch("http://localhost/cafeteria-api/pedido_item/", {
        method:  "POST",
        body: JSON.stringify({ 
            pedido_id: inputPedido.value,
             produto_id: inputProduto.value,
              quantidade: inputQuantidade.value,
               preco: inputPreco.value
        })
       

    });

    var resposta = await requisicao.json();
    console.log(resposta);
    
    //Limpa o campo
     inputPedido.value
     inputProduto.value
    inputQuantidade.value
    inputPreco.value
    getPedido_item()
}

    
async function deletePedido_item(id) {
    if (confirm("Deseja realmente excluir?")) {
     var requisicao = await fetch("http://localhost/cafeteria-api/pedido_item/" + id, {
        method: "DELETE"
    });
 
    var resposta = await requisicao.json()
    console.log(resposta)
 
    getPedido_item()
}

}