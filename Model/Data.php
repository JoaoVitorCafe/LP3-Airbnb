<?php 
 
 class Data
 {
     private $dia;
     private $mes;
     private $ano;


     function __construct($dia , $mes , $ano) {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->ano = $ano;
    }

     public function setDia($dia)
     {
         $this->dia = $dia;
     }


     public function getDia()
     {
        return $this->dia;
     }

     public function setMes ($mes)
     {
         $this->mes = $mes;
     } 

     public function getMes()
     {
        return $this->mes;
     }

     public function setAno($ano)
     {
         $this->ano = $ano;
     } 

     public function getAno()
     {
        return $this->ano;
     }

     public function formatData()
     {
        return 0;
     }

    }
?>
 













