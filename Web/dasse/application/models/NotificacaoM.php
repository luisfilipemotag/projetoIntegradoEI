<?php
class NotificacaoM extends CI_Model { 

    
    public function enviarnotificacao($notificacao)
    {
        $this->db->insert('Notificacoes',$notificacao);
    }


//Para fazer a condicção da notificação se nao existir idcliente

    public function cliente_check($cliente){
 
        $this->db->select('*');
        $this->db->from('Notificacoes');
		$this->db->where('ClienteNotificacao',$cliente);
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