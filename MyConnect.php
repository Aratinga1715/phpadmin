<?php
    function MyConnectOtvet()
    {
        global $db_host;      
        global $db_name;
        global $db_name_copy;
        global $db_username;
        global $db_password;
        global $ConnectOtvet;
        global $mysqli;

        $db_host       = 'localhost';
        $db_name       = 'asfacultet';
        $db_name_copy  = $db_name;
        $db_username   = 'root';
        $db_password   = '';
        $ConnectOtvet  = true;

	$mysqli = @new mysqli($db_host, $db_username, $db_password, $db_name);  

        if ( mysqli_connect_errno() ) 
           {
             $ConnectOtvet = false; 
             return false;
           }

        $mysqli->query('SET NAMES UTF8');
        return true;
    }
?>


