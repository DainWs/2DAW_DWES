<?php

class Configuration
{
    private static $imagePath;

    /**
     * Get the value of imagePath
     */ 
    public static function getImagePath() {
        return self::$imagePath;
    }

    /**
     * Set the value of imagePath
     *
     * @return self
     */ 
    public static function setImagePath($imagePath)
    {
        self::$imagePath = $imagePath;
    }
}