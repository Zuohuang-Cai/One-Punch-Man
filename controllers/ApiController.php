<?php

namespace Controllers;

require __DIR__ . "/../vendor/autoload.php";

use RedBeanPHP\R;
use function model\hero\CreateHero;
use function bin\setup;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class ApiController
{
    private $zephyr;
    protected array $recipes;

    public function __construct($zephyr)
    {
        setup();
        $this->zephyr = $zephyr;
    }

    public function Physicals()
    {
        return [
            "power" => random_int(1, 1000),
            "agility" => random_int(1, 1000),
            "mana" => random_int(1, 1000),
            "control" => random_int(1, 1000),
            "armor" => random_int(1, 1000)
        ];
    }

    public function testfield(string $Page = "test.twig")
    {
        $this->zephyr->displaytemplate($Page);
    }

    public function GetPowerByid()
    {
        $info = R::findAll("powers", ' heros_id = ? ', [$_GET['hero_id']]);
        $this->zephyr->displayApi($info);
    }

    public function GetHerobyID()
    {
        $info = R::findOne("heros", ' id = ? ', [$_GET['hero_id']]);
        $this->zephyr->displayApi($info);
    }

    public function GetAllHeros()
    {
//        $heroes = R::findAll("heros", " ORDER BY id DESC");
        $heros = R::getAll('SELECT heros .*, physical.cambatpoint FROM heros INNER JOIN physical ON physical.id = heros.physical_id ORDER BY cambatpoint DESC');
        $this->zephyr->displayApi($heros);
    }

    public function HowMuchHeros()
    {
        $this->zephyr->displayApi(R::count("heros"));
    }

    public function HeroEloPlus()
    {
        $hero = R::findOne("heros", ' id = ? ', [$_GET['hero_id']]);
        $hero->elo = $hero->elo + $_GET['point'];
        R::store($hero);
    }

    public function HeroEloDiminish()
    {
        $hero = R::findOne("heros", ' id = ? ', [$_GET['hero_id']]);
        $hero->elo = $hero->elo - $_GET['point'];
        R::store($hero);
    }

    public function GetAllInfoAboutHeroById()
    {
        $info = R::findOne("heros", ' id = ? ', [$_GET['hero_id']]);
        $physical = R::findOne("physical", ' id = ? ', [$_GET['hero_id']]);
        $history = R::findOne("history", ' heros_id = ? ', [$_GET['hero_id']]);
        $powers = R::findOne("powers", ' heros_id = ? ', [$_GET['hero_id']]);
        $this->zephyr->displayApi([
            "info" => $info,
            "physical" => $physical,
            "history" => $history,
            "powers" => $powers
        ]);
    }

    public function GetHeroPhysicalbyid()
    {
        $info = R::findOne("heros", ' id = ? ', [$_GET['hero_id']]);
        $this->zephyr->displayApi($info->physical);
    }

    public function AddPowerById()
    {
        $info = R::findOne("heros", ' id = ? ', [$_GET['hero_id']]);
        $powers = R::dispense('powers');
        $powers->description = $_GET["powerdescription"];
        $powers->powername = $_GET["powername"];
        $info->ownRelationList[] = $powers;
        R::store($info);
        header("Location: /home");
    }

    public function GetAllHeroPhysicals()
    {
        $heros = R::findAll("heros");
        $physicals = [];
        foreach ($heros as $hero) {
            $physicals[] = $hero->physical;
        }
        $this->zephyr->displayApi($physicals);
    }

    public function UpdateHeroByIdPost()
    {
        $hero = R::findOne("heros", ' id = ? ', [$_POST['hero_id']]);
        $hero->image = $_POST["image"];
        $hero->name = $_POST["name"];
        $hero->backgroundimage = $_POST["backgroundimage"];
        $hero->nickname = $_POST["nickname"];
        $hero->background = $_POST["background"];
        $hero->age = $_POST["age"];
        $hero->email = $_POST["email"];
        R::store($hero);
        header("Location: /home");
    }

    public function checklogPost()
    {
        session_start();
        $user = R::findOne("admins", ' username = ? AND password = ? ', [$_POST['username'], $_POST['password']]);
        if ($user) {
            $_SESSION['user'] = $user;
            session_write_close();
        } else {
            $this->zephyr->displaytemplate("admin/login.twig", ["message" => "Wrong username or password"]);
        }
        header("Location: /admin");
    }

    public function CreateHeroPost()
    {
        $hero = R::dispense('heros');
        $physical = R::dispense('physical');
        $history = R::dispense('history');
        $powers = R::dispense('powers');
        $powers->powername = $_POST["powername"];
        $powers->description = $_POST["powerdescription"];
        $physical->power = $this->Physicals()["power"];
        $physical->agility = $this->Physicals()["agility"];
        $physical->mana = $this->Physicals()["mana"];
        $physical->control = $this->Physicals()["control"];
        $physical->armor = $this->Physicals()["armor"];
        $physical->cambatpoint = floor($this->Physicals()["agility"] + $this->Physicals()["armor"] + $this->Physicals()["power"] * ($this->Physicals()["mana"] + $this->Physicals()["control"]) / 2);
        $history->description = $_POST["heroHistoryInfo"];
        $hero->image = $_POST["image"];
        $hero->ownRelationList[] = $history;
        $hero->ownRelationList[] = $powers;
        $hero->physical = $physical;
        $hero->name = $_POST["name"];
        $hero->backgroundimage = $_POST["backgroundimage"];
        $hero->nickname = $_POST["nickname"];
        $hero->background = $_POST["background"];
        $hero->age = $_POST["age"];
        $hero->email = $_POST["email"];
        $hero->elo = 0;
        R::store($hero);
        header("Location: /home");
    }

    public function DeleteHeroByid()
    {
        $hero = R::findOne("heros", ' id = ? ', [$_GET['hero_id']]);
        $physical = R::findOne("physical", ' id = ? ', [$_GET['hero_id']]);
        $history = R::findOne("history", ' heros_id = ? ', [$hero->id]);
        R::trash($history);
        R::trash($physical);
        R::trash($hero);
        header("Location: /home");
    }
}