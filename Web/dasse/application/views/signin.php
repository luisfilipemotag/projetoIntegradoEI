<!DOCTYPE html>
<html lang="pt">
<head>
<title>BizDirect - Login</title>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://drive.google.com/open?id=1qAtZRT2B8hcjy8LD6DdksBfkDEkuG8qd" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/logo.png')?>" />
<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"</script>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<script src="https://use.fontawesome.com/6a6312675e.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signup.css')?>">
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
<h1 class="wizard__title">Iniciar Sessão</h1>
<p class="wizard__subheading"><span>Pronto!</span> Já pode Gerir a sua <span>Empresa!</span></p>
</div>
<div class="wizard__steps">
<nav class="steps">
<div class="step">
<div class="lines">
<div class="line -start">
</div>
<div class="line -progress">
</div>
</div>
</div>
<div class="step">
<div class="step__content">
<p class="step__number"><i class="far fa-building"></i></p>
<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
</svg>
</div>
</div>
<div class="step">
<div class="lines">
<div class="line -background" style="background-color:orange">
</div>
<div class="line -progress">
</div>
</div>
</div>
</nav>
</div>
</header>
<div class="panels">
<div class="panel">
<header class="panel__header">
<h2 class="panel__title">Introduzir os dados para Login</h2>
</header>
<div class="page">
  <div class="page__demo">
  <form method="post" action="<?php echo base_url('index.php/Signs_Controller/iniciar'); ?>">
    <label class="field a-field a-field_a3 page__field">
      <input type="email" class="field__input a-field__input" name="email" placeholder="ex: funcionario@exmpl.com" required>
      <span class="a-field__label-wrap" <?php echo form_error('email'); ?>>
        <span class="a-field__label">E-mail Funcionário *</span>
      </span>
    </label>
    <label class="field a-field a-field_a2 page__field">
      <input type="password" class="field__input a-field__input" name="password" placeholder="ex: As254ds" required>
      <span class="a-field__label-wrap" <?php echo form_error('password'); ?>>
        <span class="a-field__label">Password *</span>
      </span>

    </label>

   <!-- select-->
   <div class="container">
	<div class="row">
		<h2 class="col-sm-12"></h2>
        <div class="col-sm-12">
<span ><a style="color:grey" href="<?php echo site_url('Signs_Controller/recuperar')?>">Recuperar Password</a></span>
        </div>
	</div>
</div>

</div>
</div>
</div>


</div>
<div class="wizard__footer">
<button type="button" class=" button back" onclick="window.location.href='http://193.137.7.33/~estgv16799/dasse/'">Cancelar</button>
<button class="button" >Iniciar Sessão</button>

<div>
<?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("error"). '</label>'; ?>
<?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg"). '</label>'; ?>
</div>
</div>
</form>
</div>
</div>
</div>



<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js'></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/signup.js') ?>" id="rendered-js"></script>

</body>
</html>
