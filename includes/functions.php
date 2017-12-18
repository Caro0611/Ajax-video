<?php
  $user = "root";
  $pass = "root"; // debe ser blank screen para pc
  $host = "localhost";
  $db = "db_cooper"; //lo q llamaste la database

  $conn = mysqli_connect($host, $user, $pass, $db);
  mysqli_set_charset($conn, 'utf8');

  if (!$conn) {
    echo "something done wrong";
    exit;
  }

  $myQuery = "SELECT * FROM video";
  $result = mysqli_query($conn, $myQuery);

  $rows = array();

  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  // var_dump($rows);
  // echo json_encode($rows);


  // get 1 cosa row usando parametro query
  if (isset($_GET['carModel'])) { //busca x carmodel
    $car = $_GET['carModel'];

    $myQuery = "SELECT * FROM mainmodel WHERE model = '$car'";
    $result = mysqli_query($conn, $myQuery);

    $row =mysqli_fetch_assoc($result);

    echo json_encode($row);
  }

  if (isset($_GET['getVideos'])) { //busca x carmodel

    $myQuery = "SELECT * FROM video";
    $result = mysqli_query($conn, $myQuery);
    $rows = array();

while($row =mysqli_fetch_assoc($result)){
  $rows[] = $row;
}

    echo json_encode($rows);
  }

?>
