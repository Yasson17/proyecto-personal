const sexo = document.getElementById("Sexo");
const numero = document.getElementById("numero");

const calcularSEXO = (sexo) => {
    
    if (sexo==M) {
        numero=1;
    } 
    else 
    {

numero=0;

    }
    return numero;
};

console.log(numero);
window.addEventListener('load', function () 
{

    sexo.addEventListener('change', function () 
    {
        if (this.value) 
        {
            numero.value = calcularSEXO(this.value);
            
        }
    });

});

