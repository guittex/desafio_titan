<?php 
    require "../views/includes/menu.php";
?>
<style>
    body{
        background-color: #e9ecef;
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>
                                Funcionários cadastrados
                            </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-success" href="/funcionario/create">
                                Adicionar funcionário
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>RG</th>
                                <th>E-mail</th>
                                <th>Empresa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['funcionarios'] as $funcionario) : ?>
                                <tr>
                                    <td><?= $funcionario['nome'] ?></td>
                                    <td><?= aplicarMascaraCPF($funcionario['cpf']) ?></td>
                                    <td><?= $funcionario['rg'] ?></td>
                                    <td><?= $funcionario['email'] ?></td>
                                    <td><?= $funcionario['nome_empresa'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>