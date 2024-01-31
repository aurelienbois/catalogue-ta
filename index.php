<?php

// activer les messages d'erreur
ini_set('display_errors', 1); // utile pour les développeurs
ini_set('display_startup_errors', 1); // utile pour les développeurs
error_reporting(E_ALL);

$base = dirname($_SERVER['SCRIPT_NAME']);
if (substr($base, -1) === '/') {
    $base = substr($base, 0, -1);
}
define('BASE_URI', $base);

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
    'catalogue' => ['Catalogue', 'lire', ''],
    'addProduct' => ['Blog', 'addProduct', ''],
    'editProduct' => ['Blog', 'editProduct', $lastUrl],
    'deleteProduct' => ['Blog', 'deleteProduct', $lastUrl],
    '' => ['accueil', 'accueil', ''],
];

if (is_numeric($lastUrl)) {
    $controller = 'Catalogue';
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
    case 'Catalogue':
        require_once 'controllers/Catalogue.controller.php';
        $CatalogueController = new CatalogueController();
        switch ($action) {
            case 'lire':
                $CatalogueController->displayProducts();
                break;
            case 'addProduct':
                $CatalogueController->create();
                break;
            case 'editProduct':
                $CatalogueController->edit($id);
                break;
            case 'deleteProduct':
                $CatalogueController->delete($id);
                break;
            case 'storeProduct':
                $CatalogueController->store();
                break;
            case 'updateProduct':
                $CatalogueController->update($id);
                break;
        }
        break;
    default:
        require_once 'views/accueil.view.php'; // page par défaut
}