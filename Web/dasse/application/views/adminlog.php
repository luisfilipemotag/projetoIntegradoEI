<!DOCTYPE html>
<html lang="pt">
<head>
<title>Login V16</title>
<meta charset="UTF-8">
<link href="<?php echo base_url('assets/dist/css/bootstrap-colorpicker.css')?>" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?php echo base_url('assets/Admin/images/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/vendor/animate/animate.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/vendor/daterangepicker/daterangepicker.css')?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/css/util.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/css/mainCSS.css')?>">
<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
<div class="container-login100" style="background-image: url('<?php echo base_url('assets/Admin/images/bg-01.jpg')?>');">
<div class="wrap-login100 p-t-30 p-b-50">
<span class="login100-form-title p-b-41">
Login BizDirect
</span>
<form class="login100-form validate-form p-b-33 p-t-5" action="<?= site_url('Admin/iniciar'); ?>" method="POST">

<div class="wrap-input100 validate-input" data-validate = "Enter username">
<input class="input100" type="text" name="nome" placeholder="User name">
<span class="focus-input100" data-placeholder="&#xe82a;"></span>
</div>

<div class="wrap-input100 validate-input" data-validate="Enter password">
<input class="input100" type="password" name="password" placeholder="Password">
<span class="focus-input100" data-placeholder="&#xe80f;"></span>
</div>

<div><?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("error"). '</label>'; ?>
<div><?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg"). '</label>'; ?>
</div>

<div class="container-login100-form-btn m-t-32">
<button class="login100-form-btn" type="submit">
Login
</button>
</div>

</form>
</div>
</div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php echo base_url('assets/Admin/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('assets/Admin/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('assets/Admin/vendor/bootstrap/js/popper.js')?>"></script>
<script src="<?php echo base_url('assets/Admin/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('assets/Admin/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('assets/Admin/vendor/daterangepicker/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/Admin/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('assets/Admin/vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url('assets/Admin/js/main.js')?>"></script>

</body>
</html>
