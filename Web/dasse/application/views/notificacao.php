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

<div class="jumbotron">
  <label class="Enviopara">Enviar Notificação para Cliente</label>
         <div class="container">
  <div class="row">

  <form role="form" id="contact-form" class="contact-form" method="post" action="<?php echo base_url('index.php/Notificacao_Controller/enviarnotificacao'); ?>">
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                            <input type="text" class="form-control" name="idcliente" autocomplete="off" id="Name1" placeholder="IDCliente" style="color: black">
                      </div>
                    </div>
                      <div class="col-md-12">
                      <div class="form-group">
                            <textarea class="form-control textarea" rows="1" cols="100" name="notificacao" id="Message1" placeholder="notificacao" style="color: black"></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                  <button type="submit" id="Send1" class="btn main-btn pull-right" style="background:orange; color:white;">Enviar Mensagem</button>
                  </div>
                  </div>
                </form>
            <div>
                <?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("error"). '</label>'; ?>
                <?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg"). '</label>'; ?>
            </div>
  </div>
</div>
</div>
 
</div>
</div>

</body>

<script>
  $('#contact-form').bootstrapValidator({
//        live: 'disabled',
        message: 'Este campo não é valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            Name: {
                validators: {
                    notEmpty: {
                        message: 'Introduzir Nome'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Introduzir Email'
                    },
                    emailAddress: {
                        message: 'Este email não é valido'
                    }
                }
            },
            Message: {
                validators: {
                    notEmpty: {
                        message: 'A caixa de texto precisa de ser preenchida'
                    }
                }
            },

        }
    });
</script>
<script>
  $('#contact-form1').bootstrapValidator({
//        live: 'disabled',
        message: 'Este campo não é valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            Name1: {
                validators: {
                    notEmpty: {
                        message: 'Introduzir Nome'
                    }
                }
            },
            email1: {
                validators: {
                    notEmpty: {
                        message: 'Introduzir Email'
                    },
                    emailAddress: {
                        message: 'Este email não é valido'
                    }
                }
            },
            Message1: {
                validators: {
                    notEmpty: {
                        message: 'A caixa de texto precisa de ser preenchida'
                    }
                }
            },
            
        }
    });
</script>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$( document ).ready(function() {
                    $("#notificacao_menu").css('color','orange');
                    });
</script>
</html>
