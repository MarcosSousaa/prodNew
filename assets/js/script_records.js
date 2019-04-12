$(document).ready(function () {

    /*
     * Pagina de Registros [escolha a tabela]
     */
    //quando iniciar esconde todas as tabelas
    $('.tabBodyRegistros').hide();
    
    $('#p_registro').on('change', function () {
        var item = $('#p_registro').val();
        var data1 = $('input[name=data_1]').val();
        var data2 = $('input[name=data_2]').val();        
        if(data1 != '' && data2 != ''){   
        alert(BASE_URL)                 
            $.ajax({
                url: BASE_URL+'/ajax/buscaPorData',
                type: 'POST',
                data: {data1: data1, data2: data2, tipo: item},
                dataType: 'json'                
            }).done(function(json){
                $('.tabBodyRegistros').eq(item).show();
            }).fail(function(){

            });
            
        }       
        

    });

});