<h1 align="center">Limpeza - Editar</h1><br>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>

<h3>
    Data Limpeza: - <?php echo date('d/m/Y', strtotime($limpeza_info['data_limp'])); ?>
    - Horario Limpeza: - <?= $limpeza_info['hrlimp']; ?>
</h3>
<h3>Nº Extrusora Limpa: - <?= $limpeza_info['extrusora'] ; ?>
    - Nome Operador: - <?= $limpeza_info['operador'] ;?>
    
</h3>
<h3>Estrutura: - <?= ($limpeza_info['estrutura'] == '1') ? 'Conforme' : 'Não Conforme'; ?> <br>
    Proteção: - <?= ($limpeza_info['protecao'] == '1') ? 'Conforme' : 'Não Conforme'; ?> <br>
    Painel: - <?= ($limpeza_info['painel'] == '1') ? 'Conforme' : 'Não Conforme' ;?> <br>
    Chão: - <?= ($limpeza_info['chao'] == '1') ? 'Conforme' : 'Não Conforme' ;?>
</h3>
<form method="POST">
    <label for="data_limp">Data Limpeza</label>
    <input type="date" name="data_limp" value="<?= $limpeza_info['data_limp']; ?>"><br><br>
    <label for="hrlimp">Horario Limpeza</label>
    <input type="text" name="hrlimp" value="<?= $limpeza_info['hrlimp'];?>">
    <span class="errorMsgHor"></span> 
    <br>
    <label>Operador</label>
    <select class="form-control" id="operador_edit" name="operador_edit">
        <?php foreach($operador as $p ) : ?>
        <option value="<?=$p['id'] ?>" <?=(in_array($p['id'],$limpeza_info['operador_fk'])) ? 'checked="checked"' : '' ?>><?=$p['operador'] ?></option>
        <?php endforeach; ?>
    </select>        
    <label>Extrusora Limpa</label>  
    <select id="extrusora_limp" name="extrusora_limp">
        <option disabled selected>Escolha uma opção</option>
        <option value="01" <?= ($limpeza_info['extrusora'] == '01') ? 'selected="selected"' : ''; ?>>Extrusora 01</option>
        <option value="02" <?= ($limpeza_info['extrusora'] == '02') ? 'selected="selected"' : ''; ?>>Extrusora 02</option>
        <option value="03" <?= ($limpeza_info['extrusora'] == '03') ? 'selected="selected"' : ''; ?>>Extrusora 03</option>
        <option value="04" <?= ($limpeza_info['extrusora'] == '04') ? 'selected="selected"' : ''; ?>>Extrusora 04</option>
        <option value="05" <?= ($limpeza_info['extrusora'] == '05') ? 'selected="selected"' : ''; ?>>Extrusora 05</option>
    </select> 
    <br><br>
    <fieldset>
        <legend>Selecione o que foi limpo na extrusora</legend>
        <input type="checkbox" name="est" value="1" id="est" <?= ($limpeza_info['estrutura'] == '1') ? 'checked="checked"' : '' ?>>
        <label for="est">Estrutura</label>
        <input type="checkbox" name="prot" value="1" id="prot" <?= ($limpeza_info['protecao'] == '1') ? 'checked="checked"' : '' ?>>
        <label for="prot">Proteção</label>
        <input type="checkbox" name="pain" value="1" id="pain" <?= ($limpeza_info['painel'] == '1') ? 'checked="checked"' : '' ?>>
        <label for="pain">Painel</label>
        <input type="checkbox" name="chao" value="1" id="chao" <?= ($limpeza_info['chao'] == '1') ? 'checked="checked"' : '' ?>>
        <label for="chao">Chão</label>
    </fieldset>
    <br><br> 
    <fieldset>
        <legend>Situação Aprovação da Qualidade</legend>
        <p>
            <input type="radio" name="quali" value="1" <?= ($limpeza_info['valid'] == '1') ? 'checked="checked"' : ''; ?>>
            <label>Aprovado</label>
            <input type="radio" name="quali" value="2" <?= ($limpeza_info['valid'] == '2') ? 'checked="checked"' : ''; ?>>
            <label>Reprovado</label>            
        </p>
        <span class="errorMsgSitu"></span>
    </fieldset>
    <br>
    <label>Observação</label>
    <textarea name="obs"><?=$limpeza_info['obs'] ?></textarea>
    <br><br>
    <button id="upLimp">ATUALIZAR</button>
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_limpeza_add.js"></script>
