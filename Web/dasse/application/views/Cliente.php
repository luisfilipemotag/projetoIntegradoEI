<!DOCTYPE html>
<html lang="pt">
<?php include ('partials/head.php')?>
<link href="<?php echo base_url('assets/css/Funcionario.css')?>" rel="stylesheet" />

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<head>

</head>

<body>
<div class="wrapper">
<?php include ('partials/sidebar.php')?>
<div class="main-panel">
<!-- Navbar -->
<?php include 'partials/navbar.php';?>

                    

<div class="container">
        <div class="table-wrapper">
            <div class="table-title" style="background:linear-gradient(to bottom, #ff9966 0%, #cc6600 100%)">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Tabela de <b>Clientes</b></h2>
             

          </div>
          <div class="col-sm-6">
            <input type="text" id="myInput" onkeyup="myFunction()" onkeydown ="myFunction()" placeholder="Procurar Cliente" title="Type in a name" style="margin-top: 10px">
          </div>
                </div>
            </div>

            <table class="table table-striped table-hover" id="myTable">

         <thead class="thead-light" style="width: 100px" >

    <tr>
      <th scope="col"  style="padding-left: 30px">ID</th>
      <th scope="col"  style="padding-left: 95px">Nome</th>
      <th scope="col" style="padding-left: 20px">Localidade</th>
      <th scope="col"  style="padding-left: 35px">Código Postal</th>
      <th scope="col"  style="padding-left: 30px">Detalhes</th>
    </tr>
  </thead>
                <tbody align="center">

    <?php foreach($list as $clientes) { ?>
    <tr>
      <th scope="row" ><?php echo $clientes->IDCliente; ?></th>
      <td><?php echo $clientes->PNomeCliente;?> <?php echo $clientes->UNomeCliente;?></td>
      <td><?php echo $clientes->LocalidadeCliente;?></td>
      <td><?php echo $clientes->CodPostCliente;?></td>

    <td>
        <a href="#myModal<?php echo $clientes->IDCliente; ?>" data-toggle="modal"><i class="material-icons" style="color:#ff9966 ">remove_red_eye</i><small class="form-text text-muted">Visualizar</small></a>
    </td>
    </tr>


<div class="modal fade" id="myModal<?php echo $clientes->IDCliente; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to bottom, #ff9966 0%, #cc6600 100%)">
          <h4 class="modal-title " style="color: white; margin-bottom: 20px">Cliente com o ID:  <?php echo $clientes->IDCliente; ?></h4>
          <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
          
        </div>
               <div class="modal-body">
                     
                      
           
  <div class="md-form">
    <label>Nome Cliente</label>
    
    <small class="form-text text-muted"><?php echo $clientes->PNomeCliente;?> <?php echo $clientes->UNomeCliente;?></small>
  </div>
   <div class="form-group">
    <label>Sexo Cliente</label>
    
    <small class="form-text text-muted"><?php echo $clientes->SexoCliente;?></small>
  </div>
   <div class="form-group">
    <label>Data de Nascimento</label>
    
    <small class="form-text text-muted"><?php echo $clientes->DataNascCliente;?> </small>
  </div>
   <div class="form-group">
    <label>Código Postal</label>
    
    <small class="form-text text-muted"><?php echo $clientes->CodPostCliente;?> </small>
  </div>
   <div class="form-group">
    <label>Morada Cliente</label>
    
    <small class="form-text text-muted"><?php echo $clientes->MoradaCliente;?> </small>
  </div>
   <div class="form-group">
    <label>Localidade Cliente</label>
    
    <small class="form-text text-muted"><?php echo $clientes->LocalidadeCliente;?> </small>
  </div>
   <div class="form-group">
    <label>Contacto Cliente</label>
    
    <small class="form-text text-muted"><?php echo $clientes->ContactoCliente;?> </small>
  </div>
  <div class="form-group">
    <label>Email Cliente</label>
    
    <small class="form-text text-muted"><?php echo $clientes->EmailCliente;?> </small>
  </div>
  <div class="form-group">
    <label>Contacto Cliente</label>
    
    <small class="form-text text-muted"><?php echo $clientes->ContactoCliente;?> </small>
  </div>
  
                </div>
               
        <div class="modal-footer" style="background-color: white">
          <button type="button" class="btn btn-light" data-dismiss="modal" align="center" style="color: #ff9966; margin-left: 35%; border-color: #ff9966">Fechar</button>
          
        </div>
      </div>
      
    </div>
  </div>
           <?php } ?> 
</div>
</div>


                  <div class="row">
                   <form method="post" action="<?php echo site_url('/Cliente_Controller/registoC'); ?>">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <input type="text" name="cliente" class="form-control" placeholder="Cliente" id="datepicker_put" required>
                    </div>
                  </div>
                  <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <input type="text" name="cupao" class="form-control" placeholder="Cupao" id="datepicker_put"required>
                  </div>
                </div>
                <div class="col-md-3 pr-1">
                      <div class="form-group">
                      <button class="btn btn-success btn-group" type="submit">Registar Cupao</button>
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                      <?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg"). '</label>'; ?>
                      </div>
                    </div>
                    </form>
                  </div>

                    <div class="row">
                    <form method="post" action="<?php echo site_url('/Cliente_Controller/registoCarimbo'); ?>">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <input type="text" name="cliente1" class="form-control" placeholder="Cliente" required>
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <input type="text" name="carimbo" class="form-control" placeholder="Carimbo" required>
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                      <button class="btn btn-success btn-group" type="submit">Registar Carimbo</button> 
                      </div>
                    </div>
                    <div class="col-md-3 pr-2">
                      <div class="form-group">
                      <?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg1"). '</label>'; ?>
                      </div>
                    </div>
                    </form>
                  </div>


</body>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$( document ).ready(function() {
                    $("#cliente_menu").addClass("active");
                    });
</script>
</html>
