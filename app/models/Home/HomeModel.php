<?php

class HomeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addCliente($params)
    {
        $CI = $params['Cedula'];
        $Nombre = $params['Nombre'];
        $Password = $params['Password'];
        $Direccion = $params['Direccion'];
        $sql = "INSERT INTO Cliente (CI, Nombre, Password, Direccion) VALUES ('{$CI}', '{$Nombre}', '{$Password}', '{$Direccion}')";
     
        return $this->db->query($sql);
    }

    public function affected_rows()
    {
        return $this->db->affected_rows;
    }

    public function listarInfoPlatos()
    {
        $sql = "SELECT * FROM Plato";
        return $this->db->query($sql);
    }

    public function ListarFotosPlato($Id)
    {
      $sql = "SELECT Foto FROM PlatoFoto where IdPlato ='{$Id}'";
      return $this->db->query($sql);
    }
  



}