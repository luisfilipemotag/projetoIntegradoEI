<?php

$email='luis.goncalves.lg.98@gmail.com';
$password='0242c0436daa4c241ca8a793764b7dfb50c223121bb844cf49be670a3af4dd18';

//liga e escolhe a BD
include("copiabd.php");
$ligaBD=ligaDB();
//Verifica se username/password existem na BD


$existe="select * from Clientes  where EmailCliente= '$email' and Password = '$password' ";

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);
echo $num_registos."regs<br>";

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
