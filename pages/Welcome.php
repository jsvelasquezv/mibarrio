						<?php
							// incluye el menu y demas cosas contenidas en perfil.php
							include ("perfil.php"); 
							echo"<div class='row'>
									<div class='panel panel-primary'>";
							echo "<div class='contenido'>";
							echo "";
							//Dependiendo del genero muestra "Bienvenido" o "Bienvenida"
							if($c_usuario->get_Genero() == "F")	
								echo "<h1 class='text-center'><b>Bienvenida, ".$c_usuario->get_Nombres().".</b></h1></div>";
							else 
								echo "<h1 class='text-center'><b>Bienvenido, ".$c_usuario->get_Nombres().".</b></h1></div>";
						?>
						

				</div>
			</div>

		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/npm.js"></script>
	</body>
</html>
