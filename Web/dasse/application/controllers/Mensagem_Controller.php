<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Mensagem_Controller extends CI_Controller {
        
        
    
        public function Enviar(){
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->load->helper('url');
            $config = array(
                            array(
                                  'field' => 'nome',
                                  'label' => 'nome',
                                  'rules' => 'required|min_length[2]|max_length[100]'
                                  ),
                            array(
                                  'field' => 'email',
                                  'label' => 'email',
                                  'rules' => 'required|valid_email'
                                  ),
                            array(
                                  'field' => 'telemovel',
                                  'label' => 'telemovel',
                                  'rules' => 'required'
                                  ),
                            array(
                                  'field' => 'mensagem',
                                  'label' => 'mensagem',
                                  'rules' => 'required|min_length[50]|max_length[250]'
                                  )
                            );
            
            $this->form_validation->set_rules($config); //criar o array do $config
            
            if(($this->form_validation->run()) == FALSE) {
                $result = [
                'feedback' => validation_errors(),
                'type' => 'danger',
                'result' => 'true'
                ];
            } else {
                $this->load->model('Mensagem_Model');
                $this->Mensagem_Model->Inserir_msg();
                
                $result = [
                'feedback' => 'Mensagem enviada com sucesso.',
                'type' => 'success',
                'result' => 'true'
                ];
            }
            
            $this->session->set_flashdata('result', $result);
            redirect('Inicio/index');
            
        }
    };
    ?>


