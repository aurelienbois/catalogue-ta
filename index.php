<?php

// activer les messages d'erreur
ini_set('display_errors', 1); // utile pour les développeurs
ini_set('display_startup_errors', 1); // utile pour les développeurs
error_reporting(E_ALL);

$url = explode(
    '/', // séparateur
    filter_var( // nettoyage
        $_SERVER['REQUEST_URI'], // url
        FILTER_SANITIZE_URL // nettoyage
    )
);

$lastUrl = end($url); // on récupère le dernier élément du tableau

$map = [
    'accueil' => ['accueil', 'accueil', ''],
    'Blog' => ['Blog', 'lire', ''],
    'addProduct' => ['Blog', 'addProduct', ''],
    'editProduct' => ['Blog', 'editProduct', $lastUrl],
    'deleteProduct' => ['Blog', 'deleteProduct', $lastUrl],
    '' => ['accueil', 'accueil', ''],
];

if (is_numeric($lastUrl)) {
    $controller = 'Blog';
    $action = 'lire';
    $id = $lastUrl;
} elseif (isset($map[$lastUrl])) {
    list($controller, $action, $id) = $map[$lastUrl];
} else {
    $controller = 'accueil';
    $action = 'accueil';
    $id = '';
}

// routeur
switch ($controller) {
    case 'accueil':
        require_once 'views/accueil.view.php';
        break;
    case 'Blog':
        require_once 'controllers/Blog.controller.php';
        $BlogController = new BlogController();
        switch ($action) {
            case 'lire':
                $BlogController->displayProducts();
                break;
            case 'addProduct':
                $BlogController->create();
                break;
            case 'editProduct':
                $BlogController->edit($id);
                break;
            case 'deleteProduct':
                $BlogController->delete($id);
                break;
            case 'storeProduct':
                $BlogController->store();
                break;
            case 'updateProduct':
                $BlogController->update($id);
                break;
        }
        break;
    default:
        require_once 'views/accueil.view.php'; // page par défaut
}