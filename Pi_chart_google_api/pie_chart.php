<?php
	$dbhandle = new mysqli('localhost','root','','piechart');
	echo $dbhandle->connect_error;

	$query = "SELECT * FROM visitors group by country";
	$res = $dbhandle->query($query);

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['country', 'visits'],
          
          <?php
			while($row=$res->fetch_assoc())
			{
			    echo "['".$row['country']."',".$row['visits']."],";
			}
          ?>

        ]);

        var options = {
          title: 'Visits From Contries'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>