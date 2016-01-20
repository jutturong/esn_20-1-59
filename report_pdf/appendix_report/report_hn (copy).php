<?php
require_once("../config.php");
define('FPDF_FONTPATH','font/');
require('../fpdf.php');

class PDF extends FPDF
{
var $angle=0;
      
      /*             
       function  header_($x_absolute,$y_absolute) //หน้าโปรแกรม
	   {
	   
	                $this->SetFont('angsana','B',12);
					$this->setXY( $x_absolute + 160 , $y_absolute - 20 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  1' )  );
					
	   
	   
	   }
        */

           function header_($setXY,$y_absolute,$txt)
           {
                   $this->SetFont('angsana','',12);
                  // $this->setXY( $x_absolute + 160 , $y_absolute - 10 );
                   $this->setXY( $x_absolute  , $y_absolute  );
                 // $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  1' )  );
                  $this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ''.$txt )  );
           }
	   
	   
	   function  header_number($x_absolute,$y_absolute,$page) //เลขหน้า
	   {
	   
	                $this->SetFont('angsana','B',12);
					$this->setXY( $x_absolute + 160 , $y_absolute - 20 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Page  '.$page )  );
					
	   
	   
	   }

	   
	   function  title1_($x_absolute,$y_absolute)
	   {
	   			$this->SetFont('angsana','B',20);
					$this->setXY( $x_absolute + 60 , $y_absolute - 10 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'hmp-recruitment system' )  );
	   }
	   
	   function  head_table($x_absolute,$y_absolute,$fontSize,$b)
	   {
	   			$this->SetFont('angsana',$b,$fontSize);
					$this->setXY( $x_absolute  , $y_absolute  );
					//$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'hmp-recruitment system' )  );
                                                                 $this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รายงานผลการปฏิบัติงาน' )  );
                                                                 
	   }
	   
	    function  title2_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 2) แบบบันทึกการติดตามการรักษา ' )  );
	   }
	   
	    function  title3_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 3) แบบบันทึกการนอนรักษาพยาบาล' )  );
	   }
	   
	   	    function  title4_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 4) แบบบันทึกการรักษาพยาบาลในห้องพยาบาลฉุกเฉิน' )  );
	   }

	   	    function  title5_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 5) แบบบันทึกการเยี่ยมบ้านของผู้ป่วย' )  );
	   }
	   
	   	    
			 function  title6_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 6) แบบบันทึกการเสียชีวิตของผู้ป่วย' )  );
	   }


	  /* 
	   function   footer_($x_absolute,$y_absolute,$r)
	   {	   	   
	               $this->SetFont('angsana','I',12);
		  $this->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 41 );
		  $this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );
	   }
           */
           
           function  footer_($x_absolute,$y_absolute,$txt)
           {
                    $this->SetFont('angsana','I',13);
                    $this->setXY( $x_absolute + 100 , $y_absolute + ($r*36)+4.9  );
                    //$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.' )  );
                    $this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ''.$txt )  );
           }
           
           
           function  str_prename($id)//ใช้สำหรับคำนำหน้าชื่อ
           {
               switch($id)
               {
                   case 1:
                   {
                   return "Mr.";
                       break;
                   }
                   case 2:
                   {
                   return "Ms.";
                       break;
                   }
                   case 3:
                   {
                    return "Mrs.";
                       break;
                   }                
               }              
           }
           function str_communication_skills($id)//ทักษะการสื่้อสาร (ภาษาไทย)
           {
               switch($id)
               {//begin
                   case 1:
                   {
                   return "พูด";
                       break;
                   }
                   case 2:
                   {
                   return "อ่าน";
                       break;
                   }
                   case 3:
                   {
                    return "เขียน";
                       break;
                   } 
                   case 4:
                   {
                    return "ฟัง";
                       break;
                   }
                   case 5:
                   {
                    return "อื่นๆ";
                       break;
                   }
          
               }//end switch
           }
           function str_query($tb,$id_tb_person,$f_name)
           {//begin 
              $str_query="select * from ".$tb." where `id_tb_person`=".$id_tb_person;
             //$str_query="select * from ".$tb."";
              $result=mysql_query($str_query);             
              while( $row=mysql_fetch_object($result)  )
                {//begin
                  return $row->$f_name;                 
                }//end while                          
           }//end function
           function convert_data_format($date)//เปลี่ยนรูปแบบวันเดือนปีเป็น ปี/เดือน/วัน
           {
              if( !empty($date) )
              {    
               $ex=  explode('-',$date);
               //return $ex[1].'/'.$ex[2].'/'.$ex[0];
               return $ex[2].'/'.$ex[1].'/'.$ex[0];
              } 
           }
           //function Footer($page_detail)
           function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                 // Arial italic 8
                $this->SetFont('angsana','I',8);
                // Page number
               // $this->Cell(0,10,'Page 1',0,0,'R');
               //$this->Cell(0,10,$page_detail,0,0,'R');
            }
           function DMY_eng_format($va)//เปลี่ยนรูปแบบวันที่ให้อยู่ใน dd-mm-yyyy
           {
              if( !empty($va) )
              {
                   $ex=explode('-',$va);
                   return $ex[2].'/'.$ex[1].'/'.$ex[0];              
              }
           } 
       
       function Rotate($angle, $x=-1, $y=-1)
         {
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
    }
          }
       
        function RotatedImage($file,$x,$y,$w,$h,$angle)
        {
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
       }
   
       /*
    function BasicTable($header,$data)
       {
    //Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    //Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
         }//end
    */     
         


 /*
function BasicTable($header,$data)  ## example from  thaicreate
{
	//Header
	$w=array(20,30,30,25,20,30,30);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	    $this->Ln();
	//Data
	$num=1; //ลำดับที่ 123 นะครับ
       
	foreach ($data as $eachResult) 
	{
        //$this->Cell(20,6,$eachResult["id_std"],1);   ## ดึงมาจากดาต้าเบสนะครับ
  
		$this->Cell(20,6,$num,1,0,'C'); 
		$this->Cell(30,6,"นาย ".$eachResult["fname"],1,0,'L');
		$this->Cell(30,6,$eachResult["lname"],1,0,'L');
		$this->Cell(25,6,$eachResult["room"],1,0,'C');
		$this->Cell(20,6,$eachResult["class"],1,0,'C');
		$this->Cell(30,6,$eachResult["num_last"],1,0,'C');
		$this->Cell(30,6,$eachResult["num_last"]*5,1,0,'C');
		//$this->Cell(20,6,$eachResult["Budget"],1);
		$this->Ln();
		$num++; 
      

	   }
           
   }//end function
*/
  
