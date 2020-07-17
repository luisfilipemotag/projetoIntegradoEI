<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];

//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();
//Verifica se username/password existem na BD
$existe="SELECT  PNomeCliente ,  CodPostCliente ,  MoradaCliente ,  LocalidadeCliente
		  from Clientes
		  where EmailCliente='$Email'";

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);
if ($num_registos==1){

	$registos=mysqli_fetch_array($faz_existe);

	$Obj = array(
		'nome' => $registos['PNomeCliente'],
		'codpost' => $registos['CodPostCliente'],
		'morada' => $registos['MoradaCliente'],
		'loca' => $registos['LocalidadeCliente'],
		'resposta' => 'yes',
	);

}
else{
	$obj->resposta = "Erro por favor tente mais tarde";
	}

	$arr['userdata'] =array($Obj);

	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>