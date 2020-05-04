<nav class="main-header navbar navbar-expand navbar-light bg-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>reserva/add" class="nav-link">Nova Reserva</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>hospede/add" class="nav-link">Novo Hospede</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>usuario/sair" class="nav-link">Sair</a>
        </li>
    </ul>
</nav>