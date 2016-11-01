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
            <div class="padd"></div>
            <?php 
                if(isset($_GET['output'])) {
                    if(isset($_GET['output'])=='success') ?>
                    <div class="alert alert-success" role="alert"> <strong>Well done!</strong> Course deatails added successfully. </div>
            <?php 
                }
             ?>
            <div class="padd"></div>
            <form action="add-course-ext.php" method="post" enctype="multipart/form-data" id="js-upload-form">
                <div class="form-group">
                    <label class="control-label col-sm-2" >Course select</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <?php
                                include 'connect.php';
                                $sql = "SELECT * FROM mdl_course";
                                $result=$link->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {  ?>
                                        <label>
                                        <input type="radio" name="courseid" id="courseid" value="<?php echo $row['id'] ?>" checked>
                                        <?php echo  "$row[fullname] ($row[shortname])"; ?>
                                        </label>
                                        <?php 
                                    }                    
                                }
                                else {
                                    echo "NO COURSES FOUND";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Video Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="videolink" name="vediolink" placeholder="Video Test">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Background Image </label>
                    <div class="col-sm-10">
                        <input  class="form-control" id="filebutton" name="filebutton" class="input-file" type="file">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Promo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Promo" name="promo" placeholder="Promo">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >How To Pass </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="howtopass" name="howtopass" placeholder="Howtopass">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Owner  </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="owner" name="owner" placeholder="Owner">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Qualification </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Category </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Category">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Department</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="department" name="department" placeholder="department">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Level of Study  </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="levelofstudy">
                            <optgroup label="Based on qualification">
                                <option>Diploma</option>
                                <option>Cert</option>
                                <option>Degree</option>
                            </optgroup>
                            <optgroup label="Based on Nat Framework">
                                <option>3</option>
                                <option>5</option>
                                <option>7</option>
                            </optgroup>
                            <optgroup label="Based on level of skill acquired">
                                <option>Basic</option>
                                <option>Intermediate</option>
                                <option>Advanced</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Instructor </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="instruction" name="instruction" placeholder="Instruction">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Related Course ID </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="relatedcourseid">
                            <?php 
                                $sql = "SELECT * FROM mdl_course";
                                $result=$link->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {  ?>
                            <option value="<?php echo $row['id'] ?>">
                                <?php echo  "$row[fullname] ($row[shortname])"; ?>
                            </option>
                            <?php 
                                }                    
                                }
                                ?>
                            <option>NO related course</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="description">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Objectives</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="objectives" name="objectives"placeholder="objectives">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Outcomes</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="outcomes" name="outcomes" placeholder="Outcomes">
                    </div>
                </div>
                <br>
                <hr>
                <div class="control-group">
                    <label class="control-label col-sm-2" ></label>
                    <div class="col-sm-2">
                        <button type="Submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
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