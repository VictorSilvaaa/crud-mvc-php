<?php

use Joao\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET['id'];
$repository = new VideoRepository($pdo);
$repository->remove($id);

if($repository->remove($id) === false){
    header('location: /?sucesso=0');
}else{
    header('location: /?sucesso=1');
}