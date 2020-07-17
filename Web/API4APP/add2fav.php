<?php
//captar dados do formulário da página index.html
$id=$_POST['id'];
$mail=$_POST['mail'];
$fav=$_POST['fav'];


//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();
//Verifica se username/password existem na BD

$a = "SELECT IDCliente FROM Clientes WHERE EmailCliente ='".$mail."'";

$faz_existea=mysqli_query($ligaBD,$a);

$registo=mysqli_fetch_array($faz_existea);





$existe="UPDATE RegistoCupao SET  `favorito` = ".$fav."
 WHERE CupaoRegistoCupao =  '".$id."' AND  ClienteRegistoCupao ='".$registo[0]."'";

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);
$obj->resposta ="yes";

	$arr['add2fav'] =array($obj);

	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>