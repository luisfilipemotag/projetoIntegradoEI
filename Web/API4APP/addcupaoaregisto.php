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
$b = "SELECT IDRegistoCupao FROM RegistoCupao WHERE ClienteRegistoCupao ='".$registo[0]."' AND CupaoRegistoCupao='".$id."'";

$faz_existeb=mysqli_query($ligaBD,$b);

$nexistes=mysqli_num_rows($faz_existeb);


if ($nexistes == 0) {
	
	$existente="INSERT INTO RegistoCupao ( CupaoRegistoCupao, ClienteRegistoCupao ) VALUES ( '".$id."', '".$registo[0]."' )";

        $faz_insere=mysqli_query($ligaBD,$existente);


	}
	/****************************/
$c = "SELECT favorito FROM RegistoCupao WHERE ClienteRegistoCupao ='".$registo[0]."' AND CupaoRegistoCupao='".$id."'";

$faz_existec=mysqli_query($ligaBD,$c);
$registoc=mysqli_fetch_array($faz_existec);
$obj->resposta=$registoc[0];
/***************************************/

	$arr['registocupao'] =array($obj);

	$myJSON = json_encode($arr);
	echo $myJSON;

fechaDB($ligaBD);
?>