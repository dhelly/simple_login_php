<?php
session_start();

header('Content-Type: text/html; charset=ISO-8859-1');

// Verifica se o usuário está logado
if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    // Redireciona o usuário de volta para a página de login
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="ISO-8859-1">
    <title>Página Restrita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="css/restrict.css">
</head>
<body class="d-flex flex-column">

    <main class="container">
        <div class="flex-shrink-0"">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

                <div class="logo">
                    <span class="fs-4">Estação Metereológica</span>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="http://dca.ufcg.edu.br" target="_blank" class="nav-link px-2">UACA</a></li>
                    <li><a href="http://ppgmet.ufcg.edu.br" target="_blank" class="nav-link px-2">PPGMET</a></li>
                    <li><a href="http://portal.ufcg.edu.br" target="_blank" class="nav-link px-2">UFCG</a></li>
                    <li><a href="logout.php" class="nav-link px-2">Sobre</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-info">Sair</button>
                </div>
            </header>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 mt-5">
                        <h1 class="text-center mb-5">Upload de Arquivo</h1>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fileInput">Selecione um arquivo:</label>
                                <input type="file" class="form-control" name="fileInput" id="fileInput">
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-primary btn-lg" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <section class="p-5">

            <ul class="list-group">

                <?php
                    // Definir o caminho do diretório a ser listado
                    $caminho = './dados';

                    // Obter a lista de arquivos e pastas dentro do diretório
                    $conteudo = scandir($caminho);

                    $pattern = "/(.xlsx$)/i";

                    // Exibir o conteúdo do diretório
                    foreach ($conteudo as $item) {
                        if (preg_match($pattern, $item)) echo "<li class='list-group-item'><a href='".$caminho."/".$item."'>".$item ."</a></li>";
                    }
                ?>

        </section>


    </main>
    <footer class="footer mt-auto py-3">
        © 2023 Feito com ? - Coordenação Administrativa UACA
    </footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>