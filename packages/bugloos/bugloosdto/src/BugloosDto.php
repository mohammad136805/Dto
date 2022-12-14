<?php

namespace bugloos\bugloosdto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BugloosDto
{
    public $modelObj = null;
    public $data = null ;
    public $map = null;
    public $typeXML = false ;
    public $typeJSON = false ;

    public function __construct($data , $Class)
    {
        $this->modelObj = new $Class();
        $this->setData($data);

    }

    public function getObj()
    {
        return $this->modelObj;
    }

    public function map($mapArray)
    {
        $this->map = $mapArray ;

        foreach ($mapArray as $key=>$value)
        {
            $this->modelObj->__set($key , $this->getValueFromResponse($value));
        }

        return $this ;
    }

    public function getValueFromResponse($value)
    {
        return $this->data[$value] ?? $value;
    }

    private function setData($data)
    {
        $content_type = $data->headers()['Content-Type'][0];

        $this->typeJSON = Str::contains($content_type, 'json') ? true : false;

        //application/xhtml+xml   text/xml   application/xml   application/rss+xml
        $this->typeXML = Str::contains($content_type, 'xml') ? true : false;

        $this->data = $this->typeJSON ? $data->json() : json_encode(simplexml_load_string($data->body()));


        return ;
    }

}
