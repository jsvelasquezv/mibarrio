<?php
include_once '../modelos/validar.php';



$v_Logueo = new validar();
$v_Logueo->validar_Logueo($_REQUEST['user'],$_REQUEST['pass']);
?>