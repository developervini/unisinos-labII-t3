<?php

$app->group('/admin', function() use ($app){
    $app->get('/', 'allPets');
    $app->get('/criar', 'createView');
    $app->get('/editar/:id', 'updateView');
    $app->post('/save/:id', 'update');
	$app->post('/save', 'create');
	$app->delete('/delete/:id', 'delete');
});

$app->get('/:id', 'index');
$app->get('/', 'index');