<?php
error_reporting(E_ALL ^ E_NOTICE | E_STRICT | E_WARNING);

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'hasfan';
$options = [
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
if(in_array('PDO', get_loaded_extensions())){    
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$database",$username,$password,$options);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}else{
    die('PDO extension not loaded!');
}

function _e($data){
    echo '<pre>';
    print_r($data);
}