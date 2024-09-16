<?php
header('Content-Type: application/json');

function connect(): PDO
{
    try {
        return $pdo = new PDO('mysql:host=localhost;dbname=clients', 'root', '');
    } catch (PDOException $e) {
        var_dump($e);
        exit;
    }
}

function insert($data)
{
    $exec = [
        'name' => $data['name'],
        'comment' => $data['comment'],
    ];
    $pdo = connect();

    $query = $pdo->prepare("INSERT INTO comments (id, name, comment, date) VALUES (DEFAULT, :name, :comment, NOW())");
    $query->execute($exec);

    if ($query->rowCount() >= 1) {
        echo json_encode('Comentário salvo com sucesso');
    } else {
        echo json_encode('Falha ao salvar comentario');
    }
}

$data = $_POST;

insert($data);
