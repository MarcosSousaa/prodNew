<h1>Usuários</h1>

<a class="button" href="<?= BASE_URL ?>/users/add">Adicionar Usuário</a>

<table width="100%">
    <tr>        
        <th>Nome</th>
        <th>Grupo de Permissão</th>
        <th width="160">Ações</th>
    </tr>
    <?php foreach ($users_list as $us): ?>
        <tr>
            <td><?= $us['name'] ?></td>
            <td><?= $us['group_name'] ?></td>
            <td>
                <a class="button button_small" href="<?= BASE_URL ?>/users/edit/<?= $us['cpf'] ?>">Editar</a>
                <a class="button button_small" href="<?= BASE_URL ?>/users/delete/<?= $us['cpf'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>