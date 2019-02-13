<?php

	class personal{
        
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

        public function insertarInfoPersonal($datos){
            $strSentencia="INSERT INTO hoja_vida SET
                            tipo_documento='".$datos['selecttipo_documento'] ."',
                            numero_documento='".$datos['inputdocumento']."',
                            nombre_estudiante='".$datos['inputnombres']."',
                            apellidos_estudiante='".$datos['inputapellidos']."',
                            fecha_nacimiento='".$datos['inputfecha_nacimiento']."',
                            genero='".$datos['selectgenero']."',
                            estado_civil='".$datos['selectestado_civil']."',
                            pais_nacimiento='".$datos['selectpais_nacimiento']."',
                            depto_nacimiento='".$datos['selectdepto_nacimiento']."',
                            ciudad_nacimiento='".$datos['selectciudad_nacimiento']."',
                            direccion='".$datos['inputdireccion']."',
                            telefono='".$datos['inputtelefono']."',
                            celular='".$datos['inputcelular']."',
                            correo='".$datos['inputcorreo']."',
                            facultad='".$datos['selectfacultad']."',
                            programa='".$datos['selectprograma']."',
                            semestre='".$datos['selectsemestre']."',
                            perfil_profesional='".$datos['textareaperfil_profesional']."'";

            $arrSentencia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

         public function buscarDocumento($datos){
            $strConsulta="SELECT * FROM hoja_vida WHERE numero_documento='".$datos['documento']."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function actualizarInfoPersonal($datos){
            $strSentencia="UPDATE hoja_vida SET 
                            tipo_documento='".$datos['selecttipo_documento'] ."',
                            numero_documento='".$datos['inputdocumento']."',
                            nombre_estudiante='".$datos['inputnombres']."',
                            apellidos_estudiante='".$datos['inputapellidos']."',
                            fecha_nacimiento='".$datos['inputfecha_nacimiento']."',
                            genero='".$datos['selectgenero']."',
                            estado_civil='".$datos['selectestado_civil']."',
                            pais_nacimiento='".$datos['selectpais_nacimiento']."',
                            depto_nacimiento='".$datos['selectdepto_nacimiento']."',
                            ciudad_nacimiento='".$datos['selectciudad_nacimiento']."',
                            direccion='".$datos['inputdireccion']."',
                            telefono='".$datos['inputtelefono']."',
                            celular='".$datos['inputcelular']."',
                            correo='".$datos['inputcorreo']."',
                            facultad='".$datos['selectfacultad']."',
                            programa='".$datos['selectprograma']."',
                            semestre='".$datos['selectsemestre']."',
                            perfil_profesional='".$datos['textareaperfil_profesional']."' WHERE id='".$datos['idEst']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }

    }?>