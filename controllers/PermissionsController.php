<?php
class permissionsController extends Controller {
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
        $permissions = new Permissions();        
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);           
        if ($this->user->hasPermission('permissao_view')) {                        
            $data['permissions_add'] = $this->user->hasPermission('permissao_add');
            $data['permissions_addgroup'] = $this->user->hasPermission('permissao_addgroup');
            $data['permission_list'] = $permissions->getList();
            $data['menu_list'] = $this->menu->getList();            
            $data['permission_groups_list'] = $permissions->getGroupList();
            $this->loadTemplate('permissions', $data);
        } else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
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
            $this->loadTemplate('permissions_add', $data);
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