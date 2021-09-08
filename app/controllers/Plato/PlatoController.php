<?php
 
require_once ROOT . FOLDER_PATH . '/app/models/Plato/PlatoModel.php';

class PlatoController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new PlatoModel();
    }

    public function exec()
    {
        $this->PlatosList();
    }

    public function PlatosList()
    {
        $platos = $this->model->PlatosList();

        $params = array('platos' => $platos, 'show_platos_list' => true);
        return $this->render(__CLASS__, $params);
    }

    public function PlatoList($Id)
    {
       
        $result = $this->model->PlatoList($Id);

        if(!$result->num_rows)
            $info_plato = array();
        else
            $info_plato = $result->fetch_object();
       
        $params = array('info_plato' => $info_plato, 'show_edit_form' => true);
        return $this->render(__CLASS__, $params);
    }

    public function addFotoPlato($request_params)
    {
        $this->model->addImagenPlato($request_params['Imagen'], $request_params['IdPlato']);
        $this->PlatoFotos($request_params['IdPlato']);
    }

    //renderiza el formulario del plato con edición de fotos
    public function PlatoFotos($Id)
    {
        $result = $this->model->PlatoList($Id);

        if(!$result->num_rows)
            $info_plato = array();
        else
            $info_plato = $result->fetch_object();
       
        $resultFotos = $this->model->PlatoFotos($Id);

        $params = array('info_plato' => $info_plato, 'show_edit_form_foto' => true, 'info_fotos' => $resultFotos);
        return $this->render(__CLASS__, $params);
    }

    public function addPlato($request_params)
    {
        $this->model->addPlato($request_params);

        $this->PlatosList();
    }

    public function updatePlato($request_params)
    {
        $result = $this->model->updatePlato($request_params);

        $this->PlatosList();
    }

    public function removePlato($id)
    {
        $this->model->removePlato($id);

        return $this->PlatosList();

    }

    public function formulario()
    {
        $params = array('show_formulario' => true);
        $this->render(__CLASS__, $params);
    }

}