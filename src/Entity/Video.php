<?php
declare(strict_types=1);

namespace Joao\Mvc\Entity;

class Video
{
    public readonly string $url;
    public readonly int $id;

    public function __construct(
        string $url,
        public readonly string $title,
    ){
        $this->setUrl($url);
    }

    private function setUrl($url)
    {
        if(filter_var($url, FILTER_VALIDATE_URL) === false){
            throw new \InvalidArgumentException();  
        }else{
            $this->url = $url;
        }
    }
    public function setId($id):void
    {
        $this->id = $id;
    }

}