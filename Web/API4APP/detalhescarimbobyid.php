<?php
//captar dados do formulário da página index.html
$id=$_POST['id'];

//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();



$existe= "SELECT `IDCarimbo`,`CartaoCarimbo`,`TítuloCarimbo`,`DataFimCarimbo`,`DescricaoCarimbo`,`PremioCarimbo`,`imgCarimbo` ,CorLetraCarimbos FROM `Carimbos` WHERE `IDCarimbo`= ".$id." "; 

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

if (!is_null($num_registos)) {
	
		for ($i=0; $i < $num_registos ; $i++) { 

	    $registos=mysqli_fetch_array($faz_existe);
	    $obj->id = $registos[0];
	   	$obj->ID_Cartao = $registos[1];
	   	$obj->TituloCarimbo = $registos[2];
	   	$obj->DataFimCarimbo = $registos[3];
	   	$obj->descricao = $registos[4];
	   	$obj->premio = $registos[5];
	   	$obj->img = $registos[6];
	   	  $obj->cor = $registos[7];
		
	}
}else {

	$obj->id ="n tem";
}


	
	$arr['carimbo'] =array($obj);
	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>