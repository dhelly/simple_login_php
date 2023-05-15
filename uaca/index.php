<?php
session_start();

// Verifica se o formulário de login foi submetido
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se as credenciais do usuário são válidas
    if($username === 'usuario' && $password === 'senha') {
        // Cria uma variável de sessão para indicar que o usuário está logado
        $_SESSION['logged_in'] = true;

        var_dump($_SESSION['logged_in']);
        // Redireciona o usuário para a página restrita
        header('Location: pagina_restrita.php');
        exit();
    } else {
        // Exibe uma mensagem de erro caso as credenciais sejam inválidas
        $error_message = 'Credenciais inválidas';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main>
        <div class="login-form">
            <div class="">
                <?php if(isset($error_message)): ?>
                    <p><?php echo $error_message; ?></p>
                <?php endif; ?>
            </div>


            <h2 class="text-center">Login</h2>
            <form method="post" class="mt-5">
                <div class="form-group">
                    <label for="username">Usuário:</label>
                    <input class="form-control" type="text" name="username" id="username" required>
                </div>

                <div class="form-group mt-3">
                    <label for="password">Senha:</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>

                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-primary btn-lg" type="submit">Entrar</button>
                </div>

            </form>
        </div>
    </main>

</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>