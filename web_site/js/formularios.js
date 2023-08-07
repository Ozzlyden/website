$(function () {

  $('body').on('submit','form',function(){
		var form = $(this);

    // Conifg para enviar para o ajax
		$.ajax({
			beforeSend:function(){
				$('.overlay-loading').fadeIn();
			},
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType: 'json', // toda comunicao eh em json
			data:form.serialize()
		}).done(function(data){

      // Verificacao
			if(data.sucesso){	  // var data eh o que informa sobre o envio
				$('.overlay-loading').fadeOut();
				$('.sucesso').fadeIn();
				setTimeout(function(){
					$('.sucesso').fadeOut();
				},3000)
			}else{
				$('.overlay-loading').fadeOut();
			}
		});
		return false;
	})
    
  })