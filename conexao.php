<?php

// Aqui temos a conexão com o banco de dados, no caso, estou utilizando o MySQL

define('HOST', '127.0.0.1'); // Nome do host (geralmente o localhost)
define('USER', 'root'); // Nome do usuário para acesso ao banco (geralmente root)
define('PASSWORD', 'mysqldba'); // Defina aqui a senha do banco
define('DB', 'nknbank');

$conexao = mysqli_connect(HOST, USER, PASSWORD, DB) or die ('Não foi possível conectar!');