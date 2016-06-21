<!DOCTYPE html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Menu</title>
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.css" >
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.js"></script>
 </head>
 <body>
<?php
    session_start();
    $code  = strtoupper($_POST["pcode"]);
    $name = strtoupper($_POST["pname"]);

    $connection = mysqli_connect('localhost', 'venkat', '123456', 'sqa') or die("Error" .  mysqli_error($connection));

    $sql= "select projectcode from project where projectcode='" .$code  ."'";

    $result = mysqli_query($connection,$sql) or die("Error".  mysqli_error($connection));
    if (mysqli_num_rows($result)) { 
        //Error
        $_SESSION["status"]=0;
        $_SESSION["msg"]="Project code already available. Please try new code";
?>
           <!-- <div id="myAlert" class="alert alert-danger">
                <a href="menu.php" class="close" data-dismiss="alert">&times;</a>
                <br><b><strong>Sorry!..</strong><br> Project Code is already in USE.<br>Please try different code.</b>
            </div>;-->
<?php
       }
      else {
                $_SESSION["status"]=1;
                
                //insert data
                //finding maximum number of Project ID
                $sql = "select max(projectid) as pid from project";
                $result = mysqli_query($connection,$sql) or die("Error".  mysqli_error($connection));
                while  ($row = mysqli_fetch_assoc($result)) {
                    $max=$row['pid'];
                }
                mysqli_free_result($result);
                $max=$max + 1;
                $sql = "insert into project values(" .$max .",'" . $code . "','" .$name ."')";
                $result = mysqli_query($connection,$sql) or die("Error".  mysqli_error($connection));
                mysqli_close($connection);
                $_SESSION["msg"]="Successfully added...................";
            }
      header("Location:menu.php");
      ?>
         
  
        <script type="text/javascript">
                $(document).ready(function(){
                        $("#myAlert").bind("closed.bs.alert", function () {
                            location.replace("menu.php");
                            });
            });
        </script>  
 </body>
</html>