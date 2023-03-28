<?php

include "database.php";
//verificar se existe id para alteração
$msg="";
if(isset($_GET["id"]))
{   
        //verificar se clicaram em editar
        if(!empty($_POST))
        {
            $firstname=$_POST["firstname"];
            $lastname=$_POST["lastname"];
            $email=$_POST["email"];
            $telefone=$_POST["telefone"];
            $model=$_POST["model"];
            $price=$_POST["price"];
            //realizar update
            $smt=$pdo->prepare("UPDATE carro SET firstname=?, lastname=?, email=?, telefone=?, model=?, price=? WHERE id=?");
            $smt->execute([$firstname,$lastname,$email,$telefone,$model,$price,$_GET["id"]]);
            $msg="Carro alterado com sucesso.<a href='read.php'>Voltar</a>";
        }

        //retirar os valores para edição
        $smt=$pdo->prepare('SELECT * FROM carro WHERE id=?');
        $smt->execute([$_GET["id"]]);
        $car=$smt->fetch(PDO::FETCH_ASSOC);

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
        <h1>Update</h1>
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="read.php"><i class="fas fa-address-book"></i>Alugar Carros</a>
        <a href="info.php"><i class="fas fa-address-book"></i>Informações</a>
        </div>
        </nav>
<div class="content create">
    <?php
    if(!$car)
    {
            $msg="Carro inexistente. Deve selecionar um carro da <a href='read.php'>nossa lista</a>";
    }
    else
    {
        ?>
    <h2> Atualizar carro #<?=$car["id"]?></h2>
    <form action="update.php?id=<?=$car['id']?>" method="post">
    <label for="name">Primeiro Nome</label>
    <label for="name">Ultimo Nome</label>
    <input type="text" name="firstname" id="firstname" value="<?=$car['firstname']?>">
    <input type="text" name="lastname" id="lastname" value="<?=$car['lastname']?>">

    <label for="email">E-mail</label>
    <label for="telefone">Telefone</label>
    <input type="text" name="email" id="email" value="<?=$car['email']?>">
    <input type="text" name="telefone" id="telefone" value="<?=$car['telefone']?>">

    <label for="model">Modelo</label>
    <label for="price">Preço</label>
    <input type="text" name="model" id="model" value="<?=$car['model']?>">
    <input type="text" name="price" id="price" value="<?=$car['price']?>">

    <input type="submit" value="Editar">
    </form>
    <?php }?>
    <?=$msg?>
</div>
<div id="footer"><p>Aluguer de Carros</p>
    </div>
    </body>
</html>
