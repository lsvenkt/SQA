<?php
$user="venkat";
$password="123456";
$host="localhost";
$database="sqa";
$port="3306";
$socket="";
$q=$_POST['term'];
$link = mysqli_connect($host, $user, $password, $database, $port, $socket);
if (! $link) {
    //echo "<h4>DB not connected</h4>";
}
else
{
    //echo "<h4>Connected to db</h4>";
}

$db=mysqli_select_db($link, $database);

if (! $db) {
    //echo "<h3>DB not selected</h3>";
}
else
{
    //echo "<h3>DB selected</h3>";
}

$query=  mysqli_query($link, "select code from temp where code like '$q%'");

if (! $query) {
    //echo "<h3>Query not selected</h3>";
}
else
{
    //echo "<h3>Query sselected</h3>";
}
$data=array();
$i=0;
while ($row = mysqli_fetch_assoc($query)) 
{
    //echo $row['pcno'];
    //echo $row['name'];
    $data[$i]=$row['code'];
    $i=$i+1;
}
mysqli_close($link);
print_r($data);
        //echo array_column($data, 0);

/*$i=0;
while ($i>0)
{
    //echo $i;
    $i=$i+1;
    if ($i>100000000) {
        $i=0;
    }
}
*/
?>

