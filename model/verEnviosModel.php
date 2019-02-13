<?php

	class registrosEnviados{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        }
        
        public function consultarEnviosRealizados(){
            $strConsulta="SELECT e.*, e.id id_registroEnvio, h.*, em.*, es.id id_estado, es.desc_estado, p.*
                        FROM  envios e, hoja_vida h, empresa em, estados es, programa p
                        WHERE (e.estudiante = h.id) AND 
                                (e.empresa = em.id) AND 
                                (e.estado = es.id) AND
                                (h.programa = p.id)";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function cambiarEstadoEnvio($datos){
            $strSentencia="UPDATE envios SET estado='".$datos['estadoDeRegistro']."' WHERE id='".$datos['idRegistro']."'";
            $arrSentencia = $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $arrSentencia;
        }

    }?>