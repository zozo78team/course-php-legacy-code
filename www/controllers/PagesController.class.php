<?php declare(strict_types = 1);

namespace Controllers;
use Core\View;

class PagesController
{

    public function defaultAction()
    {


        $v = new View("homepage", "back");
        $v->assign("pseudo", "prof");
    }


}