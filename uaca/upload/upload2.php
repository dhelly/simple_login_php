<html>
<head>
<title>Envia Arquivo</title>
</head>
<body>
<?php
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
$nome_real=$_FILES["Arquivo"]["name"];
copy($nome_temporario,"../EST-PRINCIPAL/$nome_real");
?>

Arquivo enviado com sucesso! [ <a href="http://app.dca.ufcg.edu.br/EST-PRINCIPAL/"> RETORNAR </a> ]
</body>
</html>


