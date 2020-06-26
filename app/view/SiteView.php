<?php

use \Slim\Slim as Slim;

function index($id = 0)
{
    $app = Slim::getInstance();
    $PetController = new PetController();

    $Pet = $PetController->all(intval($id));

    return $app->render('site/index.php', ["pet" => $Pet]);
}
