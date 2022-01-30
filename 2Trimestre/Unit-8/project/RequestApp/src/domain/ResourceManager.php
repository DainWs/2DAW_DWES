<?php 

namespace src\domain;

class ResourceManager {
    private String $basePath;

    public function __construct() {
        $this->basePath = __DIR__;
    }

    public function upload($file, $destinationPath): bool {
        $dirRef = "$this->basePath/$destinationPath";

        if (!file_exists($dirRef)) {
            mkdir($dirRef, 0755);
        }

        return move_uploaded_file($file['tmp_name'], "$dirRef/" . $file['name']);
    }
}