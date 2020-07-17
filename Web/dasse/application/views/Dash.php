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


<div class="align-middle card" style="width:1000px; display:block; margin: 0  auto; margin-top: 5%;"><label style="margin-left:10px">Clientes Registados</label>
<div id="lineChart" > </div>
</div>



<?php $jan = $list['janeiro'][0]->totalRegistro; ?>
<?php $fev = $list['fevereiro'][0]->totalRegistro; ?>
<?php $mar = $list['marco'][0]->totalRegistro; ?>
<?php $abr = $list['abril'][0]->totalRegistro; ?>
<?php $mai = $list['maio'][0]->totalRegistro; ?>
<?php $jun = $list['junho'][0]->totalRegistro; ?>
<?php $jul = $list['julho'][0]->totalRegistro; ?>
<?php $ago = $list['agosto'][0]->totalRegistro; ?>
<?php $set = $list['setembro'][0]->totalRegistro; ?>
<?php $out = $list['outubro'][0]->totalRegistro; ?>
<?php $nov = $list['novembro'][0]->totalRegistro; ?>
<?php $dez = $list['dezembro'][0]->totalRegistro; ?>
<span style="display:none;" id="janeiro"><?= $jan ?></span>
<span style="display:none;" id="fevereiro"><?= $fev ?></span>
<span style="display:none;" id="marco"><?= $mar ?></span>
<span style="display:none;" id="abril"><?= $abr ?></span>
<span style="display:none;" id="maio"><?= $mai ?></span>
<span style="display:none;" id="junho"><?= $jun ?></span>
<span style="display:none;" id="julho"><?= $jul ?></span>
<span style="display:none;" id="agosto"><?= $ago ?></span>
<span style="display:none;" id="setembro"><?= $set ?></span>
<span style="display:none;" id="outubro"><?= $out ?></span>
<span style="display:none;" id="novembro"><?= $nov ?></span>
<span style="display:none;" id="dezembro"><?= $dez ?></span>


</div>
</div>
</div>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
$( document ).ready(function() {

//
                    var jan = $('#janeiro').text();
                    var fev = $('#fevereiro').text();
                    var marco = $('#marco').text();
                    
                    var abr = $('#abril').text();
                    var mai = $('#maio').text();
                    var jun = $('#junho').text();
                    var jul = $('#julho').text();
                    var agos = $('#agosto').text();
                    var set = $('#setembro').text();
                    var out = $('#outubro').text();
                    var nov = $('#novembro').text();
                    var dez = $('#dezembro').text();
                    
                    
                    
                    new Morris.Line({
                                    // ID of the element in which to draw the chart.
                                    // ID of the element in which to draw the chart.
                                    element: 'lineChart',
                                    // Chart data records -- each entry in this array corresponds to a point on
                                    // the chart.
                                    data: [
                                        { month: 'Janeiro', fidelizados: jan },
                                        { month: 'Fevereiro', fidelizados: fev },
                                        { month: 'Março', fidelizados: marco },
                                        { month: 'Abril', fidelizados: abr },
                                        { month: 'Maio', fidelizados: mai },
                                        { month: 'Junho', fidelizados: jun },
                                        { month: 'Julho', fidelizados: jul },
                                        { month: 'Agosto', fidelizados: agos },
                                        { month: 'Setembro', fidelizados: set },
                                        { month: 'Outubro', fidelizados: out },
                                        { month: 'Novembro', fidelizados: nov },
                                        { month: 'Dezembro', fidelizados: dez }
                                    ],
                                    // The name of the data record attribute that contains x-values.
                                    xkey: 'month',
                                    parseTime: false,
                                    // A list of names of data record attributes that contain y-values.
                                    ykeys: ['fidelizados'],
                                    // Labels for the ykeys -- will be displayed when you hover over the
                                    // chart.
                                    labels: ['month'],
                                    lineColors: ['#E65A26']
                                    });
});
</script>



</body>
</html>


