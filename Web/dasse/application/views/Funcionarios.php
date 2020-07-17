<!DOCTYPE html>
<html lang="pt">

<head>
<?php include ('partials/head.php')?>
<link href="<?php echo base_url('assets/css/Funcionario.css')?>" rel="stylesheet" />

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



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
<h2>Tabela de <b>Funcionários</b></h2>
<input type="text" id="myInput" onkeyup="myFunction()" onkeydown ="myFunction()" placeholder="Procurar Funcionário" title="Type in a name" style="margin-top: 10px">
<?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg"). '</label>';?>
<?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg1"). '</label>';?>
<?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("error"). '</label>';?>

</div>
<div class="col-sm-6" style="margin-top: 2%">
<a href="#addEmployeeModal" class="btn btn-light" data-toggle="modal" ><i class="material-icons" style="color: black; padding: 9px">
person_add </i></a>
</div>
</div>
</div>

<table class="table table-striped table-hover" id="myTable">

<thead class="thead-light">

<tr>
<th scope="col"  style="padding-left: 30px">ID</th>
<th scope="col"  style="padding-left: 45px">Nome</th>
<th scope="col">Contacto</th>
<th scope="col"  style="padding-left: 45px">E-mail</th>
<th scope="col">Tipo Admin</th>
<th scope="col">Acção</th>
</tr>
</thead>
<tbody align="center">
<?php foreach($list as $funcionario) { ?>
<tr>
<th scope="row"><?php echo $funcionario->IDFuncionario; ?></th>
<td><?php echo $funcionario->PNomeFuncionario;?> <?php echo $funcionario->UNomeFuncionario;?></td>
<td><?php echo $funcionario->ContactoFuncionario;?></td>
<td><?php echo $funcionario->EmailFuncionario;?></td>
<td><?php echo $funcionario->admin;?></td>

<td>
<a href="#editEmployeeModal<?php echo $funcionario->IDFuncionario; ?>" class="edit" data-toggle="modal" > <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

<a href="<?= site_url('Funcionario_Controller/eliminar/').$funcionario->IDFuncionario; ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>


</td>
</tr>
<div class="modal fade" id="editEmployeeModal<?php echo $funcionario->IDFuncionario; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header" style="background:linear-gradient(to bottom, #ff9966 0%, #cc6600 100%)">
<h4 class="modal-title " style="color: white; margin-bottom: 20px">Alterar Dados </h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">

<form method="post" action="<?php echo site_url('/Funcionario_Controller/alterar'); ?>" >

<label>Primeiro Nome</label><input type="hidden" name="idF" autocomplete="off" class="form-control" value="<?php echo $funcionario->IDFuncionario;?>" id="PNomeFuncionario" placeholder="Primeiro Nome" required >
<label>Primeiro Nome</label><input type="text" name="nomeF" autocomplete="off" class="form-control" value="<?php echo $funcionario->PNomeFuncionario;?>" id="PNomeFuncionario" placeholder="Primeiro Nome" required >
<br>
<label>Ultimo Nome</label><input type="text" name="unomeF" class="form-control" autocomplete="off" value="<?php echo $funcionario->UNomeFuncionario;?>" id="UNomeFuncionario" placeholder="Ultimo Nome" required><br>
<label>Morada</label><input type="text" name="moradaF" class="form-control" autocomplete="off" id="MoradaFuncionario" placeholder="Morada Funcionario" value="<?php echo $funcionario->MoradaFuncionario; ?>"required>
<br>
<label>Codigo Postal</label><input type="text" name="codF" class="form-control" autocomplete="off" value="<?php echo $funcionario->CodPostFuncionario;?>" id="CodPostFuncionario" placeholder="Código Postal" required><br>
<label>Localidade</label><input type="text" name="country" class="form-control" autocomplete="off"value="<?php echo $funcionario->LocalidadeFuncionario;?>" id="LocalidadeFuncionario" placeholder="Localidade Funcionario" required><br>
<label>Contacto</label><input type="number" name="teleF" class="form-control" autocomplete="off" value="<?php echo $funcionario->ContactoFuncionario;?>" id="ContactoFuncionario" placeholder="Contacto Funcionario" required><br>
<label>Email</label><input type="email" name="emailF" class="form-control" autocomplete="off" value="<?php echo $funcionario->EmailFuncionario;?>" id="EmailFuncionario" placeholder="Email Funcionario" required><br>

</div>

<div class="modal-footer">
<div class="modal-footer d-flex justify-content-center">
<button class="btn btn-primary" type="submit" style="background-color: orange; border-color: orange">Guardar</button>

</div>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<?php } ?>

</tbody>
</table>
</div>
</div>

<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header" style="background:linear-gradient(to bottom, #ff9966 0%, #cc6600 100%)">
<h4 class="modal-title" style="color: white; margin-bottom: 20px">Criar Funcinário</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
<form method="post" action="<?php echo site_url('/Funcionario_Controller/AdicionarF'); ?>" >
<input type="text" name="nomeF" autocomplete="off" class="form-control" id="PNomeFuncionario" placeholder="Primeiro Nome" required >
<br>
<input type="text" name="unomeF" class="form-control" autocomplete="off" id="UNomeFuncionario" placeholder="Ultimo Nome" required><br>
<input type="text" name="moradaF" class="form-control" autocomplete="off" id="MoradaFuncionario" placeholder="Morada Funcionario" required><br>
<input type="text" name="codF" class="form-control" autocomplete="off" id="CodPostFuncionario" placeholder="Código Postal" required><br>
<input type="text" name="country" class="form-control" autocomplete="off" id="LocalidadeFuncionario" placeholder="Localidade Funcionario" required><br>
<input type="number" name="teleF" class="form-control" autocomplete="off" id="ContactoFuncionario" placeholder="Contacto Funcionario" required><br>
<input type="email" name="emailF" class="form-control" autocomplete="off" id="EmailFuncionario" placeholder="Email Funcionario" required><br>
<input type="number" name="admin" class="form-control" autocomplete="off" id="admin" placeholder="Admin" required><br>
<input type="password" name="passF" class="form-control" autocomplete="off" id="PasswordFuncionario" placeholder="Password" required><br>
</div>

<div class="modal-footer">
<div class="modal-footer d-flex justify-content-center">
<button class="btn btn-success">Criar</button>
</form>
</div>
<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
</div>

</div>
</div>
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
                    $("#funcionarios_menu").addClass("active");
                    });
</script>
</html>

