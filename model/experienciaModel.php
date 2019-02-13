<?php

	class experiencia{
        
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

        public function insertarExperiencia($datos){
            $strSentencia="INSERT INTO experiencia SET
                            ciudad_exp='".$datos['selectciudad_exp'] ."',
                            nombre_empresa='".$datos['inputnombre_empresa']."',
                            cargo='".$datos['inputcargo']."',
                            fecha_inicio_exp='".$datos['inputfecha_inicio_exp']."',
                            fecha_fin_exp='".$datos['inputfecha_fin_exp']."',
                            desc_actividades='".$datos['textareadesc_actividades']."',
                            id_estudiante='".$datos['inputid_estudiante']."'";

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

         public function consultarExperiencia($datos){
                $strConsulta="SELECT e.*, c.nombre_ciudad 
                                FROM experiencia e, ciudad c 
                                WHERE (e.ciudad_exp = c.id) AND e.id_estudiante='".$datos['inputid_estudiante']."' ORDER BY e.fecha_fin_exp";

                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
        }

        public function borrarExperiencia($datos){
            $strSentencia="DELETE FROM experiencia WHERE id='".$datos['idExperiencia']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }


    }?>