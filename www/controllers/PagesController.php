<?php declare(strict_types = 1);

namespace Controllers;
use Core\View;

class PagesController
{

    public function defaultAction(): void
    {
        $v = new View("homepage", "back");
        $v->assign("pseudo", "prof");
    }


}