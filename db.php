<?php
$user="venkat";
$password="123456";
$host="localhost";
$database="sqa";
$port="3306";
$socket="";
$link = mysqli_connect($host, $user, $password, $database, $port, $socket);
if (! $link) {
    echo "<h4>DB not connected</h4>";
}
else
{
    echo "<h4>Connected to db</h4>";
}

$db=mysqli_select_db($link, $database);

if (! $db) {
    echo "<h3>DB not selected</h3>";
}
else
{
    echo "<h3>DB selected</h3>";
}

$query=  mysqli_query($link, "select name, pcno from users");

if (! $query) {
    echo "<h3>Query not selected</h3>";
}
else
{
    echo "<h3>Query sselected</h3>";
}

while ($row = mysqli_fetch_assoc($query)) 
{
    echo $row['pcno'];
    echo $row['name'];
    
}
mysqli_close($link);
$i=1;
while ($i>0)
{
    //echo $i;
    $i=$i+1;
    if ($i>100000000) {
        $i=0;
    }
}

?>

