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
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/public/assets/js/newUser.js"></script>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <div id="new-user" style="padding-top: 97px">
            <div class="container">
                <form class="well form-horizontal" id="contact_form">
                    <div style="text-align: -webkit-center;">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>
                                <center>
                                    <h2>
                                        <b>Registration Form</b>
                                    </h2>
                                </center>
                            </legend><br>

                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label text-left" >DNI/Passport</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input name="dni" placeholder="DNI/Passport" v-model="dni" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">First Name</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input name="first_name" placeholder="First Name" v-model="firstName" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Last Name</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input name="last_name" placeholder="Last Name" v-model="lastName" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Date input-->

                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Birthday</label>
                                <div class="col-md-4 selectContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input name="birthday" placeholder="Birthday 01/01/2002" v-model="birthday" class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Domicile</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-envelope"></i>
                                        </span>
                                        <input name="domicile" placeholder="Domicile" v-model="domicile" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Population</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-envelope"></i>
                                        </span>
                                        <input name="population" placeholder="Population"  v-model="population" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label text-left">Province</label>
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-envelope"></i>
                                        </span>
                                        <input name="province" placeholder="Province" v-model="province" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4"><br>
                                    <input type="button" class="btn btn-warning" @click="save" value="SUBMIT"/>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
