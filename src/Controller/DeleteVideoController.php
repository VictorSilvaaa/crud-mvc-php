<?php

namespace Joao\Mvc\Controller;

use Joao\Mvc\Repository\VideoRepository;
use Joao\Mvc\Entity\Video;


class DeleteVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
        
    }
    public function processaRequisicao():void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id == null || $id == false){
            header('location: /?sucesso=0');
            return;
        }

        $sucess = $this->videoRepository->remove($id);
        
        if($sucess === false){
            header('location: /?sucesso=0');
        }else{
            header('location: /?sucesso=1');
        }

    }
}