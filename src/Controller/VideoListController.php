<?php

namespace Joao\Mvc\Controller;
use Joao\Mvc\Repository\VideoRepository;

class VideoListController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
        
    }
    public function processaRequisicao():void
    {
        $videoList = $this->videoRepository->all();
        require_once __DIR__ . '/../../views/video-list.php';
    }
}