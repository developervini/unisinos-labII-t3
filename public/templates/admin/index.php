<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">adotumpet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav mr-auto"></ul>
            <div class="collapse navbar-collapse" id="navbarText">
                <a class="navbar-text" href="/admin">
                    Painel admin
                </a>
            </div>
        </div>
    </nav>
    <div>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Bem-vindo ao adotumpet!</h1>
                <p class="lead">Somos pessoas que se importam, portanto decidimos ajudar nos processos de adoção em meio a
                    pandemia
                    que estamos vivendo!</p>
                <hr class="my-4">
                <p class="lead">Esperamos que encontre seu pet e faça ele feliz :)</p>
            </div>
        </div>
    </div>
    <div class="container">
        <p><a href="/admin/criar">Criar pet</a></p>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Organização</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Raça</th>
                            <th scope="col">Porte</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pets as $pet) { ?>
                            <tr>
                                <td><?php echo $pet['id']; ?></td>
                                <td><?php echo $pet['name']; ?></td>
                                <td><?php echo $pet['org']['name']; ?></td>
                                <td>
                                    <?php
                                    switch ($pet['type']) {
                                        case 0:
                                            echo "Cachorro";
                                            break;
                                        case 1:
                                            echo "Gato";
                                            break;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $pet['breed']['name']; ?></td>
                                <td>
                                    <?php
                                    switch ($pet['size']) {
                                        case 0:
                                            echo "Pequeno";
                                            break;
                                        case 1:
                                            echo "Médio";
                                            break;
                                        case 2:
                                            echo "Grande";
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($pet['sex']) {
                                        case 0:
                                            echo "Masculino";
                                            break;
                                        case 1:
                                            echo "Feminino";
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a type="button" href="/admin/editar/<?php echo $pet['id']; ?>" class="btn btn-primary px-3"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <button type="button" class="btn btn-primary px-3" onclick="deletar(<?php echo $pet['id']; ?>);"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>

    <script>
        function deletar(id) {
            $.ajax({
                type: "DELETE",
                url: '/admin/delete/' + id
            }).then(() => {
                window.location.href = "/admin";
            });
        }
    </script>
</body>

</html>