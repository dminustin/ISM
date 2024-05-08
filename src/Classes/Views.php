<?php

namespace App\Classes;

class Views
{
    public static function view(string $template, array $params = [])
    {
        $filename = dirname(__FILE__) . '/../../views/' . $template . '.php';
        extract($params);
        require($filename);
    }
}