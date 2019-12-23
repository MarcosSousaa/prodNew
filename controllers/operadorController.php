<?php
class operadorController extends Controller {
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
        if ($this->user->hasPermission('operador_view')) { 
        	$op = new Operador();
        	$offset = 0; 

        	//questão com paginação
            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
            	}
        	}
            $offset = (10 * ($data['p'] - 1));

            $data['operador_list'] = $op->getList($offset);
            $data['operador_count'] = $op->getCount();
            $data['p_count'] = ceil($data['operador_count'] / 10); //sempre arredonda pra cima

            $this->loadTemplate('operador', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);   
        if ($this->user->hasPermission('operador_add')) { 
        	$op = new Operador();
        	if(isset($_POST['operador']) && !empty($_POST['operador'])){        		 
        		 $operador = strtoupper(addslashes($_POST['operador']));
        		 $op->add($operador);
        		 header("Location:". BASE_URL.'/operador');
        	}
        	
            $this->loadTemplate('operador_add', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function edit($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);   
        if ($this->user->hasPermission('operador_edit')) { 
        	$op = new Operador();
        	if(isset($_POST['operador']) && !empty($_POST['operador'])){        		
    		  $operador = strtoupper(addslashes($_POST['operador']));	     
		      $op->edit($operador,$id);
        		 header("Location:". BASE_URL.'/operador');
        	}
        	
        	$data['operador_info'] = $op->getInfo($id);            
            $this->loadTemplate('operador_edit', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

     public function view($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);   
        if ($this->user->hasPermission('operador_edit')) { 
            $op = new Operador();
            
            $data['operador_info'] = $op->getInfo($id);            
            $this->loadTemplate('operador_view', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function delete($id){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);    
        if ($this->user->hasPermission('operador_del')) {
            $op = new Operador();
            $op->delete($id);
            header("Location: " . BASE_URL . "/operador");
            exit();
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
}