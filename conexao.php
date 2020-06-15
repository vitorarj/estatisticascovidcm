<?php
//Credenciais de acesso ao BD
define('HOST', 'db4free.net');
define('USER', 'vitorarj');
define('PASS', '38295610');
define('DBNAME', 'cashbb');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
