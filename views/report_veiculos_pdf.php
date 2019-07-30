<link href="<?= BASE_URL ?>/assets/css/report.css" rel="stylesheet"/>
<div id="report-header">        
    <img src="<?php BASE_URL ?>assets/images/logo.png"/ height="60" width="60">    
    <h1>Relatório de Veiculos</h1>
    
</div>   
  
<fieldset>
    <?php
    if (isset($filters['veiculo_motorista']) && !empty($filters['veiculo_motorista'])) {
        echo "Filtrado pelo nome do motorista: " . $filters['veiculo_motorista'] . "<br>";
    }
   if (isset($filters['veiculo_empresa']) && !empty($filters['veiculo_empresa'])) {
        echo "Filtrado pelo nome da empresa: " . $filters['veiculo_empresa'] . "<br>";
    }
   if (isset($filters['veiculo_placa']) && !empty($filters['veiculo_placa'])) {
        echo "Filtrado pelo placa do veiculo: " . $filters['veiculo_placa'] . "<br>";
    }
   if (isset($filters['status']) && !empty($filters['status'])) {
        echo "Filtrado pelo status do veiculo: " . $filters['status'] . "<br>";
    }
   if (isset($filters['tipo']) && !empty($filters['tipo'])) {
        echo "Filtrado pelo tipo do veiculo: " . $filters['tipo'] . "<br>";
    }
    ?>

</fieldset>
<br>

<table width="100%" class="table_report">
    <thead>
        <tr>
            <th>Tipo Veículo</th>                
            <th>Motorista Veículo</th>                
            <th>Placa Veículo</th>                
            <th>Empresa</th>                
            <th>Status Veículo</th>                
        </tr>
    </thead>    
 
    <?php if($veiculo_list): ?>
    <?php foreach ($veiculo_list as $veiculo_item): ?>
        <tbody>
            <tr>
                <td><?= $veiculo_item['tipo'] ?></td>
                <td><?= $veiculo_item['motorista'] ?></td>
                <td><?= $veiculo_item['placa'] ?></td>
                <td><?= $veiculo_item['empresa'] ?></td>
                <td><?= ($veiculo_item['status'] == 'A' ? 'Ativo': 'Inativo') ?></td>
            </tr>

    <?php endforeach; ?>
        </tbody>
<?php else : ?>
    <span><strong>Nenhum registro encontrado</strong></span>
<?php endif;?>
</table>