##-- test table 2 example 
     function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}
  function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
} 


   
##----- test table  form  http://www.fpdf.org/
   function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}







function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function GenerateSentence()
{
    //Get a random sentence
    $nb=rand(1,10);
    $s='';
    for($i=1;$i<=$nb;$i++)
        $s.=GenerateWord().' ';
    return substr($s,0,-1);
}

function count_query($str) //count จากการ query
{
    $query=  mysql_query($str);
    return  mysql_num_rows($query);
}

function  cal($count_sex1,$count_)//รายการคำนวณ
{
    $c1=($count_sex1/$count_)*100;
    //$cal1=round($c1 , 2); 
    return round($c1 , 2); 
}

}//end class

$pdf=new PDF('P','mm','A4');  //ของเดิม 
$pdf->SetMargins( 25,25,5 );
$pdf->AddPage();
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');
  
 /*
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');
 */

//สร้างหน้าเอกสาร

$x_absolute=25; //พิกัด X
$y_absolute=20; //พิกัด Y
$r=7;  //ระยะห่าง
//$pdf->header_number($x_absolute,$y_absolute,1);
//$pdf->title1_($x_absolute,$y_absolute); //หัวโปรแกรม

/*
 * example basic table
//$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
//mysql_query("set Names  'UTF8'  ");
//$objDB = mysql_select_db("kkhp");
$strSQL = "SELECT  id_appendix1  FROM   `tb_appendix1`  LIMIT 0,10 ";
$objQuery = mysql_query($strSQL);
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}

$header=array('ข้อมูล');
$pdf->BasicTable($header,$resultData);
*/



##-- table from  FPDF table example--  
/*
$header = array('colume 1', 'colume 2', 'colume 3', 'colume 4');
$data = $pdf->LoadData('../book.txt');
$pdf->BasicTable($header,$data);
*/

##--- QUERY ZONE  FROM  TB----

$tb="tb_appendix1";


$str_query1="SELECT  * FROM  ".$tb." ;  ";
$query=mysql_query($str_query1);
//$count_=  mysql_num_rows($query); //นับจำนวนทั้้งหมด
$count_=$pdf->count_query($str_query1);

$str_2= $str_query1="SELECT  * FROM  ".$tb." WHERE  sex=1 ;";
$query2=mysql_query($str_2);
//$count_sex1=  mysql_num_rows($query2); //นับจำนวนทั้้งหมด
$count_sex1=$pdf->count_query($str_2);  // ขาย
/*
$c1=($count_sex1/$count_)*100;
$cal1=round($c1 , 2); 
*/
$cal1=$pdf->cal($count_sex1,$count_); //ชาย

