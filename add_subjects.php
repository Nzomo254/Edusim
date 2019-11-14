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
	  						<h6><i class="glyphicon glyphicon-calendar"></i>  <b>SUBJECTS</b></h6> 
	  					</div>
		  			</div>  			
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">
	  						<h6><b>ADD SUBJECT</b></h6> 
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
                      
                      $subject_name = ($_POST['subject_name']);
                      $subject_status = ($_POST['subject_status']);
                      
                      


                        if (!empty($subject_name) && !empty($subject_status))

                          {
                                       //Connect to the database
                                       $tt = mysqli_connect('localhost', 'root', '', 'test');
                                       $query = "INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_status`) VALUES (NULL, '$subject_name', '$subject_status')";
                                         mysqli_query($tt, $query);
                                             // Confirm success with the user
                                             
                                              echo '<div class="text-success"><strong><h6>THE RECORD WAS UPDATED SUCCESFULLY</strong></h6></strong></div>';
                                             
                            }
                          else 
                            {
                              echo '<div class="text-error"><strong><h6><i class="glyphicon glyphicon-remove-circle">&emsp;</i>OPPS! SOMETHING WENT WRONG</strong></h6></strong></div>';
                            }
                                // Clear the number data to clear the form
                                          $subject_name = '';
                                          $status = '';
                                          
                      echo'<div class="text-warning"><strong><h6><a href="manage_subjects.php"></a></h6></strong></div>';
                                

                    }
          ?>
				<div class="panel-body">

                        <h6>
                            
                        <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                <label for="subject_name" class="col-sm-2 control-label">Subject Name</label>
                                <div class="col-sm-8">
                                <input type="text"class="form-control" id="subject_name" name="subject_name" value="<?php if (!empty($subject_name)) echo $subject_name; ?>" />
                                </div>
                               </div>
                               <div class="form-group">
                                <label class="col-sm-2 control-label" for="subject_status">Status:</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="subject_status" name="subject_status" value="<?php if (!empty($subject_status)) echo $subject_status; ?>" style="text-align: left;" />
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
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>