<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: text/plain; charset=utf-8');
require("dbCon.php");
require("jwt.php");
$json = file_get_contents("php://input");
$obj = json_decode($json,TRUE);
$id = $obj["IDUSER"];
$urlImg = $obj["URLIMAGE"];


$qr = "UPDATE users SET `Avatar`=$urlImg WHERE `id`=$id";
$conn->query("SET CHARACTER SET utf8");
if (mysqli_query($conn, $qr)) {
    echo JsonHelper::getJson("result","successfully");
} else {
    echo JsonHelper::getJson("result", "error");
}
mysqli_close($conn);


?>