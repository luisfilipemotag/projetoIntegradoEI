<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/logo.png')?>" />
  <title>BizDirect</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets') ?>/css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
<a class="navbar-brand js-scroll-trigger" style="width:150px;"href="#page-top"><img class="img-fluid" src="<?php echo base_url('assets') ?>/img/biz.png" alt=""></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <a href="<?= site_url('ViewsC/def');  ?>">
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#download">Download</a>
          </li>
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger"  href="<?= site_url('/Signs_Controller/sign_in');  ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger"  href="<?= site_url('/RegEmpresaC/sign_up');  ?>">Registar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Carteira móvel!</div>
        <div class="intro-heading text-uppercase">Venha conhecer-nos!</div>
<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#download">Download</a>
      </div> 
    </div>
  </header>

  <!-- Servicos -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Serviços</h2>
          <h3 class="section-subheading text-muted">Veja o que é melhor para si.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">

            <img class="" style="width: 150px;"; src="<?php echo base_url('assets/img/shop.png') ?>" alt="">

            <h4 class="service-heading">Empresas</h4>
            <p class="text-muted">Todas as suas empresas de eleição, com todas as regalias para si!</p>
        </div>
        <div class="col-md-4">
            <span class="">
                <img class="" style="width: 150px;"; src="<?php echo base_url('assets/img/celphone.png') ?>" alt="">
            </span>
            <h4 class="service-heading">Cartões</h4>
            <p class="text-muted">Andar com o cartão sempre atrás é tão século passado! Todas as vantagens dos seus cartões no seu bolso!</p>
        </div>
        <div class="col-md-4">
            <span class="">
                <img class="" style="width: 150px;"; src="<?php echo base_url('assets/img/cliente.png') ?>" alt="">
          </span>
          <h4 class="service-heading">Clientes</h4>
          <p class="text-muted">Fácil de usar e seguro! Registe-se e fidelize-se. Fique sempre atualizado com as  campanhas em vigor.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Download -->
  <section class="bg-light page-section" id="download">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Download</h2>
          <h3 class="section-subheading text-muted">Faça o seu download.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-1"></div>
            <div class="col-lg-3">
        <img class="" style="width: 200px;"; src="<?php echo base_url('assets/img/telemovel.png') ?>" alt="">
            </div>
            <div class="col-lg-8">
                <h5 class=" text-muted">
                Registe -se e fidelize-se a todas as lojas/empresas que mais gosta para ficar a par de todas as campanhas associadas às mesmas.<br>
                Fique atualizado sobre todos os descontos que já usufruiu e que está a usufruir.<br>
                <br>
                Faça já o download gratuito. <br>
                E receba em primeira mão todas  as novidades!<br>
                <br>
                </h5>


            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger " style="align:center;"href="http://193.137.7.33/~estgv16799/APK/app-debug.apk">Download</a>


            </div>
      </div>
    </div>
  </section>

 


  <!-- Contacto -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contacte-nos</h2>
          <h3 class="section-subheading text-muted">Em caso de dúvidas, entre em contacto connosco.</h3>
        </div>
      </div>
<div class="row">
<div class="col-lg-12">
<?= form_open(site_url('Mensagem_Controller/Enviar')); ?>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<input class="form-control" name="nome" type="text" placeholder="Nome" required="required" data-validation-required-message="Por favor, digite o seu nome.">
<p class="help-block text-danger"></p>
</div>
<div class="form-group">
<input class="form-control" name="email" type="email" placeholder="E-mail" required="required" data-validation-required-message="Por favor, digite o seu e-mail.">
<p class="help-block text-danger"></p>
</div>
<div class="form-group">
<input class="form-control" name="telemovel" type="tel" placeholder="Telemóvel" required="required" data-validation-required-message="Por favor, digite o seu contacto telefónico.">
<p class="help-block text-danger"></p>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<textarea class="form-control" name="mensagem" placeholder="Mensagem" required="required" data-validation-required-message="Por favor, digite a sua mensagem."></textarea>
<p class="help-block text-danger"></p>
</div>
</div>
<div class="clearfix"></div>
<div class="col-lg-12 text-center">
<div id="success"></div>
<button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar Mensagem</button>
</div>
</div>
<?= form_close(); ?>
</div>
</div>
</div>
</section>

<!-- Footer -->
<footer class="footer">
<div class="container">
<div class="row align-items-center">
<div class="col-md-4">
<span class="copyright">Copyright &copy; Bizdirect 2019</span>
</div>
<div class="col-md-4">
<ul class="list-inline social-buttons">
<li class="list-inline-item">
<a href="#">
<i class="fab fa-twitter"></i>
</a>
</li>
<li class="list-inline-item">
<a href="#">
<i class="fab fa-facebook-f"></i>
</a>
</li>
<li class="list-inline-item">
<a href="#">
<i class="fab fa-linkedin-in"></i>
</a>
</li>
</ul>
</div>
<div class="col-md-4">
<ul class="list-inline quicklinks">
<li class="list-inline-item">
<a href="#">Privacy Policy</a>
</li>
<li class="list-inline-item">
<a href="#">Terms of Use</a>
</li>
</ul>
</div>
</div>
</div>
</footer>

<script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>

<?php
    $result = $this->session->flashdata('result');
    if ($result['result'] == true) {
        if ($result['type'] == 'success') {
            $result['icon'] = "<i class='fa fa-check'></i>";
        } else if ($result['type'] == 'danger') {
            $result['icon'] = "<i class='fa fa-exclamation-circle'></i>";
        }
    }
    ?>
<script type="text/javascript">
var x = <?= isset($result['result']) ? 'true' : 'false' ?>;
$(document).ready(function () {
                  if (x) {
                  $.bootstrapGrowl("<?= @$result['icon'] . " " . trim(preg_replace('/\s+/', ' ', $result['feedback'])) ?>", {type: '<?= $result['type'] ?>', align: 'center', width: 'auto', delay: 8000});
                  }
                  });
</script>



<!-- Bootstrap core JavaScript -->

<script src="<?php echo base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="<?php echo base_url('assets') ?>/js/jqBootstrapValidation.js"></script>
<script src="<?php echo base_url('assets') ?>/js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo base_url('assets') ?>/js/agency.min.js"></script>

<!-- Bootstrap for alert form -->
<script src="<?php echo base_url('assets') ?>/vendor/bootstrap-growl/jquery.bootstrap-growl.min.js"></script>

</body>

</html>
