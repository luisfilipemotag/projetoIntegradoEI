<!DOCTYPE html>
<html lang="pt">

<head>
<?php include ('partials/head.php')?>
</head>

<body>
<div class="wrapper">

<?php include ('partials/sidebarADMIN.php')?>

<div class="main-panel">
<!-- Navbar -->
<?php include 'partials/navbarADMIN.php';?>



<span> <h4 style="text-align: center; margin-top:30px "> Mensagens Recebidas por Terceiros </h4></span>
<div class="row">

<table class="table table-striped table-hover" id="myTable">

<thead class="thead-light">

<tr>
<th scope="col"  style="padding-left: 3%">Nome</th>
<th scope="col"  style="padding-left: 25%">Mensagem</th>
<th scope="col"  style="padding-left: 10%">Email</th>
<th scope="col"  style="padding-left: 2%">Telemóvel</th>

</tr>
</thead>
<tbody align="center">
<?php foreach($list as $mensagemRt) { ?>
<tr>
<td style="margin-left:5%;"><?php echo $mensagemRt->NomePessoa;?></td>
<td><?php echo $mensagemRt->Mensagem;?></td>
<td><?php echo $mensagemRt->EmailPessoa;?></td>
<td><?php echo $mensagemRt->TelemovelPessoa;?></td>
</tr>
<?php } ?>
</tbody>
</table>



</div>
<script>
$( document ).ready(function() {
                    $("#mensagem_menu").css('color','orange');
                    });
</script>
</body>
</html>


