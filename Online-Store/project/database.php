<?php
$servrer = "";
$login = "root";
$pass = "";
$name_db = "online-store";
$link = mysqli_connect($server,$login,$pass,$name_db);

if ($link == False)
{
  echo "Соединение не удалось";
}
 ?>
