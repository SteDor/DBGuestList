<?php 
class Database {
  
    function __construct(public $servername, public $username, public $password, public $databasename){
        

    }

    // ceate new database if user exist in PhpMyAdmin 
    // u can name your database with this function
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
    // create Table with Name and create column ID (Primary Key)
    public function createTable($servername, $username, $password, $databasename, $tablename ){
      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $databasename);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      // sql to create table
      $sql = "CREATE TABLE " .  $tablename . "(
        ID int NOT NULL,
        PRIMARY KEY (ID)
      
      )";

      if (mysqli_query($conn, $sql)) {
        echo ("Table " .  $tablename .  " created successfully");
      } else {
        echo ("Error creating table: " . $tablename . "") . mysqli_error($conn);
      }

      mysqli_close($conn);
    }

    // Add columns to an existing table in the DB
    public function addColumns($servername, $username, $password, $databasename, $tablename, $sqlInfoString){
      $conn = mysqli_connect($servername, $username, $password, $databasename);
      // make $sqlInfoString to Array for sql statement
      $infoArray = explode('|', $sqlInfoString);

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      // sql to create table
      $sql = ('ALTER TABLE ' . $tablename . 
      ' ADD ' . $infoArray[0] . 
      ' ' . $infoArray[2] . ' NOT NULL AFTER ' 
      . $infoArray[1]); 
      
      

      if (mysqli_query($conn, $sql)) {
        echo ('Adedd column '. $infoArray[0] . ' to table ' . $tablename . ' after column ' .  $infoArray[1]);
      } else {
        echo ('No Columns added') . mysqli_error($conn);
      }

      mysqli_close($conn);

    }

    // Add column to an existing table in the DB
    public function addColumn($servername, $username, $password, $databasename, $tablename, $addColumn, $sqlInfoString){
      $conn = mysqli_connect($servername, $username, $password, $databasename);
      // make $infoArray for  Sql Statement
      
      $infoArray = explode('|',$sqlInfoString);

      echo ('add to: ' . $addColumn);

      // for testing
      for ($i = 0; $i < count($infoArray); $i++)
        {
          echo($infoArray[$i].", ");
        }
        echo("</br>");
        echo('size = ' . count($infoArray). '<br>');

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      // sql to create multiple columns
      for ($count = 0; $count < count($infoArray); $count+=2){
        echo('count = ' . $count . '<br>');

        $sql = ('ALTER TABLE ' . $tablename         //name of table
        . ' ADD ' . $infoArray[$count] . ' '                //name of column
        . $infoArray[$count + 1] . ' NOT NULL AFTER '   //type
        . $addColumn);                  //column to add
      
        if (mysqli_query($conn, $sql)) {
          echo ('Adedd column '. $infoArray[$count] . ' to table ' 
          . $tablename . ' after column ' .  $addColumn . '<br>');
        } else {
          echo ('No Columns added') . mysqli_error($conn);
        }
        
        
        
        
        //echo ('Adedd column '. $infoArray[$count] . ' to table ' . $tablename . ' after column ' .  $addColumn . '<br>');
      

      $addColumn = $infoArray[$count];
      
      }

      mysqli_close($conn);
    }  
    

}
?>