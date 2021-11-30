<?php if(isset($entry)): ?>
    <article class="entry-outer model compressed" onclick="window.location='entry.php?entryID=<?= $entry[ENTRY_ID] ?>'">
        <h2><?= $entry[ENTRY_TITLE] ?? ''; ?></h2>
        <span>Autor: <?= $entry[ENTRY_USER_NAME] ?? 'Anonymous'; ?></span><br/>
        <span>Fecha publicaci&oacute;n: <?= date(DATE_FORMAT, strtotime($entry[ENTRY_DATE])); ?> </span>
    </article>
<?php endif; ?>