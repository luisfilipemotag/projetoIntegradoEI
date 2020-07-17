<?php
    
    class DashM extends CI_Model {

        public function N_Clientes($idE){
           
            $this->db->select('ID_Cartao');
            $this->db->where('EmpresaCartao', $idE);
            $result = $this->db->get('Cartao');
            $data['ID_Cartao'] = $result->result();
            
            $idCartao = $data['ID_Cartao'][0]->ID_Cartao;
            
          
        
            
            $jan = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=1;";
             $jan = $this->db->query($jan)->result();
             $data['janeiro']= $jan;
            
            $fev = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=2;";
            $fev = $this->db->query($fev)->result();
            $data['fevereiro']= $fev;
            
            $mar = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=3;";
            $mar = $this->db->query($mar)->result();
            $data['marco']= $mar;
            
            $abr = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=4;";
            $abr = $this->db->query($abr)->result();
            $data['abril']= $abr;
            
            $mai = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=5;";
            $mai = $this->db->query($mai)->result();
            $data['maio']= $mai;
            
            $jun = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=6;";
            $jun = $this->db->query($jun)->result();
            $data['junho']= $jun;
            
            $jul = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=7;";
            $jul = $this->db->query($jul)->result();
            $data['julho']= $jul;
            
            $agos = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=8;";
            $agos = $this->db->query($agos)->result();
            $data['agosto']= $agos;
            
            $set = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=9;";
            $set = $this->db->query($set)->result();
            $data['setembro']= $set;
            
            $out = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=10;";
            $out = $this->db->query($out)->result();
            $data['outubro']= $out;
            
            $nov = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=11;";
            $nov = $this->db->query($nov)->result();
            $data['novembro']= $nov;
            
            $dez = "SELECT COUNT(*) as totalRegistro FROM RegistoCartao where CartaoRegistoCartao = ".$idCartao." and month(DataRegistoCartao)=12;";
            $dez = $this->db->query($dez)->result();
            $data['dezembro']= $dez;
            

        
            return $data;
        }
        
        
}
?>
