<?php 
    include '.\..\Database_05_10_2023\Database.php';

    $servername = 'localhost';
    $username = "Sepax";
    $password = '123';
    $databasename = 'PartyDB';

    $db = new Database('localhost', 'Sepax', '123', 'PartyDB');

    $db->createDatabase($servername, $username, $password, $databasename);

?>
