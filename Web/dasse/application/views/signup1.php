<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://drive.google.com/open?id=1qAtZRT2B8hcjy8LD6DdksBfkDEkuG8qd" type="text/css" />

<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/logo.png')?>" />

<title>BizDirect - Registar</title>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<script src="https://use.fontawesome.com/6a6312675e.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signup.css')?>">

  <link href="<?php echo base_url('assets/dist/css/bootstrap-colorpicker.css')?>" rel="stylesheet">
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
	<div class="wrapper">
		<div id="wizard" class="wizard">
			<div class="wizard__content">
				<header class="wizard__header" style="background-image: url('<?php echo base_url('/assets/img/signup_bg.jpg') ?>' )!important;">
					<div class="wizard__header-overlay"></div>
						<div class="wizard__header-content">
							<h1 class="wizard__title">Registar nova conta</h1>
							<p class="wizard__subheading">Crie a sua conta em <span>3</span> passos.</p>
						</div>
						<div class="wizard__steps">
							<nav class="steps">
								<div class="step">
									<div class="step__content">
										<p class="step__number">
											<i class="far fa-building"></i></p>
												<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
												<circle class="checkmark__circle" cx="26" cy="26" r="25" />
<path class="checkmark__check" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
											</svg>
												<div class="lines">
													<div class="line -start">
													</div>
<div class="line -background" style="background-color:orange">
													</div>
													<div class="line -progress">
													</div>
												</div>
									</div>
								</div>
								<div class="step">
									<div class="step__content">
										<p class="step__number">
											<i class="far fa-credit-card"></i></p>
											<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
												<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
													<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
											</svg>
											<div class="lines">
												<div class="line -background">
												</div>
												<div class="line -progress">
												</div>
											</div>
									</div>
								</div>
								<div class="step">
									<div class="step__content">
										<p class="step__number">
											<i class="fa fa-group"></i></p>
											<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> 
												<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
													<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
											</svg>
										<div class="lines">
											<div class="line -background">
											</div>
											<div class="line -progress">
											</div>
										</div>
									</div>
								</div>
							</nav>
						</div>
				</header>
<div class="panels">
	<div class="panel">
		<header class="panel__header">
			<h2 class="panel__title">Adicionar o cartão da Empresa</h2>
			<br>
				<p class="wizard__subheading">Escolher imagem do Cartão</p>
		</header>
		 <form method="post" action="<?php echo base_url('index.php/RegEmpresaC/AdicionarC'); ?>">
			<br>
			<br>
				<div class="form-check form-check-inline">
  					<input type="radio" class="form-check-input" id="materialInline1" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao1.png"  onclick="cart1()">
  					<label class="form-check-label" for="materialInline1" style="margin-right:10px !important">Opção 1</label>
  					<input type="radio" class="form-check-input" id="materialInline2" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao2.png" onclick="cart2()">
  					<label class="form-check-label" for="materialInline2" style="margin-right:10px !important">Opção 2</label>
  					<input type="radio" class="form-check-input" id="materialInline3" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao3-padaria.png" onclick="cart3()">
  					<label class="form-check-label" for="materialInline3" style="margin-right:10px !important">Opção 3</label>
    				<input type="radio" class="form-check-input" id="materialInline3" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao4-cafe.png"  onclick="cart4()">
  					<label class="form-check-label" for="materialInline3" style="margin-right:10px !important">Opção 4</label>
    				<input type="radio" class="form-check-input" id="materialInline3" name="1" value="http://193.137.7.33/~estgv16799/fotos/cartao5-restaurante.png" onclick="cart5()">
  					<label class="form-check-label" for="materialInline3">Opção 5</label>
				</div>

      
		<div class="container2">
			<div class="card" style="width: 400px">
  				<img class="card-img-top" style="width:50vh !important;height: 250px !important; opacity: 0.7 !important" id="target" src="<?php echo base_url('assets/img/04-full.jpg')?>">
  					<div class="top-left">
  						
                <h4 class="card-title1" ><span id="stit"></span></h4>
                <h4 class="card-title1" ><span id="tit"></span></h4>
                <br>
                <span id="Subtit"></span>
             
  					</div>
			</div>
		</div>
  			<hr style="height:2px; border:none; background-color:#E6E6E6; margin-top: 40px; margin-bottom: 0px; margin-bottom: 40px;"/>

      		<input type="hidden" class="field__input a-field__input" name="idE" value="<?php echo $this->db->insert_id();?>" placeholder="ex: ID X" readonly>

    	</label>  
        <label class="field a-field a-field_a6 page__field" id="rest">
      		<input type="text" class="field__input a-field__input" placeholder="titulo" name="nomeE" id="stC" onkeyup="stitUFunction()" onkeydown="stitDFunction()" required>
      			<span class="a-field__label-wrap">
        			<h2 class="a-field__label">Título do Cartão</h2>
      			</span>
    	</label>     
        <label class="field a-field a-field_a6 page__field" id="rest">
      		<input type="text" class="field__input a-field__input" placeholder="subtitulo" name="subtitulo" id="tC" onkeyup="titUFunction()" onkeydown="titDFunction()" style="margin-top: 10px" required>
      			<span class="a-field__label-wrap">
        			<h2 class="a-field__label">Subtítulo do Cartão </h2>
      			</span>
    	</label> 
    	<br>
    	<label class="field a-field a-field_a6 page__field" id="rest">
    		<h4>Selecionar cor do texto</h4>
    		<input id="changeff" type="text" name="cor" class="gg"/>
    	</label>



	</div>

	</div>
<button class="button" type="submit" style="margin-bottom:30px; margin-left:55px">Proximo Passo</button>
</div>

</form>
</div>
</div>
</div>
</div>
</header>
</div></div></div>


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
    $(function () {
      // Basic instantiation:
      $('#changeff').colorpicker();
      
      // Example using an event, to change the color of the .jumbotron background:
      $('#changeff').on('colorpickerChange', function(event) {
        $('.card-title1').css('color', event.color.toString());
        $('.gg').css('background-color', event.color.toString());

      });
    });
  </script>
<script>
	function titUFunction() {
  var x = document.getElementById("tC").value;
  document.getElementById("tit").innerHTML = x;
}
function titDFunction(){
var y = document.getElementById("tC").value;
  document.getElementById("tit").innerHTML = y;
}
</script>

<script>
	function stitUFunction() {
  var x = document.getElementById("stC").value;
  document.getElementById("stit").innerHTML = x;
}
function stitDFunction(){
var y = document.getElementById("stC").value;
  document.getElementById("stit").innerHTML = y;
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
<script>
function goback()
{
     javascript:window.location.href='http://193.137.7.33/~estgv16799/dasse/'
} 
</script>
<script src="<?php echo base_url('assets/dist/js/bootstrap-colorpicker.js')?>"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js'></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/signup.js') ?>" id="rendered-js"></script>

</body>
</html>
