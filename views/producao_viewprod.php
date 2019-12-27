<link href="<?= BASE_URL ?>/assets/css/producao.css" rel="stylesheet"/>
<h1 align="center">Producao - Visualizar</h1><br>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<div class="painel_model">
	<h3>
	    <strong class="title">Data Produção: - </strong> <?php echo date('d/m/Y', strtotime($producao_info['data_prod'])); ?>
	    - <strong class="title">Início: - </strong> <?= $producao_info['hri']; ?>
	</h3>
	<h3><strong class="title">Nº Extrusora Produzida: - </strong> <?= $producao_info['extrusora'] ; ?>
		<strong class="title">Turno - </strong> <?= $turno[$producao_info['turno']] ; ?>
	     <strong class="title"> Nome Operador: - </strong> <?= $producao_info['operador'] ;?>
	    
	</h3>
	<h3><strong class="title">Pedido: - </strong><?= $producao_info['pedido']; ?> <br>
	    <strong class="title">Ordem: - </strong> <?= $producao_info['ordem']; ?> <br>
	    <strong class="title">Lote Interno: - </strong><?= $producao_info['lote'];?> <br>
	    <strong class="title">Rpm: - </strong><?= $producao_info['rpm'];?>
	</h3>
	<h3><strong class="title">Peso Bob: - </strong><?= number_format($producao_info['pesobob'],3,",","."); ?> <br>
	    <strong class="title">Quantidade Produzida: - </strong> <?= $producao_info['qtdbob']; ?> <br>
	    <strong class="title">Total Produzida: - </strong><?= number_format($producao_info['totalbob'],3,",",".");?> <br>
	    <strong class="title">Largura: - </strong><?= $producao_info['larg'];?>
	    <strong class="title">Espessura: - </strong><?= $producao_info['esp'];?> 
	    <strong class="title">Metragem: - </strong><?= $producao_info['metrag'];?> <br>	    
	</h3>
	<h3>
		<strong class="title">Sobra Bob Quantidade - </strong><?= (isset($producao_info['perdabob'])) ? $producao_info['perdabob'] : 'Sem Perda'; ?>
		<strong class="title">Sobra Bob KG - </strong><?= (isset($producao_info['perdakg'])) ? $producao_info['perdakg'] : 'Sem Perda'; ?>
	</h3>
	<h3>
		<strong class="title">Quantidade Parada Maquína - </strong><?= (isset($producao_info['qtdparada'])) ? $producao_info['qtdparada'] : 'Sem Parada'; ?>
		<strong class="title">Tempo Parada Maquína - </strong><?= (isset($producao_info['tempoparada'])) ? $producao_info['tempoparada'] : '00:00'; ?>
	</h3>
	<h3><strong class="title">Motivo Parada:</strong></h3>
	<input type="checkbox" name="oc[]" disabled <?= (in_array("LB", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>LB - LIMP. BORDA</label>
		<input type="checkbox" name="oc[]" disabled  <?= (in_array("BFG", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>BFG - BALÃO FURADO POR GEL</label>
		<input type="checkbox" name="oc[]" disabled  <?= (in_array("LM", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>LM - LIMP. MATRIZ</label><br>
		<input type="checkbox" name="oc[]" disabled  <?= (in_array("PM", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>PM - PROBLEMA MECÂNICO</label>
		<input type="checkbox" name="oc[]" disabled  <?= (in_array("PE", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>PE - PROBLEMA ELÉTRICO</label>
		<input type="checkbox" name="oc[]" disabled  <?= (in_array("AC", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>AC - ACERTO</label><br>
		<input type="checkbox" name="oc[]" disabled  <?= (in_array("LG", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>LG - LIMP. GERAL</label>
		<input type="checkbox" name="oc[]" disabled  <?= (in_array("QE", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>QE - QUEDA ENERGIA</label>
		<input type="checkbox" name="oc[]" disabled  <?= (in_array("ME", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>ME - MANUTENÇÃO ELETRÍCA</label><br>
		<input type="checkbox" name="oc[]"  disabled <?= (in_array("MM", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>MM - MANUTENÇÃO MECÂNICA</label>
		<input type="checkbox" name="oc[]"  disabled <?= (in_array("IM", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>IM - INICIO MAQ.</label>
		<input type="checkbox" name="oc[]"  disabled <?= (in_array("LPM", explode(",",$producao_info['oc']))) ? 'checked="checked"' : '' ; ?>>
		<label>LPM - LIMP. MACHO</label><br>	
</div>	
		
	<br>
	<a class="button button_small" href="<?= BASE_URL?>/producao">VOLTAR</a>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_producao_add.js"></script>