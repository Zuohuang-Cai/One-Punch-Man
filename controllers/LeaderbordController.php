<?php

namespace Controllers;

require "../vendor/autoload.php";

use RedBeanPHP\R;
use function bin\setup;

class LeaderbordController extends \Controllers\BaseController
{
    private $zephyr;
    protected array $recipes;

    public function __construct($zephyr)
    {
        setup();
        $this->zephyr = $zephyr;
    }

    public function index(string $Page = "leaderbord/index.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

    public function show(string $Page = "leaderbord/show.twig")
    {

        $this->zephyr->displaytemplate($Page, ['hero_id' => $_GET['hero_id']]);
    }

}