<?php
namespace App\Class;
use App\Class\HTMLElement;

class Textarea extends HTMLElement 
{
    public function __construct($name, $content = '', $attributes = []) 
    {
        parent::__construct('textarea', array_merge($attributes, [
            'name' => $name
        ]), $content);
    }
}