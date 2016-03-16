// Callback that creates and populates a data table,
// instantiates the chart, passes in the data and
// draws it.
function drawChart(data, titleStr, xlabel, ylabel) {

// Create the data table.
var dataTable = google.visualization.arrayToDataTable(data);

// Set chart options
var options = {
  title: titleStr,
  hAxis: { title: xlabel },
  vAxis: { title: ylabel },
  legend: { position: 'bottom' },
  width: 500,
  height: 500
};

// Instantiate and draw our chart, passing in some options.
var chartStatic = new google.visualization.LineChart(document.getElementById('chart_printable'));
google.visualization.events.addListener(chartStatic, 'ready', function () {
      document.getElementById('chart_printable').innerHTML = '<img src="' + chartStatic.getImageURI() + '">';
});
chartStatic.draw(dataTable, options);
$('#chart_printable').hide();

var chart = new google.visualization.LineChart(document.getElementById('chart_interactive'));
chart.draw(dataTable, options);

$('#chart_toggle').show();
$('#chart_toggle').on('click', '#printable_toggle', function() {
	$('#chart_interactive').hide();
	$('#chart_printable').show();
});
$('#chart_toggle').on('click', '#interactive_toggle', function() {
	$('#chart_interactive').show();
	$('#chart_printable').hide();
});

}

google.load('visualization', '1', {packages: ['corechart']});