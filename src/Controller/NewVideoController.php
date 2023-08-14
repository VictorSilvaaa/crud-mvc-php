<?php

namespace Joao\Mvc\Controller;
use Joao\Mvc\Repository\VideoRepository;
use Joao\Mvc\Entity\Video;

class NewVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
        
    }
    public function processaRequisicao():void
    {
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
        
        $sucesso = $this->videoRepository->add(new Video($url, $titulo));
        if($sucesso == false){
            header('location: /?sucesso=0');
        }else{
            header('location: /?sucesso=1');
        }


    }
}