<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegEmpresaC extends CI_Controller {

    public function sign_up()
	{
		$this->load->view('signup');
	}


	public function Adicionar(){

    $this->load->model('RegEmpresaM');
    $empresa=array(
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
    

    $email_check=$this->RegEmpresaM->email_check($empresa['EmailEmpresa']);

    if($email_check){
            
    $this->RegEmpresaM->Registar($empresa);
    $this->load->view('signup1');
            
        }
    else{
            $this->session->set_flashdata('error', 'Email já existe existe!');
            $this->load->view('signup');
        }
    }

    public function AdicionarC(){

    $this->load->model('RegEmpresaM');

    $cartao=array(
    'EmpresaCartao'=>$this->input->post('idE'),
    'Título'=>$this->input->post('nomeE'),
    'SubTítulo'=>$this->input->post('subtitulo'),
    'IMGCartao'=>$this->input->post('1'),
    'CorLetraCartao'=>$this->input->post('cor')
    );

    $this->RegEmpresaM->RegistarC($cartao);
    $this->load->view('signup2');

    }

    public function AdicionarF(){

        $this->load->model('RegEmpresaM');
    
        $funcionario=array(
        'EmpresaFuncionario'=>$this->input->post('idE'),
        'PNomeFuncionario'=>$this->input->post('nomeF'),
        'UNomeFuncionario'=>$this->input->post('unomeF'),
        'MoradaFuncionario'=>$this->input->post('moradaF'),
        'CodPostFuncionario'=>$this->input->post('codF'),
        'LocalidadeFuncionario'=>$this->input->post('country'),
        'ContactoFuncionario'=>$this->input->post('teleF'),
        'EmailFuncionario'=>$this->input->post('emailF'),
        'Admin'=>'1',
        'PasswordFuncionario'=>md5($this->input->post('passF'))
        );
    
        $email_checkF=$this->RegEmpresaM->email_checkF($funcionario['EmailFuncionario']);

        if($email_checkF){
            if(strcmp ($this->input->post('passF'), $this->input->post('rpassF'))!=0)
			{
                $this->session->set_flashdata('error3', 'As Password devem ser iguais!');
                $this->session->set_flashdata('error4', '');
                $this->load->view('signup2');
            }
            else
            {
            $this->RegEmpresaM->RegistarF($funcionario);
            
                $this->load->view('signin');
            }
        }
        else
        {
            $this->session->set_flashdata('error4', 'Email já existe existe!');
            $this->session->set_flashdata('error3', '');
            $this->load->view('signup2');
        }
    }


}
?>
