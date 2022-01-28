<?php
namespace src\domain;

class ViewDataPackager {
    public static function pakageDataFor($viewPath): Array {
        return Views::getViewByRoute($viewPath)->getPackager()->getData();
    }
}