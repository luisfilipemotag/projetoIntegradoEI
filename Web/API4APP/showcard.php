<?php
//captar dados do formulário da página index.html
$id=$_POST['id'];
//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();
$a = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$Email."'";

$faz_existea=mysqli_query($ligaBD,$a);

$registos=mysqli_fetch_array($faz_existea);
 //echo $registos[0]; //->id cliente

$existe= " SELECT `ID_Cartao`, `EmpresaCartao`, `Título`, `SubTítulo`, `IMGCartao` , CorLetraCartao FROM Cartao c WHERE c.ID_Cartao = ".$id
 
;


$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

if ($num_registos != 0) {
	
	$registos=mysqli_fetch_array($faz_existe);
 	$obj->id = $registos[0];
	 $obj->titulo = $registos['Título'];
	  $obj->subtitulo =$registos['SubTítulo'];
	$obj->img = $registos['IMGCartao'];
	$obj->cor = $registos['CorLetraCartao'];
	
}
else
{

	$obj->id ="n existe";
}

	$arr['cartoes'] = array($obj);
	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>