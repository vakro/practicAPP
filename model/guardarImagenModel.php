<?php

    
    class guardarImagen{
    	
    	public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        } 


       public function insertarImagen($imagenNombre,$imagenRuta,$idEst){
            $strSentencia="INSERT imagenes SET 
                           
                        imagen='".$imagenNombre."',
                        ruta='".$imagenRuta."',
                        id_estudiante='".$idEst."' ";

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }


        public function consultarImagen($id){
            $strConsulta=" SELECT i.*, h.nombre_estudiante, h.apellidos_estudiante FROM imagenes i INNER JOIN hoja_vida h WHERE i.id_estudiante=h.id AND id_estudiante='".$id."' ";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }


         public function actualizarImagen($imagenNombre,$imagenRuta,$idEst){
            
            $strSentencia="UPDATE imagenes SET                            
                           imagen='".$imagenNombre."',
                           ruta='".$imagenRuta."'
                           WHERE id_estudiante='".$idEst."' ";                     

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }  


    }


?>