<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ntec Moodle</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php include 'nav.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Current images</h4>
                <?php 
                    include 'connect.php';
                    $sql1="SELECT image from mdl_slider";
                    $result1=$link->query($sql1);
                    if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                        echo "<img src='$row[image]' class='col-md-4'>";
                    }
                }
                ?>
                <div class="clearfix"></div>
                <div class="padd"> </div>
                <form action="add-slider.php" method="post" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label col-sm-2" for="filebutton">Image</label>
                        <div class="col-sm-10">
                            <input id="filebutton" name="filebutton" class="input-file" type="file">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label col-sm-2" ></label>
                        <div class="col-sm-2">
                            <button id="singlebutton" name="singlebutton" class="btn btn-info">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php' ?>
    
<!-- /.container-fluid -->
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>