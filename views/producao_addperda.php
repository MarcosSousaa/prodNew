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
    
    <input type="submit" value="Adicionar">    
</form>

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>

