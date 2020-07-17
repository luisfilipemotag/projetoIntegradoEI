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
<label style="margin-left:-2%"><a href ="<?php echo site_url('/MensagemC/MsgEnv'); ?>"> <button class="btn btn-success btn-group" type="submit" name="Guardar" style="margin-left:1%; margin-top:1%;" > Mensagens Enviadas</button></a></label>
<label><a href="<?php echo site_url('/MensagemC/MsgRec'); ?>"><button class="btn btn-success btn-group" type="submit" name="Guardar" style="margin-left:1%; margin-top:1%;" > Mensagens Recebidas</button></a></label>

<br><br>

  <label class="Enviopara">Enviar Mensagem para Admin</label>
         <div class="container">
  <div class="row">

    <form role="form" id="contact-form" class="contact-form" method="post" action="<?php echo base_url('index.php/MensagemC/MsgAdmin'); ?>">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                            <textarea class="form-control textarea" rows="1" cols="100" name="msg" id="Message" placeholder="Mensagem" style="color: black"></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                     <button type="submit" id="Send" class="btn main-btn pull-right" style="background:orange; color:white;">Enviar Mensagem</button>
                  </form>
                    <div>
                    <?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg"). '</label>'; ?>
                    </div>
                  </div>
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
                    $("#mensagem_menu").css('color','orange');
                    });
</script>
</html>
