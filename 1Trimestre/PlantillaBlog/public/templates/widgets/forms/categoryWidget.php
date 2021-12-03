<div class="widget">
    <h2 class="title">Categor&iacute;as</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="GET">
        <input id="category-btn" type="submit" value="Filtrar" />
        <div class="category-div">
            <?php $filteredCategory = $_GET['category'] ?? '' ; ?>
            <?php foreach ($CATEGORIAS as $key => $value) : ?>
                <label class="category-field">
                    <input type="radio" name="category" id="categoria_<?= $key ?>" value="<?= $key ?>" <?=($key == $filteredCategory) ? 'checked' : ''; ?>/>
                    <?= $value ?>
                </label>
            <?php endforeach; ?>
        </div>
    </form>
</div>