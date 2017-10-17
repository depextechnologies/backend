<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

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
$service_name = mysqli_real_escape_string($link, $_REQUEST['service_name']);
$service_date = mysqli_real_escape_string($link, $_REQUEST['service_date']);
$assigned_to = mysqli_real_escape_string($link, $_REQUEST['assigned_to']);
 
// attempt insert query execution
$sql = "INSERT INTO Add_services (service_name, service_date, assigned_to) VALUES ('$service_name', '$service_date', '$assigned_to')";
if(mysqli_query($link, $sql)){
  
	$info = "This Service added successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 }
 
// close connection
mysqli_close($link); 

?>

    <!--- Navigation or header code  here -->
	 <?php  include 'header.php'?>
	  <!-- Side bar code was here -->
		  
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Add a Service</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate ng-submit="submit()" action="" method="post">
          <fieldset>
            <div class="form-group">
              <label class="control-label">Service Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" name="service_name"ng-model="model.name" required>
            </div>
           
          <div class="form-group">
              <label class="control-label normal">Date</label>
              <input type="date" class="form-control1 ng-invalid ng-invalid-required" name="service_date"ng-model="model.date" required>
            </div>
            
            <div class="form-group filled">
              <label class="control-label">Assigned to</label>
              <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" name="assigned_to"required=""><option value="? undefined:undefined ?"></option>
                <option value="Select a pirate">Mark</option>
                <option value="Monkey D. Luffy">David</option>
                <option value="Roronoa Zoro">Smith</option>
                <option value="Tony Tony Chopper">Markr</option>
                <option value="Nico Robin">Nico Robin</option>
                <option value="Bon Clay">Bon Clay</option>
              </select>
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
