<?php

	class referencia{
        
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

        public function insertarReferencia($datos){
            $strSentencia="INSERT INTO referencia SET
                            nombre_completo='".$datos['inputnombre_referencia'] ."',
                            cargo='".$datos['inputcargo_referencia']."',
                            numero_contacto='".$datos['inputnumero_referencia']."',
                            empresa='".$datos['inputempresa_referencia']."',
                            ciudad='".$datos['selectciudad_ref']."',
                            id_estudiante='".$datos['inputid_estudiante']."'";

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

         public function consultarReferencia($datos){
                $strConsulta="SELECT r.*, c.nombre_ciudad 
                                FROM referencia r, ciudad c 
                                WHERE (r.ciudad = c.id) AND r.id_estudiante='".$datos['inputid_estudiante']."'";

                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
        }

        public function borrarReferencia($datos){
            $strSentencia="DELETE FROM referencia WHERE id='".$datos['idReferencia']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }


    }?>