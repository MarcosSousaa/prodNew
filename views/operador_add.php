<h1>Operador - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">

    <label for="operador">Nome Operador</label>
    <input type="text" name="operador" required="" placeholder="INFORME O NOME DO OPERADOR"><br><br>
    <input type="submit" value="Adicionar">

</form>