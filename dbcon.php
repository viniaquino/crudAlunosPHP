<!-- Conexão com o MySQL -->

<?php
// Conecta ao banco de dados MySQL
$con = mysqli_connect("localhost","root","","blog");
// Verifica se a conexão foi bem-sucedida
if(!$con){
    die('Connection failed' . mysqli_connect_error());
}

?>