<?php 
class Database {
  
    function __construct(public $servername, public $username, public $password, public $databasename){
        

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
          echo ('<br>Database: ' . $databasename .  'was created successfully<br><br>');
        } else {
          echo "<br>Error creating database: <br>" . $conn->error;
        }

        $conn->close();    
    }
    



}
?>