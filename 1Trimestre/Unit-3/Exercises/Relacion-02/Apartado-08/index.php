<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            img {
                width: 100px;
                height: 100px;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <label for="file">Image:</label><br />
            <input type="file" id="file" name="file" value="<?= $_FILES['file'] ?? '' ?>"><br />

            <input type="submit" value="Submit">
        </form>
        <?php
            if (isset($_FILES['file'])) {
                if (!file_exists('upload')) {
                    mkdir('upload', 0755);
                }
                
                $type = $_FILES['file']['type'];
                $types = array('image/png', 'image/jpg');
                if (!in_array($type, $types)) {
                    echo "Error, the file uploaded isnt png or jpg image";
                    die;
                }

                $result = move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$_FILES['file']['name']);

                if ($result) {
                    $gestor = opendir('upload');
                    if ($gestor) {
                        echo "<br/><br/>";
                        echo "<h1>Contenido de la carpeta</h1>";
                        while(($file = readdir($gestor)) !== FALSE) {
                            if($file != '.' && $file != '..') {
                                echo "<img src=\"upload/$file\"/>";
                            }
                        }
                    }
                }
            }
        ?>
    </body>
</html>