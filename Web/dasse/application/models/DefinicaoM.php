<?php
class DefinicaoM extends CI_Model { 


    public function pegar($idE)
	{
		$this->db->where('IDEmpresa',$idE);
		return $this->db->get('Empresa')->result();
    }

    public function Updateempresa($data){

		$this->db->where('IDEmpresa',$data['IDEmpresa']);
		$this->db->set($data);
		return $this->db->update('Empresa');
    }  

    
    public function email_checkE($email){

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

}
?>