<?php if(isset($post)): ?>
    <article class="post-outer">
        <header>
            <h2><?= $post[ENTRY_TITLE] ?? ''; ?></h2>
            <span>Autor: <?= $post[ENTRY_USER_NAME] ?? 'Anonymous'; ?></span><br/>
            <span>Fecha publicaci&oacute;n: <?= $post[ENTRY_DATE] ?? date('d/m/Y'); ?> </span>
        </header>
        <main>
            <?= $post[ENTRY_DESCRIPTION] ?? ''; ?>
        </main>
        <footer>
            <?php if (isset($post[ENTRY_CATEGORY_NAME])) : ?>
                <span>Categor&iacute;a: <a class="category-tag" href="categorias.php?category=<?= $post[ENTRY_CATEGORY_NAME] ?>"> <?= $post[ENTRY_CATEGORY_NAME] ?> </a></span>
            <?php endif; ?>
        </footer>
    </article>
<?php endif; ?>