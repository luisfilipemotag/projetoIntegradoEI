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



<span> <h4 style="text-align: center; margin-top:30px"> Mensagens Enviadas </h4></span>
<div class="row">

<table class="table table-striped table-hover" id="myTable">

<thead class="thead-light">

<tr>
<th scope="col"  style="padding-left: 13%">Mensagem</th>
<th scope="col"  style="padding-left: 32%">Data</th>
</tr>
</thead>
<tbody align="center">
<?php foreach($list as $mensagemEf) { ?>
<tr>
<td><?php echo $mensagemEf->Mensagem;?></td>
<td><?php echo $mensagemEf->Data;?></td>
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


