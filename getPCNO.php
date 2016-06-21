<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Menu</title>
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.css" >
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <?php include "db_lib.php";     session_start();?>
    </head>
<body>
<?php
$received_pcno=$_POST["txtpcno"];
/*$user="venkat";
$password="123456";
$host="localhost";
$database="sqa";
$port="3306";
$socket="";
$Error_Flag=FALSE;
$_SESSION["access"]=0;
$link = mysqli_connect($host, $user, $password, $database, $port, $socket);

if (! $link) {
    echo "<h4>DB not connected</h4>";
    $Error_Flag=TRUE;
}

$db=mysqli_select_db($link, $database);

if (! $db) {
    echo "<h3>DB not selected</h3>";
    $Error_Flag=TRUE;
}
*/
        $db_obj = new db();
        $link = $db_obj->dblink;
                
        $sql = "select name, pcno,role, project from users where pcno="  .$received_pcno;
        $query=  mysqli_query($link,  $sql );
        if (! $query) {
            echo "<h3>Query not selected</h3>";
            $_SESSION["access"]=0;
            $Error_Flag=TRUE;
        }
        else {
        while ($row = mysqli_fetch_assoc($query))  {
            $pcno= $row['pcno'];
            $name=$row['name'];
            $role=$row['role'];
    }
    mysqli_free_result($query);
    
    mysqli_close($link);


    if ($pcno > 0) {
    $_SESSION["pcno"]=$pcno;
    $_SESSION["name"]=$name;
    $_SESSION["role"]=$role;
    $_SESSION["access"]=1;
    /*
     * status=1 is Successfull
     * status =0 is unsuccessfully
     * status=99 is default;
     */
    $_SESSION["status"]=1;
     $_SESSION["msg"]="Login Successfully ...................";
    header("Location: Menu.php");
    }
    else    {
        $_SESSION["access"]=0;
        header("Location: error.php");
    }
 }     
?>
</body>
</html>

