<?php

namespace App\Class\htmlClasses;

abstract class HTMLElement
{
    public function __construct(
        protected string $tag, 
        protected array $attributes = [], 
        protected ?String $content
    ) {}

    protected function getAttributes(): string 
    {
        $result = '';
        foreach ($this->attributes as $key => $value) {
            $result .= " $key=\"$value\"";
        }
        return $result;
    }

    public function render(): string 
    {
        return "<{$this->tag}{$this->getAttributes()}>{$this->content}</{$this->tag}>";
    }
}