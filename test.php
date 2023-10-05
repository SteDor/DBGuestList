<?php 
    include '.\..\Database_05_10_2023\Database.php';

    $servername = 'localhost';
    $username = "Sepax";
    $password = '123';
    $databasename = 'PartyDB';

    $db = new Database($servername , $username, $password, $databasename);

    $db->createDatabase($servername, $username, $password, $databasename);

    echo ('Server: ' . $servername . '<br>User: ' . $username . '<br> PW: ' 
        . $password . '<br>Database Name: ' . $databasename);

?>
