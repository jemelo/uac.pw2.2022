<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras e Vendas</title>
    
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


</head>
<body>
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h1>Compras e Vendas</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1>Compras</h1>
                <div id="compras" style="height: 300px; width: 100%;"></div>
            </div>
            <div class="col">
                <h1>VEndas</h1>
                <div id="vendas"></div>
            </div>
        </div>
    </div>


<?php
    require_once 'Vendas.php';
    require_once 'Compras.php';

    $vendas = new Vendas();
    $compras = new Compras();
?>

<script>

    window.onload = function () {
	    var chart = new CanvasJS.Chart("compras", {
		title:{
			text: "Vendas 2020"              
		},
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: <?php echo $vendas->getVendas();?>
		}
		]
	});
	
    var chart2 = new CanvasJS.Chart("vendas",
	{
		title:{
			text: "Compras 2020"
		},
		legend: {
			maxWidth: 350,
			itemWidth: 120
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
			legendText: "{indexLabel}",
			dataPoints: <?php echo $compras->getCompras();?>
		}
		]
	});
	chart.render();

    chart2.render();
}
</script>    
</body>
</html>