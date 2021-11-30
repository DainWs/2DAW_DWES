<?php if(isset($entry)): ?>
    <article class="entry-outer">
        <header>
            <h2><?= $entry[ENTRY_TITLE] ?? ''; ?></h2>
            <span>Autor: <?= $entry[ENTRY_USER_NAME] ?? 'Anonymous'; ?></span><br/>
            <span>Fecha publicaci&oacute;n: <?= date(DATE_FORMAT, strtotime($entry[ENTRY_DATE])); ?> </span>
        </header>
        <main>
            <?= $entry[ENTRY_DESCRIPTION] ?? ''; ?>
        </main>
        <footer>
            <?php if (isset($entry[ENTRY_CATEGORY_NAME])) : ?>
                <span>Categor&iacute;a: <a class="category-tag" href="categorias.php?category=<?= $entry[ENTRY_CATEGORY_NAME] ?>"> <?= $entry[ENTRY_CATEGORY_NAME] ?> </a></span>
            <?php endif; ?>
        </footer>
    </article>
<?php endif; ?>