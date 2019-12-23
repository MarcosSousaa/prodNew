$(document).ready(function(){
	// MASCARA	
	$('#hrlimp').mask("00:00");
	// FUNCAO AJAX CARREGA OPTION OPERADOR
	$.ajax({
		type: 'POST',
		url: BASE_URL+'/ajax/buscaOperador'
	}).done(function(result){		
		$('#operador').html(result);
	}).fail(function(){
		alert('impossivel carregar as informações do operador');
	});

	// FUNÇÃO ADD
	$('#addLimp').click(function()
	{
		var valid = true;
		var hrlimp = $('#hrlimp').val();
		var ext = $('#extrusora_limp').val();
		var op = $('#operador').val();

		if(hrlimp.length < 1){
			setTimeout(function(){
        		$('#hrlimp').focus();
        		$('#hrlimp').css("border","1px solid red");
        		$('.errorMsgHor').text('informe o horario da limpeza da maquina.');
        		$('.errorMsgHor').css("color","red");
    		});
    		setTimeout(function(){
        		$('#hrlimp').focus();
        		$('#hrlimp').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgHor').text("");
    		},10000); 
    		valida = false;                    
		}

        else if(ext = null){
	    	setTimeout(function(){
	    		$('#extrusora_limp').focus();
	    		$('#extrusora_limp').css("border","1px solid red");
	    		$('.errorMsgColab').text('Escolha a extrusora que foi feito a limpeza');
	    		$('.errorMsgColab').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#extrusora_limp').focus();
        		$('#extrusora_limp').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgColab').text("");
        	},10000); 
        	valida = false;                     	
        }

        else if(op = null){
	    	setTimeout(function(){
	    		$('#operador').focus();
	    		$('#operador').css("border","1px solid red");
	    		$('.errorMsgColab').text('Escolha o operador que efetuou a limpeza');
	    		$('.errorMsgColab').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#operador').focus();
        		$('#operador').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgColab').text("");
        	},100000); 
        	valida = false;                     	
        }

        else {
        	alert('foi no else');
        	valida = true;
        	if(valida){
        		$('form').submit();
        	}
        }
	});

	$('#upLimp').click(function(){
		var valid = true;				
		if(!$("input[type='radio'][name='quali']").is(':checked')){				
			setTimeout(function(){
	    		$('input[name="quali"]').focus();
	    		$('input[name="quali"]').css("border","1px solid red");
	    		$('.errorMsgSitu').text('Escolha uma situação de aprovação');
	    		$('.errorMsgSitu').css("color","red");
	    	});
        	setTimeout(function(){
        		$('input[name="quali"]').focus();
        		$('input[name="quali"]').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgSitu').text("");
        	},10000); 
        	valida = false;                   	
		}
		else {			
			valida = true;
        	if(valida){
        		$('form').submit();
        	}	
		}
	});

});