<?php
 
require_once ROOT . FOLDER_PATH . '/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE . 'Session.php';

class LoginController extends Controller
{

    private $model;
    
    private $session;

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->session = new Session();
    }

    public function exec()
    {
        $this->render(__CLASS__);
    }

    public function signin($request_params)
    {
        $result = $this->model->signin($request_params['cedula']);
      
        if($result->num_rows)
        {
            $result = $result->fetch_object();
            if($request_params['password'] === $result->Password)
            {
                $this->session->init();
                $this->session->add('cedula', $result->CI);
                $this->session->add('nombre', $result->Nombre);
                $tipoUsuario = $this->model->getTipoUsuario($result->CI);
                if ($tipoUsuario == 'Cliente')
                    header('location: /mvcDesdeCero/MainCliente');
                if ($tipoUsuario == 'Administrativo')
                    header('location: /mvcDesdeCero/Plato');
            }else{
                return $this->renderErrorMessage('La contraseña es incorrecta');
            }
        }else{
            return $this->renderErrorMessage('Usuario no registrado');
        }
    }

    private function renderErrorMessage($message)
    {
        $params = array('error_message' => $message);
        $this->render(__CLASS__, $params);
    }

    public function logout()
    {
        $this->session->close();
        header("location:".FOLDER_PATH);
    }
}