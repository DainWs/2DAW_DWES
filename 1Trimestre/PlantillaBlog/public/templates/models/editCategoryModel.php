<article class="category-outer">
    <main>
        <form action="<?= $_SERVER['PHP_SELF'] . ((!$IS_CATEGORY_NEW) ? '?categoryID=' . ($_POST['categoryID'] ?? $CATEGORY[CATEGORY_ID]) : ''); ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
            <div>
                <label for="category-name">Category Name:</label><br />
                <input id="category-name" type="text" name="name" value="<?= $_POST['title'] ?? $CATEGORY[CATEGORY_NAME] ?? '' ?>" /><br />
            </div>

            <input id="category-modify" type="submit" value="Guardar" />
            <?php if (!$IS_CATEGORY_NEW) : ?>
                <input type="hidden" name="categoryId" value="<?= $CATEGORY[CATEGORY_ID] ?>" />
            <?php endif; ?>
            <input type="hidden" name="submitType" value="<?= ($IS_CATEGORY_NEW) ? SUBMIT_TYPE_NEW_CATEGORY : SUBMIT_TYPE_EDIT_CATEGORY ?>" />
            <input type="hidden" name="isNewCategory" value="<?= ($IS_CATEGORY_NEW) ? 'TRUE' : 'FALSE' ?>" />
        </form>
    </main>
</article>