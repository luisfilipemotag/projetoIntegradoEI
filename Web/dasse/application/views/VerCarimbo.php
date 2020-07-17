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


                  <span> <h4 style="text-align: center; margin-top:30px; "> Carimbos já criados </h4></span>
<div class="row">




<?php foreach($list as $carimbos) { ?>
<div class="col-md-4 pr-1" style="margin-top: 10px; margin-left: 20px">

<div class="cupao-titulo" style="position: absolute;"><img style=" height: 200px; width:350px" class="imgimg" src="<?php echo $carimbos->imgCarimbo; ?>">
<div style="margin-top: 10px; position:absolute" >Descrição: <?php echo $carimbos->DescricaoCarimbo;?></div></div>
<div style="position: absolute; margin-left: 2%; margin-top: 10px; color:<?php echo $carimbos->CorLetraCarimbos;?>"><?php echo $carimbos->TítuloCarimbo;?></div>
<div class="Validade" style="position: absolute; float: right; margin-left: 2%;  padding-top: 150px;color:<?php echo $carimbos->CorLetraCarimbos;?>">Válido de <?php echo $carimbos->DataInicioCarimbo; ?> até <?php echo $carimbos->DataFimCarimbo; ?></div>
</div>

<div class="col-md-4 pr-1" style="margin-top: 27%; margin-left: 10%">
</div>



<?php } ?>

</div>
</body>
</html>


