<?php if($info_template['name']['name'] == 'COMPRAS'): ?>


<h1 style="text-align: center;">Portaria - Indústria Bandeirante de Plásticos</h1>
<div class="report_item">
	<a href="<?php echo BASE_URL;?>/records">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_ent_sai.png" alt="" height="60">
		<br><br>
		<strong>Registros Portaria</strong>
	</a>
</div>
<?php endif; ?>


<?php if($info_template['name']['name'] == 'PORTARIA'): ?>


<h1 style="text-align: center;">Portaria - Indústria Bandeirante de Plásticos</h1>
<div class="report_item">
	<a href="<?php echo BASE_URL;?>/records">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_ent_sai.png" alt="" height="60">
		<br><br>
		<strong>Registros Portaria</strong>
	</a>
</div>

<div class="report_item">
	<a href="<?php echo BASE_URL;?>/veiculos">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_veiculos.png" alt="" height="60">
		<br><br>
		<strong>Veículos</strong>
	</a>
</div>

<div class="report_item">
	<a href="<?php echo BASE_URL;?>/chaves">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_chaves.png" alt="" height="60">
		<br><br>
		<strong>Chaves</strong>
	</a>
</div>

<?php endif; ?>




<?php if($info_template['name']['name'] == 'PRODUCAO'): ?>


<h1 style="text-align: center;">Produção - Indústria Bandeirante de Plásticos</h1>
<div class="report_item">
	<a href="<?php echo BASE_URL;?>/producao">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_producao.png" alt="" height="60">
		<br><br>
		<strong>Produção</strong>
	</a>
</div>

<div class="report_item">
	<a href="<?php echo BASE_URL;?>/limpeza">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_limpeza.png" alt="" height="60">
		<br><br>
		<strong>Limpeza</strong>
	</a>
</div>

<div class="report_item">
	<a href="<?php echo BASE_URL;?>/operador">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_operador.png" alt="" height="60">
		<br><br>
		<strong>Operador</strong>
	</a>
</div>

<?php endif; ?>

<?php if($info_template['name']['name'] != 'PORTARIA' && $info_template['name']['name'] != 'PRODUCAO' && $info_template['name']['name'] != 'COMPRAS'): ?>
	<h1>Ind. Bandeirante de Plasticos LTDA.</h1>
<div class="report_item">
	<a href="<?php echo BASE_URL;?>/records">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_ent_sai.png" alt="" height="60">
		<br><br>
		<strong>Registros Portaria</strong>
	</a>
</div>

<div class="report_item">
	<a href="<?php echo BASE_URL;?>/veiculos">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_veiculos.png" alt="" height="60">
		<br><br>
		<strong>Veículos</strong>
	</a>
</div>

<div class="report_item">
	<a href="<?php echo BASE_URL;?>/chaves">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_chaves.png" alt="" height="60">
		<br><br>
		<strong>Chaves</strong>
	</a>
</div>
<div class="report_item">
	<a href="<?php echo BASE_URL;?>/producao">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_producao.png" alt="" height="60">
		<br><br>
		<strong>Lançamento Produção</strong>
	</a>
</div>

<div class="report_item">
	<a href="<?php echo BASE_URL;?>/limpeza">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_limpeza.png" alt="" height="60">
		<br><br>
		<strong>Limpeza de Máquinas</strong>
	</a>
</div>

<div class="report_item">
	<a href="<?php echo BASE_URL;?>/operador">
		<img src="<?php echo BASE_URL;?>/assets/images/icons/icon_report_operador.png" alt="" height="60">
		<br><br>
		<strong>Operador de Produção</strong>
	</a>
</div>

<?php endif; ?>





