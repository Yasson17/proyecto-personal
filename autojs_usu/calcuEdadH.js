const nacimientoH = document.getElementById("Fecha_N");
const edadh = document.getElementById("edadh");

const calcularEdad = (nacimientoH) => {
    const fechaActual = new Date();
    const anoActual = parseInt(fechaActual.getFullYear());
    const mesActual = parseInt(fechaActual.getMonth()) + 1;
    const diaActual = parseInt(fechaActual.getDate());

    // 2016-07-11
    const anoNacimiento = parseInt(String(nacimientoH).substring(0, 4));
    const mesNacimiento = parseInt(String(nacimientoH).substring(5, 7));
    const diaNacimiento = parseInt(String(nacimientoH).substring(8, 10));

    let edadh = anoActual - anoNacimiento;
    if (mesActual < mesNacimiento) {
        edadh--;
    } else if (mesActual === mesNacimiento) {
        if (diaActual < diaNacimiento) {
            edadh--;
        }
    }
    return edadh;
};

console.log(edadh);
window.addEventListener('load', function () 
{

    nacimientoH.addEventListener('change', function () 
    {
        if (this.value) 
        {
            edadh.value = calcularEdad(this.value);
            
        }
    });

});

