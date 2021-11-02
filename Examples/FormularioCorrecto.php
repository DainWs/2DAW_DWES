<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Radio buttons</title>
        <style>
            input:invalid {
                background: lightcoral;
                color: white;
            }
        </style>
    </head>
    <body>
        <section>
            <article>
                <header>
                    <h1>Formularios</h1>
                </header>
                <form method="post" action="./FormularioCorrecto.php">
                    <div>
                        <label for="name">Nombre: </label>    
                        <input type="text" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>" required/>
                    </div>
                    
                    <div>
                        <label for="password">Contrase&ntilde;a: </label>
                        <input type="password" id="password" name="password" value="<?= $_POST['password'] ?? '' ?>" required/>
                    </div>
                    <br/>
                    <div>
                        <label for="email">Correo:</label>
                        <input type="email" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required/>
                    </div>

                    <div>
                        <label for="tel">Tel&eacute;fono:</label>
                        <input type="tel" id="tel" name="tel" pattern="(?:\+)?[0-9]{9}" value="<?= $_POST['tel'] ?? '' ?>"/>
                    </div>
                    <br/>
                    <fieldset>
                        <legend>Sexo</legend>
                        <div>
                            <input id="male" type="radio" name="sexo" value="male"/>
                            <label for="male">Male</label>
                        </div>
                        <div>
                            <input id="female" type="radio" name="sexo" value="female"/>
                            <label for="female">Female</label>
                        </div>
                        <div>
                            <input id="other" type="radio" name="sexo" value="other" checked/>
                            <label for="other">Other</label>
                        </div>
                    </fieldset>
                    <br/>
                    <fieldset>
                        <legend>Deportes favoritos</legend>
                        <div>
                            <input id="football" type="checkbox" name="sports[]" value="football"/>
                            <label for="football">F&uacute;tbol</label>
                        </div>
                        <div>
                            <input id="handball" type="checkbox" name="sports[]" value="handball"/>
                            <label for="handball">Bal&oacute;n mano</label>
                        </div>
                        <div>
                            <input id="baseball" type="checkbox" name="sports[]" value="baseball"/>
                            <label for="baseball">Basebol</label>
                        </div>
                    </fieldset>
                    <br/>
                    <div>
                        <label for="color">Color:</label>
                        <input type="color" id="color" name="color" value="<?= $_POST['color'] ?? '#000000' ?>"/>
                    </div>
                    <br/>
                    <div>
                        <label for="range">Altura:</label>
                        <input id="range" type="range" name="range" value="<?= $_POST['range'] ?? 0 ?>" min="0" max="5"/>
                    </div>
                    <br/>
                    <div>
                        <label for="edad">Edad:</label>
                        <input id="edad" type="number" name="edad" value="<?= $_POST['edad'] ?? 0 ?>" min="0" max="140"/>
                    </div>
                    <br/>
                    <div>
                        <label for="nacionalidad">Nacionalidad:</label>
                        <input id="nacionalidad" type="text" list="listaNacionalidad" name="nacionalidad" value="<?= $_POST['nacionalidad'] ?? "Espa&ntilde;a" ?>"/>
                        <datalist id="listaNacionalidad">
                            <object value="ES">Espa&ntilde;a</object>
                            <object value="EU">Estados Unidos</object>
                            <object value="FR">Francia</object>
                            <object value="CH">China</object>
                        </datalist>
                    </div>
                    <br/>
                    <div>
                        <label for="birthday">Fecha nacimiento:</label>
                        <input type="date" id="birthday" name="birthday" value="<?= $_POST['birthday'] ?? '01/01/1900' ?>"/>
                    </div>
                    <br/>
                    <div>
                        <label for="profileImg">Imagen de Perfil:</label>
                        <input type="file" id="profileImg" name="profileImg" value="<?= $_POST['profileImg'] ?? '' ?>"/>
                    </div>
                    <br/>
                    <div>
                        <input id="privacity" type="checkbox" name="privacity" value="privacity"/>
                        <label for="privacity">Aceptar <a>politicas de privacidad</a></label>
                    </div>
                    <br/>
                    <input type="submit" value="save"/>
                </form>
            </article>

            <article>
                <header>
                    <h1>Resultado Formularios</h1>
                </header>
                <p> <?php
                    foreach($_POST as $key => $value) {
                        if(is_array($value)) {
                            echo "$key = array { <br/>";
                            foreach($value as $key2 => $value2) {
                                echo "&nbsp;&nbsp;<b>$key2</b> = $value2 <br/>";    
                            }
                            echo "} <br/>";
                        }
                        else {
                            echo "<b>$key</b> = $value <br/>";
                        }
                        
                    }
                ?></p>

            </article>
        </section>
    </body>
</html>