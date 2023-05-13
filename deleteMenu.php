<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: text/plain; charset=utf-8');
require("dbCon.php");
require("jwt.php");
$json = file_get_contents("php://input");
$obj = json_decode($json,TRUE);
$iddanhmuc = $obj["IDDANHMUC"];



$qr = "DELETE FROM danhmuc WHERE iddanhmuc='$iddanhmuc'";
$conn->query("SET CHARACTER SET utf8");
if (mysqli_query($conn, $qr)) {
    echo JsonHelper::getJson("result", "successfully");
} else {
    echo JsonHelper::getJson("result", mysqli_error($conn));
}
mysqli_close($conn);


?>