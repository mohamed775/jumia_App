/*

Visit My Website to see creative design
				www.HUSAMUI.com


*/


$(document).ready(function(){
  
    $(".dropdown").click(function(){
      $(".menu").toggleClass("showMenu");
        $(".menu > li").click(function(){
          $(".dropdown > p").html($(this).html());
            $(".menu").removeClass("showMenu");
        });
    });
    
  });