<?php 

namespace src\domain;

use ReflectionClass;

class Roles {
    static Roles $ADMIN;
    static Roles $PROVEEDOR;
    static Roles $CLIENTE;
    static Roles $UNDEFINED;

    private string $id;
    private int $level;

    public function __construct(String $id, int $level) {
        $this->id = $id;
        $this->level = $level;
    }

    /**
     * Get the value of id
     * @return String
     */
    public function getId(): String {
        return $this->id;
    }

    /**
     * Get the value of level privilege
     * @return int
     */
    public function getLevel(): int {
        return $this->level;
    }

    /**
     * check if the privilege level is greater than other rol
     * @return bool
     */
    public function isAllowedBy(Roles $rol): bool {
        return ($this->level <= $rol->level);
    }

    /**
     * Search a rol identified by an id
     * @return Roles if the role is found
     * @return Null if the role is not found
     */
    public static function getById($searchedId): ?Roles {
        return Roles::${strtoupper($searchedId)};
    }

    /**
     * @return Array of all roles
     */
    public static function getRoles(): Array {
        $class = new ReflectionClass(Roles::class);
        $arr = $class->getStaticProperties();
        var_dump($arr);
        return $arr;
    }
}

Roles::$ADMIN = new Roles('Admin', 0);
Roles::$PROVEEDOR = new Roles('Proveedor', 1);
Roles::$CLIENTE = new Roles('Cliente', 2);
Roles::$UNDEFINED = new Roles('Undefined', 3);
