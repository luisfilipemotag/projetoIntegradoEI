<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller {
        
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
        
        public function index()
        {
        
            $this->load->view('adminlog');
        }

        public function mensagem()
        {
            if(($this->session->userdata('id'))==0||($this->session->userdata('id'))==NULL)
            {
            $this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
            redirect(base_url('index.php/Admin/index'));
            }
            else
            {
            
            $this->load->view('adminmensagem');
            }
        }

        public function inicio()
        {
            if(($this->session->userdata('id'))==0||($this->session->userdata('id'))==NULL)
            {
            $this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
            redirect(base_url('index.php/Admin/index'));
            }
            else
            {
            
            $this->load->model('AdminEmpresa');
            
            $data['list'] = $this->AdminEmpresa->showAll();
            
            $this->load->view('admininicio',$data);
            }
        }



        public function iniciar()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
    
            if($this->form_validation->run())
            {
                $nome = $this->input->post('nome');
                $password = md5($this->input->post('password'));
                $this->load->model('AdminEmpresa');
                $login=$this->AdminEmpresa->login($nome,$password);
                var_dump($login);
                if($login)
                {
                    $dados = array(
                        'id'=>$login[0]->id,
                        'username' => $nome,
                        'email' => $login[0]->email
                    );
                    $this->session->set_userdata($dados);
                    redirect(base_url('index.php/Admin/inicio'));
                }
                else{
                    $this->session->set_flashdata('error', 'Nome ou Password Inválido(s)!');
                    redirect(base_url('index.php/Admin/index'));
                }
            }
            else{
                redirect(base_url('index.php/Admin/index'));
            }
    
        }


        public function sair()
	{
		$this->session->sess_destroy();
		$this->load->view('inicio');
	}


        

        
        public function Msgfunc(){
            
            if(($this->session->userdata('id'))==0||($this->session->userdata('id'))==NULL)
            {
            $this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
            redirect(base_url('index.php/Admin/index'));
            }
            else
            {
            
            $this->load->model('AdminEmpresa');
            
            $mensagem=array(
    
                'EmpresaMensagem'=>$this->input->post('id'),
                'Mensagem'=>$this->input->post('msg'),
                'Enviada'=>'0',
                'Data'=>date('y-m-d h:i:s')
            ); 
    
                $this->AdminEmpresa->enviarfunc($mensagem);
    
                $this->session->set_flashdata('msg', 'Mensagem Enviada com Sucesso!');
                $this->load->view('adminmensagem');
            }
        }
    
        
        public function MsgEnv()
        {
            if(($this->session->userdata('id'))==0||($this->session->userdata('id'))==NULL)
            {
            $this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
            redirect(base_url('index.php/Admin/index'));
            }
            else
            {
             
            $this->load->model('AdminEmpresa');
            $data['list'] = $this->AdminEmpresa->showAllE();
            $this->load->view('VerMensagemEf',$data);
            }
        } 
    
    
        public function MsgRec()
        {
            if(($this->session->userdata('id'))==0||($this->session->userdata('id'))==NULL)
            {
            $this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
            redirect(base_url('index.php/Admin/index'));
            }
            else
            {
            $this->load->model('AdminEmpresa');
            $data['list'] = $this->AdminEmpresa->showAllR();
            $this->load->view('VerMensagemRf',$data);
            }
        } 


        public function MsgRecTer()
        {
            if(($this->session->userdata('id'))==0||($this->session->userdata('id'))==NULL)
            {
            $this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
            redirect(base_url('index.php/Admin/index'));
            }
            else
            {
            $this->load->model('AdminEmpresa');
            $data['list'] = $this->AdminEmpresa->showAllTerceiros();
            $this->load->view('VerMensagemRt',$data);
            }
        } 


    
        
    }
