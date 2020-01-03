<?php 

class Producao extends Model{
	public function getListProducao($data1,$data2){
		try {
			$sql = "SELECT operador.operador, producao.* FROM producao INNER JOIN operador ON producao.operador_fk = operador.id WHERE data_prod BETWEEN :data1 AND :data2 ORDER BY data_prod,hri,hrf";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':data1',$data1);
			$stmt->bindParam(':data2',$data2);
			$stmt->execute();
			if($stmt->rowCount () > 0){
				return $stmt->fetchAll();
			}			
		} catch (Exception $e) {
			echo $e->getMessage();
			exit;
					
		}		
	}

	
	public function getInfoProducao($id){
		try {
			$array = array();
			$sql = "SELECT operador.operador, producao.* FROM producao INNER JOIN operador ON producao.operador_fk = operador.id WHERE producao.id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$array = $stmt->fetch();
			}
			return $array;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}	
	public function addProducao($data_prod,$ext,$turno,$operador,$hrini,$aprovacaoini,$pedido,$ordem,$lote,$rpm,$peso,$qtd,$total,$larg,$esp,$metrag,$hrfim,$aprovacaofim){
		try {
			$peso = str_replace(",", ".", $peso);
			$total = str_replace(",", ".", $total);
			$apara = str_replace(",", ".", $apara);
			$refile = str_replace(",", ".", $refile);			
			$larg = (isset($larg) && !empty($larg)) ? $larg : '0'; 
			$esp =(isset($esp) && !empty($esp)) ? $esp : '0'; 
			$metrag =(isset($metrag) && !empty($metrag)) ? $metrag : '0';
			$rpm = (isset($rpm) && !empty($rpm)) ? $rpm : '0.00';

			$sql = "INSERT INTO producao SET data_prod = :data_prod, extrusora = :extrusora, turno = :turno, operador_fk = :operador, hri = :hrini, situini = :aprovacaoini, pedido = :pedido, ordem = :ordem, lote = :lote, rpm = :rpm, pesobob = :peso, qtdbob = :qtd, totalbob = :total, larg = :larg, esp = :esp, metrag = :metrag, hrf = :hrfim, situfim = :aprovacaofim, TIMESTAMP = NOW();";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data_prod",$data_prod);
			$stmt->bindParam(":extrusora",$ext);
			$stmt->bindParam(":turno",$turno);
			$stmt->bindParam(":operador",$operador);
			$stmt->bindParam(":hrini",$hrini);
			$stmt->bindParam(":aprovacaoini",$aprovacaoini);
			$stmt->bindParam(":pedido",$pedido);
			$stmt->bindParam(":ordem",$ordem);
			$stmt->bindParam(":lote",$lote);
			$stmt->bindParam(":rpm",$rpm);
			$stmt->bindParam(":peso",$peso);
			$stmt->bindParam(":qtd",$qtd);
			$stmt->bindParam(":total",$total);
			$stmt->bindParam(":larg",$larg);
			$stmt->bindParam(":esp",$esp);
			$stmt->bindParam(":metrag",$metrag);			
			$stmt->bindParam(":hrfim",$hrfim);
			$stmt->bindParam(":aprovacaofim",$aprovacaofim);			
			$stmt->execute();			
		} catch (Exception $e) {
			echo $e->getMessage();			
		}		
	}

	public function updateProducao($sobrabob,$sobrabobkg,$id){
		try {			
			$sql = "UPDATE producao SET perdabob = :perdabob, perdakg = :perdakg, TIMESTAMP = NOW() WHERE id = :id;";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":perdabob", $sobrabob);
			$stmt->bindParam(":perdakg", $sobrabobkg);
			$stmt->bindParam(":qtdparada", $qtdparada);
			$stmt->bindParam(":tempoparada", $tempoparada);
			$stmt->bindParam(":oc", $oc);
			$stmt->bindParam(":id", $id);
			$stmt->execute();	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	public function getListPerda($data1,$data2){
		try {
			$sql = "SELECT perda.* FROM perda WHERE data_perd BETWEEN :data1 AND :data2 ORDER BY data_perd";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':data1',$data1);
			$stmt->bindParam(':data2',$data2);
			$stmt->execute();
			if($stmt->rowCount () > 0){
				return $stmt->fetchAll();
			}			
		} catch (Exception $e) {
			echo $e->getMessage();
			exit;
					
		}		
	}

	public function getInfoPerda($id){
		try {
			$array = array();
			$sql = "SELECT perda.* FROM perda WHERE perda.id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$array = $stmt->fetch();
			}
			return $array;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}	

	public function addPerda($data_perda,$turno,$apara,$refile,$borra,$acabamento,$qtdparada,$tempoparada,$oc){
		try {
			$apara = (isset($apara) && !empty($apara)) ? $apara : '0.000'; 
			$refile = (isset($refile) && !empty($refile)) ? $refile : '0.000'; 
			$borra = (isset($borra) && !empty($borra)) ? $borra : '0.000'; 
			$acabamento = (isset($acabamento) && !empty($acabamento)) ? $acabamento : '0.000'; 
			$apara = str_replace(",", ".", $apara);
			$refile = str_replace(",", ".", $refile);
			$borra = str_replace(",", ".", $borra);
			$acabamento = str_replace(",", ".", $acabamento);
			$oc = (isset($oc) && !empty($oc)) ? implode(",", $oc) : '';	
			$qtdparada = (isset($qtdparada) && !empty($qtdparada)) ? $qtdparada : '';
			$tempoparada = (isset($tempoparada) && !empty($tempoparada)) ? $tempoparada : '';			
			$sql = "INSERT INTO perda SET data_perd = :data_perda, turno = :turno, apara = :apara, refile = :refile, borra = :borra, acabamento = :acabamento, qtdparada = :qtdparada, tempoparada = :tempoparada,oc = :oc, TIMESTAMP = NOW();";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data_perda",$data_perda);			
			$stmt->bindParam(":turno",$turno);
			$stmt->bindParam(":apara",$apara);
			$stmt->bindParam(":refile",$refile);
			$stmt->bindParam(":borra",$borra);
			$stmt->bindParam(":acabamento",$acabamento);
			$stmt->bindParam(":qtdparada",$qtdparada);
			$stmt->bindParam(":tempoparada",$tempoparada);
			$stmt->bindParam(":oc",$oc);			
			$stmt->execute();			
		} catch (Exception $e) {
			echo $e->getMessage();			
		}		
	}

	public function updatePerda($apara,$refile,$borra,$acabamento,$qtdparada,$tempoparada,$oc,$id){
		try {			
			$oc = (isset($oc) && !empty($oc)) ? implode(",", $oc) : '';	
			$qtdparada = (isset($qtdparada) && !empty($qtdparada)) ? $qtdparada : '';
			$tempoparada = (isset($tempoparada) && !empty($tempoparada)) ? $tempoparada : '';			
			$sql = "UPDATE perda SET apara = :apara, refile = :refile, borra = :borra, acabamento = :acabamento, qtdparada = :qtdparada, tempoparada = :tempoparada, oc = :oc, TIMESTAMP = NOW() WHERE id = :id;";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":apara", $apara);
			$stmt->bindParam(":refile", $refile);
			$stmt->bindParam(":borra", $borra);
			$stmt->bindParam(":acabamento", $acabamento);	
			$stmt->bindParam(":qtdparada",$qtdparada);
			$stmt->bindParam(":tempoparada",$tempoparada);
			$stmt->bindParam(":oc",$oc);				
			$stmt->bindParam(":id", $id);			
			$stmt->execute();	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getReportProducao($data1,$data2,$pedido,$ordem,$lote){
		try {
				$sql = 
					" SELECT
						producao.data_prod,
						producao.extrusora,
					    operador.operador,
					    producao.turno,
					    producao.hri,
					    producao.pedido,
					    producao.ordem,
					    producao.lote,
					    producao.qtdbob,
					    producao.totalbob,
					    producao.hrf
					FROM producao
					INNER JOIN operador ON producao.operador_fk = operador.id
					WHERE";
				$where = array();
				if(!empty($data1) && !empty($data2)){
					$where[] = "producao.data_prod BETWEEN :data1 AND :data2";
				}
				if(!empty($pedido)){
					$where[] = "producao.pedido = :pedido ";
				}
				if(!empty($ordem)){
					$where[] = "producao.ordem = :ordem";
				}
				if(!empty($lote)){
					$where[] = "producao.lote :lote";
				}
			} catch (Exception $e) {
				echo $e->getMessage();	
			}	
	}
	
}