
<?php
include_once 'ClaseDb.php';

class Anunciantes{

    private $id_anuncio;
    private $autor;
    private $moroso;
    private $direccion;
    private $descripcion;
    private $fecha;

    public function __construct($id_anuncio, $autor, $moroso, $direccion, $descripcion, $fecha){
        $this->id_anuncio = $id_anuncio;
        $this->autor = $autor;
        $this->moroso = $moroso;
        $this->direccion = $direccion;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
    }

    public function getId_anuncio(){
        return $this->id_anuncio;
    }

    public function setId_anuncio($id_anuncio){
        $this->id_anuncio = $id_anuncio;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getMoroso(){
        return $this->moroso;
    }

    public function setMoroso($moroso){
        $this->moroso = $moroso;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function insertarAnuncio(){
        $conexion = new ClaseDb();
        $con = $conexion->conexion();
        $sql = "INSERT INTO anuncios (id_anuncio, autor, moroso, direccion, descripcion, fecha) VALUES (?,?,?,?,?,?)";
        $consulta = $con->prepare($sql);
        $consulta->bindParam(1, $this->id_anuncio);
        $consulta->bindParam(2, $this->autor);
        $consulta->bindParam(3, $this->moroso);
        $consulta->bindParam(4, $this->direccion);
        $consulta->bindParam(5, $this->descripcion);
        $consulta->bindParam(6, $this->fecha);
        $consulta->execute();
    }


}

