<?php

return [

    'GET|/' => \Joao\Mvc\Controller\VideoListController::class,
    'GET|/novo-video' => \Joao\Mvc\Controller\VideoFormController::class,
    'POST|/novo-video' => \Joao\Mvc\Controller\NewVideoController::class,
    'GET|/editar-video' => \Joao\Mvc\Controller\VideoFormController::class,
    'POST|/editar-video' => \Joao\Mvc\Controller\EditVideoController::class,
    'GET|/remover-video' => \Joao\Mvc\Controller\DeleteVideoController::class
];