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
        <br>
        <label for="qtdparada">Quantidade Parada</label>
        <input type="number" name="qtdparada" id="qtdparada" value="<?= $perda_info['qtdparada'];?>">
        <label for="tempoparada">Tempo Parada</label>
        <input type="text" name="tempoparada" id="tempoparada" value="<?= $perda_info['tempoparada'];?>">
        <br><br>
        <input type="checkbox" name="oc[]" value="LB" id="LB" <?= (in_array("LB", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="LB">LB-LIMP.BORDA </label>
        <input type="checkbox" name="oc[]" value="BFG" id="BFG" <?= (in_array("BFG", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="BFG">BFG-BALAO FURADO POR GEL</label>
        <input type="checkbox" name="oc[]" value="LM" id="LM" <?= (in_array("LM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="LM">LM-LIMPEZA DE MATRIZ</label>
        <input type="checkbox" name="oc[]" value="PM" id="PM" <?= (in_array("PM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="PM">PM-PROBL.MECANICO</label>
        <input type="checkbox" name="oc[]" value="PE" id="PE" <?= (in_array("PE", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="PE">PE-PROBL.ELETRICO</label>
        <input type="checkbox" name="oc[]" value="AC" id="AC" <?= (in_array("AC", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="AC">AC-ACERTO</label>
        <input type="checkbox" name="oc[]" value="LG" id="LG" <?= (in_array("LG", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="LG">LG-LIMP.GERAL</label>
        <input type="checkbox" name="oc[]" value="QE" id="QE" <?= (in_array("QE", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="QE">QE-QUEDA ENERGIA</label>
        <input type="checkbox" name="oc[]" value="ME" id="ME" <?= (in_array("ME", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="ME">ME-MANUTENCAO ELETRICA</label>
        <input type="checkbox" name="oc[]" value="MM" id="MM" <?= (in_array("MM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="MM">MM-MANUTENCAO MECANICA</label>
        <input type="checkbox" name="oc[]" value="IM" id="IM" <?= (in_array("IM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="IM">IM - INICIO DA MAQUINA</label>
        <input type="checkbox" name="oc[]" value="LPM" id="LPM" <?= (in_array("LPM", explode(",",$perda_info['oc']))) ? 'checked="checked"' : '' ; ?>>
        <label for="LPM">LPM - LIMPEZA DE MACHO</label> 
    </fieldset>   
    <input type="submit" value="Atualizar">    
</form>

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>

