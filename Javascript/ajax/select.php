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
    $pdo = connect();

    $query = $pdo->prepare("SELECT * FROM comments");
    $query->execute();

    if ($query->rowCount() >= 1) {
        echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    } else {
        echo json_encode('Nenhum comentário encontrado');
    }
}

$data = $_POST;

insert($data);
