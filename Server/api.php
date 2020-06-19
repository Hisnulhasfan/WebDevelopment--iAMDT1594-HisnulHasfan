<?php
require 'db.php';

if(!empty($_POST) && count($_POST) == 4){
    extract($_POST);
    $fullname = $f_name . ' ' . $l_name;   
    $sql = "INSERT INTO testimonial (fullname, age, college) VALUES (?,?,?)";
    $inserted_id = $db->prepare($sql)->execute([$fullname,$age,$college]);
    $get_record = $db->query("SELECT * FROM testimonial WHERE id = $inserted_id")->fetch();
    if($inserted_id && $get_record){
        echo json_encode(['error' => false, 'message' => $get_record]);
    }else{
        echo json_encode(['error' => true, 'message' => 'Error found while connecting database!']);
    }
}else{
    echo json_encode(['error' => true, 'message' => 'Required field(s) is missing!']);
}

?>