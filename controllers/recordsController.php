<?php
class RecordsController extends Controller {
    private $user;
    private $menu;
    public function __construct() {
        parent::__construct();
        $this->user = new Users();
        $this->menu = new Menu();   
        if (!$this->user->isLogged()) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
        $this->user->setLoggedUser();
        $this->menu->setMenu($this->user->getIdGroup());    
    }
    public function index() {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);   
        if ($this->user->hasPermission('records_view')) {             
        	$r = new Records();        	
            $data['records_edit'] = $this->user->hasPermission('records_edit');
            session_start();
            if(isset($_POST['data1']) && !empty($_POST['data1'])){
                $tipo = addslashes($_POST['p_registro']);
                $_SESSION['data1'] = addslashes($_POST['data1']);
                $_SESSION['data2'] = addslashes($_POST['data2']);               
            }
            else{

                if($data['acesso']['name'] == "COMPRAS"){
                    $tipo = '1';    
                }else{
                    $tipo = '2';
                    $_SESSION['data1'] = date('Y-m-d');
                    $_SESSION['data2'] = date('Y-m-d');    
                }
                                
            }           
            $data['records_list'] = $r->getList($_SESSION['data1'],$_SESSION['data2'],$tipo);
            if(empty($data['records_list'])){
                $tipo = '1';                
                $_SESSION['data1'] = date('Y-m-d');
                $_SESSION['data2'] = date('Y-m-d');    
                $data['records_list'] = $r->getList($data1,$data2,$tipo);
                
                if(empty($data['records_list']) && $data['acesso']['name'] != "COMPRAS"){
                    $tipo = '2';                
                    $data1 = date('Y-m-d');
                    $data2 = date('Y-m-d');
                    $data['records_list'] = $r->getList($data1,$data2,$tipo);
                    $this->loadTemplate('records', $data);
                }
                else{
                    $this->loadTemplate('records', $data);    
                }
   
            }else {
                $this->loadTemplate('records', $data);

            }           
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        // informações para o template
       $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);   
        if ($this->user->hasPermission('records_add')) {        	
            $r = new Records();
            if(isset($_POST['data_er']) && !empty($_POST['data_er'])){
                $tipo = addslashes($_POST['tipo']);                
                $data_er = addslashes($_POST['data_er']);
                $hora_er = addslashes($_POST['hora_er']);
                $data_er = str_replace("/", "-", $data_er);
                $data_er = date('Y-m-d', strtotime($data_er));
                $obs = addslashes($_POST['obs_reg']);                     
                if($tipo == '0'){
                    $colab_ret = addslashes($_POST['colab_ret']);
                    $chaves_id = addslashes($_POST['chaves_id']);
                    $r->add($tipo,$data_er,$hora_er,$colab_ret,null,null,null,null,null,null,$chaves_id,null,null);                    
                }
                else if($tipo == '1'){
                    $tipo_vr = addslashes($_POST['tipo_vr']);
                    $placa_vr = addslashes($_POST['placa_vr']);
                    $placa_vr = strtoupper($placa_vr);
                    $motorista_vr = addslashes($_POST['motorista_vr']);
                    $motorista_vr = strtoupper($motorista_vr);
                    $rg = addslashes($_POST['rg']);
                    $empresa_vr = addslashes($_POST['empresa_vr']);
                    $empresa_vr = strtoupper($empresa_vr);
                    $r->add($tipo,$data_er,$hora_er,null,$tipo_vr,$placa_vr,$motorista_vr,$rg,$empresa_vr,null,null,$obs,null);
                }

                else if($tipo == '2'){
                    $veiculos_id = addslashes($_POST['veiculos_id']); 
                    $visitante = addslashes($_POST['visitante']);                    
                    if(isset($_POST['placa_vr'])&& !empty($_POST['placa_vr'])){
                        $placa_vr = addslashes($_POST['placa_vr']);
                        $placa_vr = strtoupper($placa_vr);
                    }
                    if(isset($_POST['motorista_vr'])&& !empty($_POST['motorista_vr'])){
                        $motorista_vr = addslashes($_POST['motorista_vr']);
                        $motorista_vr = strtoupper($motorista_vr);
                    }
                    if(isset($_POST['empresa_vr'])&& !empty($_POST['empresa_vr'])){
                        $empresa_vr = addslashes($_POST['empresa_vr']);
                        $empresa_vr = strtoupper($empresa_vr);
                    }
                    if(isset($_POST['rg-entrada']) && !empty($_POST['rg-entrada'])){
                        $rg = addslashes($_POST['rg-entrada']);
                    }
                    if(!empty($placa_vr) && !empty($motorista_vr) && !empty($empresa_vr) && !empty($rg)){                    	
                        $r->add($tipo,$data_er,$hora_er,null,null,$placa_vr,$motorista_vr,$rg,$empresa_vr,null,null,$obs,$visitante);   
                    }
                    else{
                        $r->add($tipo,$data_er,$hora_er,null,null,null,null,null,null,$veiculos_id,null,$obs,$visitante);       
                    }
                    
                }

                header("Location:". BASE_URL.'/records');
                exit();   
            }
            
            $this->loadTemplate('records_add', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function edit($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);    
        if ($this->user->hasPermission('records_add')) {
            $records = new Records();
            if (isset($_POST['data_sr']) && !empty($_POST['data_sr'])) {
                $data_sr = addslashes($_POST['data_sr']);
                $hora_sr = addslashes($_POST['hora_sr']);
                $data_sr = str_replace("/", "-", $data_sr);                
                $obs = addslashes($_POST['obs_reg']);
                $data_sr = date('Y-m-d', strtotime($data_sr));
                if(isset($_POST['colab_dev']) && !empty($_POST['colab_dev'])){
                    $colab_dev = addslashes($_POST['colab_dev']);
                    $records->edit($id,$data_sr,$hora_sr,$colab_dev,$obs,null,null);                                  
                }
                else {
                    $hora_int_sai = addslashes($_POST['hora_int_sai']);
                    $hora_int_en = addslashes($_POST['hora_int_en']);
                    
                    $records->edit($id,$data_sr,$hora_sr,null,$obs,$hora_int_sai,$hora_int_en);    
                    
                }
                
                header("Location: " . BASE_URL . "/records");
                exit();
            }            
            $data['records_info'] = $records->getInfo($id);
            $this->loadTemplate('records_edit', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function view($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);    
        if ($this->user->hasPermission('records_view')) {
            $records = new Records();
            
            $data['records_info'] = $records->getInfo($id);
            $this->loadTemplate('records_view', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

}