<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];
$id = $_POST['idcartao'];

//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();
$a = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$Email."'";

$faz_existea=mysqli_query($ligaBD,$a);

$registos=mysqli_fetch_array($faz_existea);



$checker="SELECT * FROM `RegistoCartao` WHERE `CartaoRegistoCartao` ='".$id."' AND `ClienteRegistoCartao` ='".$registos[0]."'";

$check=mysqli_query($ligaBD,$checker);

$num_registos=mysqli_num_rows($check);

if ($num_registos == 0) {
	$b="INSERT INTO `RegistoCartao` (`IDRegistoCartao`, `CartaoRegistoCartao`, `ClienteRegistoCartao`, `PontosCartao`, `NotificaCliente`) VALUES (NULL, '".$id."', '".$registos[0]."', '1', b'1')";
 

$faz_existe=mysqli_query($ligaBD,$b);

if($faz_existe){
					$obj->resposta = "Registado com sucesso" ;

					}
				else{$obj->resposta = "ocurreu um erro ao fidelizar";}
	

}
else{

$obj->resposta = "ja se encontra fidelizado " ;

}




	$arr['cartoes'] =array($obj);
	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>