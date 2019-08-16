<link href="<?= BASE_URL ?>/assets/css/report.css" rel="stylesheet"/>
 
<fieldset>
    <?php
    if (isset($filters['ent_sai_data_inicial']) && !empty($filters['ent_sai_data_inicial']) && ($filters['ent_sai_data_final']) && !empty($filters['ent_sai_data_final'])) {
        echo "Filtrado pela Data: " . date('d/m/Y',strtotime($filters['ent_sai_data_inicial'])) . " Até ".date('d/m/Y',strtotime($filters['ent_sai_data_final']))."<br>";
    }
   if (isset($filters['ent_sai_placa']) && !empty($filters['ent_sai_placa'])) {
        echo "Filtrado pelo nome placa do veículo: " . $filters['ent_sai_placa'] . "<br>";
    }
   if (isset($filters['ent_sai_motorista']) && !empty($filters['ent_sai_motorista'])) {
        echo "Filtrado pelo nome do motorista: " . $filters['ent_sai_motorista'] . "<br>";
    }
   if (isset($filters['ent_sai_empresa']) && !empty($filters['ent_sai_empresa'])) {
        echo "Filtrado pelo nome da empresa do veículo: " . $filters['ent_sai_empresa'] . "<br>";
    }
    ?>

</fieldset>
<br />

<table width="100%" class="table_report">
    <thead>
        <tr>
            <th>Entrada</th>                                          
            <th>Placa </th> 
            <th>Motorista</th>
            <th>Empresa</th>                               
            <th>Saída</th>                                            
        </tr>
    </thead>            
    <?php foreach ($records_list as $records_item): ?>
        <tbody>
            <tr>
                <td><?= date('d/m/Y',strtotime($records_item['data_er'])). ' - '. substr($records_item['hora_er'], 0, -3)?></td>                
                <td><?= $records_item['placa'] ?></td>
                <td><?= $records_item['motorista'] ?></td>
                <td><?= $records_item['empresa'] ?></td>   
                <td><?= !empty($records_item['data_sr']) ? date('d/m/Y',strtotime($records_item['data_sr'])). ' - '. substr($records_item['hora_sr'], 0, -3) : " Sem saída" ?></td>
            </tr>
    <?php endforeach; ?>
        </tbody>
</table>

