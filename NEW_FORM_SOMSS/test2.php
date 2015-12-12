<html>
<body>
	<form>
		Name:<input type="text" class="first_name" id="first_name" value="<?php echo $NAME; ?>">
		Second Name:<input type="text" class="second_name" id="second_name" value="iyangar">
		Roll Number:<input type="text" class="roll_no" id="roll_no" value="7">
		<input type="submit" class="submit">
	</form>
</body>
</html>
<?php 
$NAME="akshay";
echo $NAME;

echo '<html>
<body>
	<form>
		Name:<input type="text" class="first_name" id="first_name" value='.$NAME.'>
		Second Name:<input type="text" class="second_name" id="second_name" value="iyangar">
		Roll Number:<input type="text" class="roll_no" id="roll_no" value="7">
		<input type="submit" class="submit">
	</form>
</body>
</html>';


?>