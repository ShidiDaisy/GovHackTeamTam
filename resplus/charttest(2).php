<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
         'Western', 'Literature', 'Literature','Literature',{ role: 'annotation' } ],
        ['2010', 10, 24, 20, 32, 18, 5, 5,  5,  ''],
        ['2020', 16, 22, 23, 30, 16, 9,  5,  5, ''],
        ['2030', 28, 19, 29, 30, 10, 13, 5,  5,  '']
      ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
         isStacked: true,
          bars: 'horizontal' // Required for Material Bar Charts.
         
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        
          google.visualization.events.addListener(chart, 'select', function() {
    var row = chart.getSelection()[0].row;
    alert('You selected ' + data.getValue(row, 0));
  });
      }
    
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 300px;"></div>
  </body>
</html>