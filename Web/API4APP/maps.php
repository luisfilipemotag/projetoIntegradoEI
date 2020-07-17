<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];

//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();



$existe= "SELECT `NomeEmpresa`,`xcoordenada`,`ycoordenada` FROM `Empresa` "; 

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

if (!is_null($num_registos)) {
	
		for ($i=0; $i < $num_registos ; $i++) { 

	    $registos=mysqli_fetch_array($faz_existe);
	    $obj[$i]->Nome = $registos[0];
	   	$obj[$i]->x = $registos[1];
	   	$obj[$i]->y = $registos[2];
		
	}
}else {

	$obj->id ="n tem";
}


	
	$arr['maps'] = $obj;
	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>