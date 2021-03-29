<?php

//Connection with MySQLi
$server = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'todoPHP';

//Connection
$connection = new mysqli($server, $user, $pass, $db_name);

if ($connection->connect_error) {
  die("Connection Failed.". $connection->connect_error);
}

echo "Connection Successfully.";

//Querry
$addTodo = "insert into todoItem values (null, 'Beber o Café')";
if ($connection->query($addTodo) === TRUE){
  echo "Command Successfully";
} else {
  echo "Command Error." . $connection->error;
}

$connection->close();
