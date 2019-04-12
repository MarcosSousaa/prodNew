<h1>Usuários - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">

    <label for="cpf">CPF</label>
    <input type="text" name="cpf" required><br><br>

    <label for="name">Nome</label>
    <input type="text" name="name" required=""><br><br>

    <label for="turno">Turno</label>
    <input type="text" name="turno"><br><br>

    <label for="group">Grupo de Permissão</label>
    <select name="group" id="group" required>
        <?php foreach ($group_list as $group) : ?>
            <option value="<?= $group['id'] ?>"><?= $group['name'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Adicionar">

</form>