<?php
class limpezaController extends Controller {
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

        $data = array();        
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);           
        if($this->user->hasPermission('limpeza_view')){            
            
            $l = new Limpeza(); 
            if(isset($_POST['data2']) && !empty($_POST['data2'])){
                $data1 = addslashes($_POST['data1']);
                $data2 = addslashes($_POST['data2']);
            }
            else{
                $data1 = date('Y-m-d');
                $data2 = date('Y-m-d');
            }                       
            $data['limpeza_list'] = $l->getList($data1,$data2);

            $this->loadTemplate('limpeza', $data);
        } else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);      
        if ($this->user->hasPermission('limpeza_add')) {
            $l = new Limpeza();
            if (isset($_POST['operador']) && !empty($_POST['operador'])){
                $data_limp = addslashes($_POST['data_limp']);
                $hora_limp = addslashes($_POST['hrlimp']);
                $ext = addslashes($_POST['extrusora_limp']);
                $operador = addslashes($_POST['operador']);
                $est = addslashes($_POST['est']);
                $prot = addslashes($_POST['prot']);
                $pain = addslashes($_POST['pain']);
                $chao = addslashes($_POST['chao']);
                
                $l->add($data_limp,$hora_limp,$ext,$operador,$est,$prot,$pain,$chao);
                header("Location: " . BASE_URL . "/limpeza");
                exit();
            }
            
            $this->loadTemplate('limpeza_add', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function edit($id){
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);   
        if ($this->user->hasPermission('limpeza_edit')){ 
            $l = new Limpeza();
            $op = new Operador();
            if(isset($_POST['quali']) && !empty($_POST['quali'])){
                $data_limp = addslashes($_POST['data_limp']);
                $hora_limp = addslashes($_POST['hrlimp']);
                $ext = addslashes($_POST['extrusora_limp']);
                $operador = addslashes($_POST['operador_edit']);
                $est = addslashes($_POST['est']);
                $prot = addslashes($_POST['prot']);
                $pain = addslashes($_POST['pain']);
                $chao = addslashes($_POST['chao']);
                $quali = addslashes($_POST['quali']);
                $obs = addslashes($_POST['obs']);                
                $l->edit($data_limp,$hora_limp,$ext,$operador,$est,$prot,$pain,$chao,$quali,$obs,$id);

                 header("Location:". BASE_URL.'/limpeza');
                 exit();
            }
            
            $data['limpeza_info'] = $l->getInfo($id);
            $data['operador'] = $op->getList();
            $this->loadTemplate('limpeza_edit', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

       public function view($id){
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);   
        if ($this->user->hasPermission('limpeza_edit')){ 
            $l = new Limpeza();            
            $data['limpeza_info'] = $l->getInfo($id);            
            $this->loadTemplate('limpeza_view', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }


}