<?php
class CarimboM extends CI_Model { 


    function showAll($idE){
        
        $this->db->select('IDCarimbo, CartaoCarimbo, FuncionarioCarimbo, TítuloCarimbo, imgCarimbo, DataInicioCarimbo, DataFimCarimbo, DescricaoCarimbo, CorLetraCarimbos');
        $this->db->join('Cartao','Cartao.ID_Cartao=Carimbos.CartaoCarimbo');
        $this->db->where('EmpresaCartao',$idE);
        $this->db->order_by('DataInicioCarimbo','DESC');
        $result =$this->db->get('Carimbos');
            return $result->result();
        
    }  
    
    
    public function idcartao($idE)
	{
        $this->db->Select('ID_Cartao');
        $this->db->from('Cartao');
        $this->db->where('EmpresaCartao',$idE);
        $query=$this->db->get();
		    foreach($query->result() as $row) {
        return $row->ID_Cartao;
        }
    }


    public function registarCarimbo($carimbo){
        $this->db->insert('Carimbos',$carimbo); 
    }

    public function titulo_check($titulo){
 
		$this->db->select('*');
		$this->db->from('Carimbos');
		$this->db->where('TítuloCarimbo',$titulo);
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
