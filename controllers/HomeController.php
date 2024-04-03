<?php

namespace Controllers;

require "../vendor/autoload.php";

use RedBeanPHP\R;
use function bin\setup;

class HomeController extends \Controllers\BaseController
{
    private $zephyr;
    protected array $recipes;

    public function __construct($zephyr)
    {
        setup();
        $this->zephyr = $zephyr;
        $this->recipes = R::findAll('home');
    }

    public function index(string $Page = "home/index.twig")
    {
        $recipes = $this->recipes;
        $this->zephyr->displaytemplate($Page, ['home' => $recipes]);
    }

    public function contact(string $Page = "home/contact.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

    public function show(string $Page = "home/show.twig")
    {
        if (!isset($_GET['id'])) {
            $this->zephyr->error('404.twig', ['message' => "No recipe ID specified!"]);
            return;
        }
        $result = R::findOne("home", ' id = ? ', [$_GET['id']]);
        $kitchen = R::findOne('registers', 'id = ?', [$result->kitchens_id]);
        if (isset($result)) {
            $this->zephyr->displaytemplate($Page, ['Kitchen' => $kitchen->name, 'data' => $result]);
        } else {
            $this->zephyr->error('404.twig', ['message' => "No recipe Found!"]);
        }
    }

    public function create(string $Page = "home/create.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

    public function createPost()
    {
        $kitchen = R::findOne('registers', 'name = ?', [$_POST['Kitchen']]);
        $recipe = R::dispense('home');
        $recipe->name = $_POST['Name'];
        $recipe->type = $_POST['Type'];
        $recipe->level = $_POST['Level'];
        $kitchen->ownRecipeList[] = $recipe;
        R::store($kitchen);
        header("Location: ../recipe");
        exit();
    }

    public function edit(string $Page = "home/edit.twig")
    {
        $recipe = R::findOne('home', 'id = ?', [$_GET['id']]);
        $this->zephyr->displaytemplate($Page, ['Name' => $recipe->name, 'Type' => $recipe->type, 'id' => $recipe->id, 'Level' => $recipe->level]);
    }

    public function editPost()
    {
        $kitchen = R::findOne('registers', 'name = ?', [$_POST['Kitchen']]);
        $recipe = R::findOne('home', 'id = ?', [$_POST['id']]);
        $recipe->name = $_POST['Name'];
        $recipe->type = $_POST['Type'];
        $recipe->level = $_POST['Level'];
        $kitchen->ownRecipeList[] = $recipe;
        R::store($kitchen);
        header("Location: ../show/?id=" . $_POST['id']);
        exit();
    }
}