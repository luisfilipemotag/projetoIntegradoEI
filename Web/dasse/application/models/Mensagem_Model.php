<?php
    
    class Mensagem_Model extends CI_Model {
        
        
        public function Inserir_msg(){
            $msg['NomePessoa'] = $this->input->post('nome');
            $msg['EmailPessoa'] = $this->input->post('email');
            $msg['TelemovelPessoa'] = $this->input->post('telemovel');
            $msg['Mensagem'] = $this->input->post('mensagem');
            
            
            $this->db->insert('Mensagens', $msg);
        }
        
        
        
        
        
        
    }
    ?>
