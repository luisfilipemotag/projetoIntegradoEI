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


                  <span> <h4 style="text-align: center; margin-top:30px; "> Cupões já criados </h4></span>
<div class="row">





<?php foreach($list as $cupoes) { ?>
<div class="col-md-4 pr-1" style="margin-top: 20px; margin-left: 10px">

<div class="cupao-titulo" style="position: absolute;"><img style=" height: 200px; width:350px" class="imgimg" src="<?php echo $cupoes->IMGCupao; ?>">
<div style="margin-top: 10px;" >Descrição: <?php echo $cupoes->DescricaoCupao;?></div></div>
<div style="position: absolute; margin-left: 10px; margin-top: 10px; color:<?php echo $cupoes->CorLetraCupoes;?>"><?php echo $cupoes->TituloCupao;?></div>
<div class="valor" style="position: absolute; float: right; padding-left: 250px;margin-top: 10px; color:<?php echo $cupoes->CorLetraCupoes;?>"><?php echo $cupoes->ValeCupao;?> %</div>
<div class="Validade" style="position: absolute; float: right;  padding-top: 150px;color:<?php echo $cupoes->CorLetraCupoes;?>">Válido de <?php echo $cupoes->DataInicioCupao; ?> até <?php echo $cupoes->DataFimCupao; ?></div>
</div>

<div class="col-md-4 pr-1" style="margin-top: 27%; margin-left: 10%">
</div>

<?php } ?>



</div>
</body>
</html>


