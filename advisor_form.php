<html>
<title>Advisor Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.8.3.js"></script>
  <script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="jqmeter.min.js"></script>

<style>
.approval{
    border-radius: 50px;
    height: 30px;
    width: 30px;
    background:red;
    margin:auto; 
}
.approval_green{
    border-radius: 50px;
    height: 30px;
    width: 30px;
    background:green;
    vertical-align:middle;
    float:center;

}

.CSSTableGenerator {
        margin:0px;padding:0px;
        width:auto;
        box-shadow: 10px 10px 5px #888888;
        border:1px solid #000000;
        float:center;
}.CSSTableGenerator table{
    border-collapse: collapse;
	table-layout:auto;
        border-spacing: 0;
        width:100%;
        height:auto;
        margin:0px;padding:0px;
}.CSSTableGenerator tr:nth-child(odd){ background-color:#b2b2b2; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
        vertical-align:middle;
        border:1px solid #000000;
        border-width:0px 1px 1px 0px;
        text-align:left;
        padding:6px;
        font-size:15px;
        font-family:Arial;
        font-weight:normal;
        color:#000000;
}.CSSTableGenerator tr:last-child td{
        border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
        border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
        border-width:0px 0px 0px 0px;
}.CSSTableGenerator tr:first-child td{
                background:-o-linear-gradient(bottom, #bf0000 5%, #bf5f00 100%);        background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #bf0000), color-stop(1, #bf5f00) );
        background:-moz-linear-gradient( center top, #bf0000 5%, #bf5f00 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#bf0000", endColorstr="#bf5f00");      background: -o-linear-gradient(top,#bf0000,bf5f00);

        background-color:#bf0000;
        border:0px solid #000000;
        text-align:center;
        border-width:0px 0px 1px 1px;
        font-size:14px;
        font-family:Arial;
        font-weight:bold;
        color:#ffffff;
}
</style>
<body>

<div class="container">

</form>
</div>

</body>




<?php


//connect to database
include('connect.php');

$ADVISOR= $_POST['Admin_Advisor'];
        $sql = "SELECT ASU_ID,First_Name,Second_Name,Adivisory_Committee,Advisor_Team,Approved,Main_Advisor_Flag,File_Name from Form_data_gumel.somss where Admin_Advisor like '%$ADVISOR%'";

$retval = mysqli_query($conn,$sql);
        if (!$retval) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

echo "<div class='CSSTableGenerator'><table><tr><td>First Name</td><td>Last Name</td><td>ASU ID</td><td>ADVISORS PRESENT</td><td>Student IPOS</td><td>Advisor Approval %</td><td>Main Advisor Approval</td><td>Director Approval</td></tr>";
$count=1;
while($row = mysqli_fetch_array($retval, MYSQL_NUM))
{
//$remaining=array_diff($row[4],$row[5]);
//$remaining=json_decode($remaining);
//print_r($remaining);


//$total_count=count($row[4]);
//$total_approved=count($row[5]);
//print_r($total_count);


$row[4]=json_decode($row[4]);//total count
$row[5]=json_decode($row[5]);
$total_count=count($row[4]);
$total_approved=count($row[5]);
$remaining=array_diff($row[4],$row[5]);
//$remaining=json_decode($remaining);
$remaining_advisor=implode("<br>",$remaining);
$remaining_tooltip=implode("\n",$remaining);
$Total=implode("<br>",$row[4]);
$Approved=implode("<br>",$row[5]);
$tooltip_display=implode("\n",$row[5]);
//$remaining=array_diff($row[4],$row[5]);
$mail_flag=0;
if($row[3]==="1")
{
$advisor_formed="YES";
echo"<tr><td>{$row[1]}</td><td>{$row[2]}</td><td><a href=main_advisor_withadvisor.php?ASU_ID=$row[0]&index=$total_count>{$row[0]}</a></td><td>$advisor_formed</td><td><a href=./uploads/$row[7]>IPOS</a></td><td><div class='progressbar$count' title='Approved:$tooltip_display\nPending:$remaining_tooltip'></div></td><td><div class='approval' id='approval$count' title='The Form Is Not Yet Approved By The Main Advisor'></div></td><td></td></tr>";
}
else if ($row[3]==="0")
{
$advisor_formed="NO";

echo"<tr><td>{$row[1]}</td><td>{$row[2]}</td><td><a href=main_advisor_noadvisor.php?ASU_ID=$row[0]&index=$total_count>{$row[0]}</a></td><td>$advisor_formed</td><td><a href=./uploads/$row[7]>IPOS</a></td><td><div class='progressbar$count' title='Approved:$tooltip_display\nPending:$remaining_tooltip'></div></td><td><div class='approval' id='approval$count' title='The Form Is Not Yet Approved By The Main Advisor'></div></td><td></td></tr>";
}
else if ($row[3]==='2')
{
$advisor_formed="Allocated By Graduate Co-ordinator";

echo"<tr><td>{$row[1]}</td><td>{$row[2]}</td><td><a href=main_advisor_withadvisor.php?ASU_ID=$row[0]&index=$total_count>{$row[0]}</a></td><td>$advisor_formed</td><td><a href=./uploads/$row[7]>IPOS</a></td><td><div class='progressbar$count' title='Approved:$tooltip_display\nPending:$remaining_tooltip'></div></td><td><div class='approval' id='approval$count' title='The Form Is Not Yet Approved By The Main Advisor'></div></td><td></td></tr>";

}

echo"
<script>

        var progressbar = $( '.progressbar$count' );
	progressbar.jQMeter({
    goal:'$total_count',
    raised:'$total_approved',
    meterOrientation:'horizontal',
    width:'120px',
    height:'30px'
});


  $('#approval$count').each(function() {
	if('$row[6]'=='1')
	{
	$('#approval$count').attr('style','background:green');
	$('#approval$count').attr('title','The Form Is Approved By The Main Advisor');
	}

	});


 $(function() {
    $( document ).tooltip();
  });

</script>
";

$count= $count + 1;
}
echo"</table></div>";
mysqli_close($conn);


?>


</html>

