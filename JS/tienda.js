console.log(tiendas);

var admin = document.getElementById("admm");
const form = document.getElementById("form");
var tienda = document.getElementById("hide");
var option = document.getElementById("ids");
var optionV = document.getElementById("ids2");
tienda.style.display = "none";
var nombreTienda ;
var idTienda;
form.addEventListener('change', function (event) {
    const inputValue = event.target.value;
    console.log(inputValue);

    tiendas.forEach(function (tiendaItem) {
        nombreTienda = tiendaItem.nombre;
         idTienda = tiendaItem.id_tienda;

        console.log(nombreTienda);
        console.log(idTienda);

        
        if (inputValue == idTienda) {
            tienda.style.display = "flex";
            option.textContent = nombreTienda;
            option.value = idTienda;
            optionV.textContent = nombreTienda;
            optionV.value = idTienda;

        }

        if(inputValue == "Elija su tienda"){
            tienda.style.display = "none";
        }
    });

});
