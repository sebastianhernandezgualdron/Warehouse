
console.log("Totales por producto: ", preciosFormateados2);
var totales = [];
var productos = [];

for (var producto in preciosFormateados2) {
    if (preciosFormateados2.hasOwnProperty(producto)) {
        var total = preciosFormateados2[producto];
        productos.push(producto);
        totales.push(total);
        console.log("Producto: ", producto, ", Total: ", total);
        console.log(totales);
        console.log(productos);
    }
}


var ctx = document.getElementById("DonaVenta");

console.log("Precio formateado en JavaScript: " + preciosFormateados2);
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: productos,
        datasets: [{
            label: 'My First Dataset',
            data: totales,
            backgroundColor: [
                'rgb(99, 199, 132)',
                'rgb(154, 62, 235)',
                'rgb(354, 262, 35)',
            ],
            hoverOffset: 2
        }]
    }
});
