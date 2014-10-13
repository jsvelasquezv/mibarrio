<?php
//llamado de los archivos que contienen las clases y metodos necesarios para el logueo
include_once '../modelos/Modelo_Logueo.php';
include_once '../controladores/Controlador_Logueo.php';

class Validar{


	public function validar_Logueo($usuario, $pass){
		//inicializacion de session (ropio de php) y creacion de dos variables con los datos entrantes
		// del form en index.php 
		session_start();
		$_SESSION['nick']=$usuario;
		$_SESSION['clave']=$pass;
		//creacion de los objetos, instancias de las clases modelo y controlador logueo
		$c_Logueo = new Controlador_Logueo();
		$m_Logueo = new Modelo_Logueo($c_Logueo);
		//se envian los parametros a el metodo de modelo logueo que se encarga de verificarlos
		$m_Logueo->valida_Usuario($usuario,$pass);
		//se hacen evaluaciones para saber si los campos no estan vacios, o si el valor devuelto por logue 
		// es verdadero o falso, en caso de fallar uno envia el tipo de error a index.
		// en caso de no haber error, se redirige a la pagina Welcome.php con el valor de incio en la cabezera (URL).
		if($usuario == "")
			header("Location: ../index.php?error2=1");
		elseif($pass == "")
			header("Location: ../index.php?error3=1");
		elseif(!$c_Logueo->get_Acceso())
			header("Location: ../index.php?error=1");
		else
			header("Location: ../pages/Welcome.php?gestion=inicio");
	}

	public function cerrar_Sesion()
	{
		  session_start();
		  unset($_SESSION["nick"]); 
		  unset($_SESSION["clave"]);
		  session_destroy();
		  header("Location: ../index.php");
		  exit;
	}



}

?>