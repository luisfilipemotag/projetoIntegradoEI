<?php
function ligaDB(){
//Estabelece ligação com o servidor (Host, utilizador, password)
$ligaBD=mysqli_connect("localhost","estgv16799","estgv167992016","estgv16799");

if(mysqli_connect_errno()){echo "erro a ligar a BD!!";
mysqli_connect_error();
exit();
}
mysqli_set_charset($ligaBD,'utf8');
return $ligaBD;

}

function fechaDB($ll){
	mysqli_close($ll);
}
?>
