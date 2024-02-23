<?php

namespace Controllers;

require "../vendor/autoload.php";

use RedBeanPHP\R;
use function bin\setup;

class AdminController extends \Controllers\BaseController
{
    private $zephyr;

    public function __construct($zephyr)
    {
        session_start();
        setup();
        $this->zephyr = $zephyr;
        if (!isset($_SESSION['user'])) {
            $this->zephyr->displaytemplate("admin/login.twig");
        }
    }

    public function index(string $Page = "admin/index.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

    public function login(string $Page = "admin/login.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

    public function search(string $Page = "admin/search.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

    public function fight($Page = "admin/fight.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

}