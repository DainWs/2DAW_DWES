<?php if(isset($post)): ?>
    <article class="post-outer model compressed" onclick="window.location='post.php?postID=<?= $post[ENTRY_ID] ?>'">
        <h2><?= $post[ENTRY_TITLE] ?? ''; ?></h2>
        <span>Autor: <?= $post[ENTRY_USER_NAME] ?? 'Anonymous'; ?></span><br/>
        <span>Fecha publicaci&oacute;n: <?= date(DATE_FORMAT, strtotime($post[ENTRY_DATE])); ?> </span>
    </article>
<?php endif; ?>