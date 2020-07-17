<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signs_Controller extends CI_Controller {

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
	
	public function enter()
	{
		$this->load->view('inicio');
	} 


	public function sign_in()
	{
		$this->load->view('signin');
	}

	public function recuperar()
	{
		$this->load->view('Recupera');
	}


//-----------------------------login-------------------------------------
	public function iniciar()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run())
		{
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('LoginM');
			$login=$this->LoginM->login($email,$password);
			var_dump($login);
			if($login)
			{
				$dados = array(
					'IDFuncionario'=>$login[0]->IDFuncionario,
					'EmpresaFuncionario'=>$login[0]->EmpresaFuncionario,
					'PNomeFuncionario' => $login[0]->PNomeFuncionario,
					'UNomeFuncionario' => $login[0]->UNomeFuncionario,
					'ContactoFuncionario'=>$login[0]->ContactoFuncionario,
					'EmailFuncionario' => $email,
					'admin' => $login[0]->admin
				);
				$this->session->set_userdata($dados);
				redirect(base_url('index.php/Dash_Controller/dash'));
			}
			else{
				$this->session->set_flashdata('error', 'Email ou Password Inválido(s)!');
				redirect(base_url('index.php/Signs_Controller/sign_in'));
			}
		}
		else{
			$this->sign_in();
		}

	}

	//-----------Email a enviar o caminho da view para recuperar password-------------------
	public function rec(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required|trim|valid_email');

		if($this->form_validation->run())
		{

			$email=$this->input->post('email');
			
			$this->load->model('LoginM');
			if($this->LoginM->validaremail($email))
			{

			$subject="BizDirect Recuperar Password";
			
			$message="
			<p>Ol&aacute; ".$this->input->post('email').",</p>
			<p>Isto &eacute; um Email gerado autom&aacute;ticamente para poder dar reset &agrave; sua palavra-passe.</p>
			<p>Para tal clique aqui neste <a href='".site_url()."/Signs_Controller/change/".$email."'>link</a>.</p>
			<p>Assim que clicar no link ser&aacute; redirecionado para outra p&aacute;gina.</p>
			<p>Obrigado,</p>
			<p>Equipa que coopera com a BizDirect</p>";
				
			$conf= array(
				'protocol'=>'smtp',
				'smtp_host'=>'ssl://smtp.gmail.com',
				'smtp_port'=>465,
				'smtp_user'=>'apoiobizz@gmail.com',
				'smtp_pass'=>'a0123456b',
				'charset'=>'iso-8859-1',
				'mailtype'=>'html',
				'wordwrap'=>TRUE,
			);

			$this->load->library('email', $conf);
			$this->email->set_newline("\r\n");
			$this->email->initialize($conf);
			$this->email->from('apoiobizz@gmail.com');
			$this->email->to($email);
			$this->email->subject($subject);
			$this->email->message($message);

			$this->email->send();
			$this->enter();
			
		}
		else{
			$this->session->set_flashdata('error', 'Email não existe, Registe-se!');
			$this->load->view('Recupera');
		}


		}
	}

	//-------------------------Carrega a view para a nova password conhecendo o email----------------	
	public function change($email)
	{
		$this->load->model('LoginM');
		$data['funcionario'] = $this->LoginM->pegar($email);
		$this->load->view("NPassword",$data);
	}

	//-----------------------------------Alterar pass-------------------------------
	public function alterarpass(){
		$this->load->library('form_validation');

		$data=array(
			'EmailFuncionario'=>$this->input->post('email'),
			'PasswordFuncionario'=>md5($this->input->post('npass'))
     );

		$this->form_validation->set_rules($data);
		$this->form_validation->set_rules('rnpass','rnpass','required');
		if($this->form_validation->run()==FALSE)
		{
			$this->session->set_flashdata('error1', 'Por Favor, Insira as Password! Clique no link do email novamente ou volte atrás!');
			$this->load->view('Recupera');
		}
		else{
			if(strcmp ($this->input->post('npass'), $this->input->post('rnpass'))!=0)
			{
				$this->session->set_flashdata('error2', 'As Password devem ser iguais! Clique no link do email novamente ou volte atrás!');
				$this->load->view('Recupera');
			}
			else{
			
				$this->load->model('LoginM');
				$this->LoginM->newpass($data);
				$this->load->view('inicio');
			}
		}	
	}


	public function sair()
	{
		$this->session->sess_destroy();
		$this->load->view('inicio');
	}

//--------------------------------------------------------------------------------

	
}
?>
