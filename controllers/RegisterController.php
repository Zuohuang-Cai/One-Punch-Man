<?php

namespace Controllers;

require "../vendor/autoload.php";

use RedBeanPHP\R;
use function bin\setup;

class RegisterController extends \Controllers\BaseController
{
    private $zephyr;
    protected array $kitchens;

    public function __construct($zephyr)
    {
        setup();
        $this->zephyr = $zephyr;
        $this->kitchens = R::findAll('registers');
    }

    public function index(string $Page = "registers/index.twig")
    {
        $this->zephyr->displaytemplate($Page, ["data" => $this->kitchens]);
    }

    public function show(string $Page = "registers/show.twig")
    {
        if (!isset($_GET['id'])) {
            $this->zephyr->error('404.twig', ['message' => "No recipe ID specified!"]);
            return;
        }
        $result = $this->getBeanById("registers", $_GET['id']);
        $recipes = R::findAll('home', 'kitchens_id = ?', [$_GET['id']]);
        if (isset($result)) {
            $this->zephyr->displaytemplate($Page, ['data' => $result, 'home' => $recipes]);
        } else {
            $this->zephyr->error('404.twig', ['message' => "No recipe Found!"]);
        }
    }

    public function create(string $Page = "registers/create.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

    public function createPost()
    {
        $recipe = R::dispense('registers');
        $recipe->name = $_POST['Name'];
        $recipe->description = $_POST['Description'];
        R::store($recipe);
        header("Location: ../kitchen");
        exit();
    }

    public function edit(string $Page = "registers/edit.twig")
    {
        $recipe = R::findOne('registers', 'id = ?', [$_GET['id']]);
        $this->zephyr->displaytemplate($Page, ['Name' => $recipe->name, 'Description' => $recipe->description, 'id' => $recipe->id]);
    }

    public function editPost()
    {
        $recipe = R::findOne('registers', 'id = ?', [$_POST['id']]);
        $recipe->name = $_POST['Name'];
        $recipe->description = $_POST['Description'];
        R::store($recipe);
        header("Location: ../show/?id=" . $_POST['id']);
        exit();
    }

}