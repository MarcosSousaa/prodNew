$(document).ready(function () {
    $('#btn-filtro').show();
    $('.filtro-data').hide();
    /*
     * Pagina de Registros [escolha a tabela]
     */
    //quando iniciar esconde todas as tabelas  
    $('#btn-filtro').click(function(){
        $('#btn-filtro').hide();
        $('.filtro-data').show();

        $('#p_registro').on('change', function(){
            var tipoReg = $('#p_registro').val();
            $('form').submit();    
        });
    });
    $('table.paginated').each(function() {
            var currentPage = 0;
            var numPerPage = 5;
            var $table = $(this);
            $table.bind('repaginate', function() {
                $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
            });
            $table.trigger('repaginate');
            var numRows = $table.find('tbody tr').length;
            var numPages = Math.ceil(numRows / numPerPage);
            var $pager = $('<div class="pager"></div>');
            for (var page = 0; page < numPages; page++){
                $('<span class="page-number"></span>').text(page + 1).bind('click', {
                    newPage: page
                }, function(event) {
                        currentPage = event.data['newPage'];
                        $table.trigger('repaginate');
                        $(this).addClass('active').siblings().removeClass('active');
                    }).appendTo($pager).addClass('clickable');
                }
                $pager.insertBefore($table).find('span.page-number:first').addClass('active');
            });    
    /*
    $('#p_registro').on('change', function () {
            //$('.filtro-data').show();
            var item = $('#p_registro').val();
            $('.tabBodyRegistros').hide();                
            $('.tabBodyRegistros').eq(item).show();
    });
    */
     
});