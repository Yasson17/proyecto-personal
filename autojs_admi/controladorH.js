const numerohijos = document.getElementById("Nro_Hijos")
const i = document.getElementById("i")
const cedulaID = document.getElementById("cedulap")
const valor=numerohijos.value;


numerohijos.addEventListener('keydown', e =>
{
console.log(e);

dato=e.key;

if((dato>=0) && (dato<100))
{
    if(dato>valor)
    {
    	window.location.href = 'link/Actualizacion_H.php?Cedula='+ cedulaID.value +'&Nro_Hijos='+ dato +'';
    }    
}

});