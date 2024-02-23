<?php

namespace Helpers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ZepHyr
{
    private $loader;
    private $views;

    function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        $this->loader = new FilesystemLoader('../views');
        $this->views = new Environment($this->loader);
    }

    public function displaytemplate(string $filename, array $variable = []): void
    {
        echo $this->views->render($filename, $variable);
        exit();
    }

    public function displayApi($string): void
    {
        header('Content-Type: application/json');
        echo json_encode($string);
        exit();
    }

    public function error(string $filename, array $variable = []): void
    {
        header("HTTP/1.0 404 Not Found");
        echo $this->views->render($filename, $variable);
        exit();
    }
}
