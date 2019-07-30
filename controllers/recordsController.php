<?php
class recordsController extends Controller {
    private $user;
    public function __construct() {
        parent::__construct();
        $this->user = new Users();
        if (!$this->user->isLogged()) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
        $this->user->setLoggedUser();
    }
    public function index() {
        // informações para o template
        $data['nome_usuario'] = $this->user->getName();
             
        if ($this->user->hasPermission('records_view')) { 
        	$r = new Records();
        	$offset = 0; 

        	//questão com paginação
            /*
            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                $tipo = intval($_GET['f']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;                    
            	}
        	}
            $offset = (10 * ($data['p'] - 1));
            */
            if(isset($_POST['data1']) && !empty($_POST['data1'])){
                $tipo = addslashes($_POST['p_registro']);
                $data1 = addslashes($_POST['data1']);
                $data2 = addslashes($_POST['data2']);               
            }
            else{
                $tipo = '0';                
                $data1 = date('Y-m-d');
                $data2 = date('Y-m-d');
            }

            $data['records_list'] = $r->getList($data1,$data2,$tipo);
            if(empty($data['records_list'])){
                $tipo = '1';                
                $data1 = date('Y-m-d');
                $data2 = date('Y-m-d');
                $data['records_list'] = $r->getList($data1,$data2,$tipo);
                if(empty($data['records_list'])){
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
            //$data['records_count'] = $r->getCount($tipo);
            //$data['p_count'] = ceil($data['records_count'] / 10); //sempre arredonda pra cima                    
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        // informações para o template
        $data['nome_usuario'] = $this->user->getName();
             
        if ($this->user->hasPermission('records_add')) { 
            $r = new Records();
            if(isset($_POST['data_er']) && !empty($_POST['data_er'])){
                $tipo = addslashes($_POST['tipo']);                
                $data_er = addslashes($_POST['data_er']);
                $hora_er = addslashes($_POST['hora_er']);
                $data_er = str_replace("/", "-", $data_er);
                $data_er = date('Y-m-d', strtotime($data_er));
                if($tipo == '0'){
                    $colab_ret = addslashes($_POST['colab_ret']);
                    $chaves_id = addslashes($_POST['chaves_id']);                    
                    $r->add($tipo,$data_er,$hora_er,$colab_ret,null,null,null,null,null,$chaves_id);                    
                }
                else if($tipo == '1'){
                     $tipo_vr = addslashes($_POST['tipo_vr']);
                    $placa_vr = addslashes($_POST['placa_vr']);
                    $motorista_vr = addslashes($_POST['motorista_vr']);
                    $empresa_vr = addslashes($_POST['empresa_vr']);
                    $r->add($tipo,$data_er,$hora_er,null,$tipo_vr,$placa_vr,$motorista_vr,$empresa_vr,null,null);
                }

                else if($tipo == '2'){
                    $veiculos_id = addslashes($_POST['veiculos_id']); 
                    $r->add($tipo,$data_er,$hora_er,null,null,null,null,null,$veiculos_id,null);   
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
        $data['nome_usuario'] = $this->user->getName();       
        if ($this->user->hasPermission('records_edit')) {
            $records = new Records();
            if (isset($_POST['data_sr']) && !empty($_POST['data_sr'])) {
                $data_sr = addslashes($_POST['data_sr']);
                $hora_sr = addslashes($_POST['hora_sr']);
                $data_sr = str_replace("/", "-", $data_sr);
                $data_sr = date('Y-m-d', strtotime($data_sr));
                if(isset($_POST['tipo']) && !empty($_POST['tipo'])){
                    $colab_dev = addslashes($_POST['colab_dev']);
                    $records->edit($id,$data_sr,$hora_sr,$colab_dev);                 
                }
                else {
                    $records->edit($id,$data_sr,$hora_sr,null);    
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


}