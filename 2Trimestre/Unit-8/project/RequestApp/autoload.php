<?php 

function autoloadDir($dir = __DIR__.'/src') {
    $files = glob("$dir/*");
    foreach ($files as $file) {
        if (is_dir($file)) {
            autoloadDir($file);
        } else {
            if (preg_match('/\.php/', $file)) {
                include_once($file);
            }
        }
    }
}

spl_autoload_register(function($class) {
    autoloadDir();
});