<?php
$serverName = "TN\TNlap"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"BookStore");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
?>