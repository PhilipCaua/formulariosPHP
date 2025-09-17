<?php
include_once("./db/conexao.php");
// Veridficar se foifeito algum post no servidor
// VAriaveis de ambiente 
// $_SERVER = variaveis do servidor 
// $_POST = variaveis de envio de formulário post 
// $_GET = variaveis de envio de formulário GET 
// $_SESSION = variaveis de sessão 
$erro = "";
$mensagem = "";
// valores das variaveis dos campos do formularios (inputs)
$id = ""; // id do usuário
$nome = "";
$email = "";
$login = "";
$nascimento = "";
$senha = "";

// verificar se tem um id no GUEST, se tiver buscar os dados do usuário
// verifica se um variavel existe	
if (isset($_GET["id"])) { // se existir o id no get
    $id = $_GET["id"]; // pega o id do get
    // verificar se o ID é numérico 
    if (!is_numeric($id)) {
        $erro = "ID inválido";
    } else {

        //Buscar dados do usuário no banco de dados 
        //Instrução SQL SELECT = selecionar dados de uma tabela
        // Tabela usuarios onde (WHERE) o id é igual ao id do GET
        $sql = "SELECT * FROM usuarios WHERE usuario_id = ?";
        $stmt = $conexao->prepare($sql); //Comando para iniciar um consulta
        $stmt->bind_param("i", $id); // vincula o parametro do comando sql com a variavel php (i = inteiro)
        $stmt->execute(); // executa o comando sql
        $resultado = $stmt->get_result(); // pega o resultado da consulta
        // verifica se encontrou o usuário
        if ($resultado->num_rows == 1) {
            $linha = $resultado->fetch_object(); // pega os dados do usuário
            $nome = $linha->nome;
            $email = $linha->email;
            $login = $linha->login;
            $nascimento = $linha->nascimento;
        } else {
            $erro = "Usuário não encontrado";
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {       //  variaveis = POST ?? se o post não existir o valor será "" branco
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $login = $_POST["login"] ?? "";
    $nascimento = $_POST["nascimento"] ?? "";
    $senha = $_POST["senha"] ?? "";
    // echo("$nome - $email - $senha - $nascimento - $login");
    if (strlen($nome) < 6) {
        $erro .= "Informe o nome com pelo menos 6 caracteres"; // concatenação de erro
    }
    $sql = "INSERT INTO usuarios (nome, email, login, nascimento, senha) 
    VALUES (?, ?, ?, ?, ?)"; // Esse comando serve para inserir dados na tabela usuarios 
    $stmt = $conexao->prepare($sql); // Prepara o comando sql para ser executado
    $stmt->bind_param(
        "sssss",
        $nome,
        $email,
        $login,
        $nascimento,
        $senha
    ); // vincula os parametros do comando sql com as variaveis php
    // tratamento de erro 
    if ($stmt->execute() === TRUE) { // executa o comando sql
        $id = $stmt->insert_id; // pega o id do ultimo registro inserido
        $mensagem = "Usuário cadastrado com sucesso";
    } else {
        $erro .= "Erro ao cadastrar o usuário: " . $stmt->error;  // concatenação de erro
    }
}


?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container my-4">
        <!-- barra de ttítulo -->
        <div class="card shadow bg-body-tertiary">
            <h3 class="p-3 fw-bold">Cadastro de usuário</h3>
        </div>
        <?php
        // != significa diferente
        if ($mensagem != "") {
            echo ("<div class='alert alert-primary' role='alert'>
            ' . $mensagem . '
          </div>");
        }
        if ($erro != "") {
            echo ("
            <div class='alert alert-danger' role='alert'>
            $erro
          </div>
        ");
        }

        ?>

        <!-- formulário de cadastro -->
        <div class="card shadow bg bg-body-tertiary my-3">
            <div class="card-body">
                <form method="post">
                    <!-- Mostra o ID do Usuário -->
                    <div class="mb-3">
                        <label class="form-label"> ID do Usuário</label>
                        <input type="text" class="form-control" readonly
                            id="codigo" name="codigo" value="<?php echo ($id); ?>">

                    </div>
                    <div class="mb-3">
                        <!-- tag atributo = valor -->
                        <label class="form-label">Informe seu nome</label>
                        <input type="text" class="form-control"
                            id="nome" name="nome" value="<?php echo ($nome); ?>"
                            required minlength="6" maxlength="200">

                    </div>
                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control"
                            id="email" name="email" value="<?php echo ($email); ?>"
                            required minlength="5" maxlength="100">

                        <div class="invalid-feedback">
                            Informe um email valido
                        </div>
                    </div>
                    <!-- login -->
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control"
                            id="login" name="login" value="<?php echo ($login); ?>"
                            required minlength="5" maxlength="20">

                        <div class="invalid-feedback">
                            Informe um login
                        </div>
                    </div>
                    <!-- Data Nasc -->
                    <div class="mb-3">
                        <label for="nascimento" class="form-label">Data Nascimento</label>
                        <input type="date" class="form-control"
                            id="nascimento" name="nascimento" value="<?php echo ($nascimento); ?>"
                            min="1920-01-01" max="2020-01-01" required>

                        <div class="invalid-feedback">
                            Informe a data de nascimento
                        </div>
                    </div>
                    <!-- Input senha  -->
                    <div class="mb3">
                        <label for="senha" class="for label">Senha</label>
                        <input type="password" id="senha" name="senha"
                            class="form-control" required minlength="6" maxlength="30">

                    </div>
                    <!-- Button  / botão  -->
                    <div>
                        <button class="btn btn-success" type="submit">
                            Gravar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>