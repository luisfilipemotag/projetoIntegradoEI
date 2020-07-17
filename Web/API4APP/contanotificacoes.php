<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];

//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();

$a = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$Email."'";

$faz_existea=mysqli_query($ligaBD,$a);

$registos=mysqli_fetch_array($faz_existea);


$existe= "SELECT `IDNotificacao`  FROM `Notificacoes` WHERE `ClienteNotificacao` = ".$registos[0]."  AND DATE_FORMAT(datanotificacao,'%Y%c%d') =DATE_FORMAT(now(),'%Y%c%d')  "; 

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

if ($num_registos >0){
	
	$obj->resposta ="Tem ".$num_registos." novas notificacoes ";
}
else{
	$obj->resposta = "Erro";
	}

	

	
$arr['Notificacoes'] = array($obj);
$myJSON = json_encode($arr);
echo $myJSON;
fechaDB($ligaBD);
?>