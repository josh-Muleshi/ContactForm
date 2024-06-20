<?php
namespace App\Class\htmlClasses;
use App\Class\htmlClasses\HTMLElement;

class Table extends HTMLElement 
{
    private $rows = [];

    public function __construct($attributes = []) 
    {
        parent::__construct('table', $attributes, null);
    }

    public function addRow($row) 
    {
        $this->rows[] = $row;
    }

    public function render(): string 
    {
        $content = '';
        foreach ($this->rows as $row) {
            $content .= '<tr>';
            foreach ($row as $cell) {
                $content .= "<td>$cell</td>";
            }
            $content .= '</tr>';
        }
        return "<{$this->tag}{$this->getAttributes()}>{$content}</{$this->tag}>";
    }
}