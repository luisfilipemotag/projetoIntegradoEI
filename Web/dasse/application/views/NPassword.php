<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="UTF-8">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/Recupera.css')?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/logo.png')?>" />

<title>BizDirect - Recuperar Password</title>
     
</head>

<body>

  <header>
  
</header>
<section>
  <article>
    <form class="pure-steps" method="post" action="<?php echo base_url('index.php/Signs_Controller/alterarpass')?>">
      <input type="radio" name="steps" class="pure-steps_radio" id="step-0" checked="">
      <input type="radio" name="steps" class="pure-steps_radio" id="step-1">
      <input type="radio" name="steps" class="pure-steps_radio" id="step-2">
      <div class="pure-steps_group">
        <ol>
          <li class="pure-steps_group-step">
            <legend class="pure-steps_group-step_legend">Inserir nova Password</legend>
            <input type="hidden" name="email" value="<?php echo $funcionario[0]->EmailFuncionario?>" readonly>
            <p class="pure-steps_group-step_item flexy-item flexy-column reverse">
                <input type="password" placeholder="Inserir novamente a Password" name="rnpass" value="<?php echo set_value('rnpass')?>">
                <label for="input_email">Confirmar Password</label>
                <input type="password" placeholder="Nova Password" name="npass" value="<?php echo set_value('rnpass')?>">
                <label for="input_email">Nova Password</label>
              </p>
          </li>
          <li class="pure-steps_group-step">
            <p class="pure-steps_group-step_item"></p>
          </li>
          <li class="pure-steps_group-step flexy-item">
            <div class="pure-steps_preload">
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32; fill: #ff6600" xml:space="preserve">
                <path d="M31.8,3.6c-0.2-0.5-0.4-0.9-0.9-1.2C30.4,2,29.7,1.8,29,1.9c-0.6,0.1-1.2,0.4-1.6,1l-8.5,11.2l0,0l-7.2,9.5l-7.1-9.4 c-0.5-0.7-1.3-1-2.1-1c-0.5,0-1,0.2-1.4,0.5c-0.5,0.4-0.9,1-1,1.7s0.1,1.2,0.5,1.8l9.1,12.1l0,0c0.1,0.2,0.3,0.3,0.4,0.4 c0.4,0.3,0.9,0.5,1.4,0.5c0.8,0,1.6-0.3,2.1-1L22.1,18l0,0l9.1-12.1C32,5.2,32.1,4.4,31.8,3.6z">
                </path>
              </svg>
              <h6 style="margin-top: 10px">Password será alterada!</h6>
              <h6>Clique no botão "Alterar"!</h6>
              <button type="submit">Alterar</button>
            </div>
          </li>
        </ol>
        <ol class="pure-steps_group-triggers">
          
          <li class="pure-steps_group-triggers_item">
            <label for="step-1">Sign Up</label>
          </li>
          <li class="pure-steps_group-triggers_item">
            <label for="step-2">Jump in</label>
          </li>
        </ol>
      </div>
      <br>
      
    </form>
  </article>
</section>
  
  

</body>

</html>
