<?php
use src\domain\ViewConstants;
?>
<div class="widget">
    <h2 class="title">Make a new category</h2>
    <form action="<?= $_SERVER['APP_BASE_URL'] . '/CategoriasController/doCategoryNewPost'; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="category-name">Category Name:</label><br />
        <input id="category-name" type="text" name="name" value="" /><br />
        
        <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_CATEGORY_NEW]['others'])): ?>
            <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_CATEGORY_NEW]['others'] ?? ''; ?></p>
        <?php endif; ?>

        <input id="new-category-btn" type="submit" value="Save" />
    </form>
</div>