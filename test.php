<?php 
    include '.\..\Database_05_10_2023\Database.php';

    $servername = 'localhost';
    $username = "Sepax";
    $password = '123';
    $databasename = 'TestDB';
    $tablename = 'Test';
    $columnstring = 'Kilo|INT|Nomen|VARCHAR(60)|Text|TEXT';

    $db = new Database($servername , $username, $password, $databasename);
    

    echo ('Server: ' . $servername . '<br>User: ' . $username . '<br> PW: ' 
        . $password . '<br>Database Name: ' . $databasename . '<br>');



    // Typs for Test - INT - VARCHAR(60) - DATE - TEXT


    //create DB test
    // $db->createDatabase($servername, $username, $password, $databasename);

    //create Table
    // Tabelname has to be one Word without space 
    //$db->createTableWithKey($servername , $username, $password, $databasename, 'Test2'); 
    
    // add columns with name of table and anarray for the SQL statement(Name of table | Name of column where to add new column | Type of column)
    // $db-> addColumn($servername , $username, $password, $databasename, 'Guest_List', 'Kurt|ID|INT');

    // add multipl columns to an existing table, 
    // 'ID' = last column to add new
    //$db-> addColumns($servername , $username, $password, $databasename, $tablename, 'ID', $columnstring);

    // create Table with Primary Key and columns
    $db->createTable($servername, $username, $password, $databasename, $tablename, $columnstring);


?>
