var divResposta = document.getElementById("resposta");

var inputCliente   = document.getElementById("cliente");



document.addEventListener('DOMContentLoaded', getPedidos);
document.getElementById('botaoEnviar').addEventListener('click', postPedidos);
async function getPedidos() {
    var requisicao = await fetch("http://localhost/cafeteria-api/pedidos");
    var resposta = await requisicao.json();

    console.log(resposta)

    // Gera as linhas automaticamente para todos os itens do array
   const dados = resposta.data || resposta;

    const linhas = dados.map(item => `
       <tr>
            <td>${item.id}</td>
            <td>${item.cliente}</td>
            <td>${item.total}</td>
            <td>${item.criado_em}</td>
            <td><a href='pedido_item'>visualizar</a><td>
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
                <th>Cliente</th>
                <th>Total</th>
                <th>Data</th>
                <th>Itens</th>
                <th colspan='2'>Ações</th>
            </tr>
        </thead>
        <tbody>
            ${linhas}
        </tbody>
    </table>
    `;

}

async function postPedidos() {
     var requisicao = await fetch("http://localhost/cafeteria-api/pedidos/", {
        method:  "POST",
        body: JSON.stringify({ 
            cliente: inputCliente.value
        })
       

    });

    var resposta = await requisicao.json();
    console.log(resposta);
    
    //Limpa o campo
    inputCliente.value = "";
    getPedidos()
}

    
async function deletePedidos(id) {
    if (confirm("Deseja realmente excluir?")) {
     var requisicao = await fetch("http://localhost/cafeteria-api/pedidos/" + id, {
        method: "DELETE"
    });
 
    var resposta = await requisicao.json()
    console.log(resposta)
 
    getPedidos()
}

}