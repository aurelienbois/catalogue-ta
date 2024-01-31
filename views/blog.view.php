<?php
require_once ('models/Product.class.php');
ob_start();
?>
<h1>Liste de nos produits</h1>
<div class="allCards" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly; align-items: center; flex-direction: row;">
    <?php  foreach ($products as $p) { ?>
    <div class="card mb-5 ml-5" style="width: 600px;">
        <a href="#" class="post text-body text-decoration-none" style="display:flex;flex-direction:row;">
            <img src="<?= $p->getImage() ?>" alt="..." style="border-radius: 15px;">
            <div class="content">
                <div class="card-body">
                    <h5 class="card-title"><?= $p->getName() ?></h5>
                    <p class="card-text"><?= $p->getDescription() ?></p>
                    <p class="card-text">Prix: <?= $p->getPrice() ?>€</p>
                    <p class="card-text">Catégorie: <?= $p->getCategory() ?></p>
                </div>
            </div>
        </a>
    </div>
    <?php } ?>
</div>
<?php
$content = ob_get_clean();
require_once ('views/template.view.php');