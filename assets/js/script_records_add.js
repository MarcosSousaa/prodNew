$(document).ready(function(){
	/**
	* TELA REGISTROS - CADASTROS
	 */
	$('.padrao').hide();
	$('#tipoChaves').hide();
	$('#tipoRecebimento').hide();
	$('#tipoServico').hide();
	$('#msg-veiculos').hide();
	// FUNÇÃO QUE PEGA A DATA ATUAL
	function dataAtualFormatada(){
	    var data = new Date();
	    var dia = data.getDate();
	    if(dia.toString().length == 1)
      		dia = "0"+dia;
	    var mes = data.getMonth()+1;
	    if (mes.toString().length == 1)
	      mes = "0"+mes;
	    var ano = data.getFullYear();  
    	return dia+"/"+mes+"/"+ano;
	}
	// FUNÇÃO PEGA A HORA ATUAL
	function horaAtualFormatada(){
		var horario = new Date();
		var hora = horario.getHours();
		if(hora.toString().length == 1)
			hora = "0"+hora;
		var min = horario.getMinutes();
		if(min.toString().length == 1)
			min = "0"+min;
		return hora+':'+min;
	}
	$('#tipoReg').change(function(){		
		var tipo = $('#tipoReg').val();
		$('#data_er').val('');                                
		$('#hora_er').val('');
		if(tipo == '0'){
			$('#titulo-registro').text('Registrar Retirada de chave');						
			$('.padrao').show();	
			$('#tipoServico').hide();
			$('#tipoRecebimento').hide();
			$('#tipoChaves').hide();
            $("#chaves").attr("name","chaves_id");
            $("#colab_ret").attr("name","colab_ret");
			$.ajax({
				type: 'POST',				
				url: BASE_URL+'/ajax/buscaChaves'
			}).done(function(result){
				console.log(result);
				$('#data_er').val(dataAtualFormatada());                                
				$('#hora_er').val(horaAtualFormatada());				                           
				$('#tipoChaves').show();						
				$('#chaves').html(result);				
			}).fail(function(){
				alert('Nao foi possivel, preencher o input com as informações');
			});
		}

		if(tipo == '1'){
	        $('#titulo-registro').text('Registrar Novo Recebimento');	        		
	        $('.padrao').show();	
	        $('#tipoChaves').hide();
	        $('#tipoRecebimento').hide();
	        $('#tipoServico').hide();
	        $("#tipo_vr").attr("name","tipo_vr");
	        $("#placa_r").attr("name","placa_vr");
	        $('#nome_reg').attr("name", "motorista_vr");
	        $('#empresa_reg').attr("name", "empresa_vr");
			$.ajax({
				type: 'POST'
			}).done(function(result){				
				$('#data_er').val(dataAtualFormatada());                                
				$('#hora_er').val(horaAtualFormatada());				                         
				$('#tipoRecebimento').show();				
			}).fail(function(){
				alert('deu ruim');
			});	
		}				
		if(tipo == '2'){
            $('#titulo-registro').text('Registrar nova Entrada de Serviço');            	
            $('.padrao').show();	
            $('#tipoServico').hide();
            $('#tipoRecebimento').hide();
            $('#tipoChaves').hide();                    
            $("#ukVeiculo").attr("name","veiculos_id");
            $.ajax({
                type: 'POST'								
			}).done(function(result){				
				$('#data_er').val(dataAtualFormatada());				
				$('#hora_er').val(horaAtualFormatada());				                           
				$('#tipoServico').show();
			}).fail(function(){
				alert('deu errado');
			});		
		}
		
	});
	// FUNÇÃO AO SAIR DO INPUT PLACA
	$('#placa-reg').on('blur',function(){
		var filtro = $('#placa-reg').val().toUpperCase();		
		$.ajax({
				type: 'POST',
				data: {filtro:filtro},
				url: BASE_URL+'/ajax/buscaVeiculos'
			}).done(function(result){
				var obj = $.parseJSON(result);				
				if(obj.length == 0){					
					$('#msg-veiculos').show();
					setInterval(function(){
					$('#msg-veiculos').hide("slide");
					},5000);				
					$('#tipoRecebimento').hide();
					$('#tipoServico').hide();
					$('#placa-reg').val('');
					$('#nome-reg').val('');
					$('#empresa-reg').val('');
					$('#ukVeiculo').val('');

				}   
				else{					
					$('#ukVeiculo').val(obj.id);
					$('#nome-reg').val(obj.motorista);
					$('#empresa-reg').val(obj.empresa);
                    $('#msg-veiculos').hide();
				}   

			}).fail(function(){
				alert('deu errado');
			});		
	});

	/* TELA EDIÇÃO*/
	$('#data_sr').val(dataAtualFormatada());
	$('#hora_sr').val(horaAtualFormatada());
});