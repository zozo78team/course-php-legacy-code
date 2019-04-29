<?php

use Core\Routing;

require "conf.inc.php";

function myAutoloader($class)
{
    $classname = substr($class,strpos($class,'\\') + 1);
    $classPath = "core/" . $classname . ".class.php";
    $classModel = "models/" . $classname . ".class.php";
    if (file_exists($classPath)) {
        require $classPath;
    } else if (file_exists($classModel)) {
        require $classModel;
    }
}

// La fonction myAutoloader est lancé sur la classe appelée n'est pas trouvée
spl_autoload_register("myAutoloader");

// Récupération des paramètres dans l'url - Routing
$slug = explode("?", $_SERVER["REQUEST_URI"])[0];
$routes = Routing::getRoute($slug);
extract($routes);

// Vérifie l'existence du fichier et de la classe pour charger le controlleur
if (file_exists($cPath)) {
    include $cPath;
    if (class_exists($c)) {
        //instancier dynamiquement le controller
        $cObject = new $c();
        //vérifier que la méthode (l'action) existe
        if (method_exists($cObject, $a)) {
            //appel dynamique de la méthode
            $cObject->$a();
        } else {
            die("La methode " . $a . " n'existe pas");
        }

    } else {
        die("La class controller " . $c . " n'existe pas");
    }
} else {
    die("Le fichier controller " . $c . " n'existe pas");
}
