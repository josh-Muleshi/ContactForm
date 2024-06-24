<?php
namespace App\Class\htmlClasses;
use App\Class\htmlClasses\HTMLElement;

class Table extends HTMLElement 
{
    private array $rows = [];

    public function __construct(array $attributes = []) 
    {
        parent::__construct('table', $attributes, null);
    }

    public function addRow(array $row): void 
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