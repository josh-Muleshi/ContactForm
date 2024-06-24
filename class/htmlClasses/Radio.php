<?php
namespace App\Class\htmlClasses;
use App\Class\htmlClasses\HTMLElement;

class Radio extends HTMLElement 
{
    public function __construct(string $name, string $value = '', bool $checked = false, array $attributes = []) 
    {
        parent::__construct('input', array_merge($attributes, [
            'type' => 'radio',
            'name' => $name,
            'value' => $value
        ]), null);
        if ($checked) {
            $this->attributes['checked'] = 'checked';
        }
    }

    public function render(): string 
    {
        return "<{$this->tag}{$this->getAttributes()} />";
    }
}