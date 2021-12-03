<div class="widget">
    <form class="search-form" action="search.php" method="GET">
        <label for="search-field">Buscar:</label><br />
        <input id="search-field" type="text" name="entryName" value="<?= $_GET['entryName'] ?? '' ?>" />
        <input id="search-btn" type="submit" value="Buscar" />
    </form>
</div>