<?php

$dbPath = __DIR__ . '/banco.sqlite';

$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if($url ===false){
    header('location: /index.php?sucesso=0');
    exit();
}
$titulo = filter_input(INPUT_POST,'titulo');
if($url ===false){
    header('location: /index.php?sucesso=0');
    exit();
}

$sql= 'INSERT INTO videos (url, title) VALUES  (?,?)';
$statement = $pdo->prepare($sql);
$statement->bindValue(1,$url );
$statement->bindValue(2,$titulo);

if($statement->execute()===false){
    header('location: /index.php?sucesso=0');
}else{
    header('location: /index.php?sucesso=1');
}?>