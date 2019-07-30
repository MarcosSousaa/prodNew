<link href="<?= BASE_URL ?>/assets/css/report.css" rel="stylesheet"/>
<div id="report-header">        
        <img src="<?php BASE_URL ?>assets/images/logo.png"/ height="60" width="60">    
        <h1>Relatório de Chaves</h1>        
</div>   

<fieldset>
    <?php
    if (isset($filters['chave_name']) && !empty($filters['chave_name'])) {
        echo "Filtrado pelo nome da chave: " . $filters['chave_name'] . "<br>";
    }
   if (isset($filters['local_name']) && !empty($filters['local_name'])) {
        echo "Filtrado pelo local da chave: " . $filters['local_name'] . "<br>";
    }
    ?>

</fieldset>
<br>

<table width="100%" class="table_report">
    <thead>
        <tr>
            <th>Codígo da Chave</th>                
            <th>Local da Chave</th>
        </tr>
    </thead>
    <?php foreach ($chave_list as $chave_item): ?>
        <tbody>
            <tr>
                <td><?= $chave_item['cod'] ?></td>
                <td><?= $chave_item['local'] ?></td>
            </tr>
    <?php endforeach; ?>
        </tbody>
</table>