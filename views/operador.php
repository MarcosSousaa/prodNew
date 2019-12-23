<h1>Operador</h1>

<a class="button" href="<?= BASE_URL ?>/operador/add">Adicionar Operador</a>

<table width="100%" class="paginated">
    <thead>
        <tr>        
            <th>Nome Operador</th>        
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($operador_list as $op): ?>
        <tr>
            <td><?= $op['operador'] ?></td>            
            <td>
                <a class="button button_small" href="<?= BASE_URL ?>/operador/view/<?= $op['id'] ?>">Visualizar</a>
                <a class="button button_small" href="<?= BASE_URL ?>/operador/edit/<?= $op['id'] ?>">Editar</a>                
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

