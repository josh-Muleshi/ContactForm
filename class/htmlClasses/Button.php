<?php
namespace App\Class\htmlClasses;
use App\Class\htmlClasses\HTMLElement;

class Button extends HTMLElement 
{
    public function __construct(string $type, string $content, array $attributes = []) 
    {
        parent::__construct('button', array_merge($attributes, [
            'type' => $type
        ]), $content);
    }
}