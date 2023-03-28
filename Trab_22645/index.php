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
        <h1>Home</h1>
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="read.php"><i class="fas fa-address-book"></i>Aluguer de Carros</a>
        <a href="info.php"><i class="fas fa-address-book"></i>Informações</a>
        </div>
        </nav>
    <div id="wrapper">
    <section>
    <div class="imagem">
            <img class="slide" width="50%" src="https://media-manager.noticiasaominuto.com/1920/1577465067/naom_5c1d252983727.jpg?crop_params=eyJsYW5kc2NhcGUiOnsiY3JvcFdpZHRoIjoyNzQyLCJjcm9wSGVpZ2h0IjoxNTQyLCJjcm9wWCI6OCwiY3JvcFkiOjMwOX19">
            <img class="slide" width="50%" src="https://cdn.motor1.com/images/mgl/lY19w/s1/bugatti-la-voiture-noire.jpg">
            <img class="slide" width="50%" src="https://fleetmagazine.pt/wp-content/uploads/2018/07/TCO-SUV-10-e1531410642864.jpg">
            <img class="slide" width="50%" src="https://cdn.e-konomista.pt/uploads/2019/07/765_360_carros-citadinos-mais-economicos_1521190809.jpg">
            <br/>
            <br/>
            <button onclick="mostraImagem(-1)">&#10094;</button>
            <button onclick="mostraImagem(1)">&#10095;</button>
        </div>
    </div>
    </section>
    <section>
        <div id="extra">
        <p><strong>Tipos de Carros disponiveis:</strong></p>
        <ul>
            <li>Eletricos</li>
            <li>Desportivos</li>
            <li>SUVs</li>
            <li>Citadinos</li>
        </ul>
        <p><strong>Exemplos de marcas de Carros disponiveis:</strong></p>
        <ul>
            <li>Honda</li>
            <li>Bugati</li>
            <li>Peugeot</li>
            <li>Range Rover</li>
            <li>BMW</li>
        </ul>
        </div>
    </section>
</div>
<div id="footer"><p>Aluguer de Carros</p>
</div>
<script type="text/javascript">AddFillerLink("content", "navigation", "extra")</script>
<script src="js/slide.js"></script> 
</body>
</html>
