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



<table class="table table-striped table-hover" id="myTable">

<thead class="thead-light" style="width: 100px" >

<tr>
<th scope="col"  style="padding-left: 30px">ID</th>
<th scope="col"  style="padding-left: 60px">Nome</th>
<th scope="col" style="padding-left: 42px">Localidade</th>
<th scope="col"  style="padding-left: 130px">Email</th>
<th scope="col"  style="padding-left: 60px">Morada</th>
<th scope="col"  style="padding-left: 30px">Contacto</th>
</tr>
</thead>
<tbody align="center">

<?php foreach($list as $empresas) { ?>
<tr>
<th scope="row" ><?php echo $empresas->IDEmpresa; ?></th>
<td><?php echo $empresas->NomeEmpresa;?></td>
<td><?php echo $empresas->LocalidadeEmpresa;?></td>
<td><?php echo $empresas->EmailEmpresa;?></td>
<td><?php echo $empresas->MoradaEmpresa;?></td>
<td><?php echo $empresas->Contacto1Empresa;?></td>


</tr>
           <?php } ?>


<script>

$( document ).ready(function() {
                    $("#empresa_menu").addClass("active");
                    });
</script>
</body>
</html>




