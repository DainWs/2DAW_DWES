<?php if(isset($ENTRY)): ?>
    <article class="entry-outer">
        <main>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
                <label for="entry-title">T&iacute;tulo:</label><br />
                <input id="entry-title" type="text" name="title" value="<?= $_POST['title'] ?? $ENTRY[ENTRY_TITLE] ?? '' ?>" /><br />

                <label for="entry-author">Author:</label><br />
                <select id="entry-author" name="author">
                    <?php $userID = $_POST['author'] ?? $ENTRY[ENTRY_USER_ID] ?? 1 ?>
                    <?php foreach ($USERS as $tmpUser): ?>
                        <option value="<?= $tmpUser[USER_ID] ?>" <?= ($userID == $tmpUser[USER_ID]) ? 'selected' : '' ?>>
                            <?= $tmpUser[USER_NAME] . ' ' . $tmpUser[USER_SURNAME] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="entry-category">Category:</label><br />
                <select id="entry-category" name="category">
                    <?php $categoryID = $_POST['category'] ?? $ENTRY[ENTRY_CATEGORY_ID] ?? 1 ?>
                    <?php foreach ($CATEGORIAS as $tmpCategory): ?>
                        <option value="<?= $tmpCategory[CATEGORY_ID] ?>" <?= ($categoryID == $tmpCategory[CATEGORY_ID]) ? 'selected' : '' ?>>
                            <?= $tmpCategory[CATEGORY_NAME] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="entry-content">Contenido :</label><br />
                <textarea id="entry-content" name="content">
                    <?= $_POST['author'] ?? $ENTRY[ENTRY_USER_NAME] ?? '' ?>
                </textarea>

                <input id="entry-modify" type="submit" value="Guardar" />
                <input type="hidden" name="isNewEntry" value="<?= ($IS_ENTRY_NEW) ? 'TRUE' : 'FALSE' ?>" />
            </form>
        </main>
    </article>
<?php endif; ?>