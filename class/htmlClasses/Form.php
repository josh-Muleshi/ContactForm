<?php
namespace App\Class\htmlClasses;
use App\Class\htmlClasses\HTMLElement;

class Form extends HTMLElement 
{
    private array $elements = [];

    public function __construct(string $action, string $method = 'POST', array $attributes = []) 
    {
        parent::__construct('form', array_merge($attributes, [
            'action' => $action,
            'method' => $method,
            'enctype' => 'multipart/form-data'
        ]), null);
    }

    public function addElement(object $element): void
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