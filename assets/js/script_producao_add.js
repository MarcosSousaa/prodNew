$(document).ready(function(){
	// MASCARA	
	$('#hrini').mask("00:00");
	$('#hrfim').mask("00:00");
	$('#peso_bob').mask("#.##0,000", {reverse: true });
    $('#total').mask("#.##0,000", {reverse: true });
    $('#apara').mask("#.##0,000", {reverse: true });
    $('#refile').mask("#.##0,000", {reverse: true });
    $('#borra').mask("#.##0,000", {reverse: true });    
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
	$('#addProd').click(function(){
		var valid = true;
		var hrlimp = $('#hrlimp').val();
		var ext = $('#extrusora_prod').val();
		var turno = $('#turno_prod').val();
		var op = $('#operador').val();
		var hri = $('#hrini').val();
		var aprovaoini = $('input[name="aprovacaoini"]').val();
		var pedido = $('#pedido').val();
		var op = $('#ordem').val();
		var lote = $('#lote').val();
		var peso = $('#peso_bob').val();
		var qtd = $('#quantidade').val();	
		var larg = $('#larg').val();
		var esp = $('#esp').val();
		var metrag = $('#metrag').val();

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
});