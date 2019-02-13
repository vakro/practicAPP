<?php

	class hojadevida{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        }
        
        public function listarTablaHojasdeVida(){
            $strConsulta = "SELECT h.*, h.id idPage, p.desc_programa FROM hoja_vida h, programa p WHERE (h.programa = p.id)";
            $arrConsulta = $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }


    }?>