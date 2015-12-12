<?php

define('FPDF_FONTPATH','./font/');
require('./fpdf.php');
//require('./wordwrap.php');
$servername = "localhost";
$username = "root";
$password = "ra!nbow";
$db_name = "Form_data_gumel";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);


//$ASU_ID='1208604211';
//$sql = "SELECT * from Form_data_gumel.form where ASU_ID='$ASU_ID'";

//$retval = mysqli_query($conn,$sql);


$SIGNATURE=$_POST['signature'];
$ASU_ID=$_POST['asu_id'];
$SIGNATURE=json_encode($SIGNATURE);
$DIRECTOR_COMMENTS= $_POST['director_comments'];


$sql=$conn->query("UPDATE Form_data_gumel.somss 
set Director_Signature='$SIGNATURE',
Director_Comments='$DIRECTOR_COMMENTS'
where ASU_ID='$ASU_ID'
");

mysqli_query($conn,$sql);

//mysqli_close($conn);









class PDF extends FPDF
{
function FancyTable($retval)
{
    // Colors, line width and bold font
    $this->SetFillColor(219,130,127);
    $this->SetTextColor(0);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
	while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
	{

	//logic to convert tiny int to string
	if($row['Adivisory_Committee']==='1'){$ADVISORY_COMMITTEE='Yes';}else{$ADVISORY_COMMITTEE='No';};
	if($row['Student_Advisory_Met']==='1'){$STUDENT_ADVISOR='Yes';}else{$STUDENT_ADVISOR='No';};
	if($row['Prospectus_Approved']==='1'){$PROSPECTUS_APPROVED='Yes';}else{$PROSPECTUS_APPROVED='No';};
	if($row['Research_Completed']==='1'){$RESEARCH_COMPLETED='Yes';}else{$RESEARCH_COMPLETED='No';};
	if($row['Qualifying_Exam_Completed']==='1'){$QUALIFYING_EXAM='Yes';}else{$QUALIFYING_EXAM='No';};
	if($row['Participation_In_MTBI']==='1'){$PART_MTBI='Yes';}else{$PART_MTBI='No';};
	if($row['No_Summer_Funded']==='1'){$SUMMER_FUNDED='Yes';}else if($row['No_Summer_Funded']==='0'){$SUMMER_FUNDED='No';} else{$SUMMER_FUNDED="Not Applicable";};
	if($row['Tech_Reports']==='1'){$TECH_REPORTS='Yes';}else{$TECH_REPORTS='No';};
	if($row['Qualifying_Exam_Completed']==='1'){$row['Qualifying_date']='N/A since Qualifying Exam Completed';};
	if($row['Candidacy_exam']==='1'){$CANDIDACY_EXAM='Yes';}else{$CANDIDACY_EXAM='No';};
	if($row['Candidacy_exam']==='1'){$row['Candidacy_date']='N/A since Candidacy Exam Completed';};
	//json_decode for all the variables which need it
	$row['Mail']=json_decode($row['Mail']);
	$row['Course'] =json_decode($row['Course']);
	$COUNT_GRADES=count($row['Course']);
	$row['Grade']=json_decode($row['Grade']);
	$row['Course']=implode("\n",$row['Course']);
	$row['Grade']=implode("\n",$row['Grade']);
	$Publications =json_decode($row['Publications']);
	$count_pub = count($Publications);
	$Presentations=json_decode($row['Presentations']);
	$count_pre = count($Presentations);
	$row['Publications']=implode("\n",$Publications);
	$row['Presentations']=implode("\n",$Presentations);
	$Yes_Reports_Detail =json_decode($row['Yes_Reports_Detail']);
	$count_rep = count($Yes_Reports_Detail);
	$row['Yes_Reports_Detail']=implode("\n",$Yes_Reports_Detail);
	$current_goal =json_decode($row['current_goal']);
	$count_current = count($current_goal);
	$row['current_goal']=implode("\n",$current_goal);
	$future_goal =json_decode($row['future_goal']);
	$count_future = count($future_goal);
	$row['future_goal']=implode("\n",$future_goal);
	$ADVISOR_TEAM=json_decode($row['Advisor_Team']);
	$COUNT=count($ADVISOR_TEAM);
	$row['Advisor_Team']=implode("\n",$ADVISOR_TEAM);
	$APPROVAL=json_decode($row['Approved']);
	//$APPROVAL=implode("<br>",$APPROVAL);
	$MAIN_ADVISOR=$row['Admin_Advisor'];
	$Signature = json_decode($row['Signature'],true);
	//print_r($Signature);
	$count_sig = count($Signature);
	$row['Signature']=implode("\n",$Signature);
	$DIRECTOR_SIGNATURE= json_decode($row['Director_Signature']);
	$row['Director_Signature']=implode("\n",$DIRECTOR_SIGNATURE);
	//print_r($row['Signature']);
	// $STUDENT_MAIL= $row['Student_Mail'];
	//global $STUDENT_MAIL;	
	$line_break=0;
/*
	for($i=0;$i<3;$i++)// make this dynamic
	{
		//print_r(strlen($courses1[$i]));
		if(strlen($courses1[$i])>33)
		{
			$line_break=$line_break + 2;
		}
		else
		{
			$line_break++;
		}
	}
	if(($line_break%2)==0)
	{
		$line_break = 5 * $line_break;
		//print_r($line_break);
	}
	else
	{
		$line_break =((5*$line_break)+5);
		//print_r($line_break);
	}

*/		



	
		$this->Cell(100,10,"Academic Year of Student",1);
     	   	$this->Cell(80,10,"{$row['Academic_Year']}",1);
		$this->Ln();
		$this->Cell(100,10,"Mail Id of the Student",1);
        	$this->Cell(80,10,"{$row['Student_Mail']}",1);
		$this->Ln();
		$this->Cell(100,10,"First Name",1);
        	$this->Cell(80,10,"{$row['First_Name']}",1);
		$this->Ln();
		$this->Cell(100,10,"Last Name",1);
        	$this->Cell(80,10,"{$row['Second_Name']}",1);
		$this->Ln();
		$this->Cell(100,10,"ASU_ID of Student",1);
        	$this->Cell(80,10,"{$row['ASU_ID']}",1);
		$this->Ln();
		$this->Cell(100,10,"Program Start Date",1);
        	$this->Cell(80,10,"{$row['Program_start_date']}",1);
		$this->Ln();
 		$this->Cell(100,10,"Spring:GPA",1);
        	$this->Cell(80,10,"{$row['GPA_Spring']}",1);
		$this->Ln();
		$this->Cell(100,10,"Fall:GPA",1);
        	$this->Cell(80,10,"{$row['GPA_Fall']}",1);
		$this->Ln();
		$this->Cell(100,10,"CGPA",1);
                $this->Cell(80,10,"{$row['CGPA']}",1);
                $this->Ln();
		/*$this->Cell(100,35,"Courses taken since last progress report with grades",1);//matter of concern
		$this->WordWrap($courses,60);
		$this->Multicell(80,5,"Courses:\n{$courses}",1,2);
	
		$this->SetXY(170,100); 
		$this->Multicell(20,5,"Grades:",0);
		$count=count($courses1);
		$count=(2/$count);
		$this->SetXY(170,102);
		$this->Multicell(20,(10-$count),"{$row['Grade']}",0,'C');
		//$this->Ln();
*/
                $this->Cell(100,10,"Advisory Committee Formed?",1);
                $this->Cell(80,10,"{$ADVISORY_COMMITTEE}",1);
                $this->Ln();
		$this->Cell(100,(10*$COUNT),"Members in Advisory Committee",1);
                $this->Multicell(80,5,"{$row['Advisor_Team']}\n",1);
                //$this->Ln();

		$this->Cell(100,10,"Did Student Met the Advisor and Advisory Comiittee?",1);
		$this->Cell(80,10,"{$STUDENT_ADVISOR}",1);
                 $this->Ln();
		//$this->Cell(100,10,"Reason for not Meeting the Advisory Committee",1); //matter of concern
//		$temp = " i was not wel my mom was out of town dad had to go to market i had to play dailyt my sister had to watc htv daily my cousin used to come daily my nani is so pretty i m such a monkey ";
		$count=ceil(strlen($row['Not_Met_Reason'])/45);

		 $this->Cell(100,($count*5),"Reason for not Meeting the Advisory Committee",1); //matter of concern
                $this->Multicell(80,5,"{$row['Not_Met_Reason']}",1);//logic of strlen should be implemented
		$this->Cell(100,10,"Prospectus Approved?",1);
                $this->Cell(80,10,"{$PROSPECTUS_APPROVED}",1);
                $this->Ln();
		$this->Cell(100,10,"Research Completed?",1);
                $this->Cell(80,10,"{$RESEARCH_COMPLETED}",1);
                $this->Ln();
		$this->Cell(100,10,"Qualifying Exam Completed?",1);
                $this->Cell(80,10,"{$QUALIFYING_EXAM}",1);
                $this->Ln();
		$this->Cell(100,10,"Anticipated Completion Date for Qualifying Exam",1);
                $this->Cell(80,10,"{$row['Qualifying_date']}",1);//dont know
                $this->Ln();
		$this->Cell(100,10,"Candidacy Exam Completed?",1);
                $this->Cell(80,10,"{$CANDIDACY_EXAM}",1);
                $this->Ln();
		$this->Cell(100,10,"Anticipated Completion Date for Candidacy Exam",1);
                $this->Cell(80,10,"{$row['Candidacy_date']}",1);//dont know
                $this->Ln();
		$this->Cell(100,10,"Thesis Completion Date",1);
                $this->Cell(80,10,"{$row['Thesis_completion']}",1);//dont know
                $this->Ln();
		for($i=0;$i<$count_current;$i++)// make this dynamic
	        {
                if(strlen($current_goal[$i])>45)
                {
			    $line_break=$line_break + 2;
                }
                else
                {
                        $line_break++;
                }
       	        }
		$line_break = (5*$line_break);
		$this->Cell(100,$line_break,"Outline the goals met in this reporting period",1);
                $this->Multicell(80,5,"{$row['current_goal']}\n",1);
		$line_break=0;
		for($i=0;$i<$count_pub;$i++)// make this dynamic
                {
                if(strlen($Publications[$i])>45)
                {
                            $line_break=$line_break + 2;
                }
                else
                {
                        $line_break++;
                }
                }
		$line_break = (5*$line_break);
		$this->Cell(100,$line_break,"Publications",1);
                $this->Multicell(80,5,"{$row['Publications']}\n",1);
               	$line_break=0;
		for($i=0;$i<$count_pre;$i++)// make this dynamic
                {
                if(strlen($Presentations[$i])>45)
                {
                            $line_break=$line_break + 2;
                }
                else
                {
                        $line_break++;
                }
                }
		$line_break = (5*$line_break);
		$this->Cell(100,$line_break,"Presentations",1);
                $this->Multicell(80,5,"{$row['Presentations']}\n",1);
		$this->Cell(100,10,"Participation in MTBI?",1);
                $this->Cell(80,10,"{$PART_MTBI}",1);
                $this->Ln();
		$this->Cell(100,10,"Summer (Funded) Research",1);
                $this->Cell(80,10,"{$SUMMER_FUNDED}",1);
                $this->Ln();
		$this->Cell(100,10,"Two Technical reports written?",1);
                $this->Cell(80,10,"{$TECH_REPORTS}",1);
                $this->Ln();
		$line_break=0;
		for($i=0;$i<$count_rep;$i++)// make this dynamic
                {
                if(strlen($Yes_Reports_Details[$i])>45)
                {
                            $line_break=$line_break + 2;
                }
                else
                {
                        $line_break++;
                }
                }
		$line_break = (5*$line_break);
		$this->Cell(100,$line_break,"Technical Report Details?",1);
                $this->Multicell(80,5,"{$row['Yes_Reports_Detail']}\n",1);
		$line_break=0;
		for($i=0;$i<$count_future;$i++)// make this dynamic
                {
                if(strlen($future_goal)>45)
                {
                            $line_break=$line_break + 2;
                }
                else
                {
                        $line_break++;
                }
                }
		$line_break = (5*$line_break);
		$this->Cell(100,$line_break,"Outline the goals for the next academic year",1);
                $this->Multicell(80,5,"{$row['future_goal']}\n",1);
		$this->Cell(100,10,"Student Rating by Advisor?",1);
                $this->Cell(80,10,"{$ADVISORY_COMMITTEE}",1);
               $this->Ln();

		 $line_break=0;
                for($i=0;$i<$count_sig;$i++)// make this dynamic
                {
                if(strlen($Signature[$i])>45)
                {
                            $line_break=$line_break + 2;
                }
                else
                {
                        $line_break++;
                }
                }
                $line_break = (5*$line_break);
                $this->Cell(100,$line_break," Advisor Signature",1);
                $this->Multicell(80,5,"{$row['Signature']}\n",1);
		
		$this->Cell(100,10,"Director Comments",1);
                $this->Cell(80,10,"{$row['Director_Comments']}",1);
                $this->Ln();

		$this->Cell(100,10,"Director Signature",1);
                $this->Multicell(80,10,"{$DIRECTOR_SIGNATURE}",1);
                $this->Ln();

		global $to;
		$to=$row['Student_Mail'];


        
	}
		



/*

	$col = mysqli_fetch_fields($retcol);
	//$col=implode($col);
	//print_r($col);
	foreach($col as $val)
        {
		 $this->Cell(80,10,"{$col->name}",1);
        	 $this->Ln();

	}
	
    // Header
    //$w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell(90,12,$header[$i],1,1,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');


*/

}

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);


//$ASU_ID='1208604216';

$sql1 = "SELECT * from Form_data_gumel.somss where ASU_ID='$ASU_ID'";
$retval = mysqli_query($conn,$sql1);
//print_r(mysql_field_name($result,0));
//$finfo = mysqli_fetch_field_direct($retval, 1);
//print_r($f_info);
// Column names 
//$header = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'Form_data_gumel.form'";
//$retcol = mysqli_query($conn,$column);
//$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
//$header1 = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
//$print_r($STUDENT_MAIL);

$pdf->FancyTable($retval);

//$VALUE=mysqli_fetch_array($retval, MYSQL_ASSOC);
//$pdf->Output();

//print_r($VALUE['Student_Mail']);
//$to =$VALUE['Student_Mail'];

$subject="Final Approved Form";

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "StudentFormApproved.pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header
$headers  = "From:somss.advising@asu.edu".$eol;
$headers .= "MIME-Version: 1.0".$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
//$body .= "This is a MIME encoded message.".$eol;
// message

$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";

// send message
mail($to, $subject, $body, $headers);


//mysqli_close($conn);



?>
