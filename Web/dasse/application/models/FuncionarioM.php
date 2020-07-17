<?php
class FuncionarioM extends CI_Model { 

    function showAll($idE){

        $this->db->select('IDFuncionario, PNomeFuncionario, UNomeFuncionario,MoradaFuncionario, CodPostFuncionario, LocalidadeFuncionario, ContactoFuncionario, EmailFuncionario, admin, PasswordFuncionario');
        $this->db->where('EmpresaFuncionario',$idE);
	    $result =$this->db->get('Funcionarios');
	    return $result->result();

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
	
	public function pegar($id)
	{
		$this->db->where('IDFuncionario',$id);
		return $this->db->get('Funcionarios')->result();
	}
	
	
    public function Updatefuncionario($data){

        $this->db->where('IDFuncionario',$data['IDFuncionario']);
		$this->db->set($data);
		return $this->db->update('Funcionarios');
	}  


	public function eliminar($id) {
    $this->db->where('IDFuncionario', $id);
    return $this->db->delete('Funcionarios');
	}

}
?>
