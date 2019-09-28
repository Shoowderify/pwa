<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Effort', 'Amount given'],
          ['Victorias',     100],
          ['Derrotas',     20],
        ]);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'white',
			fontSize:'none',
			pieSliceBorderColor: '#000',
		

          },
		  backgroundColor: { fill:'transparent' },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body style="background:#000">
    <div id="donut_single" style="width: 200px; height: 200px;"></div>
  </body>
</html>