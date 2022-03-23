<?php 
    include('db_connect.php');
    include('tryconnect.php');
    $_request_method=$_SERVER["REQUEST_METHOD"];

    switch($_request_method)
    {
        case 'GET':
            if('GET')
            {
                
                getUserData();
            }
            else
            {
                echo 'Entrer une bonne method';
            }
            break;
          default:
          header("HTTP/1.0 405 Method Not Allowed");
          break;
    };

    function getUserData()
    {
        
        //header('Content-Type: application/json');
        echo json_encode($session, JSON_PRETTY_PRINT);
    };
?>