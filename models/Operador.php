<?php 

class Operador extends Model{
	public function getList(){
		try{
			$sql = "SELECT * FROM operador ";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return $stmt->fetchAll();
			}	
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function getInfo($id){
		try{
	 		$array = array();
        	$sql = "SELECT * FROM operador WHERE id = :id";
        	$stmt = $this->db->prepare($sql);
        	$stmt->bindParam(":id", $id);
        	$stmt->execute();
        	if($stmt->rowCount() > 0){
            	$array =  $stmt->fetch();
        	}
        	return $array;
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getCount(){
		try{
	 		$sql = "SELECT COUNT(*) as c FROM operador";
    		$stmt = $this->db->prepare($sql);        
        	$stmt->execute();
        	$row = $stmt->fetch();
        	return $row['c'];
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function add($operador){
		try{			
			$sql = "INSERT INTO operador SET operador = :operador";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":operador", $operador);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function edit($operador,$id){
		try{			
			$sql = "UPDATE operador SET operador = :operador WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":operador", $operador);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function delete($id){
		try{			
			$sql = "DELETE FROM operador WHERE id = :id";
			$stmt = $this->db->prepare($sql);			
			$stmt->bindParam(":id", $id);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function getOperador(){
		$data = "";
		$sql = "SELECT id,operador FROM operador";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$result = $stmt->fetchAll();
			$data = "<option value='0' disabled selected >Escolha um operador</option>";

			foreach($result as $row){
				$data .= "<option value='".$row['id']."'>".$row['operador']."</option>";
			}			
		}
		return $data;
	}

}