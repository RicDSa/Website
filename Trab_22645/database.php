<?php
//definir variaveis
$DATABASE_HOST="localhost";
$DATABASE_NAME="trab";
$DATABASE_USER="root";
$DATABASE_PASS="";
$DATABASE_PORT=3308; //caso tenham alterado a porta 3308
$LIGACAO="mysql:host=".$DATABASE_HOST.";dbname=".$DATABASE_NAME.";port=".$DATABASE_PORT.";charset=utf8";
//com o try verifico se existem erros
try{
    $pdo=new PDO($LIGACAO,$DATABASE_USER,$DATABASE_PASS);
  //  echo "sucesso";
}
//acontece quando existem erros
catch(PDOEXception $ex)
{
echo "Erro ". $ex;
}
?>