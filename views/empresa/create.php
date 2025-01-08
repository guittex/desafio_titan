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
                        Cadastrar empresa
                    </h3>
                </div>
                <div class="card-body">
                    <form action="/empresa/store" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nome"><b>Nome</b></label>
                                <input type="text" name="nome" class="form-control w-50" placeholder="Digite o nome da empresa" maxlength="40" required>
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