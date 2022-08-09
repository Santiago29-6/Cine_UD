<?php
    session_start();
    if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./ManejoButacas.php">
    <title>ASIENTOS DE CINE</title> 
</head>
<body background="./img/fondo-cne.jpg">
<div  style="width:960px; margin: 0 auto;">
    <div id="matriz" style="margin:10px 0px">
            <div class="row" style="width:100%;">
                <div class="col-xs-1">A</div>
                <div class="col-xs-11">
                    <div class="col-xs-6">
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A1</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A2</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A3</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A4</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A5</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A6</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A7</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A8</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A9</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A10</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A11</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A12</label></div>
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A13</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A14</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A15</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A16</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A17</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A18</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A19</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A20</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A21</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A22</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A23</label></div>
                        <div class="col-xs-1 asiento" onclick="TomarAsiento();"><label>A24</label></div>
                    </div>
                </div>
            </div>
            
            <div class="row" style="width:100%;">
                <div class="col-xs-1">B</div>
                <div class="col-xs-11">
                    <div class="btn-group" data-toggle="buttons">
                        <div class="col-xs-6">
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                        </div>
                        <div class="col-xs-6">
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                            <label class="btn btn-success asiento2" onclick="TomarAsiento();"><input type="checkbox">B1</label>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row" style="width:100%;">
                <div class="col-xs-1"></div>
                <div class="col-xs-11 num-columna">
                    <div class="col-xs-6">
                        <div class="col-xs-1">1</div>
                        <div class="col-xs-1">2</div>
                        <div class="col-xs-1">3</div>
                        <div class="col-xs-1">4</div>
                        <div class="col-xs-1">5</div>
                        <div class="col-xs-1">6</div>
                        <div class="col-xs-1">7</div>
                        <div class="col-xs-1">8</div>
                        <div class="col-xs-1">9</div>
                        <div class="col-xs-1">10</div>
                        <div class="col-xs-1">11</div>
                        <div class="col-xs-1">12</div>
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-1">13</div>
                        <div class="col-xs-1">14</div>
                        <div class="col-xs-1">15</div>
                        <div class="col-xs-1">16</div>
                        <div class="col-xs-1">17</div>
                        <div class="col-xs-1">18</div>
                        <div class="col-xs-1">19</div>
                        <div class="col-xs-1">20</div>
                        <div class="col-xs-1">21</div>
                        <div class="col-xs-1">22</div>
                        <div class="col-xs-1">23</div>
                        <div class="col-xs-1">24</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="dropdown-item" href="./saliradmid.php">Salir</a>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./js/jquery-3.6.0.min.js"></script>    
</body>
</html>
<?php
    }
?>