<?php 

include '.\..\Guest_DB_Test\DB.php';

    $servername = 'localhost';
    $username = "Sepax";
    $password = '123';
    $databasename = 'myDBGuests';
    $tablename = 'MyGuests';
    $userString = 'Herbert|Goppel|hegob@fhg.at|Philipp|Tost|phito@gmail.at|Richard|Werner|Riwe@yahoo.de';
    $userStringPresents = '1|Rose|2.50|1|Praline|5.00|2|Brot|4.50|3|Nelke|3.10|3|Hut|25.00';

    $db = new DB($servername, $username, $password, $databasename);


    //$db->createNewDatabase($servername, $username, $password, $databasename);

    //$db->createTableGuests($servername, $username, $password, $databasename);

    //$db->insertData($servername, $username, $password, $databasename, 'MyGuests', 'Franzi', 'Huber', 'Frahub@gmail.com');

    //$db->addPreparedStatmentGuests($servername, $username, $password, $databasename,$userString);
    
    //$db->createTablePresents($servername, $username, $password, $databasename);

    //$db->alterGuestIDtoIndex($servername, $username, $password, $databasename);

    //$db->createForaignKeyPresents($servername, $username, $password, $databasename);

    //$db->addPreparedStatmentPresents($servername, $username, $password, $databasename,$userStringPresents);

    //$db->selectAllGuests($servername, $username, $password, $databasename);

    //$db->selectAllPresents($servername, $username, $password, $databasename);

    $db->selectAll($servername, $username, $password, $databasename);



?>




