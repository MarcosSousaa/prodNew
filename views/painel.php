<h1>Menu</h1>

<table width="100%">
    <tr>        
        <th>Classe CSS do menu</th>        
        <th>Caminho Menu</th>        
        <th>Descrição</th>        
    </tr>
    <?php foreach ($menu_list as $m): ?>
        <tr>            
            <td><?= $m['className'] ?></td>
            <td><?= $m['caminho'] ?></td>
            <td><?= $m['descricao'] ?></td>            
        </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <?php for ($i = 1; $i <= $p_count; $i++): ?>
        <div class="pag_item <?= ($i == $p) ? 'pag_ativo' : '' ?>"><a href="<?= BASE_URL ?>/chaves?p=<?= $i ?>"><?= $i ?></a></div>
    <?php endfor; ?>
    <div style="clear: both"></div>
</div>

<!--<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_veiculos.js"></script> -->
