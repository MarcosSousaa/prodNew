<?php 
class Utilities{
	
	public static function loadTemplateBase($user,$menu){		
		$data = array(
			'nome_usuario' => $user->getName(),
			'menu_class' => $menu->getClass(),
			'menu_caminho' => $menu->getCaminho(),
			'menu_descricao' => $menu->getDescricao(),
			'name' => $user->getGroupName($user->getCpf())		
		);				
		return $data;
	}
}
