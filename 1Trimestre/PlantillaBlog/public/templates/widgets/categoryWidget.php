<div class="widget">
    <h2 class="title">Categor&iacute;s</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="GET">
        <input id="category-btn" type="submit" value="Filtrar" />
        <?php $filteredCategory = $_GET['category'] ?? '' ; ?>
        <?php foreach ($CATEGORIAS as $key => $value) : ?>
            <input type="radio" name="category" id="categoria_<?= $key ?>" value="<?= $value ?>" <?=($value == $filteredCategory) ? 'checked' : ''; ?>/>
            <label for="categoria_<?= $key ?>"><?= $value ?></label>
            <br/>
        <?php endforeach; ?>
    </form>
</div>