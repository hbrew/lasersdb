
// Retrieve GET variables
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}

// Update methods list on change of data selection
$("#db-nav").on("change", "#data-selection", function() {
	var selected = $("#data-selection").val();
	var that = $("#method-selection");
	$(that).children("option").prop("disabled", true);
	$(that).val(null);
	$.get("./?data=summary", function(response){
		summaries = JSON.parse(response);
		try {
			$.each(summaries[selected]['types'], function(index, value){
				$(that).children('option[value="'+value+'"]').prop("disabled", false);
			});
		} catch(e){}
		
	});
});

// Go to new page after method selection
$("#db-nav").on("change", "#method-selection", function() {
	var view = $("#data-selection").val();
	var type = $(this).val();
	window.location.href = "./?view="+view+"&type="+type;
});

$( document ).ready(function() {

	// Show errors if they are present
	if ($("#error-message").text().trim().length > 0) {
		$("#error-message").parent().css("display", "block");
	}

	// Load data list into selection box
	$.ajax({
		url: "./?data=summary", 
		success: function(response){
			summaries = JSON.parse(response);
			$.each(summaries, function(index, value){
				$("#data-selection").append($("<option></option>")
					.attr("value", index)
					.text(value["name"])
				);
			});
			// set data selection if it exists
			var view = $.urlParam('view');
			if (view != null) {
				try { $("#data-selection").val(view); } catch(e){}
			}
		},
		async: false
	});
	$("#data-selection").trigger("change");

	// Set method selection if they exist	
	var type = $.urlParam('type');
	if (type != null ) {
		try { $("#method-selection").val(type); } catch(e){}	
	}
});