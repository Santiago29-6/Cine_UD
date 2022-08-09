<?php
class Asiento{
    public $fondo=0;
    public function TomarAsiento(){
        $this->fondo++;
        if($this->fondo%2!=0){
            echo '<body style="background-color:green">';
        }else{
            echo '<body style="background-color:red">';
        }
    }
}
?>