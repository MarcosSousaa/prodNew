<?php 

class Limpeza extends Model{
	public function getList($data1,$data2){
		try{
			$sql = "SELECT limpeza.*,operador.operador FROM limpeza INNER JOIN operador ON limpeza.operador_fk = operador.id WHERE limpeza.data_limp BETWEEN :data1 AND :data2 ORDER BY limpeza.data_limp";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1",$data1);
			$stmt->bindParam(":data2",$data2);
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
        	$sql = "SELECT limpeza.*,operador.operador FROM limpeza INNER JOIN operador ON limpeza.operador_fk = operador.id WHERE limpeza.id = :id";
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

	public function add($data_limp,$hora_limp,$ext,$operador,$est,$prot,$pain,$chao){
		try{			
			$sql = "INSERT INTO limpeza SET data_limp = :data_limp, hrlimp = :hrlimp, extrusora = :extrusora, operador_fk = :operador, estrutura = :estrutura, protecao = :protecao, painel = :painel, chao = :chao";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data_limp", $data_limp);
			$stmt->bindParam(":hrlimp", $hora_limp);
			$stmt->bindParam(":extrusora", $ext);
			$stmt->bindParam(":operador", $operador);
			$stmt->bindParam(":estrutura", $est);
			$stmt->bindParam(":protecao", $prot);
			$stmt->bindParam(":painel", $pain);
			$stmt->bindParam(":chao", $chao);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function edit($data_limp,$hora_limp,$ext,$operador,$est,$prot,$pain,$chao,$quali,$obs,$id){
		try{			
			$sql = "UPDATE limpeza SET data_limp = :data_limp,hrlimp = :hrlimp, extrusora = :extrusora, operador_fk = :operador, estrutura = :estrutura, protecao = :protecao, painel = :painel, chao = :chao, obs = :obs, valid = :valid  WHERE id = :id";
			$stmt = $this->db->prepare($sql);			
			$stmt->bindParam(":data_limp", $data_limp);
			$stmt->bindParam(":hrlimp", $hora_limp);
			$stmt->bindParam(":extrusora", $ext);
			$stmt->bindParam(":operador", $operador);
			$stmt->bindParam(":estrutura", $est);
			$stmt->bindParam(":protecao", $prot);
			$stmt->bindParam(":painel", $pain);
			$stmt->bindParam(":chao", $chao);
			$stmt->bindParam(":valid", $quali);
			$stmt->bindParam(":obs", $obs);
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
}