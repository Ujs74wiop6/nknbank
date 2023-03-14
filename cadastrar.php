<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/pageStyleCadastrar.css">
    <title>NKN Bank</title>
</head>
<body>
    <div class="container">
        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="/">
                <img src="https://nknbank.com.br/assets/images/7.jpeg" width="70" height="70" class="d-inline-block align-top" alt="">
            </a>
            <h1>NKN Bank</h1>
        </nav>
        <div class="forms">
            <form class="forms-in" action="cadastro.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
                </div>
                <div class="form-group">
                    <label for="datanascimento">Data de nascimento:</label>
                    <input type="date" class="form-control" id="datanascimento" name="datanascimento" required>
                </div>
                <div class="form-group">
                    <label for="email">Endereço de email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" pattern="(?=.*\d)(?=.*[a-zA-Z]).{6,}" required>
                </div>
                <div class="form-group">
                    <label for="whatsapp">Whatsapp:</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="(XX) XXXXX-XXXX" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}">
                </div>

                <div class="format-btn">
                    <button type="reset" class="btn btn-danger format">Limpar</button>
                    <button type="submit" class="btn btn-success format">Enviar</button>
                </div>

                <div>
                    <?php
                        if (isset($_SESSION['cadastro_sucesso'])):
                    ?>
                    <div class="alert alert-success" role="alert">
                        Usuário cadastrado com <b>sucesso!</b>
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['cadastro_sucesso']);
                    ?>

                    <?php
                        if (isset($_SESSION['erro_idade'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <b>Erro!</b> Usuário não cadastrado! Motivo: idade não compatível.
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['erro_idade']);
                    ?>

                    <?php
                        if (isset($_SESSION['erro'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <b>Erro!</b> Usuário não cadastrado!
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['erro']);
                    ?>

                    <?php
                        if (isset($_SESSION['erro_email'])):
                    ?>
                    <div class="alert alert-warning" role="alert">
                        <b>Atenção!</b> Este e-mail já está sendo utilizado.
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['erro_email']);
                    ?>
                </div>
            </form>
            <script>
                const whatsappInput = document.getElementById('whatsapp');

                whatsappInput.addEventListener('input', function() {
                    const whatsapp = this.value.replace(/\D/g, '');
                    const tamanho = whatsapp.length;

                    if (tamanho >= 1) {
                        this.value = `(${whatsapp.substring(0, 2)}`;
                    }
                    if (tamanho > 2) {
                        this.value = `(${whatsapp.substring(0, 2)}) ${whatsapp.substring(2, 7)}`;
                    }
                    if (tamanho > 7) {
                        this.value = `(${whatsapp.substring(0, 2)}) ${whatsapp.substring(2, 7)}-${whatsapp.substring(7, 11)}`;
                    }
                });

            </script>
        </div>
    </div>
</body>
</html>