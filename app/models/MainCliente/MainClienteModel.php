<?php

class MainClienteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
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