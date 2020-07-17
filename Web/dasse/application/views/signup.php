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
												<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
													<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
											</svg>
<div class="lines">
<div class="line -start">
</div>
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
			<h2 class="panel__title">Introduzir os dados da Empresa</h2>
		</header>
			<div class="page">
  				<div class="page__demo">
				  <form method="post" action="<?php echo site_url('/RegEmpresaC/Adicionar'); ?>">
    				<label class="field a-field a-field_a1 page__field">
      					<input class="field__input a-field__input" name="nomeE" placeholder="ex: Empresa X" required>
      						<span class="a-field__label-wrap">
        						<span class="a-field__label">Nome da Empresa *</span>
      						</span>
    				</label>
    				<label class="field a-field a-field_a2 page__field">
      					<input type="number" pattern="[0-9] {9}" class="field__input a-field__input" name="telE" placeholder="ex: 232231231" required>
      						<span class="a-field__label-wrap">
        						<span class="a-field__label">Telefone *</span>
      						</span>
    				</label>    
    				<label class="field a-field a-field_a3 page__field">
      						<input type="email" class="field__input a-field__input" name="emailE" placeholder="ex: empresa@exmpl.com" required>
      							<span class="a-field__label-wrap">
        							<span class="a-field__label">E-mail *</span>
      							</span>
    				</label>
    				<label class="field a-field a-field_a4 page__field">
						<input type="text" pattern="^\d{4}(-\d{3})?$" name="codE" class="field__input a-field__input" placeholder="ex: 0000-000" required>
      						<span class="a-field__label-wrap">
        						<span class="a-field__label">Código Postal *</span>
     						</span>
    				</label>
    				<label class="field a-field a-field_a5 page__field">
      					<input type="text" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,9}$" name="nifE" class="field__input a-field__input" placeholder="ex: PT503123123213" required>
      						<span class="a-field__label-wrap">
        						<span class="a-field__label">NIF *</span>
      						</span>
    				</label>
    				<label class="field a-field a-field_a6 page__field" id="rest">
      					<input class="field__input a-field__input" name ="moradaE" id="morada" placeholder="ex: Rua XXXXXX" required>
      						<span class="a-field__label-wrap">
        						<span class="a-field__label">Morada *</span>
      						</span>
    				</label>
					<label class="field a-field a-field_a6 page__field" id="rest">
      					<input class="field__input a-field__input" pattern="^[+-]?\d+\.\d+$" name ="xcoord" id="xcoord" placeholder="ex: xx.xxxxx" required>
      						<span class="a-field__label-wrap">
        						<span class="a-field__label">xCoordenada *</span>
      						</span>
    				</label>
					<label class="field a-field a-field_a6 page__field" id="rest">
      					<input class="field__input a-field__input" pattern="^[+-]?\d+\.\d+$" name ="ycoord" id="ycoord" placeholder="ex: xx.xxxx" required>
      						<span class="a-field__label-wrap">
        						<span class="a-field__label">yCoordenada *</span>
      						</span>
    				</label>
					<label>
   						<div class="container">
							<div class="row">
								<h2 class="col-sm-12"></h2>
								<br>
		
        							<div class="col-sm-12">
            							<select name="country" class="custom-select" id="EmpLoc" required>
                								<option value="">
                									<span class="flag-icon flag-icon-gr"></span>Escolher Cidade *</option>
                								<option value="Aveiro">Aveiro</option>
                								<option value="Beja">Beja</option>
                								<option value="Braga">Braga</option>
                								<option value="Bragança">Bragança</option>
                								<option value="Castelo Branco">Castelo Branco</option>
                								<option value="Coimbra">Coimbra</option>
                								<option value="Évora">Évora</option>
                								<option value="Faro">Faro</option>
                								<option value="Guarda">Guarda</option>
                								<option value="Leiria">Leiria</option>
                								<option value="Lisboa">Lisboa</option>
                								<option value="Portalegre">Portalegre</option>
                								<option value="Porto">Porto</option>
                								<option value="Santarém">Santarém</option>
                								<option value="Setúbal">Setúbal</option>
                								<option value="Viana do Castelo">Viana do Castelo</option>
                								<option value="Vila Real">Vila Real</option>
                								<option value="Viseu">Viseu</option>
                
            							</select>

        							</div>
							</div>
						</div>
					</label>
					

					


  			</div>
		</div>
<button class="button" type="submit" style="margin-top:30px; margin-left:20px">Proximo Passo</button>
	</div>

	</div>

</div>

</form>
</div>
</div>
</div>
</div>
</header>
</div></div></div>


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
