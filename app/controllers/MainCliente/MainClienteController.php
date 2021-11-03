<?php
require_once ROOT . FOLDER_PATH . '/app/models/MainCliente/MainClienteModel.php';
require_once LIBS_ROUTE . 'Session.php';

class MainClienteController extends Controller
{
    private $session;

    private $model;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->init();
        if($this->session->getStatus() === 1 || empty($this->session->get('cedula')))
            exit('Acceso Denegado');
        $this->model = new MainClienteModel();
    }

    public function exec()
    {
        $this->InfoPlatoFotos();
    }

    public function InfoPlatoFotos($message = '', $message_type= '')
    {
        $result = $this->model->listarInfoPlatos();
        $contador = 0;
        while($row = $result->fetch_assoc())
        {
            $info_plato[$contador][1] = $row['Id'];
            $info_plato[$contador][2] = $row['Nombre'];
            $info_plato[$contador][3] = $row['Descripcion'];
            $fotos = $this->model->ListarFotosPlato($row['Id']);
            $info_plato[$contador][4] = $fotos;
            $contador++;
        }
        $params = array('info_plato' => $info_plato, 'nombre'=>$this->session->get('nombre'), 'show_menuPlatos' => true,
                        'message'=>$message, 'message_type'=>$message_type);
        $this->render(__CLASS__, $params);
    }

    public function reserva()
    {
        $params = array('show_reserva'=> true, 'nombre'=>$this->session->get('nombre'));
        $this->render(__CLASS__, $params);
    }

    public function RealizarReserva($request_params)
    {
        $result = $this->model->obtenerMesasDisponibles($request_params);

        if(!$result || !$this->model->affected_rows()){
            $this->showReservaMessage('No hay mesas disponibles para la fecha y cantidad de personas indicadas', 'danger');
        }
        else{
            $row = $result->fetch_assoc();
            $nroMesa = $row['Nro'];
            $result = $this->model->RealizarReserva($request_params,$nroMesa, $this->session->get('cedula'));
            if(!$result || !$this->model->affected_rows()){
                $this->showReservaMessage('Hubo un error al realizar la reserva o ya fué realizada. Chequea en "mis reservas"', 'danger');
            }
            else{
                $fecha = $request_params['fechaReserva'];
                $cantPersonas = $request_params['cantidad'];
                $turno = $request_params['turno'];
                $info_Reserva = array('fecha'=>$fecha, 'cantPersonas'=>$cantPersonas, 'turno'=>$turno, 'nroMesa'=> $nroMesa);
                $this->showReservaMessage('La reserva fué realizada de forma exitosa', 'success', $info_Reserva);
            }
        }
    }

    public function MisReservas()
    {
        $reservas = $this->model->MisReservas($this->session->get('cedula'));
        $params = array('info_Reservas'=>$reservas, 'show_info_reservas'=>true, 'nombre'=>$this->session->get('nombre'));
        return $this->render(__CLASS__, $params);
    }

    //recibe tres parametros por URI(Get):fecha, Cedula del cliente y Turno de la reserva 
    public function removeReserva($request_params)
    {
        //separo los parametros 
        $params = explode('&', $request_params);
        $fecha = $params[0];
        $cedula = $params[1];
        $turno = $params[2];

        $this->model->removeReserva($cedula, $turno, $fecha);

        return $this->MisReservas();
    }

    public function showReservaMessage($message = '', $message_type, $info_Reserva = '')
    {
        $params = array("message"=>$message, "message_type"=>$message_type, 'show_info_reserva'=>true, 'info_Reserva' => $info_Reserva, 'nombre'=>$this->session->get('nombre'));
        return $this->render(__CLASS__, $params);
    }
    
    public function RealizarPedido($request_params)
    {
        //verificar si ya existe un idCompra del Cliente en la tabla Asociada con 
        //la fecha del día 
        //y que la compra no esté paga aún
        $result = $this->model->obtenerIdCompraActual($this->session->get('cedula'));

        if(!$result || !$this->model->affected_rows()){
            //Crear una compra para asociarla al cliente
            $idCompra = $this->model->generarCompra();

            //obtener reserva actual del cliente
            $result = $this->model->obtenerReservaActual($this->session->get('cedula'));
            if(!$result || !$this->model->affected_rows()){
                $this->showPedidoMessage('El cliente no cuenta con reserva actual','danger');   
            }else{
                //obtener reserva actual
                $reserva = $result->fetch_object();

                //crear un registro en tabla asociada con el Id de compra
                $this->model->AsociarClienteCompra($reserva, $idCompra);
                $result = $this->model->GenerarPedido($this->session->get('cedula'), $request_params, $idCompra);
                if($result || $this->model->affected_rows())
                    $this->showPedidoMessage('Su pedido ha sido realizado con exito', 'success');
                else
                    $this->showPedidoMessage('Hubo un error al realizar el pedido. Si ya realizó el 
                    pedido del plato, puede modificar la cantidad en "Mi Pedido"', 'danger');
            }
        }else{
           $row = $result->fetch_assoc();
           $idCompra = $row['IdCompra'];
           $result = $this->model->GenerarPedido($this->session->get('cedula'), $request_params, $idCompra); 
           if($result || $this->model->affected_rows())
                $this->showPedidoMessage('Su pedido ha sido realizado con exito', 'success');
            else
                $this->showPedidoMessage('Hubo un error al realizar el pedido. Si ya realizó el 
                pedido del plato, puede modificar la cantidad en "Mi Pedido"', 'danger');     
        }
    }

    public function showPedidoMessage($message, $message_type)
    {
        $this->InfoPlatoFotos($message, $message_type);
    }

    public function MiPedido()
    {
        $result = $this->model->MiPedido($this->session->get('cedula'));

        $params = array('nombre'=>$this->session->get('nombre'), 'show_pedido'=> true, 'info_pedido' => $result);

        return $this->render(__CLASS__, $params);
    }

}