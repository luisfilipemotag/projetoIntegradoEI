<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Notificacao_Controller extends CI_Controller {


        public function notificacao()
        {
            if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		    else
		    {
                $this->load->view('notificacao');
            }
        }

    
    public function enviarnotificacao(){

		if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{


		$this->load->model('NotificacaoM');
		
		$notificacao=array(

			'ClienteNotificacao'=>$this->input->post('idcliente'),
			'EmpresaNotificacao'=>$this->session->userdata('EmpresaFuncionario'),
			'Mensagem'=>$this->input->post('notificacao')
			);
            
			$this->NotificacaoM->enviarnotificacao($notificacao);

			$this->session->set_flashdata('error', '');
			$this->session->set_flashdata('msg', 'Notificação Enviada com Sucesso!');
            $this->load->view('notificacao');
			}
		}




}
?>