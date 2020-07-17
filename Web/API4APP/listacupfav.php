<?php
//captar dados do formulário da página index.html
$id=$_POST['id'];
$mail=$_POST['mail'];
//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();





$a = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$mail."'";

$faz_existea=mysqli_query($ligaBD,$a);

$registo=mysqli_fetch_array($faz_existea);

/***************************/
/*

$b = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$mail."'";

$faz_existeb=mysqli_query($ligaBD,$b);

$registob=mysqli_fetch_array($faz_existeb);*/


/****************************/



$existe= "SELECT `IDCupao`,`CartaoCupao`,`TituloCupao`,`IMGCupao`,`ValeCupao`,`DataFimCupao`,`DescricaoCupao` ,DataInicioCupao ,CorLetraCupoes FROM Cupoes c
inner JOIN RegistoCupao rc ON c.IDCupao = rc.CupaoRegistoCupao
WHERE c.CartaoCupao= ".$id." AND rc.ClienteRegistoCupao=".$registo[0]." AND rc.favorito=1"; 

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

if (!is_null($num_registos) && $num_registos!=0) {
	
		for ($i=0; $i < $num_registos ; $i++) { 

	    $registos=mysqli_fetch_array($faz_existe);
	    $obj[$i]->id = $registos[0];
	   	$obj[$i]->ID_Cartao = $registos[1];
	   	$obj[$i]->TituloCupao = $registos[2];
	   	$obj[$i]->IMGCupao = $registos[3];
	   	$obj[$i]->ValeCupao = $registos[4];
	   	$obj[$i]->DataFimCupao = $registos[5];
	   	$obj[$i]->descricao = $registos[6];
	   	$obj[$i]->cor = $registos[8];
	   
		
	}
}else {

	$obj->id ="n tem";
}


	
	$arr['cupoes'] = $obj;
	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>