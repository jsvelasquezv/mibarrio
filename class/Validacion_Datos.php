<?php

class Validacion_Datos{

	private $numbers = array('0','1','2','3','4','5','6','7','8','9');
	private $letters = array(' ','a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z','á','é','í','ó','ú',
								'A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','Á','É','Í','Ó','Ú',);


	public function is_Number($dato){
		$tam = strlen($dato);
		$salida1 = false;
		$salida2 = false;
		// El primer 'for' recorre todo el 'dato' (letra por letra)
		for ($i=0; $i < $tam; $i++) {
			$salida2 = false;
			// Segundo 'for' que recorre todo el arreglo de numeros y verifica
			// si coinciden, en caso de que no, salta fuera de los dos 'for's 
			// y devolverá un falso
			foreach ($this->numbers as $key) {
				if(substr($dato,$i,1) == $key){
					$salida2 = true;
					break;
				}
			}
			if(!$salida2)
				break;
		}

		if($salida2)
			$salida1 = true;

		return $salida1;


	}

	public function is_Alphabetic($dato){
		$tam = strlen($dato);
		$salida1 = false;
		$salida2 = false;
		// El primer 'for' recorre todo el 'dato' (letra por letra)
		for ($i=0; $i < $tam; $i++) {
			$salida2 = false;
			// Segundo 'for' que recorre todo el arreglo de letras y verifica
			// si coinciden, en caso de que no, salta fuera de los dos 'for's 
			// y devolverá un falso
			foreach ($this->letters as $key) {
				if(substr($dato,$i,1) == $key){
					$salida2 = true;
					break;
				}
			}
			if(!$salida2)
				break;
		}

		if($salida2)
			$salida1 = true;

		return $salida1;
	}

	public function is_Alphanumeric($dato){
		$tam = strlen($dato);
		$salida1 = false;
		$salida2 = false;
		$salida3 = false;
		// El primer 'for' recorre todo el 'dato' (letra por letra)
		for ($i=0; $i < $tam; $i++) {
			$salida2 = false;
			$salida3 = false;
			// Segundo 'for' que recorre todo el arreglo de letras Y de numeros, verificando
			// si coinciden, en caso de que no, salta fuera de los dos 'for's 
			// y devolverá un falso
			foreach ($this->letters as $key) {
				if(substr($dato,$i,1) == $key){
					$salida2 = true;
					break;
				}
			}
			foreach ($this->numbers as $key) {
				if(substr($dato,$i,1) == $key){
					$salida3 = true;
					break;
				}
			}
			// 'if' que pregunta si no ni letra ni numero, que termine el 'for' (el primer for)
			if(!$salida2 && !$salida3)
				break;
		}

		// 'if' que verifica que puede ser una letra (salida2) o un numero(salida3)
		if($salida2 || $salida3)
			$salida1 = true;

		return $salida1;
	}
}
/*
$dato = 'Lugar de nacimiento';
echo '<br>El dato es = '.$dato;
$val = new Validacion_Datos();
if($val->is_Number($dato))
	echo '<p>El dato es un <b>numero</b>';
elseif($val->is_Alphabetic($dato))
	echo '<p>El dato es <b>alfabetico</b>';
elseif($val->is_Alphanumeric($dato))
	echo '<p>El dato es <b>alfanumerico</b>';
else
	echo '<p>El dato contiene <b>caracteres especiales</b>';*/

?>