<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$code=$_GET["code"];

$connection = mysqli_connect('localhost', 'venkat', '123456', 'sqa') or die("Error" .  mysqli_error($connection));

$sql= "select projectcode from project where projectcode='" .$code  ."'";

$result = mysqli_query($connection,$sql) or die("Error".  mysqli_error($connection));
if (mysqli_num_rows($result)) {
    
    echo '<span class="label label-danger" id="codeavail">Not Available. Project Code already in use</span>';
    
}
else {
    
    echo '<span class="label label-success" id="codeavail">Project Code Available</span>';
}
?>