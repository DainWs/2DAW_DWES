<article class="entry-outer">
    <main>
        <form action="<?= $_SERVER['PHP_SELF'] . ((!$IS_ENTRY_NEW) ? '?entryID=' . ($_POST['entryID'] ?? $ENTRY[ENTRY_ID]) : ''); ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
            <?php $submitType = (($IS_ENTRY_NEW) ? SUBMIT_TYPE_NEW_ENTRY : SUBMIT_TYPE_EDIT_ENTRY); ?>
            <div>
                <label for="entry-title">T&iacute;tulo:</label><br />
                <input id="entry-title" type="text" name="title" value="<?= $_POST['title'] ?? $ENTRY[ENTRY_TITLE] ?? '' ?>" /><br />

                <?php if(isset($DATA['errors'][$submitType]['title'])): ?>
                    <p class="error"><?= $DATA['errors'][$submitType]['title'] ?? '' ?></p>
                <?php endif; ?>
            </div>
            <div>
                <label for="entry-author">Author:</label><br />
                <select id="entry-author" name="author">
                    <?php $userID = $_POST['author'] ?? $ENTRY[ENTRY_USER_ID] ?? 1 ?>
                    <?php foreach ($USERS as $tmpUser) : ?>
                        <option value="<?= $tmpUser[USER_ID] ?>" <?= ($userID == $tmpUser[USER_ID]) ? 'selected' : '' ?>>
                            <?= $tmpUser[USER_NAME] . ' ' . ($tmpUser[USER_SURNAME] ?? '') ?>
                        </option>
                    <?php endforeach; ?>
                </select><br />

                <?php if(isset($DATA['errors'][$submitType]['author'])): ?>
                    <p class="error"><?= $DATA['errors'][$submitType]['author'] ?? '' ?></p>
                <?php endif; ?>

            </div>
            <div>
                <label for="entry-category">Category:</label><br />
                <select id="entry-category" name="category">
                    <?php $categoryID = $_POST['category'] ?? $ENTRY[ENTRY_CATEGORY_ID] ?? 1 ?>
                    <?php foreach ($CATEGORIAS as $key => $value) : ?>
                        <option value="<?= $key ?>" <?= ($categoryID == $key) ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach; ?>
                </select><br />

                <?php if(isset($DATA['errors'][$submitType]['category'])): ?>
                    <p class="error"><?= $DATA['errors'][$submitType]['category'] ?? '' ?></p>
                <?php endif; ?>
            </div>

            <div class="flex-grow textarea-div">
                <label for="entry-content">Contenido :</label>
                <textarea id="entry-content" name="content"><?= $_POST['content'] ?? $ENTRY[ENTRY_DESCRIPTION] ?? '' ?></textarea>
            </div>

            <?php if(isset($DATA['errors'][$submitType]['content'])): ?>
                <p class="error"><?= $DATA['errors'][$submitType]['content'] ?? '' ?></p>
            <?php endif; ?>

            <?php if(isset($DATA['errors'][$submitType]['others'])): ?>
                <p class="error"><?= $DATA['errors'][$submitType]['others'] ?? '' ?></p>
            <?php endif; ?>

            <input id="entry-modify" type="submit" value="Guardar" />
            <?php if (!$IS_ENTRY_NEW) : ?>
                <input type="hidden" name="entryId" value="<?= $ENTRY[ENTRY_ID] ?>" />
            <?php endif; ?>
            <input type="hidden" name="submitType" value="<?= $submitType ?>" />
            <input type="hidden" name="isNewEntry" value="<?= ($IS_ENTRY_NEW) ? 'TRUE' : 'FALSE' ?>" />
        </form>
    </main>
</article>