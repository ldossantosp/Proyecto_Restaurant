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

    public function RealizarReserva($params, $nroMesa, $cedulaCliente)
    {
        $fecha = $params['fechaReserva'];
        $turno = $params['turno'];
        $cantPersonas = $params['cantidad'];

        $sql = "INSERT into Reserva (CiCliente, Fecha, NroMesa, Turno) values ('$cedulaCliente', '$fecha', '$nroMesa' , '$turno')";
      
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

    public function MisReservas($cedula)
    {
        $sql = "SELECT * FROM Reserva, Mesa where CICliente = '$cedula' and Fecha >='".date("Y-m-d")."' and Nro = NroMesa";
        
        return $this->db->query($sql);
    }

    public function removeReserva($cedula, $turno, $fecha)
    {
        $turno = urldecode($turno);
        $sql = "DELETE FROM Reserva Where CICliente = '$cedula' and Fecha = '$fecha' and Turno = '$turno'";
    
        $this->db->query($sql);
    }

    public function affected_rows()
    {
        return $this->db->affected_rows;
    }

    public function obtenerIdCompraActual($cedula)
    {
        $sql = "SELECT IdCompra FROM Asociada, Compra where CICliente = '$cedula' and 
        Id=IdCompra and Fecha='" . date("Y-m-d")."' and Paga='No'";
        return $this->db->query($sql);
    }

    public function generarCompra(){
        $sql = "INSERT into Compra (Forma_pago, Total, Paga) values ('Efectivo', 0, 'No')";
        $this->db->query($sql);
      
        return mysqli_insert_id($this->db);
    }

    public function obtenerReservaActual($cedula)
    {
        $sql = "SELECT * From Reserva Where Fecha='". date("Y-m-d")."' and CiCliente
        ='". $cedula. "'";
        return $this->db->query($sql);
    }

    public function AsociarClienteCompra($reserva, $idCompra)
    {
        $CiCLiente = $reserva->CiCliente;
        $fecha = $reserva->Fecha;
        $turno = $reserva->Turno;
        $sql = "INSERT into Asociada (CICliente, Fecha, Turno, IdCompra) values 
        ('$CiCLiente', '$fecha', '$turno', '$idCompra')";
        return $this->db->query($sql);
    }

    public function GenerarPedido($cedula, $params, $idCompra)
    {
        $idPlato = $params['idPlato'];
        $cantidad = $params['cantidad'];
        $obs = $params['obs'];

        //obtener chef de la Base
        $result = $this->obtenerChefActual();
        $row = $result->fetch_assoc();
        $ciChef = $row['CIChef'];

        //obtener el mesero de la Base
        $result = $this->obtenerMeseroActual();
        $row = $result->fetch_assoc();
        $ciMesero = $row['CIMesero']; 

        //obtener precio de plato
        $result =$this->obtenerPrecioPlato($idPlato);
        $row = $result->fetch_assoc();
        $precio = $row['Precio']; 
       
        $subtotal = $cantidad * $precio;

        $sql = "INSERT into Pide (CiCliente, IdPlato, CIChef, Cantidad, Estado,
        Observaciones, CIMesero, IdCompra, SubTotal) values ('$cedula', '$idPlato',
        '$ciChef', '$cantidad', 'Esperando', '$obs', '$ciMesero', '$idCompra', '$subtotal')";

        
        $result = $this->db->query($sql);
        $this->ActualizarCompra($cedula);
        return $result;
    }

    public function obtenerChefActual()
    {
        $sql = "SELECT CIChef from Chef";
        return $this->db->query($sql);
    }

    public function obtenerMeseroActual()
    {
        $sql = "SELECT CIMesero from Mesero";
        return $this->db->query($sql);
    }

    public function obtenerPrecioPlato($idPlato)
    {
        $sql = "SELECT Precio From Plato Where Id='$idPlato'";
        return $this->db->query($sql);
    }

    public function ActualizarCompra($cedula)
    {
        $sql = "SELECT * FROM Pide p, Asociada a, Compra c 
        Where c.Id = a.IdCompra and a.CICliente = p.CICliente and 
        p.CICliente = '{$cedula}' and c.Paga='No' and a.Fecha ='".date("Y-m-d")."'";

        $result = $this->db->query($sql); 
        $total = 0;

        while ($row = $result->fetch_assoc())
        {
            $subtotal = $row['SubTotal'];
            $total = $total + $subtotal;
            $idCompra = $row['Id'];
        }

        $sql = "UPDATE Compra SET Total= '{$total}' where Id='{$idCompra}'";
        $this->db->query($sql);
    }

    public function MiPedido($cedula)
    {
        $sql = "SELECT * FROM Pide p, Asociada a, Compra c, Plato plato 
                Where c.Id = a.IdCompra and a.CICliente = p.CICliente and 
                p.CICliente = '{$cedula}' and c.Paga='No' and a.Fecha ='".date("Y-m-d")."'
                and plato.Id = p.IdPlato";
             
        return $this->db->query($sql);        
    }
}