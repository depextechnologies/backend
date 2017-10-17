


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "services");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 if (isset($_POST['submit'])) {
 
// Escape user inputs for security

$user_n = mysqli_real_escape_string($link, $_REQUEST['user_name']);
$service_cat = mysqli_real_escape_string($link, $_REQUEST['service_category']);
$user_d = mysqli_real_escape_string($link, $_REQUEST['user_date']);
$user_l = mysqli_real_escape_string($link, $_REQUEST['user_location']);
$st = mysqli_real_escape_string($link, $_REQUEST['status']);

// attempt insert query execution
$sql = "INSERT INTO Add_user (user_name, service_category, user_date, user_location, status) VALUES ('$user_n','$service_cat','$user_d','$user_l','$st')";
if(mysqli_query($link, $sql)){
  
$info = "User Add Successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
 
// close connection
mysqli_close($link); 

?>
	<!--- Navigation or header code  here -->
	 <?php  include 'header.php'?>
	   <!-- end header-->   
	   
	   
   <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Add a User</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate ng-submit="submit()"  name="adduser" action="add-user.php" method="post">
          <fieldset> 
            <div class="form-group">
              <label class="control-label"> User Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" name="user_name" ng-model="model.name" required>
			 <span style="color:red;"> <?php  $name_error;?> </span>
            </div>
			
		   <div class="form-group filled">
              <label class="control-label"> Service Category</label>
              <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" name="service_category"required=""><option value="? undefined:undefined ?"> </option>
                <option value="Plumber">Plumber</option>
                <option value="Electrician">Electrician</option>
                <option value="Laundry">Laundry</option>
              
              </select>
            </div> 
          <div class="form-group">
              <label class="control-label normal">Date</label>
              <input type="date" class="form-control1 ng-invalid ng-invalid-required" name="user_date"ng-model="model.date" required>
           </div>
            
			 <div class="form-group">
              <label class="control-label"> Location</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" name="user_location"ng-model="model.location" required>
            </div>
			
			 <div class="form-group">
              <label class="control-label">Status</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" name="status"ng-model="model.status" required>
            </div>
           
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </fieldset>
        </form>
		<?php if (!empty($info)) { ?>
		 <p style="text-align:center; color:#00c887;"><?php echo $info; ?></p>
		 
		 <?php } ?>
      </div>
    </div>
	</div>
	   
	   
	     <!--- footer-->
		 <?php include 'footer.php';?> 
		 
		 <!---->
		 
		 
		 