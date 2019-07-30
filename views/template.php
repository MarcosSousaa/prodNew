<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Portaria - Indústria Bandeirante de Plásticos></title>
        <link href="<?= BASE_URL ?>/assets/css/template.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
        <script type="text/javascript">
            var BASE_URL = "<?= BASE_URL ?>";
        </script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.mask.js"></script>
    </head>
    <body>

        <div class="leftmenu">
           <div class="company_name">
                <img src="<?= BASE_URL ?>/assets/images/logo_branco.png" height="70" width="70">
            </div>
            <div class="menuarea">
                <ul>
                    <li class=""><a href="<?= BASE_URL ?>">Home</a></li>
                    <li><a href="<?= BASE_URL ?>/permissions">Permissões</a></li>
                    <li><a href="<?= BASE_URL ?>/users">Usuários</a></li>
                    <li><a href="<?= BASE_URL ?>/records">Entrada-Saída</a></li>
                    <li><a href="<?= BASE_URL ?>/veiculos">Veículos</a></li>
                    <li><a href="<?= BASE_URL ?>/chaves">Chaves</a></li>                    
                    <li><a href="<?= BASE_URL ?>/reports">Relatórios</a></li>
                </ul>
            </div>
        </div>


        <div class="container">
            <div class="top">
                <div class="top_right"><a href="<?= BASE_URL ?>/login/logout">Sair</a></div>
                <div class="top_right"><?= $viewData['nome_usuario'] ?></div>
            </div>

            <div class="area">
                
                <?php $this->loadViewInTemplate($viewName, $viewData) ?>
            </div>
        </div>

    </body>
</html>