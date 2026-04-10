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
        $resultado = $database->executeQuery('SELECT * FROM pedido_item');
        $pedido_item = $resultado->fetchAll();

        echo json_encode([
            'status' => 'success',
            'data' => $pedido_item
        ]);
        break;
    // -------------------------------------------------------
    // POST /pedido
    // Body: { "nome": "Bebidas" },
    // {}
    //          
    // -------------------------------------------------------
    case 'POST':
        $body = json_decode(file_get_contents('php://input'), true);
        
         $pedido       = trim($body['pedido_id']);
        $produto      = trim($body['produto_id']);
        $quantidade   = trim($body['quantidade']);
        $preco = trim($body['preco']);


         if (!$pedido) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo nome não informado'
            ]);
            break;
        }

        if (!$produto) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo preço não informado'
            ]);
            break;
        }

        if (!$quantidade) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo categoria não informado'
            ]);
            break;
        }

        if (!$preco) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo da disponibilidade não informado'
            ]);
            break;
        }



        // CORREÇÃO AQUI: O array de parâmetros deve ser UM ÚNICO array, separado por vírgulas
        $database->executeQuery(
            "INSERT INTO produ tos (pedido_id, produto_id, quantidade, preco) VALUES (:pedido_id, :produto_id, :quantidade, :preco)",
            [ 
                ':pedido_id'  => $pedido,
                ': produto_id' => $produto,
                ':quantidade' => $quantidade,
                ':preco' => $preco
            ]
        );

        http_response_code(201);
        echo json_encode([
            'status' => 'success',
            'message' => 'pedido_item  cadastrado com sucesso', // Alterado de Categoria para Produto
            'idPedido_item' => $database->lastInsertId()       // Alterado para idProduto
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
                'message' => 'Informe o id da pedido_item   na URL.'
            ]);
            break;
        }
 
        $stmt = $database->executeQuery(
            'DELETE FROM pedido_item WHERE id = :id',
            [':id' => $id]
        );
 
        if ($stmt->rowCount() === 0) {
            http_response_code(404);
            echo json_encode([
                'status'  => 'error',
                'message' => 'pedido_item não encontrado.'
            ]);
            break;
        }
 
        echo json_encode([
            'status'  => 'success',
            'message' => 'pedido_item removidos com sucesso.'
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