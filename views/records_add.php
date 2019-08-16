<h1>Registros - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<h2 id="titulo-registro"></h2>
 <form method="post">
    <br /><br />
    <label for="tipoReg">Tipo Registro</label>
    <select class="form-control" id="tipoReg" name="tipo">
        <option value="" disabled selected>Escolha uma opção</option>
        <option value="0">Retirada - Chaves</option>
        <option value="1">Entrega / Recebimento</option>
        <option value="2">Entrada - Veículo</option>
    </select>           
    <section class="padrao">        
        <label for="">Data</label><br>
        <input type="text" name="data_er" id="data_er" readonly>        
        <br>
        <label for="">Horario</label>
        <input type="text" name="hora_er" id="hora_er">        
    </section>                              
    <br /><br />
    <div>       
        <section id="tipoChaves">
            <div class="form-group col-md-3">
                <label for="chaves">Chaves</label>
                <select class="form-control" id="chaves"></select>   
            </div>
            <div class="form-group col-md-3">
                <label for="colab_ret">Colaborador Retira</label>
                <input type="text"  id="colab_ret" class="form-control">
            </div>          
        </section>

        <section id="tipoServico">
            <div class="form-group col-md-3">
                <label for="chaves">Placa</label>
                <input type="text" id="placa-reg" placeholder="informe a placa" class="form-control placa" name="">
                <input type="hidden" id="ukVeiculo" name="">
            </div>
            <div class="form-group col-md-3">
                <label for="chaves">Nome Motorista</label>
                <input type="text" id="nome-reg" class="form-control">
            </div>          
            <div class="form-group col-md-3">
                <label for="chaves">Empresa Motorista</label>
                <input type="text" id="empresa-reg" class="form-control">
            </div>          
        </section>
        <section id="tipoRecebimento">
            <div class="form-group col-md-7">
                <label for="tipo">Tipo Veículo</label>
                <select class="form-control" id="tipo_vr">
                    <option value="" disabled selected>Escolha uma opção</option>
                    <option value="CAMINHAO">Caminhão</option>
                    <option value="CARRO">Carro</option>
                    <option value="MOTO">Moto</option>
                </select>           
            </div>
            <div class="form-group col-md-2">
                <label for="">Placa Veículo</label>
                <input type="text" id="placa_r" name="" class="form-control placa">
            </div>      
            
            <div class="form-group col-md-3">
                <label for="">Nome Motorista</label>
                <input type="text" id="nome_reg" class="form-control">
            </div>          
            <div class="form-group col-md-3">
                <label for="">Empresa Motorista</label>
                <input type="text" id="empresa_reg" class="form-control">
            </div>          
        </section>       
    </div> 
    <div class="alert alert-danger" id="msg-veiculos" role="alert">
                    <strong>ERROR</strong>
                    <p>VEICULO NÃO CADASTRADO <a href="<?php echo BASE_URL;?>/veiculos/add">CLIQUE AQUI</a> PARA CADASTRAR O VEICULO</p>
    </div>                  
    <br /><br />
    <input type="submit" value="Adicionar" />                        
 </form>


 <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_records_add.js"></script>