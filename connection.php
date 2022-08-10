<?php
    class DbConn
    {
        private $Conn;
        function __construct($Servername = "localhost", $Username = "root", $Password = "", $Databasename = "School")
        {
            $this->Servername = $Servername;
            $this->Username = $Username;
            $this->Password = $Password;
            $this->Databasename = $Databasename;
            $this->Conn = new mysqli($Servername, $Username, $Password, $Databasename);
        }
        function getConn() 
        {
            return $this->Conn;
        }
    }
    
    $obj = new DbConn();
    $Conn = $obj->getConn();

    $sql = "SELECT * FROM `type`";
    $result = $Conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
          echo "id: " . $row["TypeID"]. " -Type: " . $row["Type"]."<br>";
        }
    } 
    else 
    {
        echo "0 results";
    }

?>