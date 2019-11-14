<?php
  // Insert the page header
  $page_title = 'Edusim - Category';
  require_once('header.php');
  require_once('admin_db.php');
?>

          <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
            </div>          
            <div class="row">
                <div class="col-md-12 panel-warning">
                    <div class="content-box-header panel-heading">
                        <div class="panel-title ">
                            <h6><i class="glyphicon glyphicon-pencil"></i><b> EXAMS</b></h6> 
                        </div>
                    </div>              
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 panel-warning">
                    <div class="content-box-header panel-heading">
                        <div class="panel-title ">
                            <h6><b>ADD EXAM</b></h6> 
                        </div>
                    </div>              
                </div>
            </div>

            <div class="content-box-large">
                                <?php
                                  //Script - Store Subject Information

                                  if (isset($_POST['submit'])) 
                                  {

                                    // Grab the data from post
                                    
                                    $category_id = ($_POST['category_id']);
                                    $subject_id = ($_POST['subject_id']);
                                    $exam_name = ($_POST['exam_name']);
                                    $duration = ($_POST['duration']);
                                    $grade_level = ($_POST['grade_level']);
                                    $exam_status = ($_POST['exam_status']);
                                    
                                    


                                      if (!empty($category_id) && !empty($subject_id) && !empty($exam_name) && !empty($duration) && !empty($grade_level) && !empty($exam_status))

                                        {
                                                     //Connect to the database
                                                     $tt = mysqli_connect('localhost', 'root', '', 'test');
                                                     $query = "INSERT INTO `exams` (`exam_id`, `category_id`, `subject_id`, `exam_name`, `duration`, `grade_level`, `exam_status`) VALUES (NULL, '$category_id', '$subject_id', '$exam_name', '$duration', '$grade_level', '$exam_status')";    mysqli_query($tt, $query);
                                                           // Confirm success with the user
                                                           
                                                            echo '<div class="text-success"><strong><h6>THE RECORD WAS UPDATED SUCCESFULLY</strong></h6></strong></div>';
                                                           
                                          }
                                        else 
                                          {
                                            echo '<div class="text-error"><strong><h6><i class="glyphicon glyphicon-remove-circle">&emsp;</i>OPPS! SOMETHING WENT WRONG</strong></h6></strong></div>';
                                          }
                                              // Clear the number data to clear the form
                                                        $category_id = '';
                                                        $category_type = '';
                                                        $category_name = '';
                                                        $start_date = '';
                                                        $end_date = '';
                                                        $grade_level = '';
                                                        $category_status = '';

                                  }
                                 ?>
                <div class="panel-body">
                <h6>
                            
                        <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                <label for="category_id" class="col-sm-2 control-label">Category Name</label>
                                <div class="col-sm-8">
                                <select class="form-control" for="category_id" name="category_id" id="category_id" value="<?php if (!empty($category_id)) echo $category_id; ?>">
                                                  <option value="">-- Select Exam Category -- </option>
                                                  <?php
                                                    $dbc = mysqli_connect('localhost', 'root', '', 'test');
                                                    $category_name = $row10['category_name'];
                                                    $query = "SELECT * FROM `category`";
                                                    $data = mysqli_query($dbc, $query)
                                                            or die(mysqli_error());
                                                     if ($data != 0) 
                                                    {
                                                        
                                                    $a = mysqli_num_rows($data);
                                                        for ($i=0; $i<$a; $i++) 
                                                        {
                                                            $row = mysqli_fetch_array($data);
                                                            $category_name = $row['category_name'];
                                                            $category_id = $row["category_id"];

                                                            echo '<option value="' .$category_id. '">' .$category_name. '</option>';
                                                        }
                                                    }
                                                  ?>                  
                                </select>
                                </div>
                                </div>
                                   <div class="form-group">
                                   <label for="subject_id" class="col-sm-2 control-label" >Subject</label>
                                   <div class="col-sm-8">
                                   <select class="form-control" for="subject_id" name="subject_id" id="subject_id" value="<?php if (!empty($subject_id)) echo $subject_id; ?>">
                                                  <option value="">-- Select Subject Type -- </option>
                                                  <?php
                                                    $dbc_sub = mysqli_connect('localhost', 'root', '', 'test');
                                                    $query_subject = "SELECT * FROM `subjects`";
                                                    $data_subject = mysqli_query($dbc_sub, $query_subject)
                                                                    or die(mysqli_error());
                                                    if ($data_subject != 0) 
                                                    {
                                                        
                                                    $b = mysqli_num_rows($data_subject);
                                                        for ($j=0; $j<$b; $j++) 
                                                        {
                                                            $row_sub = mysqli_fetch_array($data_subject);
                                                            $subject_name = $row_sub['subject_name'];
                                                            $subject_id = $row_sub["subject_id"];

                                                            echo '<option value="' .$subject_id. '">' .$subject_name. '</option>';
                                                        }
                                                    }
                                                  ?>                 
                                   </select>
                                   </div>
                                   </div>
                                <div class="form-group">
                                <label for="exam_name" class="col-sm-2 control-label">Exam Name</label>
                                <div class="col-sm-8">
                                <input type="text"class="form-control" id="exam_name" name="exam_name" value="<?php if (!empty($exam_name)) echo $exam_name; ?>" />
                                </div>
                                </div>
                               <div class="form-group">
                                <label for="duration" class="col-sm-2 control-label">Duration</label>
                                <div class="col-sm-8">
                                <input type="text"class="form-control" id="duration" name="duration" value="<?php if (!empty($duration)) echo $duration; ?>" />
                                </div>
                               </div>
                               <div class="form-group">
                                <label for="grade_level" class="col-sm-2 control-label" >Grade Level</label>
                                   <div class="col-sm-8">
                                   <select class="form-control" for="grade_level" name="grade_level" id="grade_level" value="<?php if (!empty($grade_level)) echo $grade_level; ?>">
                                                  <option value="">-- Select Grade Level -- </option>
                                                  <option value="VI">Grade VI</option>
                                                  <option value="VII">Grade VII</option>
                                                  <option value="VIII">Grade VIII</option>                 
                                   </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label" for="exam_status">Status:</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="exam_status" name="exam_status" value="<?php if (!empty($exam_status)) echo $exam_status; ?>" style="text-align: left;" />
                                </div>
                              </div>
                             <div class="form-group">
                             </div>
                              <br>
                              <div style="text-align: center;">
                              <input style="color: white; font-weight: bold;" type="submit" value="SUBMIT" class="btn btn-success" name="submit" />
                              </div>
                         </form>
                         </h6>                        
                </div>              
          </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>