const numerohijos = document.getElementById("Nro_Hijos")
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
        window.location.href = 'link_admi/Actualizacion_H.php?Cedula='+ cedulaID.value +'&Nro_Hijos='+ dato +'';
    }    
}

});