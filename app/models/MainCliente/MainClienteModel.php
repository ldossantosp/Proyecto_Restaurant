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

    public function RealizarReserva($params, $cedulaCliente)
    {
        $fecha = $params['fechaReserva'];
        $turno = $params['turno'];
        $cantPersonas = $params['cantidad'];

        $sql = "INSERT into Reserva (CiCliente, Fecha, NroMesa, Turno) values ('$cedulaCliente', '$fecha', '1' , '$turno')";
    
        return $this->db->query($sql);
    }

    public function obtenerMesasDisponibles($params)
    {

        $fecha = $params['fechaReserva'];
        $turno = $params['turno'];
        $cantPersonas = $params['cantidad'];

        $sql = "SELECT Nro FROM Mesa where Cant_Personas = '{$cantPersonas}'
                and Nro not in (SELECT NroMesa FROM Reserva where Fecha='{$fecha}' and Turno ='$turno')";
       
        return $this->db->query($sql);
    }

    public function affected_rows()
    {
        return $this->db->affected_rows;
    }
}