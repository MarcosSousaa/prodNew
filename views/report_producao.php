<h1>Relatórios de Produção</h1>

<form onsubmit="return openPopup(this)">

    <div class="report-grid-4">
        Data Inicial<br>
        <input type="date" name="producao_data_inicial" value="<?php echo date("Y-m-d") ?>">
    </div>

    <div class="report-grid-4">
        Data Final<br>
        <input type="date" name="producao_data_final" value="<?php echo date("Y-m-d") ?>">
    </div>

    <div class="report-grid-4">
       Pedido<br>
        <input type="text" name="pedido" placeholder="Numero do Pedido">
    </div>

    <div class="report-grid-4">
       Ordem<br>
        <input type="text" name="ordem" placeholder="Ordem do Pedido">
    </div>

    <div class="report-grid-4">
       Lote<br>
        <input type="text" name="lote" placeholder="Lote Interno">
    </div>

    <div style="clear: both"></div>

    <div style="text-align: center">
        <input type="submit" value="Gerar Relatório">
    </div>

</form>

<script type="text/javascript" src="<?=BASE_URL?>/assets/js/script_report_producao.js"></script>