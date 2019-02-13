
<?php

	class envio{
        
        public $obClsBD;
        
        public function __construct(){
            require_once('dataBaseModel.php');
            $this->obClsBD = new DataBase();
        }
        
        public function buscarDocumento($datos){
            $strConsulta="SELECT * FROM hoja_vida WHERE numero_documento='".$datos['documento']."'";
            $arrConsulta= $this->obClsBD->arrEjecutarConsulta($strConsulta);
            return $arrConsulta;
        }

        public function guardarEnvio($datos){
            $strSentencia="INSERT INTO envios SET
                            estudiante='".$datos['inputhiddenidEst']."',
                            empresa='".$datos['selectempresa']."',
                            fecha='".$datos['inputfecha_envio']."',
                            estado='1'";
            $arrSentecia= $this->obClsBD->ejecutarSentencia($strSentencia, $aux);
            return $aux;
        }

    }
?>