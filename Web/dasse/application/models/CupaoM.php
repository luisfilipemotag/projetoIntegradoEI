<?php
class CupaoM extends CI_Model { 

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

    
    function showAll($idE){
        
        $this->db->select('IDCupao, CartaoCupao, FuncionarioCupao, TituloCupao, IMGCupao, ValeCupao, DataInicioCupao, DataFimCupao, DescricaoCupao, CorLetraCupoes');
        $this->db->join('Cartao','Cartao.ID_Cartao=Cupoes.CartaoCupao');
        $this->db->where('EmpresaCartao',$idE);
        $this->db->order_by('DataInicioCupao','DESC');
        $result =$this->db->get('Cupoes');
        return $result->result();
        
    } 
    
    public function registarCupao($cupao){

        $this->db->insert('Cupoes', $cupao); 
    }


	public function titulo_check($titulo){
 
		$this->db->select('*');
		$this->db->from('Cupoes');
		$this->db->where('TituloCupao',$titulo);
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