$str_3= $str_query1="SELECT  * FROM  ".$tb." WHERE  sex=2 ;";
$query2=mysql_query($str_2);
//$count_sex1=  mysql_num_rows($query2); //นับจำนวนทั้้งหมด
$count_sex2=$pdf->count_query($str_3);  // หญิง
$cal2=$pdf->cal($count_sex2,$count_); // หญิง

#-- การศึกษา --SELECT * FROM `education` LIMIT 0 , 30
/*
1 	ไม่ระบุ
2 	ประถมศึกษา
3 	มัธยาศึกษาตอนปลาย/ปวช.
4 	อนุปริญญา/ปวส.
5 	ปริญญาตรีขึ้นไป
6 	ไม่ได้ศึกษาเลย
7 	มัธยมศึกษาตอนต้น
*/
$str_edu1="SELECT  *  FROM  ".$tb." WHERE  education_id=1 ;";
$count_edu1=$pdf->count_query($str_edu1);  
$cal_edu1=$pdf->cal($count_edu1,$count_); 

$str_edu6="SELECT  *  FROM  ".$tb." WHERE  education_id=6 ;";
$count_edu6=$pdf->count_query($str_edu6);  
$cal_edu6=$pdf->cal($count_edu6,$count_); 

$str_edu2="SELECT  *  FROM  ".$tb." WHERE  education_id=2 ;";
$count_edu2=$pdf->count_query($str_edu2);  
$cal_edu2=$pdf->cal($count_edu2,$count_); 

$str_edu7="SELECT  *  FROM  ".$tb." WHERE  education_id=7 ;";
$count_edu7=$pdf->count_query($str_edu7);  
$cal_edu7=$pdf->cal($count_edu7,$count_); 

$str_edu3="SELECT  *  FROM  ".$tb." WHERE  education_id=3 ;";
$count_edu3=$pdf->count_query($str_edu3);  
$cal_edu3=$pdf->cal($count_edu3,$count_); 

$str_edu4="SELECT  *  FROM  ".$tb." WHERE  education_id=4 ;";
$count_edu4=$pdf->count_query($str_edu4);  
$cal_edu4=$pdf->cal($count_edu4,$count_); 

$str_edu5="SELECT  *  FROM  ".$tb." WHERE  education_id=5 ;";
$count_edu5=$pdf->count_query($str_edu5);  
$cal_edu5=$pdf->cal($count_edu5,$count_); 

## จํานวนผู้ป่วยแยกตามอาชีพ   //SELECT * FROM `occupational` LIMIT 0 , 30
/*
1 	ไม่ระบุ
2 	รับราชการ/รัฐวิสาหกิจ/พนักงานของรัฐ
3 	ข้าราชการบำนาญ
4 	เกษตรกรรม
5 	ค้าขาย/นักธุรกิจ
6 	นักบวช
7 	พนักงาน/ลูกจ้างหน่วยงานเอกชน
8 	นักเรียน/นักศึกษา
9 	ไม่มีอาชีพ
10 	ครู-อาจารย์
11 	บุคลากรสาธารณสุข
*/
$str_occ1="SELECT  *  FROM  ".$tb." WHERE  occupational_id=5 ;";
$count_occ1=$pdf->count_query($str_occ1);  
$cal_occ1=$pdf->cal($count_occ1,$count_); 

$str_occ9="SELECT  *  FROM  ".$tb." WHERE  occupational_id=9 ;";
$count_occ9=$pdf->count_query($str_occ9);  
$cal_occ9=$pdf->cal($count_occ9,$count_); 

$str_occ2="SELECT  *  FROM  ".$tb." WHERE  occupational_id=2 ;";
$count_occ2=$pdf->count_query($str_occ2);  
$cal_occ2=$pdf->cal($count_occ2,$count_); 

$str_occ10="SELECT  *  FROM  ".$tb." WHERE  occupational_id=10 ;";
$count_occ10=$pdf->count_query($str_occ10);  
$cal_occ10=$pdf->cal($count_occ10,$count_); 

$str_occ11="SELECT  *  FROM  ".$tb." WHERE  occupational_id=11 ;";
$count_occ11=$pdf->count_query($str_occ11);  
$cal_occ11=$pdf->cal($count_occ11,$count_); 

$str_occ3="SELECT  *  FROM  ".$tb." WHERE  occupational_id=3 ;";
$count_occ3=$pdf->count_query($str_occ3);  
$cal_occ3=$pdf->cal($count_occ3,$count_); 

