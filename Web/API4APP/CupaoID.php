<?php
//captar dados do formulário da página index.html
$id=$_POST['id'];

//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();



$existe= "SELECT `IDCupao`,`CartaoCupao`,`TituloCupao`,`IMGCupao`,`ValeCupao`,`DataFimCupao`,`DescricaoCupao` ,DataInicioCupao ,`CorLetraCupoes`FROM Cupoes
 WHERE `CartaoCupao`= ".$id." AND DataInicioCupao < NOW()"; 

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

if (!is_null($num_registos)) {
	
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