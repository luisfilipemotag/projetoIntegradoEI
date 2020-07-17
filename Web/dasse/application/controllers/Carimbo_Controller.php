<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carimbo_Controller extends CI_Controller {

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
	
    public function carimbo()
    {
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
		
		$this->load->model('CarimboM');
		$idE= $this->session->userdata('EmpresaFuncionario');
        $data['list'] = $this->CarimboM->showAll($idE);
		$this->load->view('VerCarimbo',$data);
		}
	}
	

	public function idcart()
	{
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
			$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
			redirect('Signs_Controller/sign_in');
		}
		else{
			$this->load->model('CarimboM');
			$idE=$this->session->userdata('EmpresaFuncionario');
			$data['ID_Cartao']=$this->CarimboM->idcartao($idE);
			$this->load->view('Carimbo',$data);
		}
	}


	public function AdicionarCarimbo(){

		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{

		$this->load->model('CarimboM');
		
		$carimbo=array(

			'CartaoCarimbo'=>$this->input->post('idCartao'),
			'FuncionarioCarimbo'=>$this->session->userdata('IDFuncionario'),
			'TítuloCarimbo'=>$this->input->post('TituloCarimbo'),
			'PremioCarimbo'=>$this->input->post('Pcarimbo'),
			'imgCarimbo'=>$this->input->post('1'),
			'DataInicioCarimbo'=>$this->input->post('DataInicioCarimbo'),
			'DataFimCarimbo'=>$this->input->post('DataFimCarimbo'),
			'DescricaoCarimbo'=>$this->input->post('DescricaoCarimbo'),
			'CorLetraCarimbos'=>$this->input->post('corCarimbo')
			);

			$titulo_check=$this->CarimboM->titulo_check($carimbo['TítuloCarimbo']);

			if($titulo_check){

			$this->CarimboM->registarCarimbo($carimbo);

			$this->session->set_flashdata('error', '');
			$this->session->set_flashdata('msg', 'Carimbo Adicionado com Sucesso!');

			$idE=$this->session->userdata('EmpresaFuncionario');
			$data['ID_Cartao']=$this->CarimboM->idcartao($idE);
			$this->load->view('Carimbo',$data);
			}
			else{
			
			$this->session->set_flashdata('error', 'Titulo de Carimbo já existe!');
			$this->session->set_flashdata('msg', '');

			$idE=$this->session->userdata('EmpresaFuncionario');
			$data['ID_Cartao']=$this->CarimboM->idcartao($idE);
			$this->load->view('Carimbo',$data);
			}
		}
	}



}
