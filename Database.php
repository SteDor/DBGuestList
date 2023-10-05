<?php 
class Database {
    public $servername ='';
    public $username='';
    public $password='';
    public $databasename='';
    
    function __construct($servername , $username, $password, $databasename){
        $servername -> servername;
        $username-> username;
        $password-> password;
        $databasename-> databasename;

    }


    public function createDatabase($servername, $username, $password, $databasename) {
        // Create connection
        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Create database 
        $sql = "CREATE DATABASE $databasename";
        if ($conn->query($sql) === TRUE) {
          echo ('<br>Database: ' . $databasename .  'was created successfully');
        } else {
          echo "<br>Error creating database: " . $conn->error;
        }

        $conn->close();    
    }
    



}
?>