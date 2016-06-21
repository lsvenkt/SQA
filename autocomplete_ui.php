<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$id=$_GET['id'];
$id=1;
if ($id===1) {
$connection = mysqli_connect('localhost', 'venkat', '123456', 'test') or die("Error" .  mysqli_error($connection));

$sql= "select countryname from ajax_countries";
$result = mysqli_query($connection,$sql) or die("Error".  mysqli_error($connection));
$list =array();
while ($row=mysqli_fetch_array($result))
{
    
    $list[] =$row['countryname'];
}      
echo json_encode($list);
}
else
{
    echo json_encode("hal");
}
?>
