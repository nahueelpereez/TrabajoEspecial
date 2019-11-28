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
        $query = $this->db->prepare('SELECT * FROM noticia WHERE id_notica = ?');
        $query->execute(array($idNoticia));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function borrar($idNoticia) {
        $query = $this->db->prepare('DELETE FROM noticia WHERE id_notica = ?');
        $query->execute([$idNoticia]); 
    }

   public function guardar($titulo, $fecha, $descripcion, $idEquipo) {
        $query = $this->db->prepare('INSERT INTO noticia(titulo, fecha, contenido, equipo) VALUES(?,?,?,?)');
        $query->execute([$titulo, $fecha, $descripcion, $idEquipo]);
        
        return $this->db->lastInsertId();
    }
    
    public function obtenerNombreEquipo() {
       $query = $this->db->prepare('SELECT n.*, e.nombre as nombre_equipo FROM noticia n JOIN equipo e  ON e.id_equipo = n.equipo');
       $query->execute();
       return $query->fetchAll(PDO::FETCH_OBJ);
      
    }
    
    public function editarNoticia($id_noticia, $fecha,$titulo, $descripcion){
        $sentencia = $this->db->prepare('UPDATE noticia SET titulo=?, fecha=?, descripcion=? WHERE id_noticia=?');
        $sentencia->execute(array($fecha, $titulo, $descripcion, $id_noticia));
        var_dump($sentencia);
    }

}
