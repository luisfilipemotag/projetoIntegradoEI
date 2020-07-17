<?php
class Cliente_Model extends CI_Model { 

 function showAll($idC){

    $this->db->select('IDCliente, PNomeCliente, UNomeCliente,SexoCliente,DataNascCliente,CodPostCliente,MoradaCliente,LocalidadeCliente, ContactoCliente, EmailCliente');
	$this->db->join('RegistoCartao','Clientes.IDCliente=RegistoCartao.ClienteRegistoCartao');
	$this->db->join('Cartao','Cartao.ID_Cartao=RegistoCartao.CartaoRegistoCartao');
	$this->db->where('EmpresaCartao',$idC);
	$result =$this->db->get('Clientes');
	return $result->result();

 }

 	public function cupaoRegisto($idc,$idcupao){
		$this->db->where('ClienteRegistoCupao',$idc);
		$this->db->where('CupaoRegistoCupao',$idcupao);
		$this->db->set('UsadoCupao','1');
		return $this->db->update('RegistoCupao');
	}  
	
	
	public function carimboRegisto($idcliente,$idcarimbo){
		$this->db->where('CarimboRCarimbo',$idcliente);
		$this->db->where('ClienteRCarimbo',$idcarimbo);
		$this->db->set('SlotCompletosCarimbo','SlotCompletosCarimbo+1',FALSE);
		return $this->db->update('RegistoCarimbo');
	}  

	
	
	public function pegar($id)
	{
		$this->db->where('IDCliente',$id);
		return $this->db->get('Clientes')->result();
	}

}
?>
