<?php

use \Slim\Slim as Slim;
use Illuminate\Database\Capsule\Manager as Capsule;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

date_default_timezone_set('America/Sao_Paulo');

$app = new Slim();

session_start();

// Make a new connection
if (file_exists(ROOT . 'config' . DS . 'database.config.php')) {
    $capsule = new Capsule;
    $capsule->addConnection(include ROOT . "config" . DS . 'database.config.php');
    $capsule->bootEloquent();
    $capsule->setAsGlobal();
    $app->db = $capsule;
} else {
    die("<pre>Rename 'config/database.config.php.install' to 'config/database.config.php' and configure your connection</pre>");
}

$app->config(array(
    "templates.path" => TEMPLATEDIR,
));

/**

 * Load all libs

 */

foreach (glob(realpath(dirname(__DIR__)) . DS . 'app' . DS . 'view' . DS . '*.php') as $filename) {
    require_once $filename;

}
