$(function(){
    // Todo codigo aqui

    $('nav.mobile').click(function(){   // quando clicar nessa class, fazer...
        var listMenu = $('nav.mobile ul');

        // Abri menu mobile com feito
        listMenu.slideToggle();

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
    })

})