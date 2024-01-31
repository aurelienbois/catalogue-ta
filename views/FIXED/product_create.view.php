<?php
ob_start()
    ?>

<div class="form-group">
    <label for="product_id">Identifiant du produit</label>
    <input type="text" class="form-control" id="product_id" name="product_id" required>
</div>
<div class="form-group">
    <label for="product_name">Nom du produit</label>
    <input type="text" class="form-control" id="product_name" name="product_name" required>
</div>
<div class="form-group">
    <label for="product_description">Description du produit</label>
    <textarea class="form-control" id="product_description" name="product_description" required></textarea>
</div>
<div class="form-group">
    <label for="product_price">Prix du produit</label>
    <input type="number" class="form-control" id="product_price" name="product_price" required>
</div>
<div class="form-group">
    <label for="product_image">Image du produit</label>
    <input type="file" class="form-control-file" id="product_image" name="product_image">
</div>
<div class="form-group">
    <label for="product_category">Catégorie du produit</label>
    <input type="text" class="form-control" id="product_category" name="product_category" required>
</div>
<button type="submit" class="btn btn-primary">Ajouter le produit</button>
</form>

<?php
$title = 'Ajouter un produit';
$content = ob_get_clean();
require_once 'template.php';
?>