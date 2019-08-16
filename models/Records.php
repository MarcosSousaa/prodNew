<?php

class Records extends Model{
	
	public function getList($data1,$data2,$tipo){
		$array = array();
		if($tipo == '0'){
			$sql = "SELECT registros.id,registros.tipo,registros.data_er,registros.hora_er,registros.colab_ret, registros.flag, chaves.cod,chaves.local FROM registros INNER JOIN chaves ON registros.chaves_id = chaves.id WHERE registros.tipo = :tipo AND registros.data_er BETWEEN :data1 AND :data2 /*AND registros.flag = '1'*/ ORDER BY registros.data_er,registros.hora_er";	
		}
		else if($tipo == '1'){
			$sql = "SELECT registros.id,registros.tipo,registros.data_er,registros.hora_er,registros.tipo_v,registros.placa,registros.motorista, registros.flag, registros.empresa FROM registros WHERE registros.tipo = :tipo AND registros.data_er BETWEEN :data1 AND :data2 /*AND registros.flag = '1'*/ ORDER BY registros.data_er,registros.hora_er";
	
	}
		else if($tipo == '2'){
			$sql = "SELECT registros.id,registros.tipo,registros.data_er,registros.hora_er, registros.flag, veiculos.placa,veiculos.motorista,veiculos.empresa FROM registros INNER JOIN veiculos ON registros.veiculos_id = veiculos.id WHERE registros.tipo = :tipo AND registros.data_er BETWEEN :data1 AND :data2 /*AND registros.flag = '1'*/ORDER BY registros.data_er,registros.hora_er";
		}
		else if($tipo == '3'){
			
		}		
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':tipo',$tipo);
		$stmt->bindValue(':data1',$data1);
		$stmt->bindValue(':data2',$data2);
		$stmt->execute();		
		if($stmt->rowCount() > 0){
			$array =  $stmt->fetchAll();
		}
		return $array;
	}

	public function getInfo($id){
		$array = array();
		$sql = "SELECT * FROM registros WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();

		if($stmt->rowCount() > 0){
			$array = $stmt->fetch();
		}

		return $array;
	}	

	public function getCount($tipo){
		$sql = "SELECT COUNT(*) as c FROM registros WHERE tipo = :tipo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":tipo", $tipo);        
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['c'];
	}


	public function add($tipo,$data_er,$hora_er,$colab_ret = '', $tipo_vr = '', $placa_vr = '', $motorista_vr = '', $empresa_vr = '' , $veiculos_id = '',$chaves_id = ''){
		if($tipo == '0'){
			$sql = "INSERT INTO registros (tipo,data_er,hora_er,colab_ret,chaves_id) VALUES(:tipo,:data_er,:hora_er,:colab_ret,:chaves_id)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":tipo", $tipo);
			$stmt->bindValue(":data_er", $data_er);
			$stmt->bindValue(":hora_er", $hora_er);
			$stmt->bindValue(":colab_ret", $colab_ret);
			$stmt->bindValue(":chaves_id", $chaves_id);			
		}
		else if($tipo == '1'){
			$sql = "INSERT INTO registros (tipo,data_er,hora_er,tipo_v,placa,motorista,empresa) VALUES(:tipo,:data_er,:hora_er,:tipo_v,:placa,:motorista,:empresa)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":tipo", $tipo);
			$stmt->bindValue(":data_er", $data_er);
			$stmt->bindValue(":hora_er", $hora_er);
			$stmt->bindValue(":tipo_v", $tipo_vr);
			$stmt->bindValue(":placa", $placa_vr);			
			$stmt->bindValue(":motorista", $motorista_vr);			
			$stmt->bindValue(":empresa", $empresa_vr);			
		}

		else if($tipo == '2'){
			$sql = "INSERT INTO registros (tipo,data_er,hora_er,veiculos_id) VALUES(:tipo,:data_er,:hora_er,:veiculos_id)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":tipo", $tipo);
			$stmt->bindValue(":data_er", $data_er);
			$stmt->bindValue(":hora_er", $hora_er);
			$stmt->bindValue(":veiculos_id", $veiculos_id);			
		}
		$stmt->execute();

	}

	public function edit($id,$data_sr,$hora_sr,$colab_dev = ''){
		if($colab_dev != ''){
			$sql = "UPDATE registros SET data_sr = :data_sr, hora_sr = :hora_sr, flag = '2' WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":data_sr" , $data_sr);
			$stmt->bindValue(":hora_sr" , $hora_sr);
			$stmt->bindValue(":id" , $id);
		}
		else {
			$sql = "UPDATE registros SET data_sr = :data_sr, hora_sr = :hora_sr, colab_dev = :colab_dev, flag = '2' WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":data_sr" , $data_sr);
			$stmt->bindValue(":hora_sr" , $hora_sr);
			$stmt->bindValue(":colab_dev" , $colab_dev);
			$stmt->bindValue(":id" , $id);
		}
		$stmt->execute();
	}

	public function getEntradaSaida($data1,$data2,$placa,$motorista,$empresa,$tipo){
		$sql = "SELECT 
					registros.data_er, 
					registros.hora_er, 
					veiculos.motorista, 
					veiculos.placa, 
					veiculos.empresa, 
					registros.data_sr, 
					registros.hora_sr
					FROM registros
					INNER JOIN veiculos ON registros.veiculos_id = veiculos.id
					WHERE ";
	 	$where = array();
	 	if(!empty($tipo)){
	 		$where[] = "registros.tipo = :tipo  ";
	 	} 	    
        if(!empty($data1) && !empty($data2) ){
        	$where[] = "registros.data_er BETWEEN :data1 AND :data2";	
        }
        if(!empty($motorista)){
            $where[] = "veiculos.motorista LIKE '%".$motorista."%'";
        }
        if(!empty($empresa)){
            $where[] = "veiculos.empresa LIKE '%".$empresa."%'";
        }
        if(!empty($placa)){
            $where[] = "veiculos.placa LIKE  '%".$placa."%'";
        }        
        $sql .= implode(' AND ', $where);
        $stmt = $this->db->prepare($sql);
        if(!empty($tipo)){
            $stmt->bindParam(":tipo", $tipo);                       
        }        
        if(!empty($data1) && !empty($data2)){
            $stmt->bindParam(":data1", $data1);   
            $stmt->bindParam(":data2", $data2);                
        }           	
        $stmt->execute();                	
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        }
        return null;

	}

	public function getRecebColet($data1,$data2,$placa,$motorista,$empresa,$tipo){
		$sql = "SELECT 
					registros.data_er, 
					registros.hora_er, 
					registros.motorista, 
					registros.placa, 
					registros.empresa, 
					registros.data_sr, 
					registros.hora_sr
					FROM registros					
					WHERE ";
	 	$where = array();
	 	if(!empty($tipo)){
	 		$where[] = "registros.tipo = :tipo  ";
	 	} 	    
        if(!empty($data1) && !empty($data2) ){
        	$where[] = "registros.data_er BETWEEN :data1 AND :data2";	
        }
        if(!empty($motorista)){
            $where[] = "veiculos.motorista LIKE '%".$motorista."%'";
        }
        if(!empty($empresa)){
            $where[] = "veiculos.empresa LIKE '%".$empresa."%'";
        }
        if(!empty($placa)){
            $where[] = "veiculos.placa LIKE  '%".$placa."%'";
        }        
        $sql .= implode(' AND ', $where);
        $stmt = $this->db->prepare($sql);
        if(!empty($tipo)){
            $stmt->bindParam(":tipo", $tipo);                       
        }        
        if(!empty($data1) && !empty($data2)){
            $stmt->bindParam(":data1", $data1);   
            $stmt->bindParam(":data2", $data2);                
        }           	
        $stmt->execute();                	
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        }
        return null;

	}
}