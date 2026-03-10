document.getElementById("formulario").addEventListener("submit", function(event){
    event.preventDefault();

    // Captura dos valores
    let nome = document.getElementById("nome").value.trim();
    let email = document.getElementById("email").value.trim();
    let senha = document.getElementById("senha").value;
    let confirmaSenha = document.getElementById("confirma-senha").value;
    let cpf = document.getElementById("cpf").value.trim();
    let telefone = document.getElementById("telefone").value.trim();
    let cep = document.getElementById("cep").value.trim();
    let data = document.getElementById("data-nascimento").value.trim();
    let valor = document.getElementById("valor").value.trim();
    let url = document.getElementById("url").value.trim();
    let cartao = document.getElementById("cartao").value.trim();

    // Limpa todos os erros antes de validar
    document.getElementById("erro-nome").textContent = "";
    document.getElementById("erro-email").textContent = "";
    document.getElementById("erro-senha").textContent = "";
    document.getElementById("erro-cpf").textContent = "";
    document.getElementById("erro-telefone").textContent = "";
    document.getElementById("erro-cep").textContent = "";
    document.getElementById("erro-data-nascimento").textContent = "";
    document.getElementById("erro-valor").textContent = "";
    document.getElementById("erro-url").textContent = "";
    document.getElementById("erro-cartao").textContent = "";
    document.getElementById("resultado").textContent = "";





    // Validação Nome
    if(nome === "" || nome.length < 3){
        document.getElementById("erro-nome").textContent = "Nome inválido";
    } else {
        document.getElementById("resultado").textContent += "Nome válido: " + nome + "\n";
    }




    // Validação Email
let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/;

// ^              início da string
// [^\s@]+       pelo menos um caractere que não seja espaço ou @ (parte do usuário)
// @             obrigatório
// [^\s@]+        pelo menos um caractere que não seja espaço ou @ (domínio)
// \.             ponto literal
// [^\s@]{2,4}    2 a 4 caracteres depois do ponto (como com, org, net)
// $              fim da string

if(!emailRegex.test(email)){
    document.getElementById("erro-email").textContent = "Email inválido";
} else {
    document.getElementById("erro-email").textContent = "";
    document.getElementById("resultado").textContent += "Email válido: " + email + "\n";
}




   let senhaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

// Capturando os elementos para facilitar o uso
let erroSenha = document.getElementById("erro-senha");
let erroConfirma = document.getElementById("erro-confirma-senha"); // ID sugerido

// 1. Valida a força da senha
if(!senhaRegex.test(senha)){
    erroSenha.textContent = "Senha fraca. Use maiúsculas, minúsculas, números e caracteres especiais";
    erroConfirma.textContent = ""; // Limpa o erro de baixo se houver
} 
// 2. Valida se são iguais
else if(confirmaSenha !== senha){
    erroSenha.textContent = ""; // Senha é forte, então limpa o erro dela
    erroConfirma.textContent = "As senhas não coincidem";
} 
// 3. Tudo OK
else {
    erroSenha.textContent = "";
    erroConfirma.textContent = "";
    document.getElementById("resultado").textContent += "Senha válida e confirmada\n";
}



    // Validação CPF (tamanho)
    if(cpf.length !== 14){
        document.getElementById("erro-cpf").textContent = "CPF inválido";
    } else {
        document.getElementById("resultado").textContent += "CPF válido: " + cpf + "\n";
    }

    
    // Validação Telefone
// Aceita: (11) 99999-9999, (11) 9999-9999 ou (11)99999-9999
let telefoneRegex = /^\([0-9]{2}\)\s?9?[0-9]{4}\-[0-9]{4}$/; 

if(!telefoneRegex.test(telefone)){
    document.getElementById("erro-telefone").textContent = "Telefone inválido. Use (11) 99999-9999";
} else {
    document.getElementById("erro-telefone").textContent = "";
    // Lembre-se: use apenas "=" se quiser mostrar só o último resultado
    document.getElementById("resultado").textContent += "Telefone válido: " + telefone + "\n";
}


   // Validação CEP
let cepRegex = /^\d{5}-\d{3}$/;

// ^         início da string
// \d{5}     cinco dígitos
// -         hífen

// \d{3}     três dígitos
// $         fim da string

if(!cepRegex.test(cep)){
    document.getElementById("erro-cep").textContent = "CEP inválido. Use 00000-000";
} else {
    document.getElementById("erro-cep").textContent = "";
    document.getElementById("resultado").textContent += "CEP válido: " + cep + "\n";
}





//verificaçao data 
const dataRegex = /^(\d{2})\/(\d{2})\/(\d{4})$/;

let match = data.match(dataRegex);

if(!match){
    document.getElementById("erro-data-nascimento").textContent = "Data inválida. Use DD/MM/AAAA";
} else {
    let dia = parseInt(match[1], 10);
    let mes = parseInt(match[2], 10);
    let ano = parseInt(match[3], 10);

    let dataValida = true;

    // 2. CORREÇÃO: Troquei '==' (comparação) por '=' (atribuição)
    if(mes < 1 || mes > 12) dataValida = false;
    else if(dia < 1) dataValida = false;
    else if([4,6,9,11].includes(mes) && dia > 30) dataValida = false;
    else if(mes === 2){
        let bissexto = (ano % 4 === 0 && ano % 100 !== 0) || (ano % 400 === 0);
        if(dia > (bissexto ? 29 : 28)) dataValida = false;
    } else if(dia > 31){
        dataValida = false;
    }

    if(!dataValida){
        document.getElementById("erro-data-nascimento").textContent = "Data inválida";
    } else {
        document.getElementById("erro-data-nascimento").textContent = "";
        document.getElementById("resultado").textContent += "Data válida: " + data + "\n";
    }
}



    // Validação Valor monetário
let valorRegex = /^\d{1,3}(\.\d{3})*,\d{2}$/;

// ^                início da string
// \d{1,3}          1 a 3 dígitos antes de um possível ponto de milhar
// (\.\d{3})*      grupos opcionais de ponto + 3 dígitos (milhares)
// ,\d{2}           vírgula seguida de 2 dígitos (centavos)
// $                fim da string

if(!valorRegex.test(valor)){
    document.getElementById("erro-valor").textContent = "Valor inválido. Use formato 1.299,90";
} else {
    document.getElementById("erro-valor").textContent = "";
    document.getElementById("resultado").textContent += "Valor válido: " + valor + "\n";
}




    // Validação URL
let urlRegex = /^(https?:\/\/)[^\s$.?#].[^\s]*$/;

// ^             início da string
// https?://     http:// ou https://
// [^\s$.?#]     garante que o próximo caractere não seja espaço ou caracteres inválidos
// .[^\s]*       o restante da URL (não permite espaços)
// $             fim da string

if(!urlRegex.test(url)){
    document.getElementById("erro-url").textContent = "URL inválida. Use http:// ou https://";
} else {
    document.getElementById("erro-url").textContent = "";
    document.getElementById("resultado").textContent += "URL válida: " + url + "\n";
}




    // Validação Cartão
let cartaoRegex = /^(\d{4}\s){3}\d{4}$|^\d{16}$/;

if(!cartaoRegex.test(cartao)){
    document.getElementById("erro-cartao").textContent = "Cartão inválido. Digite 16 dígitos";
} else {
    document.getElementById("erro-cartao").textContent = "";
    document.getElementById("resultado").textContent += "Cartão válido: " + cartao + "\n";
}
});