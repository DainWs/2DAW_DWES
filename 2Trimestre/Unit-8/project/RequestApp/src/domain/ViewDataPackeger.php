<?php
namespace src\domain;

use src\domain\packages\HomePackager;
use src\domain\packages\ProductPackager;

class ViewDataPackager {
    private const PACKAGERS = [
        'home.php' => HomePackager::class,
        'product.php' => ProductPackager::class 
    ];

    public static function pakageDataFor($viewPath): Array {
        preg_match('/(?:[^\/]*)?[^\/]*\.php/', $viewPath, $view);
        return (new (SELF::PACKAGERS[$view[0]]))->getData();
    }
}