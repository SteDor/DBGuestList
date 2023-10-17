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


public function createTableMyGuests($servername, $username, $password, $databasename) {
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

public function createTablePresents($servername, $username, $password, $databasename) {
  // Create connection
  $conn = new mysqli($servername, $username, $password, $databasename);
  // Check connection
  $this->checkConnection($conn);
  // sql to create table
  $sql = "CREATE TABLE `mydbguests`.`presents` (
    `ID` INT NOT NULL AUTO_INCREMENT , 
    `GuestID` INT NOT NULL , 
    `Name` VARCHAR(80) NOT NULL , 
    `Price` DECIMAL (5,2) NOT NULL , PRIMARY KEY (`ID`)
    )";

  if ($conn->query($sql) === TRUE) {
    echo "Table Presents created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $conn->close();
}

public function alterGuestIDtoIndex($servername, $username, $password, $databasename) {
  // Create connection
  $conn = new mysqli($servername, $username, $password, $databasename);
  // Check connection
  $this->checkConnection($conn);

  // Create database
  $sql = "ALTER TABLE `presents` ADD INDEX(`GuestID`)";

  if ($conn->query($sql) === TRUE) {
    echo ("Index created successfully");
  } else {
    echo "Error creating database: " . $conn->error;
  }
  $conn->close();
  }

public function createForaignKeyPresents($servername, $username, $password, $databasename) {
  // Create connection
  $conn = new mysqli($servername, $username, $password, $databasename);
  // Check connection
  $this->checkConnection($conn);

  // Create database
  $sql = "ALTER TABLE `presents` 
  ADD FOREIGN KEY (`GuestID`) 
  REFERENCES `MyGuests`(`ID`) 
  ON DELETE RESTRICT ON UPDATE RESTRICT;  
  ";

  if ($conn->query($sql) === TRUE) {
    echo ("Foraign Key created successfully");
  } else {
    echo "Error creating database: " . $conn->error;
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


public function addPreparedStatmentGuests($servername, $username, $password, $databasename,$userString){
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

public function addPreparedStatmentPresents($servername, $username, $password, $databasename,$userStringPresents){
  $conn = new mysqli($servername, $username, $password, $databasename);

  // Check connection
  $this->checkConnection($conn);

  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO presents (guestid, name, price) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $guestid, $productname, $price);
  $userArrayPresents = explode('|', $userStringPresents);
  for($i=0; $i<count($userArrayPresents); $i += 3) {
      $guestid = $userArrayPresents[$i];
      $productname = $userArrayPresents[$i + 1];
      $price = $userArrayPresents[$i + 2];
      $stmt->execute();
      }
      echo ('created');
  $stmt->close();
  $conn->close();
}

public function selectAllGuests($servername, $username, $password, $databasename){
  // Create connection
  $conn = new mysqli($servername, $username, $password, $databasename);
  // Check connection
  $this->checkConnection($conn);

  $sql = "SELECT id, firstname, lastname, email FROM MyGuests";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " " . $row["email"]."<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
}

public function selectAllPresents($servername, $username, $password, $databasename){
  // Create connection
  $conn = new mysqli($servername, $username, $password, $databasename);
  // Check connection
  $this->checkConnection($conn);

  $sql = "SELECT id, guestid, name, price FROM Presents WHERE guestid = 1 || guestid = 3";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["guestid"]. 
      " " . $row["name"]. " " . $row["price"]."<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
}

public function selectAll($servername, $username, $password, $databasename){
  // Create connection
  $conn = new mysqli($servername, $username, $password, $databasename);
  // Check connection
  $this->checkConnection($conn);

  $sql = ("SELECT `myguests` . * AS `Guests`, `presents`.* AS `Presents`
  FROM `myguests`
      LEFT JOIN `presents` ON `presents`.`GuestID` = `myguests`.`id`");
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["guestid"]. 
      " " . $row["name"]. " " . $row["price"]. " - Name: " . $row["guestid"]. 
      " " . $row["name"]. " " . $row["price"]."<br>";
    }
  } else {
    echo "0 results";
  
}
  $conn->close();
}
}




// ALTER TABLE `presents` ADD INDEX(`GuestID`); 

// ALTER TABLE `presents` ADD FOREIGN KEY (`GuestID`) REFERENCES `myguests`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 

//

?>