<?php

class Usuario
{
    private int $id;
    private String $nombre;
    private String $apellidos;
    private String $email;
    private String $password;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->nombre = $data['nombre'];
        $this->apellidos = $data['apellidos'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    /**
     * Get the value of id
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id 
     */
    public function setId(int $id): void {
        $this->id = $id; 
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): String {
        return $this->nombre;
    }

    /**
     * Set the value of nombre 
     */
    public function setNombre(String $nombre): void {
        $this->nombre = $nombre; 
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos(): String {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos 
     */
    public function setApellidos(String $apellidos): void {
        $this->apellidos = $apellidos; 
    }

    /**
     * Get the value of email
     */
    public function getEmail(): String {
        return $this->email;
    }

    /**
     * Set the value of email 
     */
    public function setEmail(String $email): void {
        $this->email = $email; 
    }

    /**
     * Get the value of password
     */
    public function getPassword(): String {
        return $this->password;
    }

    /**
     * Set the value of password 
     */
    public function setPassword(String $password): void {
        $this->password = $password; 
    }

    public static function proccess(Array $data) {
        $result = [];
        foreach ($data as $key => $value) {
            array_push($result, new Usuario($value));
        }
    }
}
