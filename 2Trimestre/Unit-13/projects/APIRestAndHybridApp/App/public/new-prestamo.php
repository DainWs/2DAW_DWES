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
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/js/newPrestamo.js"></script>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <div id="new-prestamo" style="padding-top: 97px">
            <div class="container">
                <form class="well form-horizontal" id="contact_form">
                    <div style="text-align: -webkit-center;">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>
                                <h2>
                                    <b>Prestamo</b>
                                </h2>
                            </legend><br>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Usuario:</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <select class="form-control ds-input" name="user_id" v-model="selectedUserId" @change="selectUser">
                                            <option v-for="user in users" :key="user.id" :value="user.id">{{user.nombre}} {{user.apellidos}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Libro:</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <select class="form-control ds-input" name="book_id" v-model="selectedBookId" @change="selectBook">
                                            <option v-for="book in books" :key="book.id" :value="book.id">{{book.titulo}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Fecha de entrega:</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input name="returnDate" v-model="returnDate" placeholder="Last Name" class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <!-- Date input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Fecha maxima de entrega:</label>
                                <div class="col-md-4 selectContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input name="maxDelayDate" v-model="maxDelayDate" placeholder="01/01/2002" class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label text-left"></label>
                                <div class="col-md-4"><br>
                                    <input type="button" class="btn btn-warning" @click="save" value="SUBMIT">
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
