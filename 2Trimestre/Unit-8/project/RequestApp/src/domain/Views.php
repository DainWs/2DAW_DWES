<?php 

namespace src\domain;

use src\domain\packages\HomePackager;

class Views {
    static $HOME;
    static $CARRITO;
    static $PROFILE;
    static $PRODUCT;
    static $NEW_USER;
    static $EDIT_USER;

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
    public function getPackager() {
        return new ($this->packager)();
    }

    public static function getViewByRoute(String $route): ?Views {
        preg_match('/(?:[^\/]*\/)?([^\/\.]+)\.php/', $route, $routeId);
        $searchedRoute = $routeId[1];
        return Views::${strtoupper($searchedRoute)};
    }
}

Views::$HOME = new Views('home.php', Roles::$UNDEFINED, HomePackager::class);
Views::$CARRITO = new Views('carrito.php', Roles::$UNDEFINED, CarritoPackager::class);
Views::$PROFILE = new Views('profile.php', Roles::$CLIENTE, HomePackager::class);
Views::$PRODUCT = new Views('product.php', Roles::$PROVEEDOR, ProductPackager::class);
Views::$NEW_USER = new Views('newUser.php', Roles::$ADMIN, HomePackager::class);
Views::$EDIT_USER = new Views('editUser.php', Roles::$ADMIN, HomePackager::class);