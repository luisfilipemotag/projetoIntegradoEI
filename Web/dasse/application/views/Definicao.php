
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
            <div class="panel-header-sm">
          </div>    
          <form method="post" action="<?php echo site_url('/Definicao_Controller/alterar'); ?>" >
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">

                    <h5 class="title"> <button class="btn btn-success btn-group" type="submit" style=" margin-right:2%; float: right;"> Guardar</button> Editar Perfil</h5>
                    <div> <?php echo '<label class="a-field__label-wrap">' .$this->session->flashdata("msg"). '</label>'; ?> </div>

                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-5 pr-1">
                          <div class="form-group">
                            <label>Nome Empresa</label>
                            <input type="text" name="nomeE" class="form-control" value="<?php echo $empresa[0]->NomeEmpresa; ?>" readonly>
                          </div>
                        </div>
                        
                        <div class="col-md-4 pl-1" >
                          <div class="form-group">
                            <label>NIF</label>
                            <input type="text" name="nifE" value="<?php echo $empresa[0]->NIF; ?>" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="emailE" value="<?php echo $empresa[0]->EmailEmpresa;?>" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col-md-3 px-1" >
                          <div class="form-group">
                            <label>Contacto da Empresa</label>
                            <input type="number" name="telE" value="<?php echo $empresa[0]->Contacto1Empresa; ?>" class="form-control" required>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                            <label>Cidade</label>
                          <select name="country" class="custom-select" id="EmpLoc" required>
                                <option value="<?php echo $empresa[0]->LocalidadeEmpresa;?>"><?php echo $empresa[0]->LocalidadeEmpresa; ?></option>
                                <option value="">Escolher Cidade *</option>
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
                        <div class="col-md-4 pr-1" >
                          <div class="form-group">
                            <label>Código Postal</label>
                            <input id="zip" name="codE" type="text" value="<?php echo $empresa[0]->CodPostEmpresa; ?>" class="form-control" inputmode="numeric" pattern="^(?(^0000(|-000))|(\d{4}(|-\d{3})))$" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <div class="form-group">
                            <label>Morada</label>
                            <input type="text" name="moradaE" value="<?php echo $empresa[0]->MoradaEmpresa; ?>" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-4 pr-1" >
                          <div class="form-group">
                            <label>Coordenada X da Empresa</label>
                            <input type="text" name="xcoord" value="<?php echo $empresa[0]->xcoordenada; ?>" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-4 pl-1" >
                          <div class="form-group">
                            <label>Coordenada Y da Empresa</label>
                            <input type="text" name="ycoord" value="<?php echo $empresa[0]->ycoordenada; ?>" class="form-control" required>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                
              </div>
                    
              </div>
        </div>
      </form>

    </div>

</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$( document ).ready(function() {
                    $("#definicoes_menu").addClass("active");
                    });
</script>

</body>
</html>
