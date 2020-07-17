<div class="sidebar">
            <div class="sidebar-wrapper" style="background: linear-gradient(to bottom, #ff9966 0%, #cc6600 100%);">
                <div class="logo" style="background-color: white">
                    <img src="<?php echo base_url('assets/img/logo_bg.png')?>" style=" height: 45px !important; margin-left: 5px " />
                </div>
                <ul class="nav">
                    <li id="dash_menu" style="margin-top: 30px">
                        <a class="nav-link" href="<?= site_url('Dash_Controller/dash');  ?>">
                            <i class="far fa-chart-bar"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li id="cliente_menu" style="margin-top: 30px">
                        <a class="nav-link" href="<?= site_url('Cliente_Controller/clientes');  ?>">
                            <i class="fas fa-users"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li id="funcionarios_menu" style="margin-top: 30px">
                        <a class="nav-link" href="<?= site_url('Funcionario_Controller/funcionarios');  ?>">
                            <i class="fas fa-user-tie"></i>
                            <p>Funcionários</p>
                        </a>
                    </li>
                    <li id="cupao_menu" style="margin-top: 30px">
                        <a class="nav-link" href="<?= site_url('Cupao_Controller/idcart');  ?>">
                            <img src="<?php echo base_url('assets/img/cupon_b.png')?>"style=" height: 35px !important; " />
                            <p style="margin-left: 9px">Cupões</p>
                        </a>
                    </li>
                    <li id="carimbo_menu" style="margin-top: 30px">
                        <a class="nav-link" href="<?= site_url('Carimbo_Controller/idcart');  ?>">
                            <img src="<?php echo base_url('assets/img/carimbo_b.png')?>"style=" height: 35px !important; " />
                            <p style="margin-left: 9px">Carimbo</p>
                        </a>
                    </li>
                     <li id="definicoes_menu" style="margin-top: 30px">
                        <a class="nav-link" href="<?= site_url('Definicao_Controller/empresaalterar/').$this->session->userdata('EmpresaFuncionario');  ?>">
                            <i class="fas fa-user-cog"></i>
                            <p>Definições</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
