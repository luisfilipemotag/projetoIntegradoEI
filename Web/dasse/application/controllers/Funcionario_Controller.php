<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario_Controller extends CI_Controller {

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

	public function funcionarios()
	{
        if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{

		$this->load->model('FuncionarioM');
		
		$idE= $this->session->userdata('EmpresaFuncionario');

		$data['list'] = $this->FuncionarioM->showAll($idE);
		
		$this->load->view('Funcionarios',$data);
		}
		
	}


	public function funcionarioalterar($id)
	{
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
		$this->load->model('FuncionarioM');
		$data['funcionario'] = $this->FuncionarioM->pegar($id);
		$this->load->view('Funcionarios',$data);
		}
	}


	public function AdicionarF(){

		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
	
		$this->load->model('FuncionarioM');
		
			$funcionario=array(
			'EmpresaFuncionario'=>$this->session->userdata('EmpresaFuncionario'),
			'PNomeFuncionario'=>$this->input->post('nomeF'),
			'UNomeFuncionario'=>$this->input->post('unomeF'),
			'MoradaFuncionario'=>$this->input->post('moradaF'),
			'CodPostFuncionario'=>$this->input->post('codF'),
			'LocalidadeFuncionario'=>$this->input->post('country'),
			'ContactoFuncionario'=>$this->input->post('teleF'),
			'EmailFuncionario'=>$this->input->post('emailF'),
			'Admin'=>$this->input->post('admin'),
			'PasswordFuncionario'=>md5($this->input->post('passF'))
			);
		
			$email_checkF=$this->FuncionarioM->email_checkF($funcionario['EmailFuncionario']);
	
			if($email_checkF){
				$this->FuncionarioM->RegistarF($funcionario);
				$idE= $this->session->userdata('EmpresaFuncionario');
				$this->session->set_flashdata('msg1', 'Funcionario Registado com sucesso!');
				$this->session->set_flashdata('msg', '');
				$this->session->set_flashdata('error', '');
				$data['list'] = $this->FuncionarioM->showAll($idE);
				$this->load->view('Funcionarios',$data);
			}
			else
			{
			$this->session->set_flashdata('error', 'Email já existe!');
			$this->session->set_flashdata('msg','');
			$this->session->set_flashdata('msg1','');

			$idE= $this->session->userdata('EmpresaFuncionario');

			$data['list'] = $this->FuncionarioM->showAll($idE);
			$this->load->view('Funcionarios',$data);
			}
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

  		$this->load->model('FuncionarioM');

  		$data=array(
			'IDFuncionario'=>$this->input->post('idF'),
			'PNomeFuncionario'=>$this->input->post('nomeF'),
			'UNomeFuncionario'=>$this->input->post('unomeF'),
			'MoradaFuncionario'=>$this->input->post('moradaF'),
			'CodPostFuncionario'=>$this->input->post('codF'),
			'LocalidadeFuncionario'=>$this->input->post('country'),
			'ContactoFuncionario'=>$this->input->post('teleF'),
			'EmailFuncionario'=>$this->input->post('emailF'),
			'Admin'=>$this->input->post('admin'),
			'PasswordFuncionario'=>md5($this->input->post('passF'))
     	);

	  	$this->FuncionarioM->Updatefuncionario($data);
		$this->session->set_flashdata('msg', 'Alteração efetuada com Sucesso!');
		$this->session->set_flashdata('msg1', '');
		$this->session->set_flashdata('error', '');

	  	$idE= $this->session->userdata('EmpresaFuncionario');

	 	$data['list'] = $this->FuncionarioM->showAll($idE);	
		$this->load->view('Funcionarios',$data);
	    }	
    }


	function eliminar($id) {
		
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
			$this->load->model('FuncionarioM');
			$this->FuncionarioM->eliminar($id);

			$idE= $this->session->userdata('EmpresaFuncionario');
		
			$data['list'] = $this->FuncionarioM->showAll($idE);
			$this->load->view('Funcionarios',$data);
		}	
	}


}
	