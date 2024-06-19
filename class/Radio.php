<?php
namespace App\Class;
use App\Class\HTMLElement;

class Radio extends HTMLElement 
{
    public function __construct($name, $value = '', $checked = false, $attributes = []) 
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