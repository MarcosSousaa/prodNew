<h1>Veículos - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<form method="POST">

    <label for="tipo">Tipo</label>
    <select name="tipo" id="tipo">
        <option value="CARRO">Carro</option>
        <option value="MOTO">Moto</option>
    </select><br /><br />

    <label for="motorista">Motorista</label>
    <input type="text" name="motorista" required="" placeholder="INFORME O NOME DO MOTORISTA"><br><br>

    <label for="placa">Placa</label>
    <input type="text" name="placa" placeholder="INFORME A PLACA DO VEICULO"><br><br>

    <label for="empresa">Empresa</label>
    <input type="text" name="empresa" placeholder="INFORMA O NOME DA EMPRESA"><br><br>
    

    <input type="submit" value="Adicionar">

</form>