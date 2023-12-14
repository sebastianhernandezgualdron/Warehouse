
console.log("Totales por producto: ", preciosFormateados);
var totales = [];
var productos = [];
// Iterar sobre el objeto en JavaScript
for (var producto in preciosFormateados) {
    if (preciosFormateados.hasOwnProperty(producto)) {
        var total = preciosFormateados[producto];
        productos.push(producto);
        totales.push(total);
        console.log("Producto: ", producto, ", Total: ", total);
        console.log(totales);
        console.log(productos);
    }
}


var ctx = document.getElementById("Dona");

console.log("Precio formateado en JavaScript: " + preciosFormateados);
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: productos,
        datasets: [{
            label: 'My First Dataset',
            data: totales,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(54, 362, 35)',
            ],
            hoverOffset: 2
        }]
    }
});
