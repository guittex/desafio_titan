<style>
  body{
    background-color:#80bdffb8
  }
  label{
    font-weight: bold;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12" style="margin-top:150px">
      <div class="card">
        <div class="card-header">
          <h2>Entrar</h2>
        </div>
        <div class="card-body">
            <form id="loginForm" action="/login/autenticar" method="POST">
                <div class="row">
                    <?php if(isset($_SESSION['hasError'])) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['msgError'] ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['hasMsg'])) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <?= $_SESSION['msg'] ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="col-md-12">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control w-50" placeholder="Digite seus dados de login" required>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control w-50" placeholder="Digite seus dados de senha" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <hr>
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            var email = $('#login').val();

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Por favor, insira um endereço de e-mail válido.');
                return false;
            }

            var senha = $('#senha').val();
            if (senha.trim() === '') {
                e.preventDefault();
                alert('Por favor, preencha o campo de senha.');
                return false;
            }
        });
    });
</script>