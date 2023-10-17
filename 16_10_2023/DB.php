<?php
class DB{

    function __construct(public $servername, public $username, public $password, public $databasename){}

public function checkConnection($conn) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
  
}

public function createNewDatabase($servername, $username, $password, $databasename) {
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    $this->checkConnection($conn);

    // Create database
    $sql = "CREATE DATABASE " . $databasename. " ";

    if ($conn->query($sql) === TRUE) {
      echo ("Database " . $databasename . " created successfully");
    } else {
      echo "Error creating database: " . $conn->error;
    }
    $conn->close();
    }


public function createTable($servername, $username, $password, $databasename) {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $databasename);
    // Check connection
    $this->checkConnection($conn);
    // sql to create table
    $sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50)
    )";

    if ($conn->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}

public function insertData($servername, $username, $password, $dbname, $tablename, $firstName, $lastName, $email) {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    $this->checkConnection($conn);

    $sql = "INSERT INTO " . $tablename . " (firstname, lastname, email)
      VALUES ('". $firstName. "', '" . $lastName ."', '". $email."')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


public function addPreparedStatment($servername, $username, $password, $databasename,$userString){
    $conn = new mysqli($servername, $username, $password, $databasename);

    // Check connection
    $this->checkConnection($conn);

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $lastname, $email);
    $userArray = explode('|', $userString);
    for($i=0; $i<count($userArray); $i += 3) {
        $firstname = $userArray[$i];
        $lastname = $userArray[$i + 1];
        $email = $userArray[$i + 2];
        $stmt->execute();
        }
        echo ('created');
    $stmt->close();
    $conn->close();
}

}

?>