<h1>Limpeza Maquina</h1>
<a class="button" href="<?= BASE_URL ?>/limpeza/add">Adicionar Limpeza Maq.</a><br><br><br>
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
                <th>Horario</th>       
                <th>Extrusora</th>        
                <th>Operador</th>
                <th>Estrutura</th>
                <th>Proteção</th>
                <th>Painel</th>
                <th>Chão</th>
                <th>Aprovação Qualidade</th>
                <th width="180">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($limpeza_list as $l) : ?> 
            <tr>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= date('d/m/Y', strtotime($l['data_limp']))?>
                    
                </td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?=$l['hrlimp'] ;?>
                    
                </td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?=$l['extrusora'] ;?>
                </td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?=$l['operador'] ;?></td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= ($l['estrutura'] == '1') ? 'Conforme' : 'Não Conforme' ;?></td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= ($l['protecao'] == '1') ? 'Conforme' : 'Não Conforme' ;?></td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= ($l['painel'] == '1') ? 'Conforme' : 'Não Conforme' ;?></td>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= ($l['chao'] == '1') ? 'Conforme' : 'Não Conforme' ;?></td>
                <?php 
                    $aprovacao = $l['valid'];
                    if($aprovacao != '1' && $aprovacao != '2'){
                        $aprovacao = 'Em Analíse Pelo Dep. Qualidade';
                    }
                    if($aprovacao == '2'){
                        $aprovacao = 'Reprovado Pelo Dep. Qualidade';
                    }
                    if($aprovacao == '1'){
                        $aprovacao = 'Aprovado Pelo Dep. Qualidade';
                    }
                ?>
                <td style="<?php echo ($l['valid'] != '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $aprovacao ;?></td>
                <td>                    
                    <a class="button button_small" href="<?= BASE_URL ?>/limpeza/view/<?= $l['id'] ?>">Visualizar</a>
                    <a class="button button_small" href="<?= BASE_URL ?>/limpeza/edit/<?= $l['id'] ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach;  ?> 
        </tbody>
</table>

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_limpeza.js"></script>