<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cupao_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function cupao()
	{
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
		 
		$this->load->model('CupaoM');
		$idE= $this->session->userdata('EmpresaFuncionario');
		$data['list'] = $this->CupaoM->showAll($idE);
		$this->load->view('VerCupao',$data);
		}
	} 

	
	public function idcart()
	{
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
		$this->load->model('CupaoM');
		$idE=$this->session->userdata('EmpresaFuncionario');
		$data['ID_Cartao']=$this->CupaoM->idcartao($idE);
		$this->load->view('Cupao',$data);
		}
	}

  

	public function AdicionarCupao(){

		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
	
		$this->load->model('CupaoM');


		$cupao=array(

			'CartaoCupao'=>$this->input->post('idCartao'),
			'FuncionarioCupao'=>$this->session->userdata('IDFuncionario'),
			'TituloCupao'=>$this->input->post('TituloCupao'),
			'ValeCupao'=>$this->input->post('ValeCupao'),
			'IMGCupao'=>$this->input->post('1'),
			'DataInicioCupao'=>$this->input->post('DataInicioCupao'),
			'DataFimCupao'=>$this->input->post('DataFimCupao'),
			'DescricaoCupao'=>$this->input->post('DescricaoCupao'),
		  	'CorLetraCupoes'=>$this->input->post('corCupao')   
			);

		$titulo_check=$this->CupaoM->titulo_check($cupao['TituloCupao']);

    	if($titulo_check){

		$this->CupaoM->registarCupao($cupao);

		$this->session->set_flashdata('error', '');
		$this->session->set_flashdata('msg', 'Cupão Adicionado com Sucesso!');

		$idE=$this->session->userdata('EmpresaFuncionario');
		$data['ID_Cartao']=$this->CupaoM->idcartao($idE);
		$this->load->view('Cupao',$data);
		}
		else{
		
		$this->session->set_flashdata('error', 'Titulo de Cupao já existe!');
		$this->session->set_flashdata('msg', '');

		$idE=$this->session->userdata('EmpresaFuncionario');
		$data['ID_Cartao']=$this->CupaoM->idcartao($idE);
		$this->load->view('Cupao',$data);
		}
	  } 
	}

}
?>
