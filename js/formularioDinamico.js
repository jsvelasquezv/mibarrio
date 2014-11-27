var campos = 1;

function agregarCampo(){
	campos = campos + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "divcampo_"+(campos);
	NvoCampo.innerHTML="";
	var contenedor= document.getElementById("contenedorProductos");
    contenedor.appendChild(NvoCampo);
  }


function quitarCampo(iddiv){
  var eliminar = document.getElementById("divcampo_" + iddiv);
  var contenedor= document.getElementById("contenedorProductos");
  contenedor.removeChild(eliminar);
}