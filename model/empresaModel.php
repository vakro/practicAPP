<?php

	class empresa{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        } 
       

        public function insertarEmpresa($datos){

            $strSentencia="INSERT INTO empresa SET ";

            if ($datos['inputnombre_contacto']=="") {
                $strSentencia.="nombre_contacto= NULL, ";
            }else{
                $strSentencia.="nombre_contacto='".$datos['inputnombre_contacto']."', ";
            }

            if ($datos['inputnombre_empresa']=="") {
                $strSentencia.="nombre_empresa= NULL, ";
            }else{
                $strSentencia.="nombre_empresa='".$datos['inputnombre_empresa']."', ";
            }
            
            if ($datos['inputtelefono']=="") {
                $strSentencia.="telefono= NULL, ";
            }else{
                $strSentencia.="telefono='".$datos['inputtelefono']."', ";
            }           

            if ($datos['inputcorreo']=="") {
                $strSentencia.="correo= NULL";
            }else{
                $strSentencia.="correo='".$datos['inputcorreo']."'";
            }

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

         public function consultarEmpresa($datos){
                $strConsulta="SELECT * FROM empresa ORDER BY nombre_empresa ";

                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
        }

        public function borrarEmpresa($datos){
            $strSentencia="DELETE FROM empresa WHERE id='".$datos['idEmpresa']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }

         public function buscarEmpresa($datos){
                $strConsulta="SELECT * FROM empresa WHERE id ='".$datos['idEmpresa']."'";

                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
        }

        public function actualizarEmpresa($datos){
            
            $strSentencia="UPDATE empresa SET                            
                           nombre_contacto='".$datos['inputnombre_contacto']."', 
                           nombre_empresa='".$datos['inputnombre_empresa']."',
                           telefono='".$datos['inputtelefono']."',
                           correo='".$datos['inputcorreo']."'
                           WHERE id='".$datos['idEmpresa']."'";                   

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $strSentencia;
        }


    }?>