<?php

use Joao\Mvc\Entity\Video;
use Joao\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$titulo = filter_input(INPUT_POST, 'titulo');
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);


if($id===false || $titulo===false  || $url===false ){
    header('location: /?sucesso=0');
    exit();
}
$video = new Video($url, $titulo);
$video->setId($id);

$repository = new VideoRepository($pdo);
if($repository->update($video) === false){
    header('location: /?sucesso=0');
}else{
    header('location: /?sucesso=1');
}