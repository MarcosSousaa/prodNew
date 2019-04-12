<h1>Chaves - Editar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">

    <label for="cod">Cod. Interno da Chave</label><br>
    <input type="text" name="cod" required="" value="<?php echo $chaves_info['cod'];?>" placeholder="INFORME O CODIGO INTERNO DA CHAVE"><br /><br />

    <label for="local">Local da Chave</label>
    <input type="text" name="local" required="" value="<?php echo $chaves_info['local'];?>"placeholder="INFORME O LOCAL DA CHAVE"><br><br>

    <label>Status da Chave</label><br>
    
    <input type="radio" name="status" value="A" <?= ($chaves_info['status'] == 'A') ? 'checked="checked"' : '' ?> />Ativo

    <input type="radio" name="status" value="I" <?= ($chaves_info['status'] == 'I') ? 'checked="checked"' : '' ?> />Inativo
    <br><br>

    <input type="submit" value="Atualizar">

</form>