<link href="<?= BASE_URL ?>/assets/css/producao.css" rel="stylesheet"/>
<h1  style="text-align: center">Dados Perda - Editar </h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">
    <fieldset style="height: 250px;width: 50%;">
        <legend>Informações Para edição</legend>
        <h3><strong class="title">Data - </strong> <?php echo date('d/m/Y', strtotime($perda_info['data_perd'])); ?>                
            <strong class="title">Turno - </strong> <?=$turno[$perda_info['turno']] ;?>
        </h3>
        <label for="Apara">Apara</label>
        <input type="text" name="apara" id="apara" value="<?=$perda_info['apara']; ?>">
        <span class="errorMsgApara"></span>  
        <label for="refile">Refile</label>
        <input type="text" name="refile" id="refile" value="<?=$perda_info['refile']; ?>">            
        <span class="errorMsgRefile"></span>  
        <label for="borra">Borra</label>
        <input type="text" name="borra" id="borra" value="<?=$perda_info['borra']; ?>">
        <span class="errorMsgBorra"></span> 
        <label for="acabamento">Acabamento</label>
        <input type="text" name="acabamento" id="acabamento" value="<?=$perda_info['acabamento']; ?>">
        <span class="errorMsgAcabamento"></span>  
    </fieldset>    
    <input type="submit" value="Atualizar">    
</form>

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>

