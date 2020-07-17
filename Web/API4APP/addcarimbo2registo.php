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
 //echo $registos[0]; //->id cliente


/************************************/
$b = "SELECT IDRegCarimbo FROM RegistoCarimbo WHERE ClienteRCarimbo ='".$registo[0]."' AND CarimboRCarimbo='".$id."'";

$faz_existeb=mysqli_query($ligaBD,$b);

$nexistes=mysqli_num_rows($faz_existeb);

/****************************/
$c = "SELECT SlotCompletosCarimbo FROM RegistoCarimbo WHERE ClienteRCarimbo ='".$registo[0]."' AND CarimboRCarimbo='".$id."'";

$faz_existec=mysqli_query($ligaBD,$c);
$registoc=mysqli_fetch_array($faz_existec);
/***************************************/

if ($nexistes == 0) {
	
	$existente="INSERT INTO RegistoCarimbo ( CarimboRCarimbo, ClienteRCarimbo ) VALUES ( '".$id."', '".$registo[0]."' )";

        $faz_insere=mysqli_query($ligaBD,$existente);


		$obj->resposta="0";
	}else{$obj->resposta=$registoc[0];}
	

	$arr['registocarimbo'] =array($obj);

	$myJSON = json_encode($arr);
	echo $myJSON;

fechaDB($ligaBD);
?>