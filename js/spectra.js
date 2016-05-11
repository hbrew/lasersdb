

// $("#more").click(function() {
//   $("#selection-template").clone().insertAfter(".selection:last");
//   var that = $(".selection").last();
//   that.removeAttr("style");
//   that.removeAttr("id");
//   // that.children(".input-group").children("select.select1").addClass("chosen-select");
//   that.children(".input-group").children("button").show();
//   var n = $(".selection").length;
//   if( n > 2) {
//     $("button.del").show();
//   }
// });

// $("#chart-form").on("click", "button.del", function() {
//   $(this).parentsUntil("span").remove();
//   var n = $(".selection").length;
//   if( n <= 2) {
//     $("button.del").hide();
//   }
// });

$("#chart-form").on("change", ".select3", function() {
  var selected1 = $(this).parent().children('.select1').val();
  var selected2 = $(this).parent().children('.select2').val();
  var selected3 = $(this).val();
  var that = $(this).parent().children('.select4');
  $(that).children("option").not("option:disabled").remove();
  $.get('./?data=spectra', function(response){
    var materials = JSON.parse(response);
    $.each(materials[selected1][selected2][selected3], function(index, value) {
      $(that).append($('<option></option>')
        .attr('value', index)
        .text(index)
      );
    });
  });
})

$("#chart-form").on("change", ".select2", function() {
  var selected1 = $(this).parent().children('.select1').val();
  var selected2 = $(this).val();
  var that = $(this).parent().children('.select3');
  $(that).children("option").not("option:disabled").remove();
  $.get('./?data=spectra', function(response){
    var materials = JSON.parse(response);
    $.each(materials[selected1][selected2], function(index, value) {
      $(that).append($('<option></option>')
        .attr('value', index)
        .text(index)
      );
    });
  });
})

$("#chart-form").on("change", ".select1", function() {
  var selected = $(this).val();
  var that = $(this).parent().children('.select2');
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
  var selection1 = $(".select1 option:selected").not("option:disabled").map(function(){ return this.value }).get().join(", ");
  selection1 = selection1.split(", ");
  var selection2 = $(".select2 option:selected").not("option:disabled").map(function(){ return this.value }).get().join(", ");
  selection2 = selection2.split(", ");
  var selection3 = $(".select3 option:selected").not("option:disabled").map(function(){ return this.value }).get().join(", ");
  selection3 = selection3.split(", ");
  var selection4 = $(".select4 option:selected").not("option:disabled").map(function(){ return this.value }).get().join(", ");
  selection4 = selection4.split(", ");
  var key2 = {};
  key2[selection3] = selection4;
  var key1 = {};
  key1[selection2] = key2;
  var selection = {};
  selection[selection1] = key1;
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
    $('.select1').append($('<option></option>')
      .attr('value', index)
      .text(index)
    );
  });
});

