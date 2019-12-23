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
    public function index() {
        $data = array();        
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);           
        if ($this->user->hasPermission('producao_view')){
            $p = new Producao();
            $data['producao_add'] = $this->user->hasPermission('producao_add');
            $data['producao_addacab'] = $this->user->hasPermission('producao_addacab');
            $data['producao_list'] = $p->getList();                        
            $this->loadTemplate('producao', $data);
        } else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add_prod() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);      
        if ($this->user->hasPermission('permissao_add')) {
            $permissions = new Permissions();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = addslashes($_POST['name']);
                $permissions->add($pname);
                header("Location: " . BASE_URL . "/permissions");
                exit();
            }
            $this->loadTemplate('producao_addprod', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }
    public function add_group() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);      
        if ($this->user->hasPermission('permissao_addgroup')) {
            $permissions = new Permissions();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = strtoupper(addslashes($_POST['name']));
                $plist = $_POST['permissions'];
                $mlist = $_POST['menu'];
                $permissions->addGroup($pname, $plist,$mlist);
                header("Location: " . BASE_URL . "/permissions");
                exit();
            }
            $data['permissions_list'] = $permissions->getList();
            $data['menu_list'] = $this->menu->getList();   
            $this->loadTemplate('permissions_addgroup', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function delete($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);            
        if ($this->user->hasPermission('permissao_view')) {
            $permissions = new Permissions();
            $permissions->delete($id);
            header("Location: " . BASE_URL . "/permissions");
        } else {
            header("Location: " . BASE_URL);
        }
    }
    public function delete_group($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);        
        if ($this->user->hasPermission('permissao_view')) {
            $permissions = new Permissions();
            $permissions->deleteGroup($id);
            header("Location: " . BASE_URL . "/permissions");
        } else {
            header("Location: " . BASE_URL);
        }
    }
    public function edit_group($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);      
        if ($this->user->hasPermission('permissao_view')) {
            $permissions = new Permissions();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = strtoupper(addslashes($_POST['name']));
                $plist = $_POST['permissions'];
                $mlist = $_POST['menu'];
                $permissions->editGroup($pname, $plist,$mlist, $id);
                header("Location: " . BASE_URL . "/permissions");
                exit();
            }
            $data['permissions_list'] = $permissions->getList();
            $data['menu_list'] = $this->menu->getList(); 
            $data['group_info'] = $permissions->getGroup($id);
            $this->loadTemplate('permissions_editgroup', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

}