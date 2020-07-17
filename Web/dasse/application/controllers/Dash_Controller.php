<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash_Controller extends CI_Controller {

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
	

	public function dash()
	{
		if(($this->session->userdata('IDFuncionario')==0)||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		$this->load->view('signin');
		}
		else
		{
            
            $idE=$this->session->userdata('EmpresaFuncionario');
            $this->load->model('DashM');
            $data['list']=$this->DashM->N_Clientes($idE);
      
            
            
		$this->load->view('Dash',$data);
            
	}
}
}
