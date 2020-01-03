<h1 style="text-align: center;">Produção</h1>
<div class="tabarea">
    <div class="tabitem activetab">Lançamento de Produção</div>
    <?php if($producao_add) : ?>
    <div class="tabitem">Lançamento Perda</div>
    <?php endif ?>
</div>

<div class="tabcontent">
    <div class="tabbody">
        <?php if($producao_add) : ?>
        <a class="button" href="<?= BASE_URL ?>/producao/add_prod"> Adicionar Dados Produção</a>        
        <?php endif; ?>
        <br><br>
        <div class="filtro-data">
            <form method="POST">
                <fieldset>
                    <legend style="color:blue">NOVO FILTRO DE DATA</legend>        
                    <input type="date" name="data1" value="<?php echo date('Y-m-d');?>">
                    <br> 
                    Até:
                    <input type="date" name="data2" value="<?php echo date('Y-m-d');?>"><br><br>
                    <button id="btnPesquisaFiltro">Pesquisar</button>       
                </fieldset>
            </form>
        </div>
        <table width="100%" class="paginated">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Inicio</th>
                    <th>Extrusora</th>
                    <th>Turno</th>
                    <th>Nome Operador</th>
                    <th>Numero Pedido</th>
                    <th>Total Produzido KG</th>
                    <th>Término</th>
                    <th width="120">Ações</th>
                </tr>    
            </thead>
            <tbody>
                <?php foreach ($producao_list as $pl): ?>
                    <tr>
                        <td><?php echo date('d/m/Y', strtotime($pl['data_prod']));  ?></td>
                        <td><?= $pl['hri']; ?></td>                    
                        <td><?= $pl['extrusora'] ?></td>
                        <td><?php echo $turno[$pl['turno']]; ?></td>
                        <td><?= $pl['operador'] ?></td>
                        <td><?= $pl['pedido'] ?></td>
                        <td><?= number_format($pl['totalbob'], 2, ',', '.'); ?></td>
                        <td><?= $pl['hrf']; ?></td>                    
                        <td>
                            <a class="button button_small" href="<?= BASE_URL ?>/producao/view_prod/<?= $pl['id'] ?>">Visualizar</a>
                            <a class="button button_small" href="<?= BASE_URL ?>/producao/edit_prod/<?= $pl['id'] ?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if($producao_add) { ?>
    <div class="tabbody">
        <?php if($producao_add) : ?>
        <a class="button" href="<?= BASE_URL ?>/producao/add_perda">Adicionar Dados Perda</a>
        <br><br>
        <?php endif; ?>
        <div class="filtro-data">
            <form method="POST">
                <fieldset>
                    <legend style="color:blue">NOVO FILTRO DE DATA</legend>        
                    <input type="date" name="data1" value="<?php echo date('Y-m-d');?>">
                    <br> 
                    Até:
                    <input type="date" name="data2" value="<?php echo date('Y-m-d');?>"><br><br>
                    <button id="btnPesquisaFiltro">Pesquisar</button>       
                </fieldset>
            </form>
        </div>
        <table width="100%" class="paginated">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Turno</th>                    
                    <th>Apara</th>
                    <th>Refile</th>
                    <th>Borra</th>
                    <th>Acabamento/Disco</th>
                    <th width="70">Ações</th>                
                </tr>    
            </thead>
            <?php foreach ($perda_list as $pd): ?>
                <tr>
                    <td><?= date('d/m/Y',strtotime($pd['data_perd'])) ?></td>
                    <td><?= $pd['turno'] ?></td>                    
                    <td><?= $pd['apara'] ?></td>
                    <td><?= $pd['refile'] ?></td>
                    <td><?= $pd['borra'] ?></td>
                    <td><?= $pd['acabamento'] ?></td>                    
                    <td>
                        <a class="button button_small" href="<?= BASE_URL ?>/producao/view_perda/<?= $pd['id'] ?>">Visualizar</a>
                        <a class="button button_small" href="<?= BASE_URL ?>/producao/edit_perda/<?= $pd['id'] ?>">Editar</a>
                        </td>                
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php }?>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao.js"></script>