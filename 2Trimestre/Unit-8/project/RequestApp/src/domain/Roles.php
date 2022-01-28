<?php 

namespace src\domain;

class Roles {
    static Roles $ADMIN;
    static Roles $PROVEEDOR;
    static Roles $CLIENTE;
    static Roles $UNDEFINED;

    private $id;
    private $level;

    public function __construct(String $id, int $level) {
        $this->id = $id;
        $this->level = $level;
    }

    /**
     * Get the value of id
     */
    public function getId(): String {
        return $this->id;
    }

    /**
     * Get the value of level privilege
     */
    public function getLevel(): int {
        return $this->level;
    }

    public function isAllowedBy(Roles $rol): bool {
        return ($this->level >= $rol->level);
    }

    public static function getById($searchedId): ?Roles {
        return constant("SELF::$searchedId") ?? null;
    }
}

Roles::$ADMIN = new Roles('Admin', 0);
Roles::$PROVEEDOR = new Roles('Proveedor', 1);
Roles::$CLIENTE = new Roles('Cliente', 2);
Roles::$UNDEFINED = new Roles('Undefined', 3);
