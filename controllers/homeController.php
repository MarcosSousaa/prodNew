<?php

class HomeController extends Controller{	
	private $user;
	private $menu;	
	public function __construct(){

		parent::__construct();
	   	$this->user = new Users();
	   	$this->menu = new Menu();		   	
		if(!$this->user->isLogged()){
			header("Location:" . BASE_URL . "/login");
		}

		$this->user->setLoggedUser();
		$this->menu->setMenu($this->user->getIdGroup());	
		
	}

	public function index(){
		$data = array();
		// informações para o template
		$data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu);
		
		$this->loadTemplate('home', $data);
		
	}
}