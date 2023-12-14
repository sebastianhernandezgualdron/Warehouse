
console.log("Totales DE VENTA Y PRODUCTO: ", totalVentasYCompras);
var compras = totalVentasYCompras[0];
var ventas = totalVentasYCompras[1];

        console.log("Compras: ", compras, ", Ventas: ", ventas);
        console.log(compras);
        console.log(ventas);



var ctx = document.getElementById("DonaResumen");

console.log("Precio formateado en JavaScript: " + totalVentasYCompras);
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Compras", "Ventas"],
        datasets: [{
            label: 'My First Dataset',
            data: [compras, ventas],
            backgroundColor: [
                'rgb(355, 299, 132)',
                'rgb(124, 362, 235)',
                'rgb(234, 162, 35)',
            ],
            hoverOffset: 2
        }]
    }
});
