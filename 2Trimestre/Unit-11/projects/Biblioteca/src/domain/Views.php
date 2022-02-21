<?php 

namespace App\domain;

use App\domain\packages\BookPackager;
use App\domain\packages\DataPackager;
use App\domain\packages\HomePackager;
use App\domain\packages\PrestamoPackager;
use App\domain\packages\UserListPackager;
use App\domain\packages\UserNewPackager;
use App\domain\packages\UserPackager;

/**
 * This is an ENUM class, each object from this enum contains the route for the View,
 * the Roles and the Packager.
 * @link \src\domain\Roles
 * @link \src\domain\packages\*
 */
class Views {
    static $HOME;
    static $BOOKS;
    static $USERNEW;
    static $USERLIST;

    static $BOOK;
    static $USER;
    static $PRESTAMO;

    private String $route;
    private Roles $minLevel;
    private $packager;

    public function __construct(String $route, Roles $minLevel, $packager) {
        $this->route = $route;
        $this->minLevel = $minLevel;
        $this->packager = $packager;
    }

    /**
     * Get the value of route
     * @return String
     */
    public function getRoute(): String {
        return $this->route;
    }

    /**
     * Get the value of minLevel
     * @return Roles
     */
    public function getMinLevel(): Roles {
        return $this->minLevel;
    }

    /**
     * Get the value of packager
     */
    public function getPackager(): DataPackager {
        $packager = new ($this->packager);
        $packager->add('location', $this->route);
        return $packager;
    }

    /**
     * Return a Views object that match the route string
     * @param String $route the route for of the View
     * @return ?Views the view enum or null if none were found
     */
    public static function getViewByRoute(String $route): ?Views {
        preg_match('/(?:[^\/]*\/)?([^\/\.]+)/', $route, $routeId);
        $searchedRoute = $routeId[1];
        return Views::${strtoupper($searchedRoute)};
    }
}

Views::$HOME = new Views('/home', Roles::$UNDEFINED, HomePackager::class);
Views::$BOOKS = new Views('/books', Roles::$UNDEFINED, HomePackager::class);
Views::$USERNEW = new Views('/usernew', Roles::$UNDEFINED, UserNewPackager::class);
Views::$USERLIST = new Views('/userlist', Roles::$UNDEFINED, UserListPackager::class);

Views::$BOOK = new Views('/book', Roles::$UNDEFINED, BookPackager::class);
Views::$USER = new Views('/user', Roles::$UNDEFINED, UserPackager::class);
Views::$PRESTAMO = new Views('/prestamo', Roles::$UNDEFINED, PrestamoPackager::class);