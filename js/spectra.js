


$("#chart-form").on("change", ".select2-input", function() {
  var selected1 = $('.select1-input').val();
  var selected2 = $(this).val();
  var that = $('.select3');
  $(that).children("label").remove();
  $.get('./?data=spectra', function(response){
    var materials = JSON.parse(response);
    $.each(materials[selected1][selected2], function(index, value) {
      $(that).append($('<label></label>')
        .text(index)
      );
      $(that).children("label").last().append($('<input type="checkbox">')
        .attr('value', index)
        .attr('class', 'select3-input')
      );
    });
  });
  // Assume same wavelengths are available for each axis
  var that2 = $('.select4')
  $(that2).children("label").remove();
  $.get('./?data=spectra', function(response){
    var materials = JSON.parse(response);
    var axis = $('.select3-input').last().val();
    $.each(materials[selected1][selected2][axis], function(index, value) {
      $(that2).append($('<label></label>')
        .text(index)
      );
      $(that2).children("label").last().append($('<input type="checkbox">')
        .attr('value', index)
        .attr('class', 'select4-input')
      );
    });
  });
})

$("#chart-form").on("change", ".select1-input", function() {
  var selected = $(this).val();
  var that = $('.select2-input');
  $(that).children("option").not("option:disabled").remove();
  $.get('./?data=spectra', function(response){
    var materials = JSON.parse(response);
    $.each(materials[selected], function(index, value) {
      $(that).append($('<option></option>')
        .attr('value', index)
        .text(index)
      );
    });
  });
})

$("#draw").click(function() {
  var selection1 = $(".select1-input option:selected").not("option:disabled").map(function(){ return this.value }).get().join(", ");
  selection1 = selection1.split(", ");
  var selection2 = $(".select2-input option:selected").not("option:disabled").map(function(){ return this.value }).get().join(", ");
  selection2 = selection2.split(", ");
  var selection3 = $(".select3-input:checkbox:checked").map(function(){ return this.value }).get().join(", ");
  selection3 = selection3.split(", ");
  var selection4 = $(".select4-input:checkbox:checked").map(function(){ return this.value }).get().join(", ");
  selection4 = selection4.split(", ");
  var selection = {};
  selection[selection1] = {};
  selection[selection1][selection2] = {};
  $.each(selection3, function(key3, value3) {
    selection[selection1][selection2][value3] = {};
    $.each(selection4, function(key4, value4) {
      selection[selection1][selection2][value3][value4] = [];
    });
  });
  console.log(JSON.stringify(selection));
  var page = './?data=spectra&selection=';
  page = page.concat(encodeURIComponent(JSON.stringify(selection)));
  $.get(page, function(raw_data){
    drawChart(JSON.parse(raw_data), 'Signal vs wavelength', 'Wavelength (nm)', 'Signal');
  });
});



// Load materials list into selection box
$.get('./?data=spectra', function(response){
  var materials = JSON.parse(response);
  $.each(materials, function(index, value) {
    $('.select1-input').append($('<option></option>')
      .attr('value', index)
      .text(index)
    );
  });
});

