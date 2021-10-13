<?php

class PlatoModel extends Model
{
    public function __construct()
    {
        parent:: __construct();
    }


    public function PlatosList()
    {
        $sql = 'SELECT * FROM Plato';
        return $this->db->query($sql);
    }

    public function PlatoList($id)
    {
        $sql ="SELECT * FROM Plato WHERE Id ='{$id}'";
        
        return $this->db->query($sql);
    }

    public function PlatoFotos($id)
    {
        $sql = "SELECT  * FROM PlatoFoto WHERE IdPlato = '{$id}'";
        return $this->db->query($sql);
    }


    public function addPlato($params)
    {
        $nombre = $params['Nombre'];
        $precio = $params['Precio'];
        $descripcion = $params['Descripcion'];
        $sql = "INSERT INTO Plato (Nombre, Precio, Descripcion) VALUES ('$nombre', '$precio', '$descripcion')";
        if($this->db->query($sql))
            return $this->addImagenPlato($params['Imagen'], mysqli_insert_id($this->db));
    }

    public function addImagenPlato($params, $idPlato)
    {
        if($params['size'] < 5000000){
            if($params['type'] == 'image/jpg' || $params['type'] == 'image/png' ||
            $params['type'] == 'image/jpeg' || $params['type'] == 'image/gif'){
                //mueve la imagen de la carpeta temporal del servidor a la carpeta destino
                move_uploaded_file($params['tmp_name'], PATH_UPLOAD_IMAGES.$params['name']);
                $nombreImagen = $params['name'];
                $sql = "INSERT INTO PlatoFoto (IdPlato, Foto) VALUES ('$idPlato', '$nombreImagen')";
                return $this->db->query($sql);
            }
        }
    }

    public function removeFotoPlato($nombreFoto){
        $sql ="DELETE FROM PlatoFoto WHERE Foto='{$nombreFoto}'";
        return $this->db->query($sql);
    }

    public function updatePlato($params)
    {
            $nombre = $params['Nombre'];
            $precio = $params['Precio'];
            $descripcion = $params['Descripcion'];
            $id = $params['id'];

            $sql = "UPDATE Plato SET Descripcion='{$descripcion}', Precio='{$precio}', Nombre='{$nombre}' WHERE Id='{$id}'";
            return $this->db->query($sql);

    }

    public function removePlato($id)
    {
        $nombre = str_replace("%C3%B1","ñ",$nombre);
        $nombre = str_replace("%C3%91","ñ",$nombre);
        $nombre = str_replace("%20"," ",$nombre);
        //elimina las fotos del plato
        $sql = "DELETE FROM PlatoFoto where IdPlato={$id}";
        $this->db->query($sql);

        $sql ="DELETE FROM Plato WHERE Id='{$id}'";
        return $this->db->query($sql);
    }
}