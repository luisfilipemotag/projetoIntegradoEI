<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];
$id=$_POST['id'];


//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();
//Verifica se username/password existem na BD
$a = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$Email."'";

$faz_existea=mysqli_query($ligaBD,$a);

$registos=mysqli_fetch_array($faz_existea);
//$registos[0]


///////////////////
$existea= "DELETE FROM `RegistoCarimbo` WHERE ClienteRCarimbo = ".$registos[0]." AND  `CarimboRCarimbo`=".$id." "; 
$faz_existeb=mysqli_query($ligaBD,$existea);
//////////////////
///////////////////
$existeb= "DELETE FROM `RegistoCupao` WHERE `ClienteRegistoCupao` = ".$registos[0]." AND CupaoRegistoCupao=".$id." "; 
$faz_existec=mysqli_query($ligaBD,$existeb);
//////////////////
///////////////////
$existec= "DELETE FROM `RegistoCartao` WHERE `ClienteRegistoCartao` = ".$registos[0]." AND CartaoRegistoCartao=".$id." "; 
$faz_existed=mysqli_query($ligaBD,$existec);
//////////////////


$obj->resposta = "Defidelizado com sucesso";
$arr['resposta'] =array($obj);
	$myJSON = json_encode($arr);
	echo $myJSON;
	
fechaDB($ligaBD);
?>