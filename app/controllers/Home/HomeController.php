<?php
class HomeController extends Controller
{
    public $nombre;

    public function __construct()
    {
        $this->nombre = 'Ernesto dos Santos';
    }

    //método estándar
    public function exec()
    {
        echo 'este es el método exec de HomeController';
    }

    public function show()
    {
        $params = array('nombre' => $this->nombre);
        $this->render(__CLASS__, $params);
    }
}