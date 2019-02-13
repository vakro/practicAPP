<?php

	class formacion{
        
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
            }else{
                $strConsulta="SELECT ".$datos['idCampo'].",".$datos['nombreCampo']." FROM ".$datos['tablaDB']." WHERE ".$datos["foreign_id"]."=".$datos['condicion']." ORDER BY ".$datos['nombreCampo']."";
                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
            }
            
        }

        public function insertarFormacion($datos){
            $strSentencia="INSERT INTO formacion_academica SET
                            nivel_estudios='".$datos['selectnivel_estudio'] ."',
                            institucion='".$datos['inputinstitucion']."',
                            titulo='".$datos['inputtitulo']."',
                            fecha_formacion='".$datos['inputfecha_formacion']."',
                            id_estudiante='".$datos['inputid_estudiante']."'";

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

         public function consultarFormacion($datos){
                $strConsulta="SELECT f.*, n.desc_nivel_estudio 
                                FROM formacion_academica f, nivel_estudios n 
                                WHERE (f.nivel_estudios = n.id) AND f.id_estudiante='".$datos['inputid_estudiante']."' ORDER BY f.fecha_formacion";

                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
        }

        public function borrarFormacion($datos){
            $strSentencia="DELETE FROM formacion_academica WHERE id='".$datos['idFormacion']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }


    }?>