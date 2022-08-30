<?php
class Errors extends Controller   //Controlador de errores
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView('errors', "index");  //Subcarpeta errors en Views
    }
}
