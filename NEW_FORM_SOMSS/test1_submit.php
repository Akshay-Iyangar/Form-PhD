<?php
$servername = "localhost";
$username = "root";
$password = "ra!nbow";
$db_name = "Form_data_gumel";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$NAME=$_POST['name'];
$SECONDNAME=$_POST['second_name'];
$ROLLNO=$_POST['roll_no'];
$sql =$conn-> query("INSERT INTO Form_data_gumel.test (Name,SecondName,RollNo) VALUES ('$NAME','$SECONDNAME','$ROLLNO')");

mysqli_query($conn,$sql);

mysqli_close($conn);


?>