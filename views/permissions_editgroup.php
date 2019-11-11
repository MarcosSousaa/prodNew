<h1>Permissões - Editar Grupo de Permissões</h1>

<form method="POST">

    <label for="name">Nome do grupo permissão</label>
    <input type="text" name="name" value="<?= $group_info['name'] ?>"><br><br>
    <fieldset>            
        <legend>Permissões</legend><br>
        <?php foreach ($permissions_list as $p): ?>
            <div class="p_item">
                <input type="checkbox" name="permissions[]" value="<?= $p['id'] ?>" id="p_<?= $p['id'] ?>"
                       <?= (in_array($p['id'], $group_info['params'])) ? 'checked="checked"' : '' ?>/>
                <label for="p_<?= $p['id'] ?>"><?= $p['descricao'] ?></label>
            </div>
        <?php endforeach; ?>
    </fieldset>
    <br>
    <fieldset>            
        <legend>Menu</legend><br>
        <?php foreach ($menu_list as $m): ?>
            <div class="p_item">
                <input type="checkbox" name="menu[]" value="<?= $m['id'] ?>" id="m_<?= $m['id'] ?>"
                       <?= (in_array($m['id'], $group_info['menu_acesso'])) ? 'checked="checked"' : '' ?>/>
                <label for="m_<?= $m['id'] ?>"><?= $m['descricao'] ?></label>
            </div>
        <?php endforeach;?>

    </fieldset>
    <br><br>
    
    <input type="submit" value="Editar">

</form>