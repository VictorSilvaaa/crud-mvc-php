<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$titulo = filter_input(INPUT_POST, 'titulo');
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);


if($id===false || $titulo===false  || $url===false ){
    header('location: /index.php?sucesso=0');
    exit();
}

$sql ='UPDATE videos SET url = :url, title = :title WHERE id= :id;';
$statement = $pdo->prepare($sql);
$statement->bindValue('url', $url);
$statement->bindValue('title', $titulo);
$statement->bindValue('id', $id, PDO::PARAM_INT);

if($statement->execute() === false){
    header('location: /index.php?sucesso=0');
}else{
    header('location: /index.php?sucesso=1');
}