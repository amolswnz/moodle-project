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
            <div class="col-md-12" style="padding: 10px 0;">
                <div style="float: left">
                    <img src="img/ntec-png.png" style="width:11%">
                </div>
                <div style="float: right">
                    <input class="typeahead" type="text" placeholder="Seach course ...">
                    <a href="http://localhost/moodle/login/index.php" style="margin-left: 20px">Sign in</a>
                    <a href="#" style="margin-left: 20px" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php 
                include 'connect.php';
                $sql1="SELECT image from mdl_slider";
                $result1=$link->query($sql1);
                $count =0;
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                        echo "<div class='item";
                        if($count++==0) 
                            echo " active ";
                        echo "'> <div class='fill' style='background-image:url(" . $row['image'] . ");'>
                                </div>
                            </div>"; 
                    }
                }
            ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
    <div class="container-fluid">
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Ntec Moodle
                </h1>
            </div>
            <h4>Popular Courses</h4>
             <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM mdl_course JOIN mdl_course_ext on mdl_course.id = mdl_course_ext.courseid ORDER BY RAND() DESC LIMIT 6";
                            $result = $link->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {  ?>
                                    <div class="col-md-2">
                                        <div class="panel panel-default" style="-webkit-box-shadow: -10px 10px 10px -8px rgba(0,0,0,0.75); -moz-box-shadow: -10px 10px 10px -8px rgba(0,0,0,0.75); box-shadow: -10px 10px 10px -8px rgba(0,0,0,0.75);">
                                                <img src="<?php echo $row['backgroundimage']?>" class="img-responsive">
                                            <div class="panel-body">
                                                <a href="<?php echo 'http://localhost/moodle/course/view.php?id=$row[id]'?>"><?php echo "$row[fullname] <br>($row[shortname])"; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                }                    
                            }
                            else {
                                echo "NO COURSES FOUND";
                            }
                            $link->close();
                        ?>
           
        </div>
        <!-- /.row -->
    </div>
    <hr>
    <!-- Page Content -->
    <div class="container-fluid">
        <!-- Portfolio Section -->
        <div class="row">
<!--             <div class="col-lg-12">
                <h2 class="page-header">Featured Courses</h2>
            </div>
 -->                    <h4>New Courses</h4>

            <?php
                include 'connect.php';
                $sql = "SELECT * FROM mdl_course JOIN mdl_course_ext on mdl_course.id = mdl_course_ext.courseid ORDER BY mdl_course.id DESC LIMIT 6";
                $sql1="SELECT image from mdl-slider";
                $result1=$link->query($sql1);
                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {?>
                        <div class="col-md-4 col-sm-6">
                        <div class="thumbnail" style="-webkit-box-shadow: 10px 10px 10px -8px rgba(0,0,0,0.75); -moz-box-shadow: 10px 10px 10px -8px rgba(0,0,0,0.75); box-shadow: 10px 10px 10px -8px rgba(0,0,0,0.75); ">
                            <div class="caption">
                                <h4><?php echo  "$row[fullname] ($row[shortname])"; ?></h4>
                            </div>
                            <a href="<?php echo "http://localhost/moodle/course/view.php?id=$row[id]"?>">
                                <img class="img-portfolio img-hover" style="width:100%" src="<?php echo $row['backgroundimage'] ?>" alt="">
                            </a>
                        </div></div>
                        <?php 
                    }                    
                }
                else {
                    echo "NO COURSES FOUND";
                }
                $link->close();
            ?>
        </div>
        <!-- /.row -->
        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"> Featured course </h2>
            </div>
            <div class="col-md-6">
                <?php 
                include 'connect.php';
                $sql1="SELECT * FROM mdl_course_ext ORDER BY RAND() LIMIT 1";
                $id = 0;
                $result1=$link->query($sql1);
                $count =0;
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                        $query = parse_url($row['videolink'], PHP_URL_QUERY);
                        parse_str($query, $params);
                        $test = $params['v'];
                        echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$test' frameborder='0' allowfullscreen></iframe>";
                        $id = $row['courseid'];
                    }
                }
                ?>
            </div>
            <div class="col-md-6">
                                                    <div class="panel panel-default">
                                            <div class="panel-body">

                <?php 
                include 'connect.php';
                $sql1="SELECT * FROM mdl_course WHERE id = '$id' LIMIT 1";
                $result1=$link->query($sql1);
                $count =0;
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                        echo "<h4>$row[fullname] ($row[shortname])</h4>";
                        echo "<h5>Summary of course </h5>";
                        echo $row['summary'];
                    }
                }
                ?>
                </div></div>
            </div>
            <!-- <div class="clearfix"></div> -->
            <div class="clearfix"></div>
            <div class="padd"></div>
            <div class="col-md-12" style="margin:0">
                <div class="alert alert-warning text-center" role="alert">
                    <a href="http://localhost/moodle/" class="btn btn-success">Discover more courses</a>
                </div>
            </div>

            <div class="col-md-12">
                <h4 class='text-center'>Commerical Panel</h4>
                <a href="http://edx.org" target="_blank"><img src="img/banner.jpeg" class='col-md-12 img-responsive' style="padding-bottom: 10px"></a>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <?php include 'ntec-footer.php' ?>
    <!-- <div class="container-fluid"> -->
        <!-- <div class='row'> -->
        <!-- </div> -->
    <!-- </div> -->
        <?php include 'footer.php' ?>

    <!-- /.container-fluid -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/typeahead.bundle.js"></script>
    <!-- Script to Activate the Carousel -->
<script>
$('.carousel').carousel({   interval: 2000 });

var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;
    // an array that will be populated with substring matches
    matches = [];
    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');
    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });
    cb(matches);
  };
};

$(function() {
    var states;
    $.ajax({
        url: 'get-courses.php',
        type: 'POST',
        dataType: 'json'
        // ,
        // data: {param1: 'value1'},
    })
    .done(function(data) {
        console.log("success");
        states = data;
        $('.typeahead').typeahead(  { hint: true, highlight: true, minLength: 1 },
                            { name: 'states', source: substringMatcher(states) });

    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
});
</script>
</body>
</html>