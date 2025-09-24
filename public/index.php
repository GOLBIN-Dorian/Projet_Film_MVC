<?php

/**
 * Front Controller - Point d'entrée de l'application
 * Route les requêtes vers les bons contrôleurs
 */

// Configuration des erreurs pour le développement
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrage de la session pour les messages
session_start();

// Inclusion du contrôleur des films et genres
require_once __DIR__ . '/../src/controllers/filmController.php';
require_once __DIR__ .'/../src/controllers/genreController.php';

// Récupération de l'action demandée
$action = $_GET['action'] ?? 'index';

$routes = [
    'index' => [
        'fonction' => 'indexFilms', 
        'methodes' => ['GET']
],
    'show' => [
        'fonction' => 'shoFilm',
        'methodes' => ['GET']
],
    'create' => [
        'fonction' => 'createFilm',
        'methodes' => ['GET', 'POST']
],
    'edit' => [
        'fonction' => 'editFilms', 
        'methodes' => ['GET', 'POST']
],
    'delete' => [
        'fonction' => 'deleteFilms', 
        'methodes' => ['GET']
],
    'search' => [
        'fonction' => 'searchFilms',
        'methodes' => ['GET']
],
    'liste_genres' => [
        'fonction' => 'listeGenres',
        'methodes' => ['GET']
],
];

// Routage des actions - les contrôleurs gèrent leurs propres paramètres
$route_name = array_keys($routes);
if (in_array($action, $route_name)) {
    $route = $routes[$action];
    if (in_array($_SERVER['REQUEST_METHOD'], $route['methodes'])) {
        $fonction = $route['fonction'];
        $fonction(); 
    } else {
        http_response_code(405);
        echo "Méthode non autorisée pour cette action.Méthode autorisé pour cette action . $route[methodes]";
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

    


