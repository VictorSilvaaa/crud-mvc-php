<?php

namespace Joao\Mvc\Controller;
use Joao\Mvc\Repository\VideoRepository;
use Joao\Mvc\Entity\Video;
class EditVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
        
    }
    public function processaRequisicao():void
    {
      
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $titulo = filter_input(INPUT_POST, 'titulo');
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

        if($id===false || $id==null || $titulo===false  || $url===false ){
            header('location: /?sucesso=0');
            exit();
        }
        $video = new Video($url, $titulo);
        $video->setId($id);

        $sucess = $this->videoRepository->update($video);
        if($sucess === false){
            header('location: /?sucesso=0');
        }else{
            header('location: /?sucesso=1');
        }

    }
}