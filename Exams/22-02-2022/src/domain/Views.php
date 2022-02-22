<?php 

namespace exam\src\domain;

use exam\src\domain\packages\HomePackager;

/**
 * This is an ENUM class, each object from this enum contains the route for the View and the Packager.
 * @link \exam\src\domain\packages\*
 */
class Views {
    static $HOME;

    private String $route;
    private $packagerClass;

    public function __construct(String $route, $packagerClass) {
        $this->route = $route;
        $this->packagerClass = $packagerClass;
    }

    /**
     * Get the value of route
     * @return String
     */
    public function getRoute(): String {
        return $this->route;
    }

    /**
     * Get the value of packager
     */
    public function getPackager() {
        return new ($this->packagerClass);
    }

    /**
     * Return a Views object that match the route string
     * @param String $route the route for of the View
     * @return ?Views the view enum or null if none were found
     */
    public static function getViewByRoute(String $route): ?Views {
        preg_match('/(?:[^\/]*\/)?([^\/\.]+)\.php/', $route, $routeId);
        $searchedRoute = $routeId[1];
        return Views::${strtoupper($searchedRoute)};
    }
}

Views::$HOME = new Views('home.php', HomePackager::class);