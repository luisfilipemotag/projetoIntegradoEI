<?php

$email=$_POST['mail'];
$password=$_POST['pass'];


//liga e escolhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();
//Verifica se username/password existem na BD


$existe="select * from Clientes  where EmailCliente= '$email' and Password = '$password' ";

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

if ($num_registos >0){
	
	$obj->resposta = "Login efetuado com sucesso !";
}
else{
	$obj->resposta = "Erro no login palavra pass ou email incorreto";
	}

	

	$arr['login'] =array($obj);
	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>