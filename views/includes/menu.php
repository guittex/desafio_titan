<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?= (strpos($_SERVER['REQUEST_URI'], 'funcionario') == true) ? "active" : "" ?>">
                <a class="nav-link" href="/funcionario">Funcionários</a>
            </li>
            <li class="nav-item <?= (strpos($_SERVER['REQUEST_URI'], 'funcionario/create') == true) ? "active" : "" ?>">
                <a class="nav-link" href="/funcionario/create">Cadastrar Funcionário</a>
            </li>
            <li class="nav-item <?= (strpos($_SERVER['REQUEST_URI'], 'empresa') == true) ? "active" : "" ?>">
                <a class="nav-link" href="/empresa/create">Cadastrar Empresa</a>
            </li>
        </ul>
    </div>
    <a class="btn btn-secondary text-light" href="/user/logout">
        Sair
    </a>
</nav>
<?php if(isset($_SESSION['hasMsg'])) : ?>
    <div class="col-md-12 mt-3">
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['msg'] ?>
        </div>
    </div>
<?php endif ?>

<?php if(isset($_SESSION['hasError'])) : ?>
    <div class="col-md-12 mt-3">
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['msgError'] ?>
        </div>
    </div>
<?php endif ?>