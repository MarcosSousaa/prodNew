<h1>Registros</h1>

<a class="button" href="<?= BASE_URL ?>/veiculos/add">Adicionar Registro</a><br><br>
Data : <br><input type="date" name="data_1"> Até <input type="date" name="data_2"><br><br>
<select name="p_registro" id="p_registro">
    <option selected="selected" disabled="">Escolha uma opção</option>
    <option value="0">Controle de Chaves</option>
    <option value="1">Entrega - Recebimento de Mat.</option>
    <option value="2">Entrada Veículos</option>
</select>
<div class="tabContentRegistros">    
    <div class="tabBodyRegistros">
        <table width="100%">
            <tr>        
                <th>Data</th>
                <th>Horario</th>
                <th>Horarío-Retirada</th>
                <th>Colaborador-Retirou</th>                
                <th>Cod. Chave</th>    
                <th>Local</th>
                <th width="180">Ações</th>
            </tr>                
        </table>
    </div>

    <div class="tabBodyRegistros">
        <table width="100%">
            <tr>        
                <th>Data</th>
                <th>Horarío-Entrada</th>
                <th>Placa</th>    
                <th>Nome Motorista</th> 
                <th>Empresa</th>                
                <th width="180">Ações</th>
            </tr>                
        </table>
    </div>

    <div class="tabBodyRegistros">
        <table width="100%">
            <tr>        
                <th>Data</th>
                <th>Horarío-Entrada</th>
                <th>Placa</th>    
                <th>Nome Motorista</th> 
                <th>Empresa</th>                
                <th width="180">Ações</th>
            </tr>                
        </table>
    </div>
</div>

<!--
<div class="pagination">
    <?php for ($i = 1; $i <= $p_count; $i++): ?>
        <div class="pag_item <?= ($i == $p) ? 'pag_ativo' : '' ?>"><a href="<?= BASE_URL ?>/veiculos?p=<?= $i ?>"><?= $i ?></a></div>
    <?php endfor; ?>
    <div style="clear: both"></div>
</div>
-->
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_records.js"></script>
