<?php
require_once './libs/dompdf/src/Autoloader.php';
require_once './libs/dompdf/lib/html5lib/Parser.php';          
Dompdf\Autoloader::register();
use Dompdf\Dompdf;   
class reportsController extends Controller {
	private $user;
	public function __construct(){
		$this->user = new Users();
		if(!$this->user->isLogged()){
			header("Location:".BASE_URL."login");
			exit();
		}
		$this->user->setLoggedUser();
	}

	public function index(){
		$data = array();
		// informações para o template
        $data['nome_usuario'] = $this->user->getName();		
		if($this->user->hasPermission('report_view')){
			$this->loadTemplate('report', $data);
		}else {
			header("Location:".BASE_URL);
		}
	}

	public function chaves(){
		$data = array();
		// informações para o template
        $data['nome_usuario'] = $this->user->getName();
        if($this->user->hasPermission('report_chaves')){
        	$this->loadTemplate('report_chaves', $data);
        }else {
        	header("Location: ". BASE_URL);
        	exit();
        }		
	}

	public function chaves_pdf(){
		if($this->user->hasPermission('report_chaves')){
            $chave_name = addslashes($_GET['chave_name']);
            $local_name = addslashes($_GET['local_name']);            
            $chave = new Chaves();
            $data['chave_list'] = $chave->getChaveFiltrada($chave_name,$local_name);
            $data['filters'] = $_GET;
            ob_start(); //iniciando buffer [armazenando na memoria o que era pra ser carregado na view]            
            $this->loadView('report_chaves_pdf', $data);
            $html = ob_get_contents(); // pegando tudo armazenado no buffer e colocando na variavel $html
            ob_end_clean(); // zerando a memoria quanto a este processo
            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);
            // (Optional) Orientacao do papel
            /*
                PORTRAIT = RETRATO
                LANDSCAPE = PAISAGEM
            */
    		$dompdf->setPaper('A4', 'portrait');
    		// Render the HTML as PDF
    		$dompdf->render();
    		$canvas = $dompdf->get_canvas(); 
    		$canvas->page_text(510, 18, "Pág. {PAGE_NUM}/{PAGE_COUNT}",'' , 6, array(0,0,0)); //header
    		// Saida no browser
    		$dompdf->stream('relatorio.pdf', array('Attachment' => false));

		}else {
			header("Location:" . BASE_URL);
			exit;
		}
	}

	public function veiculos(){
		$data = array();
		// informações para o template
        $data['nome_usuario'] = $this->user->getName();
        if($this->user->hasPermission('report_veiculos')){
        	$this->loadTemplate('report_veiculos', $data);
        }else {
        	header("Location: ". BASE_URL);
        	exit();
        }		
	}

	public function veiculos_pdf(){
		if($this->user->hasPermission('report_veiculos')){
            $motorista = addslashes($_GET['veiculo_motorista']);
            $placa = addslashes($_GET['veiculo_placa']);            
            $empresa = addslashes($_GET['veiculo_empresa']);  
            $tipo = addslashes($_GET['tipo']);          
            $status = addslashes($_GET['status']);          
            $veiculo = new Veiculos();
            $data['veiculo_list'] = $veiculo->getVeiculoFiltrado($motorista,$placa,$empresa,$tipo,$status);
            $data['filters'] = $_GET;            
            ob_start(); // iniciando buffer [armazenando na memoria o que era pra ser carregado na view]
            $this->loadView('report_veiculos_pdf', $data);
            $html = ob_get_contents(); // pegando tudo armazenado no buffer e colocando na variavel $html
            ob_end_clean(); // zerando a memoria quanto a este processo
            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);
            // (Optional) Orientacao do papel
            /*
                PORTRAIT = RETRATO
                LANDSCAPE = PAISAGEM
            */
    		$dompdf->setPaper('A4', 'landscape');
    		// Render the HTML as PDF
    		$dompdf->render();
    		$canvas = $dompdf->get_canvas(); 
    		$canvas->page_text(510, 18, "Pág. {PAGE_NUM}/{PAGE_COUNT}",'' , 6, array(0,0,0)); //header
    		// Output the generated PDF to Browser
    		$dompdf->stream('relatorio.pdf', array('Attachment' => false));


		}else {
			header("Location:" . BASE_URL);
			exit;
		}
	}

    public function entradaSaidaVeiculos(){
        $data = array();
        // informações para o template
        $data['nome_usuario'] = $this->user->getName();
        if($this->user->hasPermission('report_entsaiveiculos')){
            $this->loadTemplate('report_entsaiveiculos', $data);
        }else {
            header("Location: ". BASE_URL);
            exit();
        }       
    }

    public function entsaiveiculos_pdf(){
        if($this->user->hasPermission('report_entsaiveiculos')){
            $data1 = addslashes($_GET['ent_sai_data_inicial']);
            $data2 = addslashes($_GET['ent_sai_data_final']);            
            $placa = addslashes($_GET['ent_sai_placa']);  
            $nome = addslashes($_GET['ent_sai_nome']);          
            $empresa = addslashes($_GET['ent_sai_empresa']);          
            $tipo = '2';
            $records = new Records();
            $data['records_list'] = $records->getEntradaSaida($data1,$data2,$placa,$nome,$empresa,$tipo);            
            $data['filters'] = $_GET;            
            ob_start(); // iniciando buffer [armazenando na memoria o que era pra ser carregado na view]
            $this->loadView('report_veiculos_pdf', $data);
            $html = ob_get_contents(); // pegando tudo armazenado no buffer e colocando na variavel $html
            ob_end_clean(); // zerando a memoria quanto a este processo
            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);
            // (Optional) Orientacao do papel
            /*
                PORTRAIT = RETRATO
                LANDSCAPE = PAISAGEM
            */
            $dompdf->setPaper('A4', 'landscape');
            // Render the HTML as PDF
            $dompdf->render();
            $canvas = $dompdf->get_canvas(); 
            $canvas->page_text(510, 18, "Pág. {PAGE_NUM}/{PAGE_COUNT}",'' , 6, array(0,0,0)); //header
            // Output the generated PDF to Browser
            $dompdf->stream('relatorio.pdf', array('Attachment' => false));


        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }
}