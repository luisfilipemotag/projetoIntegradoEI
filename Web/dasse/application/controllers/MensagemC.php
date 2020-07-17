<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MensagemC extends CI_Controller {

    public function mensagem()
    {
        $this->load->view('Mensagem');
    }


    public function MsgAdmin(){

		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
		
		$this->load->model('MensagemM');
		
		$mensagem=array(

			'EmpresaMensagem'=>$this->session->userdata('EmpresaFuncionario'),
			'Mensagem'=>$this->input->post('msg'),
			'Enviada'=>'1',
			'Data'=>date('y-m-d h:i:s')
		); 

			$this->MensagemM->enviarAdmin($mensagem);

			$this->session->set_flashdata('msg', 'Mensagem Enviada com Sucesso!');
            $this->load->view('Mensagem');
		}
	}

	
	public function MsgEnv()
	{
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
		 
		$this->load->model('MensagemM');
		$idE= $this->session->userdata('EmpresaFuncionario');
		$data['list'] = $this->MensagemM->showAllE($idE);
		$this->load->view('VerMensagemE',$data);
		}
	} 


	public function MsgRec()
	{
		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
		 
		$this->load->model('MensagemM');
		$idE= $this->session->userdata('EmpresaFuncionario');
		$data['list'] = $this->MensagemM->showAllR($idE);
		$this->load->view('VerMensagemR',$data);
		}
	} 



}
?>