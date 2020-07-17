<?php
//captar dados do formulário da página index.html
$Email=$_POST['mail'];

//liga e esc olhe a BD
include("LigaCaoBD.php");
$ligaBD=ligaDB();

$existe= " SELECT `ID_Cartao`,`EmpresaCartao`,`Título`,`SubTítulo`,`IMGCartao`,`CorLetraCartao` 
FROM Cartao
INNER JOIN RegistoCartao ON RegistoCartao.CartaoRegistoCartao=Cartao.ID_Cartao
INNER JOIN Clientes ON RegistoCartao.ClienteRegistoCartao=Clientes.IDCliente
WHERE Clientes.IDCliente=RegistoCartao.ClienteRegistoCartao
AND Clientes.EmailCliente='".$Email."'" ; 

$faz_existe=mysqli_query($ligaBD,$existe);

//$num_registos=mysqli_affected_rows($faz_existe);
$num_registos=mysqli_num_rows($faz_existe);

	if (!is_null($num_registos)) {
	
		for ($i=0; $i < $num_registos ; $i++) { 
	
    $registos=mysqli_fetch_array($faz_existe);
    $obj[$i]->id = $registos[0];
	$obj[$i]->titulo = $registos[2];
	$obj[$i]->subTitulo = $registos[3];
	$obj[$i]->imgcartao = $registos[4];
	$obj[$i]->cor = $registos['CorLetraCartao'];
	
	
	
	
	}
	}	

else{
$obj[0]->resposta = "no";


}

	
	$arr['cartoes'] = $obj;
	$myJSON = json_encode($arr);
	echo $myJSON;
fechaDB($ligaBD);
?>