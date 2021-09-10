<?php
require_once realpath($_SERVER["DOCUMENT_ROOT"]) . '/TP2-Desarrollo-Sistema/configuracion/DataBase.php';
require_once realpath($_SERVER["DOCUMENT_ROOT"]) . '/TP2-Desarrollo-Sistema/modelo/Autor.php';
class Libro
{
    private $id;
    private $titulo;
    private $autor;
    private $idautor;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }
    public function getIdAutor()
    {
        return $this->idautor;
    }
    public function setIdAutor($idautor)
    {
        $this->idautor = $idautor;
    }
    public function getAutor()
    {
        if ($this->idautor != null) {
            $this->autor = Autor::BuscarAutor($this->idautor);
        }
        return $this->autor;
    }

    public static function BuscarListLibros()
    {
        $con = Database::getInstance();
        $sql = "SELECT * FROM libro";
        $listLibros = $con->db->prepare($sql);
        $listLibros->execute();
        $listLibros->setFetchMode(PDO::FETCH_CLASS, 'Libro');
        return $listLibros;
    }

    public function Agregar()
    {
        $con = Database::getInstance();
        $sql = "INSERT INTO libro (titulo,idautor) values(:p1,:p2)";
        $autor = $con->db->prepare($sql);
        $params = array("p1" => $this->titulo, "p2" => $this->idautor);
        $autor->execute($params);
    }
}
