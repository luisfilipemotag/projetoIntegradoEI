<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];

//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();

$a = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$Email."'";

$faz_existea=mysqli_query($ligaBD,$a);

$registos=mysqli_fetch_array($faz_existea);


$existe= "SELECT `IDNotificacao` ,`Mensagem` , EmpresaNotificacao FROM `Notificacoes` WHERE `ClienteNotificacao` = ".$registos[0]." "; 

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

if (!is_null($num_registos)) {
	
		for ($i=0; $i < $num_registos ; $i++) { 

	    $registos=mysqli_fetch_array($faz_existe);
	    $obj[$i]->id = $registos[0];
	   	$obj[$i]->Mensagem = $registos[1];
	   	$obj[$i]->idcard = $registos[2];
		
	}
}else {

	$obj->id ="n tem";
}


	
	$arr['Notificacoes'] = $obj;
	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>