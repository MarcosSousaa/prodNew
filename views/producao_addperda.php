<link href="<?= BASE_URL ?>/assets/css/producao.css" rel="stylesheet"/>
<h1  style="text-align: center">Dados Perda - Adicionar </h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <fieldset>
        <legend>Informações Principal</legend>
        <label for="data_perda">Data</label>
        <input type="date" name="data_perda" required value="<?php echo date('Y-m-d');?>">                     
        <label>Turno</label>  
        <select id="turno_perda" name="turno_perda">
            <option disabled selected>Escolha uma opção</option>
            <option value="001">MANHA</option>
            <option value="002">TARDE</option>
            <option value="003">NOITE</option>        
        </select>        
    </fieldset>    
    <fieldset>
        <legend>Informações da Perda</legend>
        <label for="Apara">Apara</label>
        <input type="text" name="apara" id="apara">
        <span class="errorMsgApara"></span>  
        <label for="refile">Refile</label>
        <input type="text" name="refile" id="refile">            
        <span class="errorMsgRefile"></span>  
        <label for="borra">Borra</label>
        <input type="text" name="borra" id="borra">
        <span class="errorMsgBorra"></span> 
        <label for="acabamento">Acabamento</label>
        <input type="text" name="acabamento" id="acabamento">
        <span class="errorMsgAcabamento"></span>        
    </fieldset>
    <fieldset>
        <label for="qtdparada">Quantidade Parada</label>
        <input type="number" name="qtdparada" id="qtdparada">
        <label for="tempoparada">Tempo Parada</label>
        <input type="text" name="tempoparada" id="tempoparada">       

    </fieldset>
    <fieldset>
        <legend>Motivo Parada</legend>
        <input type="checkbox" name="oc[]" value="LB" id="LB">
        <label for="LB">LB-LIMP.BORDA </label>
        <input type="checkbox" name="oc[]" value="BFG" id="BFG">
        <label for="BFG">BFG-BALAO FURADO POR GEL</label>
        <input type="checkbox" name="oc[]" value="LM" id="LM">
        <label for="LM">LM-LIMPEZA DE MATRIZ</label>
        <input type="checkbox" name="oc[]" value="PM" id="PM">
        <label for="PM">PM-PROBL.MECANICO</label>
        <input type="checkbox" name="oc[]" value="PE" id="PE">
        <label for="PE">PE-PROBL.ELETRICO</label>
        <input type="checkbox" name="oc[]" value="AC" id="AC">
        <label for="AC">AC-ACERTO</label>
        <input type="checkbox" name="oc[]" value="LG" id="LG">
        <label for="LG">LG-LIMP.GERAL</label>
        <input type="checkbox" name="oc[]" value="QE" id="QE">
        <label for="QE">QE-QUEDA ENERGIA</label>
        <input type="checkbox" name="oc[]" value="ME" id="ME">
        <label for="ME">ME-MANUTENCAO ELETRICA</label>
        <input type="checkbox" name="oc[]" value="MM" id="MM">
        <label for="MM">MM-MANUTENCAO MECANICA</label>
        <input type="checkbox" name="oc[]" value="IM" id="IM">
        <label for="IM">IM - INICIO DA MAQUINA</label>
        <input type="checkbox" name="oc[]" value="LPM" id="LPM">
        <label for="LPM">LPM - LIMPEZA DE MACHO</label>
    </fieldset>
    
    <input type="submit" value="Adicionar">    
</form>

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>

