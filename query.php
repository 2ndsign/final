<?php
require_once("config.php");

// DB table to use
$table = 'employees';
 
// Table's primary key
$primaryKey = 'emp_no';
 
$columns = array(
    array('db' => 'emp_no', 'dt' => "emp_no"),
    array('db' =>  'name', 'dt' => "name"),
    array('db' =>  'phone_number', 'dt' => "phone_number"),
    array('db' =>  'arrival_time', 'dt' => "arrival_time"),
    array('db' =>  'departure_time', 'dt' => "departure_time"),
    array('db' =>  'reason', 'dt' => "reason"),
    array('db' =>  'createdAt', 'dt' => "createdAt")
);
 
$sql_details = array(
    'user' => $username,
    'pass' => $password,
    'db'   => $dbname,
    'host' => $servername
);
 
require('./ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>