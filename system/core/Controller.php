<?php

abstract class Controller
{
    private $view;

    //Inicializa la vista
    public function render($controller_name = '', $params = array())
    {
        $this->view = new View($controller_name, $params);
    }

    //Método estándar
    abstract public function exec();
}