<?php
    class adminEmpresa extends CI_Model {
        
        function showAll(){
            if(($this->session->userdata('id'))==0||($this->session->userdata('id'))==NULL)
            {
            $this->session->set_flashdata('msg', 'Por Favor inicie Sessão!');
            redirect('Signs_Controller/sign_in');
            }
            else
            {
            $this->db->select('IDEmpresa, NomeEmpresa, NIF,MoradaEmpresa,CodPostEmpresa,LocalidadeEmpresa,Contacto1Empresa,EmailEmpresa, xcoordenada, ycoordenada');
            $result =$this->db->get('Empresa');
            return $result->result();
            }
            
        }

        public function enviarfunc($mensagem){

            $this->db->insert('Mensagem_Admin', $mensagem);
        }

        public function showAllE(){
        
            $this->db->select('EmpresaMensagem,Mensagem,Enviada,Data');
            $this->db->where('Enviada',0);
            $this->db->order_by('Data','DESC');
            $result =$this->db->get('Mensagem_Admin');
            return $result->result();
            
        } 


        public function showAllR(){
        
            $this->db->select('EmpresaMensagem,Mensagem,Enviada,Data');
            $this->db->where('Enviada',1);
            $this->db->order_by('Data','DESC');
            $result =$this->db->get('Mensagem_Admin');
            return $result->result();
            
        } 

        public function showAllTerceiros(){
        
            $this->db->select('NomePessoa,EmailPessoa,TelemovelPessoa,Mensagem');
            $this->db->order_by('NomePessoa','DESC');
            $result =$this->db->get('Mensagens');
            return $result->result();
            
        } 


        public function login($nome,$password)
        {
            $this->db->where('username',$nome);
            $this->db->where('pass',$password);
            $query=$this->db->get('administrador')->result();
            return $query;     
        }


        
}
?>
