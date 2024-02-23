<?php

namespace Controllers;

require_once '../vendor/autoload.php';

use RedBeanPHP\OODBBean;
use RedBeanPHP\R;
use function bin\setup;

class BaseController
{
    public function getBeanById($typeOfBean, $queryStringKey): ?OODBBean
    {
        return R::findOne($typeOfBean, ' id = ? ', [$queryStringKey]);
    }
    public function getheroinfo()
    {
        $heros = R::findAll('heros');
        return $heros;
    }
}