<h1>Registros - Editar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>

<?php if(isset($records_info) && !empty($records_info) && $records_info['tipo'] == '0'):?>
<form  method="post">
    <label for="">Data</label><br>
        <input type="hidden" value="<?php echo $records_info['tipo'] ?>" name="tipo">
        <input type="text" name="data_sr" id="data_sr" readonly>        
        <br><br>
        <label for="">Horario</label>
        <input type="text" name="hora_sr" id="hora_sr" readonly><br><br>
        <label>Colaborador-Devolução</label>
        <input type="text" name="colab_dev"><br><br>
    <input type="submit" name="ATUALIZAR">
</form>
<?php endif; ?>

<?php if(isset($records_info) && !empty($records_info) && $records_info['tipo'] != '0'):?>
<form  method="post">
    <label for="">Data</label><br>
        <input type="text" name="data_sr" id="data_sr" readonly>        
        <br><br>
        <label for="">Horario</label>
        <input type="text" name="hora_sr" id="hora_sr" readonly><br><br>
    <input type="submit" name="ATUALIZAR">
</form>
<?php endif; ?>
 <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_records_add.js"></script>