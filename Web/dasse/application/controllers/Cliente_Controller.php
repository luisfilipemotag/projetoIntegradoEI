<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Cliente_Controller extends CI_Controller {
        
        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         *         http://example.com/index.php/welcome
         *    - or -
         *         http://example.com/index.php/welcome/index
         *    - or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see https://codeigniter.com/user_guide/general/urls.html
         */
        
        
        public function clientes()
        {
        
            if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
		else
		{
            $this->load->model('Cliente_Model');

            $idC= $this->session->userdata('EmpresaFuncionario');
            
            $data['list'] = $this->Cliente_Model->showAll($idC);
            
            $this->load->view('Cliente',$data);
        }
    }

    public function registoC(){
        if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
        else
        {
            $this->load->model('Cliente_Model');
            $idc= $this->input->post('cliente');
            $idcupao=$this->input->post('cupao');
            $this->Cliente_Model->cupaoRegisto($idc,$idcupao);
            $idC= $this->session->userdata('EmpresaFuncionario');
            $this->session->set_flashdata('msg', 'Cupão Usado Com Sucesso!');
            $data['list'] = $this->Cliente_Model->showAll($idC);
            $this->load->view('Cliente',$data);
           
        }
    }

    public function registoCarimbo(){
        if(($this->session->userdata('IDFuncionario'))==0||($this->session->userdata('IDFuncionario'))==NULL)
		{
		$this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
		redirect('Signs_Controller/sign_in');
		}
        else
        {
            $this->load->model('Cliente_Model');
            $idcliente= $this->input->post('cliente1');
            $idcarimbo=$this->input->post('carimbo');
            
            $this->Cliente_Model->carimboRegisto($idcliente,$idcarimbo);
            $idC= $this->session->userdata('EmpresaFuncionario');
            $this->session->set_flashdata('msg', 'Slot Carimbo Preechido Com Sucesso!');
            $data['list'] = $this->Cliente_Model->showAll($idC);
            $this->load->view('Cliente',$data);
            
        }
    }
        
        
}
    
