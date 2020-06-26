<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="row d-flex justify-content-between">
            <div class="col-4">
                <?php if ($pet->getPrevious()) { ?>
                    <a href="/<?php echo $pet->getPrevious()->getElement()->id; ?>" class="btn btn-secondary">Anterior</a>
                <?php } else { ?>
                    <button disabled class="btn btn-secondary">Anterior</button>
                <?php } ?>
            </div>
            <div class="col-4" id="pet">
                <div class="card" style="width: 18rem;">
                    <img src="<? echo $pet->getElement()->img ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <? echo $pet->getElement()->name ?>
                        </h5>
                        <p class="card-text">
                            <h6><b>Organização:</b>
                                <? echo $pet->getElement()->org->name ?>
                            </h6>
                            <h6><b>Raça:</b>
                                <? echo $pet->getElement()->breed->name ?>
                            </h6>
                            <h6><b>Porte:</b>
                                <?php
                                switch ($pet->getElement()->size) {
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
                            </h6>
                            <h6><b>Sexo:</b>
                                <?php
                                switch ($pet->getElement()->size) {
                                    case 0:
                                        echo "Masculino";
                                        break;
                                    case 1:
                                        echo "Feminino";
                                        break;
                                }
                                ?>
                            </h6>
                        </p>
                        <div class="text-center">
                            <a href="#" class="btn btn-secondary">Quero adotar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-right">
                <?php if ($pet->getNext()) { ?>
                    <a href="/<?php echo $pet->getNext()->getElement()->id; ?>" class="btn btn-secondary">Próximo</a>
                <?php } else { ?>
                    <button disabled class="btn btn-secondary">Próximo</button>
                <?php } ?>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="/assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>