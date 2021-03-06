<div class="widget">
    <h2 class="title"><?= traduce('Make a new category'); ?></h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="category-name"><?= traduce('Category Name'); ?>:</label><br />
        <input id="category-name" type="text" name="name" value="" /><br />
        
        <?php if(isset($DATA['errors'][SUBMIT_TYPE_NEW_CATEGORY]['others'])): ?>
            <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_NEW_CATEGORY]['others'] ?? ''); ?></p>
        <?php endif; ?>

        <input id="new-category-btn" type="submit" value="<?= traduce('Save'); ?>" />
        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_NEW_CATEGORY ?>" />
    </form>
</div>