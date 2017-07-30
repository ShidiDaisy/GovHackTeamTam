  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
           ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
         'Western', 'Literature','haha' ,{ role: 'annotation' } ],
        ['2010', 10, 24, 20, 32, 18, 5,3, ''],
        ['2020', 16, 22, 23, 30, 16, 9,3,''],
        ['2030', 28, 19, 29, 30, 12, 13,3, '']
      ]);

      var view = new google.visualization.DataView(data);
     

      var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        
        bar: { groupWidth: '75%' },
        isStacked: true
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
      
        google.visualization.events.addListener(chart, 'select', function() {
    var row = chart.getSelection()[0].row;
   
    alert('You selected ' + data.getValue(row, 5));
    
    
    
    
  });
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>