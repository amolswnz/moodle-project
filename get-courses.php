<?php 
include 'connect.php';
$sql = "SELECT fullname FROM mdl_course JOIN mdl_course_ext on mdl_course.id = mdl_course_ext.courseid";
$result1=$link->query($sql);
$data = array();
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {  
        // var_dump($row);
        array_push($data, $row['fullname']);    
    } 
}

echo json_encode($data);