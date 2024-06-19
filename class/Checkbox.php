<?php

namespace App\Class;
use App\Class\HTMLElement;

class Checkbox extends HTMLElement 
{
    public function __construct(private string $name, private string $value = '', private bool $checked = false, array $attributes = []) 
    {
        parent::__construct('input', array_merge($attributes, [
            'type' => 'checkbox',
            'name' => $name,
            'value' => $value
        ]), null);
        
        if ($checked) $this->attributes['checked'] = 'checked';
    }

    public function render(): string 
    {
        return "<{$this->tag}{$this->getAttributes()} />";
    }
}