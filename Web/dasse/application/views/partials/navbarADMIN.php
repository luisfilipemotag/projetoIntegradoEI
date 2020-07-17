<nav class="navbar navbar-expand-lg " color-on-scroll="500">
<div class="container-fluid">
<a class="navbar-brand"></a>
<button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-bar burger-lines"></span>
<span class="navbar-toggler-bar burger-lines"></span>
<span class="navbar-toggler-bar burger-lines"></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="navigation">
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<a class="nav-link">
<i class="fas fa-sign-out-alt"></i>
<span class="no-icon" data-toggle="modal" data-target="#myModal" style="padding-left: 5px; cursor: default;">Log out</span>
</a>
<div class="container">

<!-- The Modal -->
<div class="modal fade" id="myModal">
<div class="modal-dialog modal-sm">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
Olá <?php echo $this->session->userdata('username')?> deseja Terminar Sessão?</h4>

<button type="submit" class="close" data-dismiss="modal">&times;</button>

</div>

<!-- Modal body -->
<!-- Modal footer -->
<div class="modal-footer">
<form action="<?php echo base_url('index.php/Admin/sair'); ?>">
<button type="submit" class="btn btn-primary" style="background-color: #FF8000; border-color: #FF8000" >Sair</button>
</form>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
</div>

</div>
</div>
</div>

</div>
</li>
</ul>
</div>
</div>
</nav>
