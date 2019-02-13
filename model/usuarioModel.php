<?php

	class usuario{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        } 
       

        public function insertarUsuario($datos){
            
            $strSentencia="INSERT INTO users SET ";
                      if ($datos['inputname']=="") {
                $strSentencia.="name= NULL, ";
            }else{
                $strSentencia.="name='".$datos['inputname']."', ";
            }

            if ($datos['inputusername']=="") {
                $strSentencia.="username= NULL, ";
            }else{
                $strSentencia.="username='".$datos['inputusername']."', ";
            }

            if ($datos['inputemail']=="") {
                $strSentencia.="email= NULL, ";
            }else{
                $strSentencia.="email='".$datos['inputemail']."', ";
            }

            if ($datos['inputpassword']=="") {
                $strSentencia.="password= NULL, ";
            }else{
                $strSentencia.="password='".$datos['inputpassword']."'";
            }                 

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

         public function consultarUsuario($datos){
                $strConsulta="SELECT id, name, username, email FROM users ORDER BY name ";

                $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
                return $arrConsulta;
        }

        public function borrarUsuario($datos){
            $strSentencia="DELETE FROM users WHERE id='".$datos['idUsuario']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }

        public function actualizarUsuario($datos){
            
            $strSentencia="UPDATE users SET                            
                           password='".$datos['inputpassword']."' WHERE id='".$datos['id']."'";                   

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $strSentencia;
        }


    }?>