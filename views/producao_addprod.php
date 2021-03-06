<link href="<?= BASE_URL ?>/assets/css/producao.css" rel="stylesheet"/>
<h1  style="text-align: center">Dados Produção - Adicionar </h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <fieldset>
        <legend>Informações Principal</legend>
        <label for="data_limp">Data Produção</label>
        <input type="date" name="data_prod" required value="<?php echo date('Y-m-d');?>">     
        <label>Extrusora</label>  
        <select id="extrusora_prod" name="extrusora_prod">
            <option disabled selected>Escolha uma opção</option>
            <option value="01">Extrusora 01</option>
            <option value="02">Extrusora 02</option>
            <option value="03">Extrusora 03</option>
            <option value="04">Extrusora 04</option>
            <option value="05">Extrusora 05</option>
        </select>
        <span class="errorMsgExt"></span>
        <br>
        <label>Turno</label>  
        <select id="turno_prod" name="turno_prod">
            <option disabled selected>Escolha uma opção</option>
            <option value="001">MANHA</option>
            <option value="002">TARDE</option>
            <option value="003">NOITE</option>        
        </select>
        <span class="errorMsgTurno"></span>        
        <label>Operador</label>
        <select class="form-control" id="operador" name="operador"></select>
        <span class="errorMsgOperador"></span>      
    </fieldset>
    <fieldset>
        <legend>Situação Aprovação - Inicio </legend>
        <label for="hrlimp">Horario Inicio</label>
        <input type="text" name="hrini" id="hrini">
        <span class="errorMsgHorIni"></span> 
        <p>
            <input type="radio" name="aprovacaoini" id="aprovacaoini" value="1">
            <label for="aprovacaoini">Aprovado</label>
            <input type="radio" name="aprovacaoini" id="reprovacaoini" value="2">
            <label for="reprovacaoini">Reprovado</label>            
        </p>
        <span class="errorMsgSituIni"></span>
    </fieldset>
    <br>
    <fieldset>
        <legend>Informações do pedido</legend>
        <label for="pedido">NºPed</label>
        <input type="text" name="pedido" id="pedido">
        <span class="errorMsgPedido"></span>  
        <label for="ordem">NºOp</label>
        <input type="text" name="ordem" id="ordem">            
        <span class="errorMsgOrdem"></span>  
        <label for="lote">Lote</label>
        <input type="text" name="lote" id="lote">
        <span class="errorMsgLote"></span> 
        <label for="rpm">Rpm</label>
        <input type="text" name="rpm" id="rpm">
        <span class="errorMsgRpm"></span>  
    </fieldset>    
    <br>
    <fieldset>
        <legend>Dados Produtivos</legend>
        <label for="peso_bob">Peso</label>
        <input type="text" name="peso_bob" id="peso_bob">
        <span class="errorMsgPeso"></span>    
        <label for="quantidade">Qtd</label>
        <input type="number" name="quantidade" id="quantidade"> 
        <span class="errorMsgQtd"></span> 
        <label for="total">Total</label>
        <input type="text"  name="total" id="total" readonly=""> 
        <br><br>
        
    </fieldset>        
    <fieldset>
        <legend>Informações do produto</legend>
        <label for="larg">Larg</label>
        <input type="text" name="larg" id="larg">
        <label for="esp">Esp</label>
        <input type="text" name="esp" id="esp">
        <label for="metrag">Metrag</label>
        <input type="text" name="metrag" id="metrag"> 
    </fieldset>    
    <fieldset>
        <legend>Situação Aprovação - Fim</legend>
        <label for="hrfim">Horario Termino</label>
        <input type="text" name="hrfim" id="hrfim">
        <span class="errorMsgHorFim"></span> 
        <p>
            <input type="radio" id="aprovacaofim" name="aprovacaofim" value="1">
            <label for="aprovacaofim">Aprovado</label>
            <input type="radio" id="reprovacaofim" name="aprovacaofim" value="2">
            <label for="reprovacaofim">Reprovado</label>            
        </p>
        <span class="errorMsgSituFim"></span>        
    </fieldset>
    <br>
    <input type="button" name="addProd" id="addProd" value="Adicionar">    
</form>

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>

