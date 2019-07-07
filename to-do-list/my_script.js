$(document).ready( function() {

 $("#add_li").click( function() {
    $("ol").append("<li></li>");
 });
 
  $("#remove_li").click( function() {
    $("li:last").remove();
 });

});