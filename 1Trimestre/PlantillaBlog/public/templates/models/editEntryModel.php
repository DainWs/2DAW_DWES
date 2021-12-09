<article class="entry-outer">
    <main>
        <form action="<?= $_SERVER['PHP_SELF'] . ((!$IS_ENTRY_NEW) ? '?entryID=' . ($_POST['entryID'] ?? $ENTRY[ENTRY_ID]) : ''); ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
            <?php $submitType = (($IS_ENTRY_NEW) ? SUBMIT_TYPE_NEW_ENTRY : SUBMIT_TYPE_EDIT_ENTRY); ?>
            <div>
                <label for="entry-title"><?= traduce('Title'); ?>:</label><br />
                <input id="entry-title" type="text" name="title" value="<?= $_POST['title'] ?? $ENTRY[ENTRY_TITLE] ?? '' ?>" /><br />

                <?php if (isset($DATA['errors'][$submitType]['title'])) : ?>
                    <p class="error"><?= traduce($DATA['errors'][$submitType]['title'] ?? ''); ?></p>
                <?php endif; ?>
            </div>
            <div>
                <label for="entry-author"><?= traduce('Author'); ?>:</label><br />
                <select id="entry-author" name="author">
                    <?php $userID = $_POST['author'] ?? $ENTRY[ENTRY_USER_ID] ?? $USER_SESSION[USER_ID] ?>
                    <?php foreach ($USERS as $tmpUser) : ?>
                        <option value="<?= $tmpUser[USER_ID] ?>" <?= ($userID == $tmpUser[USER_ID]) ? 'selected' : '' ?>>
                            <?= $tmpUser[USER_NAME] . ' ' . ($tmpUser[USER_SURNAME] ?? '') ?>
                        </option>
                    <?php endforeach; ?>
                </select><br />

                <?php if (isset($DATA['errors'][$submitType]['author'])) : ?>
                    <p class="error"><?= traduce($DATA['errors'][$submitType]['author'] ?? ''); ?></p>
                <?php endif; ?>

            </div>
            <div>
                <label for="entry-category"><?= traduce('Category'); ?>:</label><br />
                <select id="entry-category" name="category">
                    <?php $categoryID = $_POST['category'] ?? $ENTRY[ENTRY_CATEGORY_ID] ?? 1 ?>
                    <?php foreach ($CATEGORIAS as $key => $value) : ?>
                        <option value="<?= $key ?>" <?= ($categoryID == $key) ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach; ?>
                </select><br />

                <?php if (isset($DATA['errors'][$submitType]['category'])) : ?>
                    <p class="error"><?= traduce($DATA['errors'][$submitType]['category'] ?? ''); ?></p>
                <?php endif; ?>
            </div>

            <div class="flex-grow textarea-div">
                <label for="entry-content"><?= traduce('Content'); ?> :</label>
                <textarea id="entry-content" name="content"><?= $_POST['content'] ?? $ENTRY[ENTRY_DESCRIPTION] ?? '' ?></textarea>
            </div>

            <?php if (isset($DATA['errors'][$submitType]['content'])) : ?>
                <p class="error"><?= traduce($DATA['errors'][$submitType]['content'] ?? ''); ?></p>
            <?php endif; ?>

            <?php if (isset($DATA['errors'][$submitType]['others'])) : ?>
                <p class="error"><?= traduce($DATA['errors'][$submitType]['others'] ?? ''); ?></p>
            <?php endif; ?>

            <input id="entry-modify" type="submit" value="<?= traduce('Save'); ?>" />
            <input class="normal" type="button" value="<?= traduce('Go back'); ?>" onclick="window.location='entry.php?entryID=<?= $entry[ENTRY_ID] ?>'"/>
            <?php if (!$IS_ENTRY_NEW) : ?>
                <input type="hidden" name="entryId" value="<?= $ENTRY[ENTRY_ID] ?>" />
            <?php endif; ?>
            <input type="hidden" name="submitType" value="<?= $submitType ?>" />
            <input type="hidden" name="isNewEntry" value="<?= ($IS_ENTRY_NEW) ? 'TRUE' : 'FALSE' ?>" />
        </form>
    </main>
</article>