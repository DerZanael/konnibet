$(document).ready(function(){
  $(".makespin").hover(
    function(){
      $(this).find("[data-fa-i2svg]").addClass("fa-spin");
    },
    function(){
      $(this).find("[data-fa-i2svg]").removeClass("fa-spin");
    }
  )
});
