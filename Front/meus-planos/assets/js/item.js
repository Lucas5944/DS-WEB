var divResposta = document.getElementById("resposta");
var inputNome   = document.getElementById("nome")
var inputCategoria = document.getElementById('categoria_id');
var inputFeito = document.getElementById('feito');



document.addEventListener('DOMContentLoaded', getItem)
document.getElementById('botaoEnviar').addEventListener('click', postItem);

async function getItem() {
    var requisicao = await fetch("http://localhost/meus-planos-api/itens");
    var resposta = await requisicao.json();

    console.log(resposta)

  
   const dados = resposta.data || resposta;

    const linhas = dados.map(item => `
       <tr>
          <tr>
        <td>${item.id}</td>
        <td>${item.nome}</td>
        <td>${item.categoria_nome}</td>
        <td>
            <input type="checkbox" ${item.feito == 1 ? "checked" : ""}
            onclick="PutPlano(${item.id}, this.checked)"> 
        </td>
        <td><button onclick="deleteItem(${item.id})">Deletar</button></td>
    </tr>
    `).join("");
    
    console.log(linhas)
    divResposta.innerHTML = `
        <table class="sua-classe">
        <thead>
            <tr>
                <th colspan="5"><center>jogos para jogar esse ano</center></th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categorias</th>
                <th>Jogado?</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            ${linhas}
        </tbody>
    </table>
`;
}

async function postItem() {
    
    const dadosParaEnviar = { 
        nome: inputNome.value,
        categoria_id: inputCategoria.value 
    };

    try {
        var requisicao = await fetch("http://localhost/meus-planos-api/itens", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(dadosParaEnviar)
        });


        var resposta = await requisicao.json();
        console.log("Sucesso! Resposta da API:", resposta);
        
        
        inputNome.value = "";
        inputCategoria.value = "";

        
        getItem();

    } catch (erro) {
        console.error("Erro na requisição POST:", erro);
        alert("Não foi possível conectar à API.");
    }
}

    
async function deleteItem(id) {
    if (confirm("Deseja realmente excluir?")) {
     var requisicao = await fetch("http://localhost/meus-planos-api/itens/" + id, {
        method: "DELETE"
    });
 
    var resposta = await requisicao.json()
    console.log(resposta)
 
    getItem()
}
}
    async function getCategorias() {
    try {
        var requisicao = await fetch("http://localhost/meus-planos-api/categorias");
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
    getItem(); 
});

async function PutPlano(id, statusMarcado) {
    
    const valorStatus = statusMarcado ? 1 : 0; 

    try {
        await fetch(`http://localhost/meus-planos-api/itens/${id}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ feito: valorStatus })
        });
        
        console.log(`Sucesso: Item ${id} atualizado para ${valorStatus}`);
        
        localStorage.setItem(`checado_${id}`, statusMarcado);

    } catch (erro) {
        console.error("Erro ao atualizar o status:", erro);
    }
}
