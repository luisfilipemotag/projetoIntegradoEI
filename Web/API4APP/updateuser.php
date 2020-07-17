<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];
$CodPost=$_POST['codpost'];
$Morada=$_POST['morada'];
$local=$_POST['local'];


//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();
//Verifica se username/password existem na BD
$existe="UPDATE Clientes SET  `CodPostCliente` =  '".$CodPost."',
`MoradaCliente` =  '".$Morada."',
`LocalidadeCliente` =  '".$local."' WHERE EmailCliente =  '".$Email."'";

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);
if ($faz_existe ){

	$registos=mysqli_fetch_array($faz_existe);

	$obj->resposta = "Atualizado com sucesso";
}
else{
	$obj->resposta = "Ocorreu um erro";
	}

	$arr['update'] =array($obj);

	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>