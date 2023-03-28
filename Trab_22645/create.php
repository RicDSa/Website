<?php
//incluir a pagina do template
include "database.php";
//verificar se o botao de criar foi pressionado
$msg="";
if(!empty($_POST))
{    
    $firstname=isset($_POST["firstname"])?$_POST["firstname"]:'';
    $lastname=isset($_POST["lastname"])?$_POST["lastname"]:'';
    $email=isset($_POST["email"])?$_POST["email"]:'';
    $phone=isset($_POST["telefone"])?$_POST["telefone"]:'';
    $model=isset($_POST["model"])?$_POST["model"]:'';
    $price=isset($_POST["price"])?$_POST["price"]:'';
    $id=NULL;
    $created=date('Y-m-d H:i:s');
    //criar a query de insercao
    $st=$pdo->prepare('INSERT iNTO carro values (?,?,?,?,?,?,?,?)');
    $st->execute([$id,$firstname,$lastname,$email,$phone,$model,$price,$created]);
    $msg="Carro realizado com sucesso.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="css/estilo.css" type="text/css" rel="stylesheet"/>
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link  type="text/css" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    <title>Aluguer de carros</title>
</head>
<body>
<div id="container">
    <nav class="navtop">
        <div>
        <h1>Alugar</h1>
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="read.php"><i class="fas fa-address-book"></i>Alugar Carro</a>
        <a href="info.php"><i class="fas fa-address-book"></i>Informações</a>
        </div>
    </nav>

<div id="wrapper">
    <div class="content create">
        <h2>Novo carro</h2>
    <form action="create.php" method="post">

    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="auto"/>

    <label for="firstname">Primeiro Nome</label>
    <label for="lastname">Ultimo Nome</label>
    <input type="text" name="firstname" id="firstname" value=""/>
    <input type="text" name="lastname" id="lastname" value=""/>

    <label for="email">E-mail</label>
    <label for="phone">Telefone</label>
    <input type="text" name="email" id="email" value=""/>
    <input type="text" name="phone" id="phone" value=""/>

    <label for="model">Modelo</label>
    <label for="price">Preço</label>
    <input type="text" name="model" id="model" value=""/>
    <input type="text" name="price" id="price" value=""/>

    <label for="created">Data de registo</label>
    <input type="text" name="created" id="created" value="<?=date('Y-m-d H:i:s')?>"/>

    <input type="submit" value="Criar Registo">
    </form>
    <?=$msg?>
    </div>
</div>
<div id="footer"><p>Aluguer de Carros</p>
    </div>
</div>
</div>
<script type="text/javascript">AddFillerLink("content", "navigation", "extra")</script>
</body>
</html>
