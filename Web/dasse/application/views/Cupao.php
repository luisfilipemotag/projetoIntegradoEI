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


<form method="post" action="<?php echo site_url('/Cupao_Controller/cupao'); ?>" enctype="multipart/form-data">
  <button class="btn btn-success btn-group" type="submit" name="Guardar" style="margin-left:1%; margin-top:1%;"> Ver Cupoes</button>
</form>

     <div class="panel-header-sm">
      </div>
    <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
               <form method="post" action="<?php echo site_url('/Cupao_Controller/AdicionarCupao'); ?>" >
                <h5 class="title"> <button class="btn btn-success btn-group" type="submit" name="Guardar" style=" float: right;"> Criar</button> Criar Cupao</h5>
                <?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg"). '</label>';?>
                <?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("error"). '</label>';?>

              <input type="hidden" name="idCartao" value="<?php echo $ID_Cartao;?>" readonly>

              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Titulo do Cupão</label>
                        <input type="text" name="TituloCupao" class="form-control" placeholder="Titulo" id="tC" onkeyup="titUFunction()" onkeydown="titDFunction()" required>
</div>
</div>
<div class="col-md-4 pr-1">
<div class="form-group">
<label>Selecionar cor do texto</label>
<input id="changeff" class="form-control" name="corCupao" type="text" class="gg"/>
</div>



</div>

</div>
                  <div class="row">
                     <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Valor do Desconto</label>
                        <input type="number" name="ValeCupao" class="form-control" placeholder="Vale do Cupão" id="vC" onkeyup="vUFunction()" onkeydown="vDFunction()" required>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Data de Inicio do Cupão (yyyy-mm-dd)</label>
                        <input type="data" name="DataInicioCupao" class="form-control" placeholder="Data de inicio do Carimbo" id="datepicker_put" onchange="dIUFunction()" required>
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Data de Fim do Cupão (yyyy-mm-dd)</label>
                        <input type="data" name="DataFimCupao" class="form-control" placeholder="Data de fim do Carimbo" id="datepicker_get"  onchange ="dFUFunction()" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Descrição do Cupão</label>
                        <textarea type="text" name="DescricaoCupao" class="form-control" placeholder="Descrição do Carimbo" id="desC"  onkeyup="desCUFunction()" onkeydown="desCDFunction()" required></textarea>
                         
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 pl-1">
            <div class="card card-user">
              <img class="card-img-top" id="target" src="<?php echo base_url('assets/assets/img/7.jpg') ?>" style="width:100% !important;height: 300px !important; opacity: 0.4 !important;">
                <div class="card-img-overlay">
                  <h4 class="card-title" style="display: inline;"><span id="tcartao"></span></h4>
                   <h2 class="card-title" style="display: inline-block; float: right; padding-left: 40px;"><span id="valeC"></span>%</h2>
                  <h5 class="card-title" style="padding-bottom: 60px; padding-top: 30px"><span id="t2cartao"></span></h5>
               
                      <p class="card-title" style="display: inline-block; margin-left: 20px; float: right;"> ate:<span id="date_get"></span></p>
                    <p class="card-title" style="display: inline-block; padding-left: 20px;float: right; "> válido de:<span id="date_put"></span></p>
                </div>
                <p class="card-text" style="padding-top: 20px; padding-bottom: 10px; margin-left: 10px"> Descrição: <span id="descon" style="vertical-align: bottom;"></span></p>
</div><div class="card card-user">
<label style="margin-left: 10px">Imagens Predefinidas</label><br><div class="form-check form-check-inline">
<label style="margin-left:3%;" class="form-check-label" for="materialInline1" style="margin-right:10px !important">1</label>
<input style="margin-left:-8%;" type="radio" class="form-check-input" id="materialInline1" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao1.png" onclick="cart1()">
<label style="margin-left:3%;" class="form-check-label" for="materialInline2" style="margin-right:10px !important">2</label>
<input style="margin-left:-8%;" type="radio" class="form-check-input" id="materialInline2" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao2.png" onclick="cart2()">
<label style="margin-left:3%;" class="form-check-label" for="materialInline3" style="margin-right:10px !important"> 3</label>
<input style="margin-left:-8%;" type="radio" class="form-check-input" id="materialInline3" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao3-padaria.png" onclick="cart3()">
<label style="margin-left:3%;" class="form-check-label" for="materialInline4" style="margin-right:10px !important">4</label>
<input style="margin-left:-8%;" type="radio" class="form-check-input" id="materialInline4" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao4-cafe.png" onclick="cart4()">
<label style="margin-left:3%;" class="form-check-label" for="materialInline5" style="margin-right:10px !important">5</label>
<input style="margin-left:-8%;" type="radio" class="form-check-input" id="materialInline5" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao5-restaurante.png" onclick="cart5()">

