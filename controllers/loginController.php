<?php

class loginController extends Controller {

	public function index(){
		$data = array();

		if(isset($_POST['cpf']) && !empty($_POST['cpf'])){
			$cpf = addslashes(filter_input(INPUT_POST, 'cpf'));

			$u = new Users();

			if($u->doLogin($cpf)){
				header("Location:" . BASE_URL);
				exit();
			}
			else {
				$data['error'] = 'CPF - Incorreto';
			}		
		}

		$this->loadView('login', $data);
	}

	public function logout(){
		$u = new Users();
		$u->logout();
		header("Location:".BASE_URL);
	}
	
}