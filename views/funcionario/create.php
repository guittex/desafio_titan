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
                    <h3>
                        Cadastrar funcionário
                    </h3>
                </div>
                <div class="card-body">
                    <form id="loginForm" action="/funcionario/store" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome"><b>Nome</b></label>
                                <input type="text" name="nome" class="form-control w-100" placeholder="Digite o nome do funcionário" maxlength="40" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cpf"><b>CPF</b></label>
                                <input type="text" name="cpf" id="cpf" class="form-control w-100" placeholder="Digite o CPF do funcionário" maxlength="11" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="rg"><b>RG</b></label>
                                <input type="text" name="rg" class="form-control w-100" placeholder="Digite o RG do funcionário" maxlength="20" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="email"><b>E-mail</b></label>
                                <input type="text" name="email" id="email" class="form-control w-100" placeholder="Digite o e-mail do funcionário" maxlength="30" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="empresa"><b>Empresa</b></label>
                                <select name="id_empresa" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    <?php foreach($data['empresas'] as $empresa) : ?>
                                        <option value="<?= $empresa['id_empresa'] ?>"><?= $empresa['nome'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <button class="btn btn-success" type="submit">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00', {reverse: false});

        $('#loginForm').on('submit', function(e) {
            var email = $('#email').val();

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Por favor, insira um endereço de e-mail válido.');
                return false;
            }

            
        });
    });
</script>