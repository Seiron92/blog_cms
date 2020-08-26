$(".menu-wrapper").on('click', function(event){
    $(this).toggleClass("change");
    $(this).closest(".fmenu").find('.menu').toggleClass("menuActive");
    

    $("#jumpToLatest").click(function () {
        $('html,body').animate({
            scrollTop: 10550
        },
            'fast'
            );
 
            $(this).closest(".fmenu").find('.menu').hide();
         $(this).closest(".fmenu").find('.menu-wrapper').toggleClass("change");
         $(this).closest(".fmenu").find('.menu').toggleClass("menuActive");
      
    })
 
   $(this).closest(".fmenu").find('.menu').show();

})
 




   

