<?php

$usuario = 'b9a0d3a1f05872';
$senha = 'f56cb28e';
$database = 'heroku_375e7dceb007d23';
$host = 'us-cdbr-east-06.cleardb.net';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
        <strong>Preencha seu usuário</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
        <strong>Preencha sua senha</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../admin.php");
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
            <strong>Falha ao logar! E-mail ou senha incorretos</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/header_index.css">

    <title>Área restrita | Temdetudo</title>
    
</head>

<body>
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle container-fluid my-3" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <form action="" method="POST">
                                <input type="text" name="email" class="text form-control my-4 py-2" placeholder="Usuário">
                                <input type="password" name="senha" class="text form-control my-4 py-2" placeholder="Senha">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-loguin">Loguin</button>
                                </div>
                            </form>
                            <a href="../index.php" class="text-decoration-none">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>