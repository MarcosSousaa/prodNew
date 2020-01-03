<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Indústria Bandeirante de Plásticos></title>
        <link href="<?= BASE_URL ?>/assets/css/template.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
        <script type="text/javascript">
            var BASE_URL = "<?= BASE_URL ?>";
        </script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.mask.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.validate.min.js"></script>
    </head>
    <body>

        <div class="leftmenu">
           <div class="company_name">
                <img src="<?= BASE_URL ?>/assets/images/logo_branco.png" height="70" width="70">
            </div>            
            <div class="menuarea">
                <ul>
                    <?php                        
                        for($i = 0; $i < sizeof($viewData['info_template']['menu_descricao']);$i++){
                            echo 
                                '<li class="'.$viewData['info_template']['menu_class'][$i].'">
                                    <a href="'.BASE_URL.$viewData['info_template']['menu_caminho'][$i].'">'
                                        .$viewData['info_template']['menu_descricao'][$i].'
                                    </a>
                                </li>';    
                        }
                    ?>                                                    
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="top">
                <div class="top_right"><a href="<?= BASE_URL ?>/login/logout" style="background: #000; padding: 13px;">Sair</a></div>
                <div class="top_right"><strong><?= $viewData['info_template']['nome_usuario']. ' - '.$viewData['info_template']['name']['name'] ?></strong></div>
            </div>

            <div class="area">
                <?php $this->loadViewInTemplate($viewName, $viewData) ?>
            </div>
        </div>

    </body>
</html>