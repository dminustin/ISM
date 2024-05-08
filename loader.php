<?php
spl_autoload_register(
    function ($class) {
        $fileName = dirname(__FILE__) . '/' . str_replace(['App\\', '\\',], ['src/', '/',], $class) . '.php';
        if (!file_exists($fileName)) {
            throw new Exception('File ' . $fileName . ' does not exist');
        }

        require_once $fileName;
    });