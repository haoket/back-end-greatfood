<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: text/plain; charset=utf-8');
require("dbCon.php");
require("jwt.php");
$json = file_get_contents("php://input");
$obj = json_decode($json,TRUE);
$id = $obj["ID"];
$HoTen = $obj["HOTEN"];
$phone = $obj["PHONE"];
$Email = $obj["EMAIL"];
$Address = $obj["ADDRESS"];

$qr = "UPDATE users SET `HoTen`=\"$HoTen\",`phone`=\"$phone\",`Email`=\"$Email\",`HoTen`=\"$HoTen\",`Address`=\"$Address\" WHERE `id`=\"$id\"";
$conn->query("SET CHARACTER SET utf8");
if (mysqli_query($conn, $qr)) {
    echo JsonHelper::getJson("result", "successfully");
} else {
    echo JsonHelper::getJson("result", mysqli_error($conn));
}
mysqli_close($conn);


?>