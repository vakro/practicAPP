<?php

	class correoElectronico{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        }
        
        public function validarCorreoElectronico($email){

            $strConsulta="SELECT * FROM users WHERE email='".$email."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
            
        }

    }?>