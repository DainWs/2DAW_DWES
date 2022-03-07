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
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/js/users.js"></script>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <div id="users" style="padding-top: 97px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading mb-3">
                            <h2>Users details</h2>
                            <form class="well form-horizontal" method="post">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Select a user</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <select class="form-control ds-input" name="user_id" v-model="selectedId" @change="selectUser">
                                                <option v-for="user in users" :key="user.id" :value="user.id">{{user.nombre}} {{user.apellidos}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div v-if="selectedUser != undefined" class="container">
                        <h3>{{selectedUser.nombre}} {{selectedUser.apellidos}}</h3>
                        <div class="section-heading mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="m-0"><strong>DNI:</strong> <span>{{selectedUser.dni}}</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Direcci&oacute;n:</strong> <span>{{selectedUser.provincia}}, {{selectedUser.poblacion}}, {{selectedUser.domicilio}}</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Fecha de nacimiento:</strong> <span>{{selectedUser.birthday }}</span></p>
                                </div>
                            </div>
                        </div>
                        <h3  class="col-md-12">Prestamos del usuario</h3>
                        <div class="row">
                            <div class="col-md-6" v-for="prestamo in selectedUser.prestamos" :key="prestamo.id" v-bind:id="'prestamo-'+prestamo.id">
                                <div class="product-item">
                                    <div class="down-content">
                                        <a :href="'<?= $_SERVER['APP_BASE_URL'] ?>/moveTo/book.php?id='+prestamo.libro.id"><h4>{{prestamo.libro.titulo}}</h4></a>
                                        <p class="m-0">Fecha de devoluci&oacute;n: <strong>{{ prestamo.returnDate }}</strong></p>
                                        <p class="m-0">Fecha en la que se presto el libro: <strong>{{ prestamo.completionDate }}</strong></p>
                                        <p class="m-0">Fecha maxima de devoluci&oacute;n: <strong>{{ prestamo.maxDelayDate }}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
