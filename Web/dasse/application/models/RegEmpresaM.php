<?php

class RegEmpresaM extends CI_Model {


    public function Registar($empresa){
       
      $this->db->insert('Empresa', $empresa);
    }


    public function email_check($email){
 
      $this->db->select('*');
      $this->db->from('Empresa');
      $this->db->where('EmailEmpresa',$email);
      $query=$this->db->get();
     
      if($query->num_rows()>0){
        return false;
      }
      else{
        return true;
      }
     
  }
     
    public function RegistarC($cartao){    
      
      $this->db->insert('Cartao', $cartao); 
    }


    public function RegistarF($funcionario){    
      
      $this->db->insert('Funcionarios', $funcionario); 
    }

    public function email_checkF($email){
 
      $this->db->select('*');
      $this->db->from('Funcionarios');
      $this->db->where('EmailFuncionario',$email);
      $query=$this->db->get();
     
      if($query->num_rows()>0){
        return false;
      }
      else{
        return true;
      }
     
  }



    
    

}
?>