<?php
class producaoController extends Controller {
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
    public function index(){
        $data = array();        
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu); 
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );   
        if ($this->user->hasPermission('producao_view')){
            $p = new Producao();
            $data['producao_add'] = $this->user->hasPermission('producao_add');
            $data['producao_addacab'] = $this->user->hasPermission('producao_addacab');
            if(isset($_POST['data2']) && !empty($_POST['data2'])){
                $data1 = addslashes($_POST['data1']);
                $data2 = addslashes($_POST['data2']);
            }
            else{
                $data1 = date('Y-m-d');
                $data2 = date('Y-m-d');
            }                       
            $data['producao_list'] = $p->getListProducao($data1,$data2);                        
            $data['perda_list'] = $p->getListPerda($data1,$data2);
            $this->loadTemplate('producao', $data);
        } else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add_prod() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);      
        if ($this->user->hasPermission('producao_add')) {
            $p = new Producao();
            if (isset($_POST['hrfim']) && !empty($_POST['hrfim'])) {
                $data_prod = addslashes($_POST['data_prod']);
                $ext = addslashes($_POST['extrusora_prod']);
                $turno = addslashes($_POST['turno_prod']);
                $operador = addslashes($_POST['operador']);
                $hrini = addslashes($_POST['hrini']);
                $aprovacaoini = addslashes($_POST['aprovacaoini']);
                $pedido = addslashes($_POST['pedido']);
                $ordem = addslashes($_POST['ordem']);
                $lote = addslashes($_POST['lote']);
                $rpm = addslashes($_POST['rpm']);                
                $peso = addslashes($_POST['peso_bob']);
                $qtd = addslashes($_POST['quantidade']);
                $total = addslashes($_POST['total']);
                $larg = addslashes($_POST['larg']);
                $esp = addslashes($_POST['esp']);
                $metrag = addslashes($_POST['metrag']);                
                $hrfim = addslashes($_POST['hrfim']);
                $aprovacaofim = addslashes($_POST['aprovacaofim']);
                $p->addProducao($data_prod,$ext,$turno,$operador,$hrini,$aprovacaoini,$pedido,$ordem,$lote,$rpm,$peso,$qtd,$total,$larg,$esp,$metrag,$hrfim,$aprovacaofim);
                header("Location: " . BASE_URL . "/producao");
                exit();
            }
            $this->loadTemplate('producao_addprod', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function edit_prod($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );      
        if($this->user->hasPermission('producao_edit')) {
            $p = new Producao();
            if(isset($_POST['sobrabob']) && !empty($_POST['sobrabob'])){
                $sobrabob = addslashes($_POST['sobrabob']);
                $sobrabobkg = addslashes($_POST['sobrabobkg']);
                $p->updateProducao($sobrabob,$sobrabobkg,$id);                              
                header("Location: " . BASE_URL . "/producao");
                exit();
            }            
            $data['producao_info'] = $p->getInfoProducao($id);            
            $data['menu_list'] = $this->menu->getList();             
            $this->loadTemplate('producao_editprod', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function view_prod($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );      
        if($this->user->hasPermission('producao_view')) {
            $p = new Producao();
            $data['producao_info'] = $p->getInfoProducao($id);            
            $data['menu_list'] = $this->menu->getList();             
            $this->loadTemplate('producao_viewprod', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function add_perda() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);      
        if ($this->user->hasPermission('producao_add')) {
            $p = new Producao();
            if (isset($_POST['acabamento']) && !empty($_POST['acabamento'])) {
                $data_perda = addslashes($_POST['data_perda']);
                $turno = addslashes($_POST['turno_perda']);
                $apara = addslashes($_POST['apara']);
                $refile = addslashes($_POST['refile']);                
                $borra = addslashes($_POST['borra']);
                $acabamento = addslashes($_POST['acabamento']);
                $qtdparada = addslashes($_POST['qtdparada']);
                $tempoparada = addslashes($_POST['tempoparada']);
                $oc = $_POST['oc'];                
                $p->addPerda($data_perda,$turno,$apara,$refile,$borra,$acabamento,$qtdparada,$tempoparada,$oc);
                header("Location: " . BASE_URL . "/producao");
                exit();
            }
            $this->loadTemplate('producao_addperda', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

     public function edit_perda($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );      
        if($this->user->hasPermission('producao_edit')) {
            $p = new Producao();
            if(isset($_POST['acabamento']) && !empty($_POST['acabamento'])){
                $apara = addslashes($_POST['apara']);
                $refile = addslashes($_POST['refile']);                
                $borra = addslashes($_POST['borra']);
                $acabamento = addslashes($_POST['acabamento']);
                $qtdparada = addslashes($_POST['qtdparada']);
                $tempoparada = addslashes($_POST['tempoparada']);
                $oc = $_POST['oc'];                
                $p->updatePerda($apara,$refile,$borra,$acabamento,$qtdparada,$tempoparada,$oc,$id);                
                header("Location: " . BASE_URL . "/producao");
                exit();
            }

            $data['perda_info'] = $p->getInfoPerda($id);            
            $data['menu_list'] = $this->menu->getList();             
            $this->loadTemplate('producao_editperda', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

     public function view_perda($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );      
        if($this->user->hasPermission('producao_edit')) {
            $p = new Producao();
            $data['perda_info'] = $p->getInfoPerda($id);            
            $data['menu_list'] = $this->menu->getList();             
            $this->loadTemplate('producao_viewperda', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

}