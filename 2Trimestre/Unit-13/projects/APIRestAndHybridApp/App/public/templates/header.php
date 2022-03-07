<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <h2>Biblioteca virtual <em>Pedro</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="<?= ($viewPath['url'] == 'home.php') ? 'nav-item active' : 'nav-item' ?>">
                        <a class="nav-link" href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/home.php'; ?>">Home</a>
                    </li>
                    <li class="<?= ($viewPath['url'] == 'books.php') ? 'nav-item active' : 'nav-item' ?>">
                        <a class="nav-link" href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/books.php'; ?>">Libros</a>
                    </li>
                    <li class="<?= (($viewPath['url'] == 'user.php') || ($viewPath['url'] == '/user/list.php')) ? 'nav-item active' : 'nav-item' ?>">
                        <a class="nav-link" href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/user.php'; ?>">Usuarios</a>
                    </li>
                    <li class="<?= ($viewPath['url'] == 'new-prestamo.php') ? 'nav-item active' : 'nav-item' ?>">
                        <a class="nav-link" href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/new-prestamo.php'; ?>">Realizar Prestamo</a>
                    </li>
                    <li class="<?= ($viewPath['url'] == 'new-user.php') ? 'nav-item active' : 'nav-item' ?>">
                        <a class="nav-link" href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/new-user.php'; ?>">Nuevo Usuario</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>