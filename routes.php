<?php
Core\Router::connect('/webacademie_sem2/PiePHP/', ['controller' => 'Movies', 'action' => 'movies']);
Core\Router::connect('/webacademie_sem2/PiePHP/User', ['controller' => 'User', 'action' => 'index']);
Core\Router::connect('/webacademie_sem2/PiePHP/User/add', ['controller' => 'User', 'action' => 'add']);

// REGISTER
Core\Router::connect('/webacademie_sem2/PiePHP/User/register', ['controller' => 'User', 'action' => 'register']);

// LOGIN
Core\Router::connect('/webacademie_sem2/PiePHP/User/login', ['controller' => 'User', 'action' => 'login']);
Core\Router::connect('/webacademie_sem2/PiePHP/User/log', ['controller' => 'User', 'action' => 'log']);
Core\Router::connect('/webacademie_sem2/PiePHP/User/logout', ['controller' => 'User', 'action' => 'logout']);

// PARAM PROFIL
Core\Router::connect('/webacademie_sem2/PiePHP/User/update?email', ['controller' => 'User', 'action' => 'update']);
Core\Router::connect('/webacademie_sem2/PiePHP/User/update?pseudo', ['controller' => 'User', 'action' => 'pseudo']);
Core\Router::connect('/webacademie_sem2/PiePHP/User/update?password', ['controller' => 'User', 'action' => 'password']);
Core\Router::connect('/webacademie_sem2/PiePHP/User/delete', ['controller' => 'User', 'action' => 'delete']);

// MOVIES
Core\Router::connect('/webacademie_sem2/PiePHP/movies', ['controller' => 'Movies', 'action' => 'movies']);
foreach ($_GET as $key => $value) {
Core\Router::connect('/webacademie_sem2/PiePHP/movies/resum?id='.$value, ['controller' => 'Movies', 'action' => 'resum']);
}
Core\Router::connect('/webacademie_sem2/PiePHP/add/movies', ['controller' => 'Movies', 'action' => 'addmovies']);
Core\Router::connect('/webacademie_sem2/PiePHP/add/film', ['controller' => 'Movies', 'action' => 'addfilm']);
Core\Router::connect('/webacademie_sem2/PiePHP/delete/film', ['controller' => 'Movies', 'action' => 'deleteMovie']);
Core\Router::connect('/webacademie_sem2/PiePHP/movie/delete', ['controller' => 'Movies', 'action' => 'delete']);


Core\Router::connect('/webacademie_sem2/PiePHP/genre', ['controller' => 'Genre', 'action' => 'test']);