<?php

use \Slim\Slim as Slim;

function allPets()
{
    $app = Slim::getInstance();
    return $app->render('admin/index.php', ["pets" => PetController::list()]);
}

function createView()
{
    $app = Slim::getInstance();
    return $app->render('admin/criar.php', ["orgs" => Org::get()->toArray(), "breeds" => Breed::get()->toArray()]);
}

function updateView($id)
{
    $app = Slim::getInstance();
    return $app->render('admin/editar.php', ["pet" => Pet::find($id), "orgs" => Org::get()->toArray(), "breeds" => Breed::get()->toArray()]);
}

function create()
{
    $app = Slim::getInstance();
    $data = (array) $app->request()->params();

    PetController::save($data);

    $app->redirect('/admin');
}

function update($id)
{
    $app = Slim::getInstance();
    $data = (array) $app->request()->params();

    PetController::save($data, $id);

    $app->redirect('/admin');
}

function delete($id)
{
    $app = Slim::getInstance();
    return PetController::delete($id);
}
