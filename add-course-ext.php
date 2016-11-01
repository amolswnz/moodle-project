<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
var_dump($_POST);
$link = mysqli_connect("localhost", "root", "", "moodle");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$video_link = mysqli_real_escape_string($link, $_POST['vediolink']);
 
//image upload code
         $filename=$_FILES['filebutton']['name'];
        $path = 'img/courses/'.$filename;
         $file_path = $path.basename( $_FILES['filebutton']['name']); 
if(move_uploaded_file($_FILES['filebutton']['tmp_name'], $path)) 
    {
        echo "records added in forlder and database successfully.";
    } else
    {
        echo "fail";
    }   


$pro_mo = mysqli_real_escape_string($link, $_POST['promo']);

$howto_pass = mysqli_real_escape_string($link, $_POST['howtopass']);
$ow_ner = mysqli_real_escape_string($link, $_POST['owner']);


$quali_fication = mysqli_real_escape_string($link, $_POST['qualification']);

$cate_gory = mysqli_real_escape_string($link, $_POST['category']);

$de_partment = mysqli_real_escape_string($link, $_POST['department']);

$level_ofstudy = mysqli_real_escape_string($link, $_POST['levelofstudy']);

$inst_ruction = mysqli_real_escape_string($link, $_POST['instruction']);

$related_courseid = mysqli_real_escape_string($link, $_POST['relatedcourseid']);

$des_cription = mysqli_real_escape_string($link, $_POST['description']);

$object_ives = mysqli_real_escape_string($link, $_POST['objectives']);

$out_comes = mysqli_real_escape_string($link, $_POST['outcomes']);

$courseid = mysqli_real_escape_string($link, $_POST['courseid']);
// attempt insert query execution
$sql = "INSERT 
            INTO `mdl_course_ext` (courseid, videolink, backgroundimage, promo, howtopass,
                         owner, qualification, category, department, levelofstudy, 
                         instruction, relatedcourseid, description, objectives, outcomes) 
            VALUES ('$courseid', '$video_link', '$path', '$pro_mo', '$howto_pass', 
                    '$ow_ner', '$quali_fication', '$cate_gory', '$de_partment', '$level_ofstudy', 
                    '$inst_ruction', '$related_courseid', '$des_cription', '$object_ives', '$out_comes')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);

header("Location: course-ext.php?output=success");
