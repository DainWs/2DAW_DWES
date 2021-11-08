<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <label for="file">file:</label><br />
            <input type="file" id="file" name="file" value="<?= $_FILES['file'] ?? '' ?>"><br />

            <input type="submit" value="Submit">
        </form>
        <?php
            if (isset($_FILES['file'])) {
                if (!file_exists('upload')) {
                    mkdir('upload', 0755);
                }
                
                $result = move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$_FILES['file']['name']);

                if ($result) {
                    $fileStream = fopen('upload/'.$_FILES['file']['name'], 'r');
                    do {
                        $line = fgets($fileStream);
                        if ($line !== false) {
                            echo htmlspecialchars("$line");
                            echo "<br/>";
                        }
                    } while ($line !== false);
                    fclose($fileStream);
                }

                $handle = opendir('upload');
                if ($handle) {
                    echo "<br/><br/>";
                    echo "Dir Content:";
                    echo "<ul style=\"margin: 0;\">";
                    while(($entry = readdir($handle)) !== FALSE) {
                        echo "<li>$entry</li>";
                    }
                    echo "</ul>";
                }
            }
        ?>
    </body>
</html>