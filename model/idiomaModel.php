<?php

	class idioma{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        }
        
        public function llenarSelect($datos){

            if ($datos["condicion"]==0 && $datos["foreign_id"]==0) {
                $strConsulta="SELECT ".$datos['idCampo'].",".$datos['nombreCampo']." FROM ".$datos['tablaDB']." ORDER BY ".$datos['nombreCampo']."";
                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
            }
            
        }

        public function insertarIdioma($datos){
            $strSentencia="INSERT INTO idioma SET
                            desc_idioma='".$datos['selectidioma'] ."',
                            nivel='".$datos['selectdesc_nivel']."',
                            id_estudiante='".$datos['inputid_estudiante']."'";

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

         public function consultarIdioma($datos){
                $strConsulta="SELECT i.*, n.desc_nivel, d.nombre_idioma 
                                FROM idioma i, nivel_idioma n, desc_idiomas d 
                                WHERE (i.nivel = n.id AND i.desc_idioma = d.id) AND i.id_estudiante='".$datos['inputid_estudiante']."'";

                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
        }

        public function borrarIdioma($datos){
            $strSentencia="DELETE FROM idioma WHERE id='".$datos['idIdioma']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }


    }?>