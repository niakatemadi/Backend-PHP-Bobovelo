<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
    include('db_connect.php');
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
        global $conn;
        $query = "SELECT * FROM service";
        
        $response = array();
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            $response[] = $row;
        }
        //header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    };
?>