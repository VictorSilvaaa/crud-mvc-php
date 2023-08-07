<?php

use Joao\Mvc\Entity\Video;
use Joao\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/banco.sqlite';

$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if($url ===false){
    header('location: /?sucesso=0');
    exit();
}
$titulo = filter_input(INPUT_POST,'titulo');
if($url ===false){
    header('location: /?sucesso=0');
    exit();
}

$repository = new VideoRepository($pdo);
if($repository->add(new Video($url, $titulo))===false){
    header('location: /?sucesso=0');
}else{
    header('location: /?sucesso=1');
}?>