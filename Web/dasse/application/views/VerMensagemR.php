<!DOCTYPE html>
<html lang="pt">

<head>
<?php include ('partials/head.php')?>

</head>
<body>
<div class="wrapper">
<?php include ('partials/sidebar.php')?>

<div class="main-panel">
<!-- Navbar -->
<?php include 'partials/navbar.php';?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="<?php echo base_url('assets/dist/css/bootstrap-colorpicker.css')?>" rel="stylesheet">



<span> <h4 style="text-align: center; margin-top:30px "> Mensagens Recebidas </h4></span>
<div class="row">

<table class="table table-striped table-hover" id="myTable">

<thead class="thead-light">

<tr>
<th scope="col"  style="padding-left: 13%">Mensagem</th>
<th scope="col"  style="padding-left: 32%">Data</th>
</tr>
</thead>
<tbody align="center">
<?php foreach($list as $mensagemR) { ?>
<tr>
<td><?php echo $mensagemR->Mensagem;?></td>
<td><?php echo $mensagemR->Data;?></td>
</tr>
<?php } ?>
</tbody>
</table>



</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$( document ).ready(function() {
                    $("#mensagem_menu").css('color','orange');
                    });
</script>
</body>
</html>


