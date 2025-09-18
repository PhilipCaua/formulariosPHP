<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro - Usuários </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <!-- Barra de menu -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="principal.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesquisa.php">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- conteúdo principal do site -->

    <main>
        <div class="container my-5">
            <!-- barra de título -->
            <div class="card shadow db body-tertiary my-4">
                <h3 class="p-3 fw-bold">Lista de Usuários</h3>

            </div>
            <!-- resultado da pesuisa  -->
            <div class="card shadow my-4">
                <div class="card=body">
                    <!-- Area de pesquisa e de novo  -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <input class="form-control border-end-0" type="text"
                                    id="pesquisa" name="pesquisa"
                                    placeholder="Pesquisa nome ou e-mail">
                                <button class="input-group-text bg-white " Type=" button">
                                    p
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8 text-end">
                            <a href="cadastro.php" class="btn btn-primary">
                                +Novo Usuário
                            </a>

                        </div>
                    </div>
                    <!-- fim do row -->
                </div>
            </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>