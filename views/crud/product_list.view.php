<?php 

// vue qui affiche la liste des produits
// Path: views/crud/product_list.view.php

echo '<pre>';
var_dump($products);
echo '</pre>';

?>

<h1>Liste des produits</h1>

<a href="index.php?controller=catalogue&action=create">Créer un produit</a>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>image</th>
            <th>category</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product->getId(); ?></td>
            <td><?= $product->getName(); ?></td>
            <td><?= $product->getDescription(); ?></td>
            <td><?= $product->getPrice(); ?></td>
            <td><?= $product->getImage(); ?></td>
            <td><?= $product->getCategory(); ?></td>
            <td>
                <a href="index.php?controller=catalogue&action=edit&id=<?= $product->getId(); ?>">Modifier</a>
                <a href="index.php?controller=catalogue&action=delete&id=<?= $product->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>