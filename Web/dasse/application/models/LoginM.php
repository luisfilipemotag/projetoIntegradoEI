<?php

class LoginM extends CI_Model {
    
    public function login($email,$password)
	{
        $this->db->where('EmailFuncionario',$email);
        $this->db->where('PasswordFuncionario',$password);
        $query=$this->db->get('Funcionarios')->result();
        return $query;
        
    }

    
    public function validaremail($email)
    {

        $this->db->where('EmailFuncionario',$email);
        $query=$this->db->get('Funcionarios')->row_array();
        return $query;
        if($query->num_rows()>0)
        {
        return true;
        }
        else
        {
        return false;
        }  
    }


    public function pegar($email)
	{
		$this->db->where('EmailFuncionario',$email);
		return $this->db->get('Funcionarios')->result();
    }
    
    
    public function newpass($data){
        
        $query=$this->db->get('Funcionarios');
        if($query->num_rows()>0)
        {
            $this->db->where('EmailFuncionario',$data['EmailFuncionario']);
            $this->db->set($data);
            return $this->db->update('Funcionarios');

            return true;
        }
        else
        {
            return false;
        }
    }  
    

    
}
?>
