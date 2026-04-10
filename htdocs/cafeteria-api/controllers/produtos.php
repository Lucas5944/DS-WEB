<?php

require_once 'database.php';
$database = new Database();

$method   = $_SERVER['REQUEST_METHOD'];
$path     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path     = trim($path, '/');
$segments = explode('/', $path);

if (isset($segments[2])) {
    $id = $segments[2];
} else {
    $id = null;
}

switch($method){
    // -------------------------------------------------------
    // GET /Produtos 
    // GET /produto/1
    // -------------------------------------------------------
    case 'GET':
        $resultado = $database->executeQuery('SELECT * FROM produtos');
        $produtos = $resultado->fetchAll();

        echo json_encode([
            'status' => 'success',
            'data' => $produtos
        ]);
        break;
    // -------------------------------------------------------
    // POST /produtos
    // Body: { "nome": "Bebidas" },
    // {}
    //          
    // -------------------------------------------------------
    case 'POST':
        $body = json_decode(file_get_contents('php://input'), true);
        
        // Coleta os dados (usando ?? para evitar erros de índice inexistente)
        $nome        = trim($body['nome'] ?? '');
        $preco       = trim($body['preco'] ?? '');
        $categoria   = trim($body['categoria_id'] ?? '');
        $disponiveis = trim($body['disponivel'] ?? ''); // Nome corrigido aqui
        
        // Validações
        if (!$nome) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo nome não informado'
            ]);
            break;
        }

        if (!$preco) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo preço não informado'
            ]);
            break;
        }

        if (!$categoria) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo categoria não informado'
            ]);
            break;
        }

        if (!$disponiveis) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo da disponibilidade não informado'
            ]);
            break;
        }

        // CORREÇÃO AQUI: O array de parâmetros deve ser UM ÚNICO array, separado por vírgulas
        $database->executeQuery(
           "INSERT INTO produtos (nome, preco, categoria_id, disponivel) VALUES (:nome, :preco, :categoria_id, :disponivel)",
            [ 
                ':nome'         => $nome,
                ':preco'        => $preco,
                ':categoria_id' => $categoria,
                ':disponivel'   => $disponiveis
            ]
        );

        http_response_code(201);
        echo json_encode([
            'status' => 'success',
            'message' => 'Produto cadastrado com sucesso', // Alterado de Categoria para Produto
            'idProduto' => $database->lastInsertId()       // Alterado para idProduto
        ]);
        
        break;
    // -------------------------------------------------------
    // PUT /categorias/1
    // Body: { "nome": "Salgados" }
    // -------------------------------------------------------
    case 'PUT':
        
        break;
    // -------------------------------------------------------
    // DELETE /categorias/1
    // -------------------------------------------------------
    case 'DELETE':
        if (!$id) {
            http_response_code(400);
            echo json_encode([
                'status'  => 'error',
                'message' => 'Informe o id da produto    na URL.'
            ]);
            break;
        }
 
        $stmt = $database->executeQuery(
            'DELETE FROM produtos WHERE id = :id',
            [':id' => $id]
        );
 
        if ($stmt->rowCount() === 0) {
            http_response_code(404);
            echo json_encode([
                'status'  => 'error',
                'message' => 'produtos não encontrado.'
            ]);
            break;
        }
 
        echo json_encode([
            'status'  => 'success',
            'message' => 'produtos removidos com sucesso.'
        ]);
        break;
    // -------------------------------------------------------
    // Método não permitido
    // -------------------------------------------------------
    default:
        http_response_code(405);
        echo json_encode([
            'status'  => 'error',
            'message' => 'Método não permitido.'
        ]);
}


?>