<?php 

include '.\..\16_10_2023\DB.php';

    $servername = 'localhost';
    $username = "Sepax";
    $password = '123';
    $databasename = 'myDBGuests';
    $tablename = 'MyGuests';
    $userString = 'Herbert|Goppel|hegob@fhg.at|Philipp|Tost|phito@gmail.at|Richard|Werner|Riwe@yahoo.de';

    $db = new DB($servername, $username, $password, $databasename);


    //$db->createNewDatabase($servername, $username, $password, $databasename);

    //$db->createTable($servername, $username, $password, $databasename);

    //$db->insertData($servername, $username, $password, $databasename, 'MyGuests', 'Franzi', 'Huber', 'Frahub@gmail.com');

    //$db->addPreparedStatment($servername, $username, $password, $databasename);

    $db->addPreparedStatment($servername, $username, $password, $databasename,$userString);
    
?>




