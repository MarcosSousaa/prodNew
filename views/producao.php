<h1 style="text-align: center;">Produção</h1>
<div class="tabarea">
    <div class="tabitem activetab">Lançamento de Produção</div>
    <?php if($producao_add) : ?>
    <div class="tabitem">Lançamento Acabamento</div>
    <?php endif ?>
</div>

<div class="tabcontent">
    <div class="tabbody">
        <?php if($producao_add) : ?>
        <a class="button" href="<?= BASE_URL ?>/producao/add_prod"> Adicionar Dados Produção</a>
        <?php endif; ?>
        <table width="100%">
            <tr>
                <th>Data</th>
                <th>Extrusora</th>
                <th>Turno</th>
                <th>Nome Operador</th>
                <th>Numero Pedido</th>
                <th>Quantidade KG</th>
                <th width="160">Ações</th>
            </tr>
            <?php foreach ($permission_groups_list as $p): ?>
                <tr>
                    <td><?= $p['name'] ?></td>
                    <td>
                        <a class="button button_small" href="<?= BASE_URL ?>/permissions/edit_group/<?= $p['id'] ?>">Editar</a>
                        <a class="button button_small" href="<?= BASE_URL ?>/permissions/delete_group/<?= $p['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php if($producao_addacab) { ?>
    <div class="tabbody">
        <?php if($producao_addacab) : ?>
        <a class="button" href="<?= BASE_URL ?>/permissions/add">Adicionar Dados Acabamento</a>
        <?php endif; ?>
        <table width="100%">
            <tr>
                <th>Data</th>
                <th>Extrusora</th>
                <?php if($permissions_del) : ?>
                <th width="50">Ações</th>
                <?php endif; ?>
            </tr>
            <?php foreach ($permission_list as $p): ?>
                <tr>
                    <td><?= $p['descricao'] ?></td>
                    <td><?= $p['name'] ?></td>
                    <?php if($permissions_del) : ?>
                    <td>
                        <a class="button button_small" href="<?= BASE_URL ?>/permissions/delete/<?= $p['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php }?>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao.js"></script>