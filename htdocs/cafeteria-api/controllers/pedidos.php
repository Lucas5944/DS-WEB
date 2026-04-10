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
        $resultado = $database->executeQuery('SELECT * FROM pedidos');
        $pedidos = $resultado->fetchAll();

        echo json_encode([
            'status' => 'success',
            'data' => $pedidos
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
        
        // Coleta os dados (usando ?? para evitar erros de índice inexistente)
        $cliente       = trim($body['cliente']);
        // Validações
        if (!$cliente) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Campo cliente não informado'
            ]);
            break;
        }



        // CORREÇÃO AQUI: O array de parâmetros deve ser UM ÚNICO array, separado por vírgulas
        $database->executeQuery(
            "INSERT INTO pedidos (cliente) VALUES (:cliente)",
            [ 
                ':cliente' => $cliente
            ]
        );

        http_response_code(201);
        echo json_encode([
            'status' => 'success',
            'message' => 'pedido  cadastrado com sucesso', // Alterado de Categoria para Produto
            'idPedido' => $database->lastInsertId()       // Alterado para idProduto
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
                'message' => 'Informe o id da pedido   na URL.'
            ]);
            break;
        }
 
        $stmt = $database->executeQuery(
            'DELETE FROM pedidos WHERE id = :id',
            [':id' => $id]
        );
 
        if ($stmt->rowCount() === 0) {
            http_response_code(404);
            echo json_encode([
                'status'  => 'error',
                'message' => 'pedidos não encontrado.'
            ]);
            break;
        }
 
        echo json_encode([
            'status'  => 'success',
            'message' => 'pedidos removidos com sucesso.'
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