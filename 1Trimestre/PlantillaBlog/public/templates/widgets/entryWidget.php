<?php if(isset($entry)): ?>
    <article class="entry-outer">
        <header>
            <h2><?= $entry[ENTRY_TITLE] ?? ''; ?></h2>
            <span><?= traduce('Author'); ?>: <?= $entry[ENTRY_USER_NAME] ?? traduce('Anonymous'); ?></span><br/>
            <span><?= traduce('Publication date'); ?>: <?= date(DATE_FORMAT, strtotime($entry[ENTRY_DATE])); ?> </span>
        </header>
        <main>
            <?= $entry[ENTRY_DESCRIPTION] ?? ''; ?>
        </main>
        <footer>
            <?php if (isset($entry[ENTRY_CATEGORY_NAME])) : ?>
                <span><?= traduce('Category'); ?>: <a class="category-tag" href="categorias.php?category=<?= $entry[ENTRY_CATEGORY_NAME] ?>"> <?= $entry[ENTRY_CATEGORY_NAME] ?> </a></span>
            <?php endif; ?>
        </footer>
    </article>
<?php endif; ?>