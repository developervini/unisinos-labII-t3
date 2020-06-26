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
        <div class="row">
            <div class="col">
                <h3>Novo pet</h3>
                <form method="POST" action="/admin/save">
                    <div class="form-group">
                        <label>Organização</label>
                        <select name="orgId" class="form-control" required>
                            <?php
                            foreach ($orgs as $org) {
                                echo "<option value='" . $org['id'] . "'>" . $org['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <input class="form-control" name="img" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="type" class="form-control" onclick="filtrarRacas(this)" required>
                            <option></option>
                            <option value="0">Cachorro</option>
                            <option value="1">Gato</option>
                        </select>
                    </div>
                    <label>Raça</label>
                    <select id="cachorro" name="breedId" class="form-control" style="display: none;" required>
                        <?php
                        foreach ($breeds as $breed) {
                            if ($breed['type'] == '0')
                                echo "<option value='" . $breed['id'] . "'>" . $breed['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <select id="gato" name="breedId" class="form-control" style="display: none;" required>
                        <?php
                        foreach ($breeds as $breed) {
                            if ($breed['type'] == '1')
                                echo "<option value='" . $breed['id'] . "'>" . $breed['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group">
                        <label>Porte</label>
                        <select name="size" class="form-control" required>
                            <option></option>
                            <option value="0">Pequeno</option>
                            <option value="1">Médio</option>
                            <option value="2">Grande</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sexo</label>
                        <select name="sex" class="form-control" required>
                            <option></option>
                            <option value="0">Masculino</option>
                            <option value="1">Feminino</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function filtrarRacas(tipo) {
            if (tipo.value == 0) {
                document.getElementById('cachorro').style.display = 'block';
                document.getElementById('gato').style.display = 'none';
            } else if (tipo.value == 1) {
                document.getElementById('cachorro').style.display = 'none';
                document.getElementById('gato').style.display = 'block';
            }
        }

        filtrarRacas({
            value: 0
        })
    </script>
</body>

</html>