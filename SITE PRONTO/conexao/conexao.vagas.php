<?php

//CONEXÃO COM O BANCO DE DADOS CURSOSTI//
$host = "localhost";
$user = "root";
$pass = "";
$base = "vagas";

//FAZENDO A CONEXÃO COM O BANCO DE DADOS//
$con = mysqli_connect($host, $user, $pass,$base);


//MENSAGEM DE FALHA DA CONEXÃO//
if(mysqli_connect_errno()){
    die("Falha de conexão com o banco de dados:" .
        mysqli_connect_error() . " ( " . mysqli_connect_errno() . " ) "
);
}






