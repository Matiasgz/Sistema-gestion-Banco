"use strict"



$(document).ready(function(){ // BUSCADOR 
  $("#buscador").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#bodyNovedades tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});