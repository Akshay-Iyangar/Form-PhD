
<?php

echo'<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src = "./student_id_check.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<form class="form-horizontal" method="POST">
<fieldset>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="student_form_details">Previously submitted form?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="student_form_details-0">
      <input type="radio" name="student_form_details" id="student_form_details-0" value="1" onclick="Formsubmit()">
      Yes
    </label>
	</div>
  <div class="radio">
    <label for="student_form_details-1">
      <input type="radio" name="student_form_details" id="student_form_details-1" value="2" onclick="Formsubmit()">
      No
    </label>
	</div>
  </div>
</div>

<!-- Search input-->
<div class="form-group" id="form_student_id" style="display:none">
  <label class="col-md-4 control-label" for="asu_id">ASU ID</label>
  <div class="col-md-4">
    <input id="asu_id" name="asu_id" type="search" placeholder="" class="form-control input-md" required="">
    <p class="help-block">Enter the ASU ID</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Submit</label>
  <div class="col-md-4">
    <button class="submit" name="submit" class="btn btn-default" >Button</button>
  </div>
</div>


</fieldset>
</form>

</html>
';
if(isset($_POST['submit']))
{
	print_r(isset($_POST['submit']));
	include('connect.php');
	$ID= $_POST['asu_id'];
	//print_r($ID);
	$sql = "SELECT ASU_ID from Form_data_gumel.form where ASU_ID='$ID'";
	$retval = mysqli_query($conn,$sql);
	if (!$retval) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
	{
		//print_r($row['ASU_ID']);
		if($row['ASU_ID']==$ID)
		{
			//print_r($row['ASU_ID']);
			echo'<script>window.location="https://pi.asu.edu/somss/student_form1.php?ID='.$ID.'"</script>';
		}
		else
		{
			echo'alert("The entered ASU ID does not match any previous records")';
		}
	}
}

?>