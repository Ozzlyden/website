$(function(){
    // Main Code

    $('nav.mobile').click(function(){   // quando clicar nessa class, fazer...
        var listMenu = $('nav.mobile ul');

        // Abri menu mobile sem feito
        /*
        if(listMenu.is('hidden') ==  true)
            listMenu.fadeIn();
        else
            listMenu.fadeOut();
        */

        // Mais uma form
        /*
        if(listMenu.is('hidden') ==  true)
            listMenu.css('display', 'block');
        else
            listMenucss('display', 'none');
        */

         // Abri menu mobile com feito
        if(listMenu.is('hidden') ==  true){
            var icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fa-bars');
            icone.addClass('fa-x');
            listMenu.slideToggle();
        }
        else{
            //icone.removeClass('fa-x');
            //icone.addClass('fa-bars');
            listMenu.slideToggle();
        }
    })

})