</div>

</div>

</div>
</form>
</div>
            
 
</div>
</div>
</div>

</body>


<script>
$(document).ready(function () {
    var inputs = $('input[type=radio]');
    inputs.change(function () {
        changeLabelClass(this);
    });
    
    //initialize the labels
    changeLabelClass(inputs)
});

function changeLabelClass(radio) {

    //remove the 'checked' class from all labels
    $('input[type=radio]').closest('label').removeClass('checked')
    
    if ($(radio).is(':checked')) 
        $(radio).closest('label').addClass('checked')
}
</script>


<script>
function cart1() {
    document.getElementById("target").src = "<?php echo base_url('assets/img/cartao1.png')?>";
}
</script>
<script>
function cart2() {
    document.getElementById("target").src = "<?php echo base_url('assets/img/cartao2.png')?>";
}
</script>
<script>
function cart3() {
    document.getElementById("target").src = "<?php echo base_url('assets/img/cartao3.png')?>";
}
</script>
<script>
function cart4() {
    document.getElementById("target").src = "<?php echo base_url('assets/img/cartao4.png')?>";
}
</script>
<script>
function cart5() {
    document.getElementById("target").src = "<?php echo base_url('assets/img/cartao5.png')?>";
}
</script>
<script>
function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(){
        target.src = fr.result;
    }
    fr.readAsDataURL(src.files[0]);
}

function putImage() {
    var src = document.getElementById("select_image");
    var target = document.getElementById("target");
    showImage(src, target);
}
</script>
<!-- scripct para titulo do cartao-->
    <script>
function titUFunction() {
  var x = document.getElementById("tC").value;
  document.getElementById("tcartao").innerHTML = x;
}
function titDFunction(){
var y = document.getElementById("tC").value;
  document.getElementById("tcartao").innerHTML = y;
}
</script>
<!-- scripct para 2 titulo do cartao-->
 
<!-- scripct para vale do cartao-->   
  <script>
function vUFunction() {
  var c = document.getElementById("vC").value;
  document.getElementById("valeC").innerHTML = c;
}
function vDFunction(){
var d = document.getElementById("vC").value;
  document.getElementById("valeC").innerHTML = d;
}
</script>
<!-- scripct para data inicio do cartao-->   
  <script>
function dIUFunction() {
  var e = document.getElementById("datepicker_put").value;
  document.getElementById("date_put").innerHTML = e;
}
</script>
<!-- scripct para data fim do cartao-->  
 <script>
function dFUFunction() {
  var g = document.getElementById("datepicker_get").value;
  document.getElementById("date_get").innerHTML = g;
}

</script>
<!-- scripct para descriçaõ do cartao-->  
 <script>
function desCUFunction() {
  var g = document.getElementById("desC").value;
  document.getElementById("descon").innerHTML = g;
}
function desCDFunction(){
var h = document.getElementById("desC").value;
  document.getElementById("descon").innerHTML = h;
}
</script>

    <!-- Date Picker -->
<script>
  $( function() {
    $( "#datepicker_put" ).datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(),
    todayHighlight: true,
    onClose: function( selectedDate ) {
        $( "#datepicker_get" ).datepicker( "option", "minDate", selectedDate );
      }
});
  } );
  </script>
  <script>
  $( function() {
    $( "#datepicker_get" ).datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,

    
   
});
  } );
  </script>

<script>
var BASE_URL = "<?php echo base_url("http://193.137.7.33/~estgv16799/fotos"); ?>";
</script>
<script>
$(function () {
  // Basic instantiation:
  $('#changeff').colorpicker();
  
  // Example using an event, to change the color of the .jumbotron background:
  $('#changeff').on('colorpickerChange', function(event) {
                    $('.card-title').css('color', event.color.toString());
                    $('.gg').css('background-color', event.color.toString());
                    
                    });
  });
</script>
<script src="<?php echo base_url('assets/dist/js/bootstrap-colorpicker.js')?>"></script>



<script>
$( document ).ready(function() {
                    $("#cupao_menu").addClass("active");
                    });
</script>
</html>
