<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Biblioteca virtual Pedro</title>
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/css/fontawesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/css/owl.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/css/templatemo-sixteen.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/libs/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        <script>
            const BOOK_ID = "<?= $viewPath['args']['id'] ?>"
            const BASE_URL = "<?= $_SERVER['APP_BASE_URL'] ?>";
        </script>
        <script src="https://unpkg.com/vue@next"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/libs/js/jquery.js"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/libs/js/bootstrap.min.js"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/js/book.js"></script>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <div id="book" style="padding-top: 97px">
            <div class="container">
                <div class="row">
                    <div class="section-heading mb-3 col-md-12">
                        <h2>{{ book.titulo }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Editorial:</strong> <span>{{ book.editorial }}</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Genero:</strong> <span>{{ book.genero }}</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Autor:</strong> <span>{{ book.autor }}</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Pais:</strong> <span>{{ book.pais }}</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Num paginas:</strong> <span>{{ book.nPaginas }}</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Precio:</strong> <span>{{ book.precio }} &euro;</span></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
