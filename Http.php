<?php

$connection = mysqli_connect("localhost", "root", "", "classicmodels");

$start = $_GET["start"];
$limit = $_GET["limit"];

$sql = "SELECT * FROM employees LIMIT $start, $limit";
$result = mysqli_query($connection, $sql);

$data = array();
while ($row = mysqli_fetch_object($result))
    array_push($data, $row);
echo json_encode($data);
