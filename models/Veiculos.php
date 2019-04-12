<?php

class Veiculos extends Model{
	public function getList($offset){
		$sql = "SELECT * FROM veiculos  LIMIT $offset, 10";
        $stmt = $this->db->prepare($sql);        
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }        
	}

    public function getInfo($id){
        $array = array();
        $sql = "SELECT * FROM veiculos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $array =  $stmt->fetch();
        }

        return $array;

    }

	public function getCount() {
        $sql = "SELECT COUNT(*) as c FROM veiculos";
        $stmt = $this->db->prepare($sql);        
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['c'];
    }

    public function add($tipo,$motorista,$placa,$empresa){
        $sql = "INSERT INTO veiculos SET tipo = :tipo, motorista = :motorista, placa = :placa , empresa = :empresa";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":motorista", $motorista);
        $stmt->bindParam(":placa", $placa);
        $stmt->bindParam(":empresa", $empresa);
        $stmt->execute();
    }

    public function edit($motorista, $empresa, $status, $id){
         $sql = "UPDATE veiculos SET motorista = :motorista,  empresa = :empresa, status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);        
        $stmt->bindParam(":motorista", $motorista);        
        $stmt->bindParam(":empresa", $empresa);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function inat($id){
        $sql = "UPDATE veiculos SET status = 'I' WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}