<?php if(isset($post)): ?>
    <article class="post-outer model-widget" onclick="window.location='post.php?postID=<?= $post[ENTRY_ID] ?>'">
        <header>
            <h2><?= $post[ENTRY_TITLE] ?? ''; ?></h2>
            <span>Autor: <?= $post[ENTRY_USER_NAME] ?? 'Anonymous'; ?></span><br/>
            <span>Fecha publicaci&oacute;n: <?= $post[ENTRY_DATE] ?? date('d/m/Y'); ?> </span>
        </header>
    </article>
<?php endif; ?>