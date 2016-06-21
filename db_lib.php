<?php
class db {
    //put your code here
    public $dblink;
    private $hostname;
    private $username;
    private $password;
    private $databasename;
    private $sql;
    private $port;
    private $socket;
    public $ResultSet;
    function __construct() {
        $this->username = "venkat";
        $this->password="123456";
        $this->databasename="sqa";
        $this->hostname="localhost";
        $this->port="3306";
        $this->socket="";
        $Error_Flag=FALSE;
        $Flag=0;
        $this->dblink =  mysqli_connect($this->hostname, $this->username, $this->password, $this->databasename, $this->port, $this->socket) or die ("Error".  mysqli_error($dblink));
        if (! $this->dblink) {
                echo "<h4>DB not connected</h4>";
        }
        else {
                    echo "<h4>DB connected</h4>";
                    $db=mysqli_select_db($this->dblink, $this->databasename);
                    if (! $db) {
                        echo "<h3>DB not selected</h3>";
                    }
        }        
    }    
    //Function for SQL Query 
    function query($Query) {
            $this->RS= mysqli_query($this->dblink, $Query)  or die ("Error".  mysqli_error($this->dblink));         
            if (! $this->RS) {
                $_SESSION["msg"]="Query not selected";
            }
    }

    function queryclose()
    {
        mysqli_free_result($this->RS);
    }
}
