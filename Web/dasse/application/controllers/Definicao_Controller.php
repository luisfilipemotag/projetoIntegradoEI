<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Definicao_Controller extends CI_Controller {

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
	

	public function empresaalterar($idE)
	{
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
		$this->load->model('DefinicaoM');
		$data['empresa'] = $this->DefinicaoM->pegar($idE);
		$this->load->view('Definicao',$data);
		}
	}

	public function alterar(){
		
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{

		$this->load->model('DefinicaoM');

		$data=array(
			'IDEmpresa'=>$this->session->userdata('EmpresaFuncionario'),
			'NomeEmpresa'=>$this->input->post('nomeE'),
			'Contacto1Empresa'=>$this->input->post('telE'),
			'EmailEmpresa'=>$this->input->post('emailE'),
			'CodPostEmpresa'=>$this->input->post('codE'),
			'NIF'=>$this->input->post('nifE'),
			'MoradaEmpresa'=>$this->input->post('moradaE'),
			'LocalidadeEmpresa'=>$this->input->post('country'),
			'xcoordenada'=>$this->input->post('xcoord'),
			'ycoordenada'=>$this->input->post('ycoord')
		);

		$this->DefinicaoM->Updateempresa($data);
		$this->session->set_flashdata('msg', 'Alteração efetuada com Sucesso!');
		$idE= $this->session->userdata('EmpresaFuncionario');
		$data['empresa'] = $this->DefinicaoM->pegar($idE);
		$this->load->view('Definicao',$data);
	    }	
	}




}
?>