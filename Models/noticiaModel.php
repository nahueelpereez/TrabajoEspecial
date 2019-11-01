<?php

class NoticiaModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=futarg;charset=utf8', 'root', '');
    }

    /**
     * Obtiene la lista de tareas dejando en primer lugar las que no fueron finalizadas.
     */
    public function getNoticias() {
        $query = $this->db->prepare('SELECT * FROM noticia ');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNoticia($idNoticia) {
        $query = $this->db->prepare('SELECT * FROM noticia WHERE id_noticia = ?');
        $query->execute(array($idNoticia));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function borrar($idNoticias) {
        $query = $this->db->prepare('DELETE FROM noticia WHERE id_noticia = ?');
        $query->execute([$idNoticia]); 
    }

    public function guardar($titulo, $fecha, $descripcion) {
        $query = $this->db->prepare('INSERT INTO noticia(titulo, fecha, contenido) VALUES(?,?,?)');
        $query->execute([$titulo, $fecha, $descripcion]);
        
        return $this->db->lastInsertId();
    }

}