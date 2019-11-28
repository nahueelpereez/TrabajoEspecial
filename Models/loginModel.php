<?php

class UsuarioModel{

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=futarg;charset=utf8', 'root', '');
    }

    /**
     * Retorna un usuario según el email pasado.
     */
    public function getByUsername($email) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute(array($email));

        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    public function guardarUsuario($email, $hash) {
        $query = $this->db->prepare('INSERT INTO usuario(email, contraseña) VALUES(?,?)');
        $query->execute([$email, $hash]);
        
        return $this->db->lastInsertId();
    }
}
