<?php 
    include '.\..\Database_05_10_2023\Database.php';

    $servername = 'localhost';
    $username = "Sepax";
    $password = '123';
    $databasename = 'PartyDB';

    $db = new Database($servername , $username, $password, $databasename);

    echo ('Server: ' . $servername . '<br>User: ' . $username . '<br> PW: ' 
        . $password . '<br>Database Name: ' . $databasename . '<br>');

    //create DB test
        // $db->createDatabase($servername, $username, $password, $databasename);
    //create Table
    // Tabelname has to be one Word without space 
        // $db->createTable($servername , $username, $password, $databasename, 'Guest_List'); 
    // add columns with name of table and anarray for the SQL statement(Name of table | Name of column where to add new column | Type of column)
    $db-> addColumns($servername , $username, $password, $databasename, 'Guest_List', 'Kurt|ID|INT');


?>
