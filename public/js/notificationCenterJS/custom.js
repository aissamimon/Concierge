$(document).ready(function() {
    
    $('.barmenubutton').click(function(){
       var elem = document.getElementById("sidepanel");
       elem.setAttribute("style", "width: 58px !important; transition: all 300ms");
//       var elem2 = document.getElementsByClassName("content");
    });
       
    $('.barmenubutton2').click(function(){
      var element = document.getElementById("sidepanel");
      element.setAttribute("style", "width: 0px !important; transition: all 300ms");
    });
    
    $("#action-show").click(function() {
      $('#action').slideToggle();
    });

    $('#action-show-2').click(function(){
      $('.card-fehler-footer').slideToggle();
    });
    
    $('#collapse').click(function(){
      $('#solved-card-body').slideToggle();
    }); 

    $('#slider-top').click(function(){
      $('.log-mensajes').addClass("log-mensajes-3");
      $('.log-mensajes').removeClass("log-mensajes-4");
      $('#slider-top').addClass("slider-up-hidden");
      $('#slider-down').addClass("slider-down-visible");
    });

    $('#slider-down').click(function(){
      $('.log-mensajes').removeClass("log-mensajes-3");
      $('.log-mensajes').addClass("log-mensajes-4");
      $('#slider-top').removeClass("slider-up-hidden");
      $('#slider-down').removeClass("slider-down-visible");
    });
});
