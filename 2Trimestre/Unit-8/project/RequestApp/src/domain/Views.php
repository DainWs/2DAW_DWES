<?php 

namespace src\domain;

use src\domain\packages\HomePackager;
use src\domain\packages\CarritoPackager;
use src\domain\packages\ProductPackager;

class Views {
    static $HOME;
    static $CARRITO;
    static $PROFILE;
    static $PRODUCTOS;
    static $NEWUSER;
    static $EDITUSER;

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
        return new ($this->packager);
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
Views::$PRODUCTOS = new Views('productos.php', Roles::$PROVEEDOR, ProductPackager::class);
Views::$NEWUSER = new Views('newUser.php', Roles::$ADMIN, HomePackager::class);
Views::$EDITUSER = new Views('editUser.php', Roles::$ADMIN, HomePackager::class);