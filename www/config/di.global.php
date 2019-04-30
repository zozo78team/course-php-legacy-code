<?php declare(strict_types = 1);


use Controllers\PagesController;
use Model\UserInterface;

return [
    UserInterface::class => function ($container) {
        $host = $container['config']['database']['host'];
        $driver = $container['config']['database']['driver'];
        $name = $container['config']['database']['name'];
        $user = $container['config']['database']['user'];
        $password = $container['config']['database']['password'];

        return new Users($host, $driver, $name, $user, $password);
    },
    UsersController::class => function ($container) {
        $userModel = $container[UserInterface::class]($container);
        return new UsersController($userModel);
    },
    PagesController::class => function ($container) {
        return new PagesController();
    }
];