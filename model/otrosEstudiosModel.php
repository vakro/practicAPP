<?php

	class otrosEstudios{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        }        

        public function insertarOtrosEstudios($datos){
            $strSentencia="INSERT INTO otros_estudios SET
                            titulo='".$datos['inputtitulo'] ."',
                            institucion='".$datos['inputinstitucion']."',
                            fecha_estudios='".$datos['inputfecha_estudios']."',
                            id_estudiante='".$datos['inputid_estudiante']."'";

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

         public function consultarOtrosEstudios($datos){
                $strConsulta="SELECT * FROM otros_estudios WHERE id_estudiante='".$datos['inputid_estudiante']."' ORDER BY fecha_estudios";

                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
        }

        public function borrarOtrosEstudios($datos){
            $strSentencia="DELETE FROM otros_estudios WHERE id='".$datos['idOtroEstudio']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }


    }?>