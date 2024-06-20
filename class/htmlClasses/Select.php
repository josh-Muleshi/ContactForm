<?php
namespace App\Class\htmlClasses;
use App\Class\htmlClasses\HTMLElement;

class Select extends HTMLElement 
{
    private $options = [];

    public function __construct($name, $options = [], $attributes = []) 
    {
        parent::__construct('select', array_merge($attributes, [
            'name' => $name
        ]), null);
        $this->options = $options;
    }

    public function render(): string 
    {
        $optionsHTML = '';
        foreach ($this->options as $value => $text) {
            $optionsHTML .= "<option value=\"$value\">$text</option>";
        }
        return "<{$this->tag}{$this->getAttributes()}>{$optionsHTML}</{$this->tag}>";
    }
}