<?php

class homeController extends Controller{
	private $user;

	public function __construct(){
		parent::__construct();
		$this->user = new Users();
		if(!$this->user->isLogged()){
			header("Location:" . BASE_URL . "/login");
			exit();
		}

		$this->user->setLoggedUser();		
	}

	public function index(){
		$data = array();

		$data['nome_usuario'] = $this->user->getName();		
		$this->loadTemplate('home', $data);
	}
}