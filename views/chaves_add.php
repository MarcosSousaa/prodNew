<h1>Chaves - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">

    <label for="cod">Cod. Interno da Chave</label><br>
    <input type="text" name="cod" required="" placeholder="INFORME O CODIGO INTERNO DA CHAVE"><br /><br />

    <label for="local">Local da Chave</label>
    <input type="text" name="local" required="" placeholder="INFORME O LOCAL DA CHAVE"><br><br>
    


    <input type="submit" value="Adicionar">

</form>