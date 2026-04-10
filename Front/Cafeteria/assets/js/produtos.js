
var divResposta = document.getElementById("resposta");

var inputNome   = document.getElementById("nome");
var inputPreco   = document.getElementById("preco");
var inputCategoria = document.getElementById('categoria_id');
var inputDisponivel = document.getElementById('disponivel');



document.addEventListener('DOMContentLoaded', getProdutos)
document.getElementById('botaoEnviar').addEventListener('click', postProduto);

async function getProdutos() {
    var requisicao = await fetch("http://localhost/cafeteria-api/produtos");
    var resposta = await requisicao.json();

    console.log(resposta)

  
   const dados = resposta.data || resposta;

    const linhas = dados.map(item => `
       <tr>
            <td>${item.id}</td>
            <td>${item.nome}</td>
            <td>${item.preco}</td>
            <td>${item.disponivel || 'Sim'}</td>
            <td>${item.categoria_id}</td>
            <td><button onclick="deleteProduto(${item.id})">Deletar</button></td>
        </tr>
    `).join("");
    
    console.log(linhas)
    divResposta.innerHTML = `
        <table class="sua-classe">
            <thead>
                <tr>
                    <th colspan="3"><center>produtos</center></th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>disponiveis</th>
                    <th>categorias</th>
                    <th>ações</th>
                </tr>
            </thead>
            <tbody>
                ${linhas}
            </tbody>
        </table>
    `;

}

async function postProduto() {
    
    const dadosParaEnviar = { 
        nome: inputNome.value,
        preco: inputPreco.value,
        categoria_id: inputCategoria.value, 
        disponivel: inputDisponivel.value
    };

    try {
        var requisicao = await fetch("http://localhost/cafeteria-api/produtos", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(dadosParaEnviar)
        });


        var resposta = await requisicao.json();
        console.log("Sucesso! Resposta da API:", resposta);
        
        
        inputNome.value = "";
        inputPreco.value = "";
        inputCategoria.value = "";
        inputDisponivel.value = "";

        
        getProdutos();

    } catch (erro) {
        console.error("Erro na requisição POST:", erro);
        alert("Não foi possível conectar à API.");
    }
}

    
async function deleteProduto(id) {
    if (confirm("Deseja realmente excluir?")) {
     var requisicao = await fetch("http://localhost/cafeteria-api/produtos/" + id, {
        method: "DELETE"
    });
 
    var resposta = await requisicao.json()
    console.log(resposta)
 
    getProdutos()
}
}
    async function getCategorias() {
    try {
        var requisicao = await fetch("http://localhost/cafeteria-api/categorias");
        var resposta = await requisicao.json();
        
      
        const dados = resposta.data || resposta;
        
       
        inputCategoria.innerHTML = '<option value="">Selecione uma categoria...</option>';

        
        dados.forEach(categoria => {
            var option = document.createElement("option");
            option.value = categoria.id; 
            option.text = categoria.nome;
            inputCategoria.appendChild(option);
        });
    } catch (erro) {
        console.error("Erro ao buscar categorias:", erro);
    }
}
document.addEventListener("DOMContentLoaded", () => {
    getCategorias();
    getProdutos(); 
});