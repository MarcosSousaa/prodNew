<fieldset>
    <legend>Adicionar Registro</legend>
    <h1>Registros</h1>

    <a class="button" href="<?= BASE_URL ?>/records/add">Adicionar Registro</a><br><br>    
</fieldset>
<br><br>
<button id="btn-filtro">Novo - Filtro</button>
<div class="filtro-data">
    <form method="POST">
        <br>
        Data :
        <input type="date" name="data1"> Entre :
        <input type="date" name="data2"><br><br>
        <select name="p_registro" id="p_registro">
            <option selected="selected" disabled="">Escolha uma opção</option>
            <option value="0">Controle de Chaves</option>
            <option value="1">Entrega - Recebimento de Mat.</option>
            <option value="2">Entrada Veículos</option>
        </select>
        <br /><br /><br />
        <input type="submit" value="Pesquisar" id="pesquisar">    
    </form>
    
</div>
<?php if(isset($records_list) && !empty($records_list) && $records_list['0']['tipo'] == '0'):?>
<div class="tabContentRegistros">    
    <div class="tabBodyRegistros">
        <h3 style="text-align:center; color:blue;">Controle - Chaves</h3>
        <table width="100%" class="paginated">
            <thead>
                <tr>        
                    <th>Data</th>                
                    <th>Horarío-Retirada</th>
                    <th>Colaborador-Retirou</th>                
                    <th>Cod. Chave</th>    
                    <th>Local</th>
                    <th width="180">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records_list as $r): ?>                                   
                    <tr>
                        <td style=""><?= date('d/m/Y', strtotime($r['data_er']));?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['hora_er'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['colab_ret'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['cod'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['local'];?></td> 
                        <td>
                            <?php if($r['flag'] == '1'){ ?>
                                <a class="button button_small" href="<?= BASE_URL ?>/records/edit/<?= $r['id'] ?>">Editar</a>
                                <a class="button button_small" href="<?= BASE_URL ?>/records/delete/<?= $r['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
                            <?php }else { ?>
                                <a class="button button_small" href="<?= BASE_URL ?>/records/delete/<?= $r['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
                            <?php } ?>
                            </td>
                        </td>                   
                    </tr>
                <?php endforeach; ?>
            </tbody>                                    
        </table>
    </div>
<?php endif; ?>    
<?php if(isset($records_list) && !empty($records_list) && $records_list['0']['tipo'] == '1'): ?>
    <div class="tabBodyRegistros">
        <h3 style="text-align:center; color:blue;">Entrega / Recebimento Mat.</h3>
        <table width="100%" class="paginated">
            <thead>
                <tr>        
                    <th>Data</th>
                    <th>Horarío-Entrada</th>
                    <th>Placa</th>    
                    <th>Nome Motorista</th> 
                    <th>Empresa</th>                
                    <th width="180">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records_list as $r): ?>                 
                    <tr>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= date('d/m/Y', strtotime($r['data_er']));?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['hora_er'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['placa'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['motorista'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['empresa'];?></td> 
                         <td>
                            <?php if($r['flag'] == '1'){ ?>
                                <a class="button button_small" href="<?= BASE_URL ?>/records/edit/<?= $r['id'] ?>">Editar</a>
                                <a class="button button_small" href="<?= BASE_URL ?>/records/delete/<?= $r['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
                            <? } else { ?>
                               <a class="button button_small" href="<?= BASE_URL ?>/records/delete/<?= $r['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
                            <?php }?> 
                        </td>                            
                    </tr>
                <?php endforeach; ?>
            </tbody>                                
        </table>
    </div>
<?php endif; ?>    
<?php if(isset($records_list) && !empty($records_list) && $records_list['0']['tipo'] == '2'): ?>
    <div class="tabBodyRegistros">
        <h3 style="text-align:center;  color:blue;">Entrada - Veículos</h3>
        <table width="100%" class="paginated">
            <thead>
                <tr>        
                    <th>Data</th>
                    <th>Horarío-Entrada</th>
                    <th>Placa</th>    
                    <th>Nome Motorista</th> 
                    <th>Empresa</th>                
                    <th width="180">Ações</th>
                </tr>
            </thead>
            <tbody>               
                <?php foreach($records_list as $r): ?>                 
                    <tr>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= date('d/m/Y', strtotime($r['data_er']));?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['hora_er'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['placa'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['motorista'];?></td>
                        <td style="<?php echo ($r['flag'] == '1' ? "color: red; font-weight: bold;":"color: green; font-weight: bold;")?>"><?= $r['empresa'];?></td> 
                         <td>
                            <?php if($r['flag'] == '1'){ ?>
                                
                                <a class="button button_small"'" href="<?= BASE_URL ?>/records/edit/<?= $r['id'] ?>">Editar</a>
                                <a class="button button_small" href="<?= BASE_URL ?>/records/delete/<?= $r['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
                                <?php } else { ?>
                                    <a class="button button_small" href="<?= BASE_URL ?>/records/delete/<?= $r['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir ?')"> Excluir</a>
                                <?php }?>
                               

                        </td>                       
                    </tr>
                <?php endforeach; ?>                                
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
<?php if(empty($records_list) ) : ?>
    <br><h2><strong>Nenhum Registro encontrado - rever filtro</strong></h2>
<?php endif; ?>



<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_records.js"></script>