<?php
namespace App\Class;
use App\Class\HTMLElement;

class Form extends HTMLElement 
{
    private array $elements = [];

    public function __construct(private string $action, private string $method = 'POST', array $attributes = []) 
    {
        parent::__construct('form', array_merge($attributes, [
            'action' => $action,
            'method' => $method,
            'enctype' => 'multipart/form-data'
        ]), null);
    }

    public function addElement(object $element) 
    {
        $this->elements[] = $element;
    }

    public function render(): string 
    {
        $content = '';
        foreach ($this->elements as $element) {
            $content .= $element->render() . '<br><br>';
        }
        return "<{$this->tag}{$this->getAttributes()}>{$content}</{$this->tag}>";
    }
}