$str_occ4="SELECT  *  FROM  ".$tb." WHERE  occupational_id=4 ;";
$count_occ4=$pdf->count_query($str_occ4);  
$cal_occ4=$pdf->cal($count_occ4,$count_); 

$str_occ5="SELECT  *  FROM  ".$tb." WHERE  occupational_id=5 ;";
$count_occ5=$pdf->count_query($str_occ5);  
$cal_occ5=$pdf->cal($count_occ5,$count_); 

$str_occ6="SELECT  *  FROM  ".$tb." WHERE  occupational_id=6 ;";
$count_occ6=$pdf->count_query($str_occ6);  
$cal_occ6=$pdf->cal($count_occ6,$count_); 

$str_occ7="SELECT  *  FROM  ".$tb." WHERE  occupational_id=7 ;";
$count_occ7=$pdf->count_query($str_occ7);  
$cal_occ7=$pdf->cal($count_occ7,$count_); 

$str_occ8="SELECT  *  FROM  ".$tb." WHERE  occupational_id=8 ;";
$count_occ8=$pdf->count_query($str_occ8);  
$cal_occ8=$pdf->cal($count_occ8,$count_); 

/* ##สิทธิการรักษา    SELECT * FROM `payment`  
 payment_id 	payment 	
1 	เบิกต้นสังกัด/ข้าราชการ
2 	ชำระเงิน
3 	ประกันสังคม
4 	บัตรทองโรงพยาบาล
5 	บัตรทองส่งตัวมา
6 	พระภิกษุ/สามเณร
*/
$str_pay1="SELECT  *  FROM  ".$tb." WHERE  payment_id=1 ;";
$count_pay1=$pdf->count_query($str_pay1);  
$cal_pay1=$pdf->cal($count_pay1,$count_); 

$str_pay2="SELECT  *  FROM  ".$tb." WHERE  payment_id=2 ;";
$count_pay2=$pdf->count_query($str_pay2);  
$cal_pay2=$pdf->cal($count_pay2,$count_); 

$str_pay3="SELECT  *  FROM  ".$tb." WHERE  payment_id=3 ;";
$count_pay3=$pdf->count_query($str_pay3);  
$cal_pay3=$pdf->cal($count_pay3,$count_); 

$str_pay4="SELECT  *  FROM  ".$tb." WHERE  payment_id=4 ;";
$count_pay4=$pdf->count_query($str_pay4);  
$cal_pay4=$pdf->cal($count_pay4,$count_); 

$str_pay5="SELECT  *  FROM  ".$tb." WHERE  payment_id=5 ;";
$count_pay5=$pdf->count_query($str_pay5);  
$cal_pay5=$pdf->cal($count_pay5,$count_); 

$str_pay6="SELECT  *  FROM  ".$tb." WHERE  payment_id=6 ;";
$count_pay6=$pdf->count_query($str_pay6);  
$cal_pay6=$pdf->cal($count_pay6,$count_); 

#-- อายุเฉลี่ย ณ วันเข้ารับบริการครั้งแรก (ปี)
$y=date('Y');
$total=0;
$str_age="SELECT  * FROM  ".$tb." ; ";
$query_age=  mysql_query($str_age);
while( $row = mysql_fetch_object($query_age) )
{
        $br=$row->birthdate; 
        $ex=explode('-',$br);
        //$y_br=$ex[0];
        if( $ex[0] > 0 )
        {        $cal_age= $y - $ex[0];  }       
        $total  += $cal_age;
} 
 $cal_av= round($total/$count_);                  
//$cal_av=$total/$count_;
 
##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  1' )  );
##---- เลขหน้า ---------- 

//$pdf->header_(1000,7,'หน้า  1');
                                        
##-- head table -----
$pdf->head_table(70,20,25,'b'); //($x_absolute,$y_absolute,$fontSize,$b)   //หัวโปรแกรม
$pdf->SetFont('angsana','BU',20);
//$pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
$pdf->setXY( 60, $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'คลินิคผู้ป่วยนอกโรคลมชัก โรงพยาบาลศรีนครินทร์' ));

$pdf->Image('../icon/px.jpeg',10,12,20,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])

$pdf->setXY( 120 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','',13);
$begin=trim($_GET['begin']);
$end=trim($_GET['end']);
if( !empty($begin)  && !empty($end)   )
{    
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$begin.' ถึง '.$end ));
}
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 1 ข้อมูล Demo ographic ของผู้ป่วยที่เข้ารับบริการ' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'ข้อมูล' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนทั้งหมด' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนผู้ป่วยใหม่' ) , 1 , 1 , 'C' , true );

