<?php
    $dbPath = __DIR__ . '/banco.sqlite';
    $pdo = new PDO("sqlite:$dbPath");
    $videoList= $pdo->query('SELECT * FROM videos;')->fetchAll(\PDO::FETCH_ASSOC);
   
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

    <header>

        <nav class="cabecalho">
            <a class="logo" href="./index.php"></a>

            <div class="cabecalho__icones">
                <a href="./pages/enviar-video.php" class="cabecalho__videos"></a>
                <a href="./pages/login.php" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <ul class="videos__container" alt="videos alura">
        <?php foreach($videoList as $video):?>
        <?php 
            if(!str_starts_with($video['url'], 'http')){
                $video['url'] = 'https://www.youtube.com/embed/YAEG-4ywHK4';
            }
        ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?php echo $video['url']?>" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?php echo $video['title']?></h3>
                <div class="acoes-video">
                    <a href="/formulario.php?id=<?=$video['id']?>">Editar</a>
                    <a href="/remover-video.php?id=<?=$video['id']?>">Excluir</a>
                </div>
            </div>
        </li>
        <?php endforeach ?>
    </ul>
</body>

</html>