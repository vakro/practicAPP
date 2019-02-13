<?php

	class generarPdf{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        } 
       

        public function consultarHojaDeVida($id){
            $strConsulta="SELECT h.*, p.desc_programa FROM hoja_vida h INNER JOIN programa p WHERE h.programa=p.id AND h.id='".$id."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function consultarformacion_academica($id){
            $strConsulta="SELECT * FROM formacion_academica WHERE id_estudiante='".$id."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function consultarotros_estudios($id){
            $strConsulta="SELECT * FROM otros_estudios WHERE id_estudiante='".$id."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function consultarIdiomas($id){
            $strConsulta="SELECT d.nombre_idioma, n.desc_nivel FROM idioma i INNER JOIN desc_idiomas d, nivel_idioma n WHERE i.desc_idioma=d.id AND i.nivel=n.id AND id_estudiante='".$id."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function consultarExperienciaLaboral($id){
            $strConsulta="SELECT e.*, c.nombre_ciudad FROM experiencia e INNER JOIN ciudad c WHERE e.ciudad_exp=c.id AND id_estudiante='".$id."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function consultarReferencias($id){
            $strConsulta="SELECT r.*, c.nombre_ciudad FROM referencia r INNER JOIN ciudad c WHERE r.ciudad=c.id AND id_estudiante='".$id."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function consultarImagen($id){
            $strConsulta=" SELECT * FROM imagenes WHERE id_estudiante='".$id."' ";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }


    }?>