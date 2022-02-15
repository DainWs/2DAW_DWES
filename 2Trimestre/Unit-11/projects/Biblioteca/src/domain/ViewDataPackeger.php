<?php
namespace App\domain;

use src\domain\packages\DataPackager;

/**
 * This class is used to build an Array of data that will be used in Views.
 */
abstract class ViewDataPackager {
    /**
     * Return the array of data Provided by the view packager
     * @param String $viewPath the route of the current view
     * @return Array the array of data provided by the view packager
     * @link \src\domain\packages\*
     */
    public static function pakageDataFor($viewPath): DataPackager {
        return Views::getViewByRoute($viewPath)->getPackager();
    }
}