<?php
//captar dados do formulário

$PNome=$_POST['pnome'];
$UNome=$_POST['unome'];
$Sexo=$_POST['sexo'];
$DataNasc=$_POST['datanasc'];
$CodPost=$_POST['codpost'];
$Morada=$_POST['morada'];
$Localidade=$_POST['localidade'];
$Contacto=$_POST['contacto'];
$Email=$_POST['mail'];
$Password=$_POST['pass'];

//Ligar e selecionar a Base de Dados escola
include("LigaCaoBD.php");
$ligaBD=ligaDB();
//Início de ação sobre a Base de Dados
$existe="select * from Clientes where EmailCliente='".$Email."'"; //Verifica em todos os campos da tabela aluno se há registos com email ou username
$faz_existe=mysqli_query($ligaBD,$existe); //Questão à Base de Dados
$jaexiste=mysqli_num_rows($faz_existe);//Conta o número total de resultados devolvidos por uma Query à BD



	
		if($jaexiste==0){
	 $insere="INSERT INTO `estgv16799`.`Clientes` ( `PNomeCliente`, `UNomeCliente`, `SexoCliente`, 		`DataNascCliente`, `CodPostCliente`, `MoradaCliente`, `LocalidadeCliente`, `ContactoCliente`, 
			   `EmailCliente`, `Password`) 
			VALUES ('".$PNome."', '".$UNome."', '".$Sexo."', '".$DataNasc."', 
			'".$CodPost."', '".$Morada."', '".$Localidade."', '".$Contacto."', 
			'".$Email."','".$Password."')";
								
								//Processa a Query junto da Base de Dados
					$faz_insere=mysqli_query($ligaBD,$insere);
						
		$obj->resposta= "Registado com sucesso";
				}
				else{

					$obj->resposta="no";}
	
	

	$arr['registar'] =array($obj);
	$myJSON = json_encode($arr);
	echo $myJSON;

					fechaDB($ligaBD);
				?>