<h1>Operador - Editar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">

    <label for="operador">Nome Operador</label>
    <input type="text" name="operador" value="<?= $operador_info['operador']; ?>"><br><br>
    <input type="submit" value="Atualizar">

</form>