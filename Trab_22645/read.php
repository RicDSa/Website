<?php

    //incluir a pagina do template
    include "database.php";

    //numero maximo de registos por pagina
    $records_per_page=3;

    //defenir pagina atual
    $page=isset($_GET["page"]) && is_numeric($_GET["page"])?(int)$_GET["page"]:1;

    //construir query para exibir elementos na tabela
    $st=$pdo->prepare('SELECT * FROM carro ORDER By id LIMIT :current_page,:records_per_page');

    //passar os parametros
    $st->bindValue('current_page',($page-1)*$records_per_page,PDO::PARAM_INT);
    $st->bindValue('records_per_page',$records_per_page,PDO::PARAM_INT);

    //executar a query
    $st->execute();

    //criar array de carros
    $car=$st->fetchAll(PDO::FETCH_ASSOC);

    //determinar numero total de carros
    $num_carros=$pdo->query('SELECT count(*) from carro')->fetchColumn();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="css/estilo.css" type="text/css" rel="stylesheet"/>
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link  type="text/css" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    <title>Aluguer de Carros</title>
</head>
<body>
<div id="container">
    <nav class="navtop">
        <div>
        <h1>Lista de Aluguer</h1>
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="read.php"><i class="fas fa-address-book"></i>Aluguer de Carros</a>
        <a href="info.php"><i class="fas fa-address-book"></i>Informações</a>
        </div>
    </nav>
<div class="content read">
    <h2>Listagem</h2>
    <a href="create.php" class="create-contact">Alugar Carro</a>

    <table>
        <thead>
            <tr>
            <td>#</td>
            <td>Primeiro Nome</td>
            <td>Ultimo Nome</td>
            <td>E-mail</td>
            <td>Telefone</td>
            <td>Modelo</td>
            <td>Preço</td>
            <td>Data de registo</td>
            <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($car as $car): ?>
            <tr>
            <td><?=$car["id"]?></td>
            <td><?=$car["firstname"]?></td>
            <td><?=$car["lastname"]?></td>
            <td><?=$car["email"]?></td>
            <td><?=$car["telefone"]?></td>
            <td><?=$car["model"]?></td>
            <td><?=$car["price"]?></td>
            <td><?=$car["data_criacao"]?></td>
            <td class ='actions'>
                <a href="update.php?id=<?=$car['id']?>" class="edit"><i class="fas fa-pen"></i></a>
                <a href="delete.php?id=<?=$car['id']?>" class="trash"><i class="fas fa-trash"></i></a>
            </td>
            </tr>
            <?php endforeach?>
        </tbody>    
    </table>
        <!--navegacao-->
        <div class="pagination">
            <?php if($page>1):?>
                <a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
            <?php endif?>
            <?php if($page*$records_per_page<$num_carros):?>
                <a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
            <?php endif?>
        </div>
</div>
</div>
<div id="footer"><p>Aluguer de Carros</p>
    </div>
</div>
</div>
<script type="text/javascript">AddFillerLink("content", "navigation", "extra")</script>
</body>
</html>