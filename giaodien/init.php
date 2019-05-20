<?php  
/* Specify the server and connection string attributes. */  
$serverName = "DESKTOP-AFBFSBJ\HUYDB";  
  
 
$uid = "test";  
$pwd = "123456";  
$connectionInfo = array( "UID"=>$uid,  
                         "PWD"=>$pwd,  
                         "Database"=>"ass2",
                         "CharacterSet" => "UTF-8"
                        );  
  

$conn = sqlsrv_connect( $serverName, $connectionInfo);  
date_default_timezone_set('Asia/Ho_Chi_Minh');
//echo "Connect SQL SERVER DB successfully.";
?> 