##-- content --PAGE1
$pdf->SetFont('angsana','',13);
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '  จำนวนผู้ป่วยทั้งหมด (ราย)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_ ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '  อายุเฉลี่ย ณ วันเข้ารับบริการครั้งแรก (ปี)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $cal_av  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '  จำนวนผู้ป่วยแยกตามเพศ (ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ชาย' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_sex1.'/'.$cal1.'%'  ),LR, 0  ,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- หญิง' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_sex2.'/'.$cal2.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนผู้ป่วยแยกตามที่มา (ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ไม่ได้ลงบันทึก' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- Refer' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- OPD GP' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- OPD med' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- OPD อื่นๆ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );



$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนผู้ป่วยแยกตามระดับการศึกษา (ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ไม่ได้ลงบันทึก' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ไม่ระบุ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_edu1.'/'.$cal_edu1.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ไม่ได้ศึกษาเลย' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_edu6.'/'.$cal_edu6.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ประถมศึกษา' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_edu2.'/'.$cal_edu2.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-มัธยมศึกษาตอนต้น' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_edu7.'/'.$cal_edu7.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-มัธยมศึกษาตอนปลาย/ปวช.' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_edu3.'/'.$cal_edu3.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-อนุปริญญา/ปวส.' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_edu4.'/'.$cal_edu4.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ปริญญาตรีขึ้นไป' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_edu4.'/'.$cal_edu4.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , ''.'จำนวนผู้ป่วยแยกตามสิทธิ์การรักษา (ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ไม่ได้ลงบันทึก' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-เบิกต้นสังกัด/ข้าราชการ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay1.'/'.$cal_pay1.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ชำระเงิน' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay2.'/'.$cal_pay2.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ประกันสังคม' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay3.'/'.$cal_pay3.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-บัตรทองโรงพยาบาล' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay4.'/'.$cal_pay4.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-บัตรทองส่งตัวมา' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_pay5.'/'.$cal_pay5.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-พระภิกษุ/สามเณร' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay6.'/'.$cal_pay6.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ผู้พิการ/ทุพลภาพ' ),LRB,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LRB,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LRB,1,C,true     );

//$this->footer_($x_absolute,$y_absolute,50);
/*
     $pdf->SetFont('angsana','I',13);
     $pdf->setXY( $x_absolute + 100 , $y_absolute + ($r*36)+4.9  );
     $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.' )  );
     $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ''.$y_absolute )  );            
*/
     $pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');



 ##-- PAGE 2   
$pdf->AddPage();
     ##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  2' )  );
##---- เลขหน้า ----------
##-- head table -----
$pdf->head_table(70,20,25,'b'); //($x_absolute,$y_absolute,$fontSize,$b)   //หัวโปรแกรม
$pdf->SetFont('angsana','BU',20);
//$pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
$pdf->setXY( 60, $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'คลินิคผู้ป่วยนอกโรคลมชัก โรงพยาบาลศรีนครินทร์' ));

$pdf->Image('../icon/px.jpeg',10,12,20,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])

$pdf->setXY( 120 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','',13);
$begin=trim($_GET['begin']);
$end=trim($_GET['end']);
if( !empty($begin)  && !empty($end)   )
{    
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$begin.' ถึง '.$end ));
}
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 1 ข้อมูล Demo ographic ของผู้ป่วยที่เข้ารับบริการ' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'ข้อมูล' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนทั้งหมด' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนผู้ป่วยใหม่' ) , 1 , 1 , 'C' , true );

##---- content ---
$pdf->SetFont('angsana','',13);
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '  จำนวนผู้ป่วยแยกตามอาชีพ(ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ไม่ได้ลงบันทึก' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ไม่ระบุ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,   $count_occ1.'/'.$cal_occ1.'%'    ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ไม่มีอาชีพ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ9.'/'.$cal_occ9.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- รับราชการ/รัฐวิสาหกิจ/พนักงานของรัฐ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ2.'/'.$cal_occ2.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ครู-อาจารย์' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ10.'/'.$cal_occ10.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- บุคลากรสาธารณสุข' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ11.'/'.$cal_occ11.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ข้าราชการบำนาญ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ3.'/'.$cal_occ3.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- เกษตรกรรม' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ4.'/'.$cal_occ4.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ค้าขาย/นักธุรกิจ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ5.'/'.$cal_occ5.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- นักบวช' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ6.'/'.$cal_occ6.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- พนักงาน/ลูกจ้างหน่วยงานของเอกชน' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_occ7.'/'.$cal_occ7.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- นักเรียน/นักศึกษา' ),LRB,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_occ8.'/'.$cal_occ8.'%'  ),LRB,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LRB,1,C,true     );
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');

$pdf->Output();
?>