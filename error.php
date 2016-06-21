<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Menu Screen</title>
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
            <div id="myAlert" class="alert alert-warning pull-right">
                <a href="login.php" class="close" data-dismiss="alert">&times;</a>
                <b><strong>Sorry!</strong> <br>Access denied.<br>  Please contact RITED/SQAG........</b>
            </div>
<script type="text/javascript">
$(function(){
$("#myAlert").bind('closed.bs.alert', function () {
    location.replace('login.php');
});
});
</script>  
    </body>
</html>