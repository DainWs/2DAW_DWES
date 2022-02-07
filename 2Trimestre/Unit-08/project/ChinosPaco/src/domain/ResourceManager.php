<?php 

namespace src\domain;

/**
 * This class is the main manager for resource location,
 * this class too supports upload files methods
 */
class ResourceManager {
    /**
     * The server basePath
     * @var String $basePath
     */
    private String $basePath;

    public function __construct() {
        $this->basePath = $_SERVER['APP_BASE_PATH'];
    }

    /**
     * This method will upload a file to the specific $destinationPath inside the server
     * Importan!! this $destinationPath must be relative
     * @param Array $file the array of file data
     * @param String $destinationPath the specific relative path
     * @return bool true if was correct, false otherwise
     */
    public function upload($file, $destinationPath): bool {
        $dirRef = "$this->basePath/$destinationPath";

        if (!file_exists($dirRef)) {
            mkdir($dirRef, 0755);
        }

        return move_uploaded_file($file['tmp_name'], "$dirRef/" . $file['name']);
    }
}
