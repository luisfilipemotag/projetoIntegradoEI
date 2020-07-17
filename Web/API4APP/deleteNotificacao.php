<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];
$id = $_POST['id'];
//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();

$a = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$Email."'";

$faz_existea=mysqli_query($ligaBD,$a);

$registos=mysqli_fetch_array($faz_existea);


$existe= "DELETE FROM `Notificacoes` WHERE `ClienteNotificacao` = ".$registos[0]." AND IDNotificacao=".$id." "; 

$faz_existe=mysqli_query($ligaBD,$existe);

$obj->resposta = "eliminado com sucesso";
$arr['resposta'] =array($obj);
	$myJSON = json_encode($arr);
	echo $myJSON;


fechaDB($ligaBD);
?>