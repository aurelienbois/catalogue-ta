<?php
$title = 'Accueil';
ob_start(); // start c'est comme une banane dans le pot d'échappement de PHP
?>

<h1>Catalogue de produits</h1>

<?php foreach ($products as $product): ?>
    <div class="product">
        <h2><?= $product->getName() ?></h2>
        <p><?= $product->getDescription() ?></p>
        <p>Prix: <?= $product->getPrice() ?>€</p>
        <img src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
        <p>Catégorie: <?= $product->getCategory() ?></p>
    </div>
<?php endforeach; ?>

<?php
$content = ob_get_clean(); // clean c'est comme retirer la banane du pot d'échappement
require_once ('views/template.view.php');