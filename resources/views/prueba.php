<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Grafico de Compras</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    <div id="container"></div>

    <script type="text/javascript">
        var userData = <?php echo json_encode($userData); ?>;

        Highcharts.chart('container', {
            title: {
                text: 'Cantidad de Compras por Mes'
            },
            xAxis: {
                categories: ['Mayo']
            },
            yAxis: {
                title: {
                    text: 'Cantidad'
                }
            },
            series: [{
                name: 'Compras',
                data: userData
            }]
        });
    </script>
</body>
</html>
