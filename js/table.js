$(document).ready(function() {
    var table = $('.table').DataTable( {
	    colReorder: true,
	    fixedHeader: true,
	    select: true,
	    responsive: true
	} );

	new $.fn.dataTable.Buttons( table, {
	    buttons: [
	        'colvis'
	    ],
    });
    table.buttons( 0, null ).container().appendTo(
    	'.dataTables_wrapper > div.row:first'
	);

	new $.fn.dataTable.Buttons( table, {
	    buttons: [
	        'copy', 'csv', 'excel', 'pdf', 'print'
	    ],
    });
    table.buttons( 1, null ).container().appendTo(
    	'#buttons-export'
	);

	$(".dataTables_filter").parent().remove();
    $("#datatable-search").show();
    $("#datatable-search > input").keyup(function() {
   		table.search($(this).val()).draw();
	});

	$("a.buttons-colvis > span").empty().addClass("glyphicon glyphicon-cog").parent().css("float", "right");
	$("a.buttons-colvis").parent().addClass("col-sm-6")

} );