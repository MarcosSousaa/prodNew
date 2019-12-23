<h1>Operador - Visualizar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">

    <label for="operador">Nome Operador</label>
    <input type="text" name="operador" disabled value="<?= $operador_info['operador']; ?>"><br><br>
    <a class="button button_small" href="<?= BASE_URL?>/operador">VOLTAR</a>

</form>