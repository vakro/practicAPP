<?php

	class login{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        }
        
        public function loguin($datos){
            $strConsulta="SELECT * FROM users WHERE username='".$datos['username']."' AND password='".$datos['password']."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

    }
?>