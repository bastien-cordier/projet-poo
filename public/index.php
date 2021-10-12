<?php 

use Router\Router;
use App\Exceptions\NotFoundException;
require '../vendor/autoload.php';

    // INFORMATION DE LA BASE DE DONNÉES
    define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
    define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
    define('DB_NAME', 'ipssi_projet-poo');
    define('DB_HOST', 'localhost:8889');
    define('DB_USER', 'root');
    define('DB_PWD', 'root');

    $router = new Router($_GET['url']);

    // ROUTES DE TOUS LES CONTROLLERS
    $router->get('/', 'App\Controllers\AnimalsController@welcome');
    $router->get('/animals', 'App\Controllers\AnimalsController@index');
    $router->get('/animals/:id', 'App\Controllers\AnimalsController@show');
    $router->get('/tags/:id', 'App\Controllers\AnimalsController@tag');

    $router->get('/login', 'App\Controllers\UserController@login');
    $router->post('/login', 'App\Controllers\UserController@loginPost');
    $router->get('/logout', 'App\Controllers\UserController@logout');

    $router->get('/admin/animals', 'App\Controllers\Admin\AnimalController@index');
    $router->get('/admin/animals/create', 'App\Controllers\Admin\AnimalController@create');
    $router->post('/admin/animals/create', 'App\Controllers\Admin\AnimalController@createAnimal');
    $router->post('/admin/animals/delete/:id', 'App\Controllers\Admin\AnimalController@destroy');
    $router->get('/admin/animals/edit/:id', 'App\Controllers\Admin\AnimalController@edit');
    $router->post('/admin/animals/edit/:id', 'App\Controllers\Admin\AnimalController@update');

    // RETOURNER UNE ERREUR 404 SI L'URL N'EST PAS BONNE
    try {
        $router->run();
    } catch (NotFoundException $e) {
        return $e->error404();
    }
    
?>