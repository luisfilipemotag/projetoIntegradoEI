<?php
    
    class MensagemM extends CI_Model {
        
        public function enviarAdmin($mensagem){

            $this->db->insert('Mensagem_Admin', $mensagem);
        }

        public function showAllE($idE){
        
            $this->db->select('EmpresaMensagem,Mensagem,Enviada,Data');
            $this->db->where('Enviada',1);
            $this->db->where('EmpresaMensagem',$idE);
            $this->db->order_by('Data','DESC');
            $result =$this->db->get('Mensagem_Admin');
            return $result->result();
            
        } 


        public function showAllR($idE){
        
            $this->db->select('EmpresaMensagem,Mensagem,Enviada,Data');
            $this->db->where('Enviada',0);
            $this->db->where('EmpresaMensagem',$idE);
            $this->db->order_by('Data','DESC');
            $result =$this->db->get('Mensagem_Admin');
            return $result->result();
            
        } 
        

        
        
        
        
        
    }
    ?>
