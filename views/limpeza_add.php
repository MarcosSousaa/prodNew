<h1>Limpeza - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="post">

    <label for="data_limp">Data Limpeza</label>
    <input type="date" name="data_limp" required value="<?php echo date('Y-m-d');?>"><br><br>    
    <label for="hrlimp">Horario Limpeza</label>
    <input type="text" name="hrlimp" id="hrlimp">
    <span class="errorMsgHor"></span> 
    <br>        
    <label>Extrusora Limpa</label>  
    <select id="extrusora_limp" name="extrusora_limp">
        <option disabled selected>Escolha uma opção</option>
        <option value="01">Extrusora 01</option>
        <option value="02">Extrusora 02</option>
        <option value="03">Extrusora 03</option>
        <option value="04">Extrusora 04</option>
        <option value="05">Extrusora 05</option>
    </select>
    <span class="errorMsgExt"></span>
    <br>   
    <label>Operador</label>
    <select class="form-control" id="operador" name="operador"></select>    
    <span class="errorMsgOperador"></span>  
    <br><br>
    <fieldset>
        <legend>Selecione o que foi limpo na extrusora</legend>
        <input type="checkbox" name="est" value="1" id="est">
        <label for="est">Estrutura</label>
        <input type="checkbox" name="prot" value="1" id="prot">
        <label for="prot">Proteção</label>
        <input type="checkbox" name="pain" value="1" id="pain">
        <label for="pain">Painel</label>
        <input type="checkbox" name="chao" value="1" id="chao">
        <label for="chao">Chão</label>
    </fieldset>
    <br><br>    
    <button id="addLimp" class="btn">Adicionar</button>    
</form>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_limpeza_add.js"></script>