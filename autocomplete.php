<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$id=$_GET['id'];

//include "getPCNO.php"; 
session_start();
$connection=$_SESSION["dblink"];
if ($id===1) {
//$connection = mysqli_connect('localhost', 'venkat', '123456', 'sqa') or die("Error" .  mysqli_error($connection));

$sql= "select ProjectCode from project";
$result = mysqli_query($connection,$sql);
//or die("Error".  mysqli_error($connection));
if (!$result) {
    echo "Error";
}
$list =array();
while ($row=mysqli_fetch_array($result))
{
    $list[] =$row['ProjectCode'];
}      
echo json_encode($list);
}
?>


