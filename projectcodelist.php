<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$id=$_GET['id'];
$connection = mysqli_connect('localhost', 'venkat', '123456', 'sqa') or die("Error" .  mysqli_error($connection));

$sql= "select projectcode from project";
$result = mysqli_query($connection,$sql) or die("Error".  mysqli_error($connection));
$list =array();
while ($row=mysqli_fetch_array($result))
{
    
    $list[] =$row['projectcode'];
}      
echo json_encode($list);

?>