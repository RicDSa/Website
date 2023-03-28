<?php

include "database.php";
$msg="";
if(isset($_GET["id"]))
{
    //retirar os valores para edição
    $st=$pdo->prepare('SELECT * FROM carro WHERE id=?');
    $st->execute([$_GET["id"]]);
    $car=$st->fetch(PDO::FETCH_ASSOC);
    if(isset($_GET["confirma"]))
    {
        if($_GET["confirma"]=="yes")
        {
            //remover o elemento
            $st=$pdo->prepare("DELETE FROM carro WHERE id=?");
            $st->execute([$_GET["id"]]);
            $msg="Carro removido com sucesso.";
        }
        else
        {
            header('Location:read.php');
            exit();
        }
    }
}

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
        <h1>Delete</h1>
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="read.php"><i class="fas fa-address-book"></i>Alugar Carros</a>
        <a href="info.php"><i class="fas fa-address-book"></i>Informações</a>
        </div>
        </nav>
<div class="content delete">
<?php
    if(!$car)
    {
            $msg="<h2>Carro inexistente. Deve selecionar um carro da <a href='read.php'>nossa lista</a></h2>";
    }
    else
    {
    ?>
<h2> Remover carro #<?=$car["id"]?></h2>
<?php
    if($msg)
    {
        echo $msg;
    }
    else
    {
        ?>   
        <p>Tem a certeza que pretende remover o registo #<?=$car["id"]?></p>
        <div class="btconfirma">
        <a href="delete.php?id=<?$car['id']?>&confirma=yes">Sim</a>
        <a href="delete.php?id=<?$car['id']?>&confirma=no">Não</a> 

        <?php
    }
}
?>
</div>
<div id="footer"><p>Aluguer de Carros</p>
    </div>
    </body>
</html>