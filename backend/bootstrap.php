<?php

// CORS HEADERS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");


error_reporting(E_ALL);
ini_set('display_errors', 1);

$prod = false;

// Setup Slim
require  'vendor/autoload.php';

$app = new \Slim\Slim(array(
        'debug'          =>true,
        'templates.path' => 'app/view/'
)); 

$host  = '';
$db    = '';
$usr   = '';
$pass  = '';

// Ambient
if($prod)
{
    // Setup URL
    define("ROOT", "https://" .  $_SERVER['HTTP_HOST'] . "/backend/");
    define("ROOT_ADMIN", "https://" .  $_SERVER['HTTP_HOST'] . "/backend/app/");

    $host  = 'localhost';
    $db    = 'fagron';
    $usr   = 'root';
    $pass  = 'root';
}

if(!$prod)
{
    // Setup URL
    define("ROOT", "http://" .  $_SERVER['HTTP_HOST'] . "/backend/");
    define("ROOT_ADMIN", "http://" .  $_SERVER['HTTP_HOST'] . "/backend/app/");

    $host  = 'localhost';
    $db    = 'fagron';
    $usr   = 'root';
    $pass  = 'root';
}


date_default_timezone_set("America/Sao_Paulo");

$settings = array(
    'driver'    => 'mysql',
    'host'      => $host,
    'database'  => $db,
    'username'  => $usr,
    'password'  => $pass,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
    'strict'    => false
);


use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection( $settings );
$capsule->bootEloquent();

/* Imports */

// Models
require  'app/model/AppModel.php';

// Controller
require  'app/controller/AppController.php';
require  'app/controller/ApiAuth.php';
require  'app/controller/ApiPoint.php';

// Rotas
require  'app/routes/SiteRoutes.php';









