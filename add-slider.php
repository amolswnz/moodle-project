<?php
$link = mysqli_connect('localhost', 'root', '', 'moodle');

if (isset($_POST['singlebutton']))
    {
    if ($link = mysqli_connect('localhost', 'root', '', 'moodle'))
        {

        // $filetemp=$_FILES['filebutton']['tmp_name'];

        $filename = $_FILES['filebutton']['name'];

        // $filename=$_FILES['filebutton']['tmp_name'];

        $path = 'img/slides/' . $filename;

        // move_uploaded_file($filename,$path);

        $file_path = $path . basename($_FILES['filebutton']['name']);
        if (move_uploaded_file($_FILES['filebutton']['tmp_name'], $path))
            {
            echo "records added in forlder and database successfully.";
            }
          else
            {
            echo "fail";
            }

        $sql = "insert into `mdl_slider` (`image`) values ('$path')";
        if (mysqli_query($link, $sql))
            {
            echo "records added successfully.";
            }
          else
            {
            echo "error: could not able to execute $sql. " . mysqli_error($link);
            }
        }

    // escape user inputs for security
    // attempt insert query execution

    }

// close connection

mysqli_close($link);
header("Location: edit-slider.php");
?>