<?php
namespace App\Class\htmlClasses;
use App\Class\htmlClasses\HTMLElement;

class Input extends HTMLElement 
{
    public function __construct(private string $type, private string $name, private string $value = '', $attributes = []) 
    {
        parent::__construct('input', array_merge($attributes, [
            'type' => $type,
            'name' => $name,
            'value' => $value
        ]), null);
    }

    public function render(): string 
    {
        return "<{$this->tag}{$this->getAttributes()} />";
    }
}