<?php if(isset($ENTRY)): ?>
    <article class="entry-outer">
        <header>
            <h2><?= $ENTRY[ENTRY_TITLE] ?? ''; ?></h2>
            <span>Autor: <?= $ENTRY[ENTRY_USER_NAME] ?? 'Anonymous'; ?></span><br/>
            <span>Fecha publicaci&oacute;n: <?= date(DATE_FORMAT, strtotime($ENTRY[ENTRY_DATE])); ?> </span>

            <?php if(hasSession()): ?>
                <form class="edit-buttom" action="entryEdit.php" method="GET">
                    <input type="hidden" name="entryID" value="<?= $ENTRY[ENTRY_ID] ?>"/>
                    <input type="submit" value="Edit"/>
                </form>
                <?php if($USER_SESSION[USER_ID] == $ENTRY[ENTRY_USER_ID]): ?>
                    <form class="delete-buttom" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="entryID" value="<?= $ENTRY[ENTRY_ID] ?>"/>
                        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_DELETE_ENTRY ?>" />
                        <input type="submit" value="Borrar"/>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </header>
        <main>
            <?= $ENTRY[ENTRY_DESCRIPTION] ?? ''; ?>
        </main>
        <footer>
            <?php if (isset($ENTRY[ENTRY_CATEGORY_NAME])) : ?>
                <span>Categor&iacute;a: <a class="category-tag" href="categorias.php?category=<?= $ENTRY[ENTRY_CATEGORY_NAME] ?>"> <?= $ENTRY[ENTRY_CATEGORY_NAME] ?> </a></span>
            <?php endif; ?>
        </footer>
    </article>
<?php endif; ?>