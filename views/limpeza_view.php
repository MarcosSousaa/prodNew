<h1 align="center">Limpeza - Visualizar</h1><br>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<?php 
    $aprovacao = $limpeza_info['valid'];
    if($aprovacao != '1' && $aprovacao != '2'){
        $aprovacao = 'Em Analíse Pelo Dep. Qualidade';
    }
    if($aprovacao == '2'){
        $aprovacao = 'Reprovado Pelo Dep. Qualidade';
    }
    if($aprovacao == '1'){
        $aprovacao = 'Aprovado Pelo Dep. Qualidade';
    }
?>
<h3>
    <strong style="color:blue;">Data Limpeza: - </strong> <?php echo date('d/m/Y', strtotime($limpeza_info['data_limp'])); ?>
    - <strong style="color:blue;">Horario Limpeza: - </strong> <?= $limpeza_info['hrlimp']; ?>
</h3>
<h3><strong style="color:blue;">Nº Extrusora Limpa: - </strong> <?= $limpeza_info['extrusora'] ; ?>
     <strong style="color:blue;"> Nome Operador: - </strong> <?= $limpeza_info['operador'] ;?>
    
</h3>
<h3><strong style="color:blue;">Estrutura: - </strong><?= ($limpeza_info['estrutura'] == '1') ? 'Conforme' : 'Não Conforme'; ?> <br>
    <strong style="color:blue;">Proteção: - </strong> <?= ($limpeza_info['protecao'] == '1') ? 'Conforme' : 'Não Conforme'; ?> <br>
    <strong style="color:blue;">Painel: - </strong><?= ($limpeza_info['painel'] == '1') ? 'Conforme' : 'Não Conforme' ;?> <br>
    <strong style="color:blue;">Chão: - </strong><?= ($limpeza_info['chao'] == '1') ? 'Conforme' : 'Não Conforme' ;?>
</h3>
<h3>
    <strong style="color:blue;">Situação Aprovação Qualidade: - </strong><?= $aprovacao; ?><br>
    <strong style="color:blue;">Observação: - </strong><?= $limpeza_info['obs']; ?>
</h3>
<br><br>
<a class="button button_small" href="<?= BASE_URL?>/limpeza">VOLTAR</a>

