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
            const BASE_URL = "<?= $_SERVER['APP_BASE_URL'] ?>";
        </script>
        <script src="https://unpkg.com/vue@next"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/libs/js/jquery.js"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/libs/js/bootstrap.min.js"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/js/books.js"></script>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <div id="books" style="padding-top: 97px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Latest Books</h2>
                        </div>
                    </div>
                    <div  class="col-md-4" v-for="book in latestBooks" :key="book.id" v-bind:id="'book-'+book.id">
                        <div class="product-item">
                            <div class="down-content">
                                <a :href="'<?= $_SERVER['APP_BASE_URL'] ?>/moveTo/book.php?id='+book.id"><h4>{{book.titulo}}</h4></a>
                                <h6>{{book.precio}}&euro;</h6>
                                <p>Autor: {{book.autor}}<br/>Editorial: {{book.editorial}}</p>
                                <span>{{book.genero}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/books.php'; ?>">view all books <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
