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

    public function InfoPlatoFotos()
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
        $params = array('info_plato' => $info_plato, 'nombre'=>$this->session->get('nombre'), 'show_menuPlatos' => true);
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
            $this->showReservaMessage('No hay mesas disponibles', 'danger');
        }
        //$this->model->RealizarReserva($request_params, $this->session->get('cedula'));
    }

    public function showReservaMessage($message, $message_type)
    {
        $params = array("message"=>$message, "message_type"=>$message_type, 'show_info_reserva'=>true);
        return $this->render(__CLASS__, $params);
    }   
}