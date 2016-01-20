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

  function   date_eng_format($begin) //formdate date เปลี่ยนจาก วันที่ไทย เป็น eng
   {
       if( !empty($begin) )
        {
             $ex=explode('-',$begin);
              $y=$ex[2]-543;
              $m=$ex[1];
             $d=$ex[0];
             return   $y.'-'.$m.'-'.$d;
          }   
          else
          {
               return  '';
              }
    }
  function   date_thai_format($begin) //formdate date เปลี่ยนจาก eng เป็นไทย
   {
       if( !empty($begin) )
        {
              $ex=explode('-',$begin);
              $y=$ex[0] + 543;
              $m=$ex[1];
              $d=$ex[2];
             //return   $y.'-'.$m.'-'.$d;
              return    $d.'/'.$m.'/'.$y;
          }   
          else
          {
               return  '';
              }
    }
}//end class

/*
            if( !empty($begin) )
           {
             $ex=explode('-',$begin);
              $y=$ex[2]-543;
              $m=$ex[1];
             $d=$ex[0];
             $b= $y.'-'.$m.'-'.$d;
           }   
            
            if( !empty($end) )
           {
             $ex=explode('-',$end);
              $y=$ex[2]-543;
              $m=$ex[1];
             $d=$ex[0];
             $e=   $y.'-'.$m.'-'.$d;
           } 
*/
           
           
function  conv_dmy_eng($begin) //เปลี่ยนวันที่จาก Thai เป็น Eng
{
        if( !empty($begin) )
           {
             $ex=explode('-',$begin);
              $y=$ex[2]-543;
              $m=$ex[1];
             $d=$ex[0];
            // $b= $y.'-'.$m.'-'.$d;
             return $y.'-'.$m.'-'.$d;
           } 
}
function  av_age($HN,$connect,$tb_main,$cur_Y ) //ค่าเฉลี่ย อายุ
{//begin
                    $str_="SELECT   *   FROM    $tb_main    WHERE  HN='$HN' ; ";
                    // echo "<br>";
                   // $query_=mysql_query($str_,$connect);
                    $query_=mysql_query($str_,$connect) or die(mysql_error());
                    //echo  mysql_num_rows($query_);
                    //echo "<br>";
                    $row_=mysql_fetch_object($query_);
                     $br=$row_->birthdate;
                   // echo "<br>";
                     $ex_=explode('-',$br);
                    if( $ex_[0] > 0 )
                    {
                      return    $cal_y = $cur_Y -  $ex_[0];
                     }

} //end
function  count3_( $str_all )
{
                     $str_all= " SELECT  DISTINCT HN   FROM   $tb_main   WHERE HN='$HN'  ;  ";
                     $q_all=mysql_query( $str_all , $connect);
                    $num_all = mysql_num_rows( $q_all);
                    $total_all += intval( $num_all  );
}
function  count2_($str,$connect) # ปรับปุรงการนับจำนวนทั้งหมด
{
     
            // $str_all= " SELECT  DISTINCT HN   FROM   $tb_main   WHERE HN='$HN'  ;  ";
                     $q_all=mysql_query( $str_all , $connect);
                     return    intval( mysql_num_rows( $q_all) );
                    //$total_all += intval( $num_all  );
           
             /*
                   //  $str_sex="SELECT  DISTINCT HN    FROM  $tb_main  WHERE  HN='$HN'  AND   Sex='1'  ;  ";
                     $q_sex1=mysql_query($str,$connect);
                     $count_sex1 =mysql_num_rows($q_sex1);
                    return     intval( $count_sex1 );
                 */   
}
function  count_($str,$connect,$ob)
{
                    // $str_sex="SELECT  Sex  FROM  $tb_main  WHERE  HN='$HN'  and Sex=1  ;  ";
                   $que=mysql_query($str,$connect);
                    $row=mysql_fetch_object($que);
                //    return      $c_ =$row->Sex;
                   return       intval( $row->$ob ) ;
}

function count_query($str) //count จากการ query
{
    $query=  mysql_query($str);
    return  mysql_num_rows($query);
}

function count_sum($str_edu1,$connect) //ใช้นับจำนวนของ หัวข้อ
{
                   $q_edu1=mysql_query($str_edu1,$connect) or die(mysql_error());
                   return      mysql_num_rows( $q_edu1);
}

function  cal_percen($total,$total_all) //คำนวณออกมาเป็น %
{
   return     round(   ($total/$total_all) * 100  , 2 );  
}

## var global ####
//$tb_main="`01-demographic`";  
$tb_main="`tb_appendix1`"; 
$cur_Y=date('Y');   
## var global ####


$begin=trim($_GET['begin']);
$end=trim($_GET['end']);
if(  !empty($begin)  && !empty($end)  )
{//begin if  !empty($begin)  && !empty($end) 


            
             $b=conv_dmy_eng($begin);       
             $e=conv_dmy_eng($end);
 

$total_all=0; //จำนวนผู้ป่วยทั้งหมด
$total_age=0;
$total_sex1 =0;
$total_sex2 =0;
#-- การศึกษา ----
$total_edu1=0; 
$total_edu6=0; 
$total_edu2=0; 
$total_edu7=0;  #มัธยมศึกษาตอนต้น
$total_edu3=0;  #ม.ปลาย
$total_edu4=0;    #4 	อนุปริญญา/ปวส.
$total_edu5=0;   #5 	ปริญญาตรีขึ้นไป
   ##สิทธิการรักษา    SELECT * FROM `payment`  
$count_pay1=0;      #1 	เบิกต้นสังกัด/ข้าราชการ
$count_pay2=0;   #2 	ชำระเงิน
 $count_pay3=0;   #3 	ประกันสังคม
 $count_pay4=0; #4 	บัตรทองโรงพยาบาล
$count_pay5=0; #5 	บัตรทองส่งตัวมา
 $count_pay6=0; #6 	พระภิกษุ/สามเณร
 
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
 $count_occ1 = 0;
  $count_occ2 = 0;
   $count_occ3 = 0;
    $count_occ4 = 0;
     $count_occ5 = 0;
      $count_occ6 = 0;
       $count_occ7 = 0;
         $count_occ8 = 0;
      $count_occ9 = 0;
       $count_occ10 = 0;   
     $count_occ11 = 0;   
##---------------------------------- ผู้ป่วยเก่า ---------------------------------------------------  
$str_query="SELECT DISTINCT HN   FROM `04-monitoring`  WHERE  `04-monitoring`.`MonitoringDate`  BETWEEN   '$b'  AND  '$e' ;  "; ##-- จำนวนผู้ป่วยทั้งหมด         
       $query_1=mysql_query($str_query,$connect);
       $check_row= mysql_num_rows($query_1); //ตรวจสอบการ fetch data
      //echo "<br>";
    //echo "<br>";
        if( $check_row > 0 )
        {//begin if
            while($row=mysql_fetch_object($query_1) )
            {//begin while
                     $HN=$row->HN;
                     
                  #--จำนวนทั้งหมดผู้ป่วยเก่า
                    $str_all= " SELECT  DISTINCT HN   FROM   $tb_main   WHERE HN='$HN'  ;  ";
                     $q_all=mysql_query( $str_all , $connect);
                    $num_all = mysql_num_rows( $q_all);
                    $total_all += intval( $num_all  );
       
                #-- อายุเฉลี่ย     
                     $total_age  +=  av_age($HN , $connect,$tb_main,$cur_Y );  
                     /*
                    $str_age= " SELECT  *  FROM   $tb_main   WHERE    HN='$HN'  ;  ";
                    //echo "<br>";
                    $query_agek=mysql_query($str_age,$connect);
                    $row_age=mysql_fetch_object($query_agek);
                     echo    $row_age->BirthDate;
                     echo "<br>";
                     */
                      //echo  $str_age= " SELECT  *  FROM   $tb_main   WHERE    HN='$HN'  ;  ";
                     //echo  "<br>";
                     
              #-- ชาย    
                     $str_sex="SELECT  DISTINCT HN    FROM  $tb_main  WHERE  HN='$HN'  AND   Sex='1'  ;  ";
                     $q_sex1=mysql_query($str_sex);
                     $count_sex1 =mysql_num_rows($q_sex1);
                     $total_sex1  +=  intval( $count_sex1 );
           
             #-- หญิง         
             $str_sex2="SELECT  DISTINCT HN   FROM  $tb_main  WHERE  HN='$HN'  AND   Sex='2'  ;  ";
             $q_sex2=mysql_query( $str_sex2);
                $count_sex2 =mysql_num_rows($q_sex2);
               $total_sex2  +=  intval( $count_sex2 );
          
#------------------------------------ ระดับการศึกษา-----------------------------
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


            
            $str_edu1="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=1 AND  HN='$HN' ;"; ##   1 	ไม่ระบุ
            $total_edu1  +=  count_sum($str_edu1,$connect);
            
            $str_edu6="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=6 AND  HN='$HN' ;"; ##  6 	ไม่ได้ศึกษาเลย
            $total_edu6  +=  count_sum($str_edu6,$connect);
            
            $str_edu2="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=2 AND  HN='$HN' ;"; ##  2 	ประถมศึกษา
            $total_edu2  +=  count_sum($str_edu2,$connect);
            
              $str_edu7="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=7 AND  HN='$HN' ;";   ##   7 	มัธยมศึกษาตอนต้น
               $total_edu7  +=  count_sum($str_edu7,$connect);
               
                $str_edu3="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=3 AND  HN='$HN' ;";   ##   3 	มัธยมศึกษาตอนปลาย
               $total_edu3  +=  count_sum($str_edu3,$connect);
               
                $str_edu4="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=4 AND  HN='$HN' ;";   ##   4 ปวส
               $total_edu4  +=  count_sum($str_edu4,$connect);
               
                $str_edu5="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=5 AND  HN='$HN' ;";   ##   ปริญญาตรีขึ้นไป
               $total_edu5  +=  count_sum($str_edu5,$connect);
               
      /* ##สิทธิการรักษา    SELECT * FROM `payment`  
 payment_id 	payment 	
1 	เบิกต้นสังกัด/ข้าราชการ
2 	ชำระเงิน
3 	ประกันสังคม
4 	บัตรทองโรงพยาบาล
5 	บัตรทองส่งตัวมา
6 	พระภิกษุ/สามเณร
*/
             $str_pay1="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=1   AND  HN='$HN'  ;  ";
              $count_pay1 +=  count_sum( $str_pay1 ,$connect);
              
              $str_pay2="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=2   AND  HN='$HN'  ;  ";
              $count_pay2 +=  count_sum( $str_pay2 ,$connect);
              
                $str_pay3="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=3   AND  HN='$HN'  ;  ";
              $count_pay3 +=  count_sum( $str_pay3 ,$connect);
              
              $str_pay4="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=4   AND  HN='$HN'  ;  ";
              $count_pay4 +=  count_sum( $str_pay4 ,$connect);
              
              $str_pay5="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=5   AND  HN='$HN'  ;  ";
              $count_pay5 +=  count_sum( $str_pay5 ,$connect);
              
              $str_pay6="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=6   AND  HN='$HN'  ;  ";
              $count_pay6 +=  count_sum( $str_pay6 ,$connect);
              
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

$str_occ1="SELECT  DISTINCT     HN     FROM  ".$tb_main."   WHERE  occupational_id=1  AND   HN='$HN'  ;  "; 
$count_occ1  +=  count_sum( $str_occ1 ,$connect);
$str_occ9 ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=9  AND   HN='$HN'  ;  "; 
$count_occ9  +=  count_sum($str_occ9  ,$connect);
$str_occ2 ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=2  AND   HN='$HN'  ;  "; 
$count_occ2  +=  count_sum($str_occ2  ,$connect);
$str_occ10  ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=10  AND   HN='$HN'  ;  "; 
$count_occ10  +=  count_sum($str_occ10  ,$connect);
$str_occ11="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=11  AND   HN='$HN'  ;  "; 
$count_occ11  +=  count_sum($str_occ11  ,$connect);
$str_occ3 ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=3  AND   HN='$HN'  ;  "; 
$count_occ3  +=  count_sum($str_occ3  ,$connect);
$str_occ4 ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=4  AND   HN='$HN'  ;  "; 
$count_occ4  +=  count_sum($str_occ4  ,$connect);
$str_occ5 ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=5  AND   HN='$HN'  ;  "; 
$count_occ5  +=  count_sum($str_occ5  ,$connect);
$str_occ6 ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=6  AND   HN='$HN'  ;  "; 
$count_occ6  +=  count_sum($str_occ6  ,$connect);
$str_occ7  ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=7  AND   HN='$HN'  ;  "; 
$count_occ7  +=  count_sum($str_occ7  ,$connect);
$str_occ8 ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=8  AND   HN='$HN'  ;  "; 
$count_occ8  +=  count_sum($str_occ8  ,$connect);


            } //--###=============ผู้ป่วยเก่า=======================--end while
            //echo $check_row;
           // echo "<br>";
          
          #-- จำนวนผู้ป่วยเก่าทั้งหมด
            //$total_all;
           //echo "<br>";
          #-- อายุเฉลี่ย
        //echo  $total_age;
        //echo "<br>":
           $cal_av_old  =  round(  $total_age /  $total_all ,2 ) ; //อายุผู้ป่วยเก่าเฉลี่ย 
        //echo "<br>";
         ##-- ชาย
        //$total_sex1;  
        //echo "<br>";
           $c1=($total_sex1/$total_all)*100;
          $cal1=round($c1 , 2); 
      //  echo "<br>";
        ##--หญิง   
        //$total_sex2;
       //echo "<br>";
          $c2=($total_sex2/$check_row)*100;
          $cal2=round($c2 , 2 ); 
  #---------------------- ระดับการศึกษา----------------       
           $cal_edu1 = cal_percen($total_edu1 ,  $total_all);  //คำนวณออกมาเป็น %
           $cal_edu6 = cal_percen($total_edu6 ,  $total_all);  
            $cal_edu2 = cal_percen($total_edu2 ,  $total_all);  #ประถมศึกษา
            $cal_edu7 = cal_percen($total_edu7 ,  $total_all);  #ประถมศึกษาตอนต้น
            $cal_edu3 = cal_percen($total_edu3 ,  $total_all);  #ประถมศึกษาตอนต้น
             $cal_edu4 = cal_percen($total_edu3 ,  $total_all);  #ปวส
              $cal_edu5 = cal_percen($total_edu5 ,  $total_all);  #ปริญญาตรีขึ้นไป
            //echo "<br>";
            #สิทธิการรักษา
             //$count_pay1 ; //ต้นสังกัดข้าราชการ
             $cal_pay1 = cal_percen($count_pay1 ,  $total_all);
              $cal_pay2 = cal_percen($count_pay2 ,  $total_all);
              $cal_pay3 = cal_percen($count_pay3 ,  $total_all);
              $cal_pay4 = cal_percen($count_pay4 ,  $total_all);
              $cal_pay5 = cal_percen($count_pay5 ,  $total_all);
              $cal_pay6 = cal_percen($count_pay6 ,  $total_all);
        ## จํานวนผู้ป่วยแยกตามอาชีพ   //SELECT * FROM `occupational` LIMIT 0 , 30
                $cal_occ1  =   cal_percen( $count_occ1  ,  $total_all);
                 $cal_occ9  =   cal_percen( $count_occ9  ,  $total_all);
                $cal_occ2  =   cal_percen( $count_occ2  ,  $total_all);
                $cal_occ10  =   cal_percen( $count_occ10  ,  $total_all);
                $cal_occ11  =   cal_percen( $count_occ11  ,  $total_all);
                 $cal_occ3  =   cal_percen( $count_occ3  ,  $total_all);
                $cal_occ4  =   cal_percen( $count_occ4  ,  $total_all);
                $cal_occ5  =   cal_percen( $count_occ5  ,  $total_all);
                $cal_occ6  =   cal_percen( $count_occ6  ,  $total_all);
                $cal_occ7  =   cal_percen( $count_occ7  ,  $total_all);
                $cal_occ8  =   cal_percen( $count_occ8  ,  $total_all);
        } // end if

##------------======--------- ผู้ป่วยใหม่==========================
      //echo  $e;
      //echo "<br>";
        $total_all_new = 0;
      $total_sex1_new = 0; 
      $total_sex2_new =0;
      #-- ระดับการศึกษา--
      $total_edu1_new=0;
     $total_edu6_new=0;
       $total_edu2_new=0; #ประถมศึกษา
      $total_edu7_new=0; # ม.ต้น
       $total_edu3_new=0;  # 3 	มัธยาศึกษาตอนปลาย/ปวช.
        $total_edu4_new=0;  # 4 ปวส
         $total_edu5_new=0;  # 4 ปริญญาตรีขึ้นไป
         
         $count_pay1_new=0;      #1 	เบิกต้นสังกัด/ข้าราชการ
         $count_pay2_new=0;      #2
          $count_pay3_new=0;   #3 	ประกันสังคม
 $count_pay4_new=0; #4 	บัตรทองโรงพยาบาล
$count_pay5_new=0; #5 	บัตรทองส่งตัวมา
 $count_pay6_new=0; #6 	พระภิกษุ/สามเณร
 
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
 $count_occ1_new = 0;
  $count_occ2_new = 0;
   $count_occ3_new = 0;
    $count_occ4_new = 0;
     $count_occ5_new = 0;
      $count_occ6_new = 0;
       $count_occ7_new = 0;
         $count_occ8_new = 0;
      $count_occ9_new = 0;
       $count_occ10_new = 0;   
     $count_occ11_new = 0;   
 
 
      $cur_date=date("Y-m-d");  # วันที่ปัจจุบัน  
      if( $e < $cur_date )
      {
                       //echo "<";
           $str_query_new="SELECT DISTINCT HN FROM `04-monitoring`  WHERE  `04-monitoring`.`MonitoringDate`  BETWEEN   '$e'  AND  ' $cur_date' ;  ";  
         //echo "<br>"; 
           $query_new=mysql_query($str_query_new,$connect);
          $check_row_new= mysql_num_rows($query_new); //จำนวนผู้ป่วยใหม่ทั้งหมด
        if( $check_row_new > 0 )
        {//begin if
            while($row=mysql_fetch_object($query_new) )
            {//begin while
                   $HN_new=$row->HN;
                   ##--- จำนวนผู้ป่วยใหม่ทั้งหมด-----======================-----------------
                     $str_all= " SELECT  DISTINCT HN   FROM   $tb_main   WHERE HN='$HN_new'  ;  ";
                     $q_all=mysql_query( $str_all , $connect);
                    $num_all = mysql_num_rows( $q_all);
                    $total_all_new   += intval( $num_all  );
                   /*
                    $str_all_new= " SELECT  DISTINCT HN   FROM   $tb_main   WHERE HN='$HN_new'  ;  ";
                    $total_all_new +=  count2_( $str_all_new , $HN_new,$connect);  ##จำนวนทั้งหมดผู้ป่วยเก่า
                */
               
              ##-- ชาย  
              /*
              $str_sex="SELECT  Sex  FROM  $tb_main  WHERE  HN='$HN_new'  and Sex=1  ;  ";
              $total_sex1_new   +=  count_( $str_sex,$connect,'Sex' );  //ชาย
                */
                     $str_sex="SELECT  DISTINCT HN    FROM  $tb_main  WHERE  HN='$HN_new'  AND   Sex='1'  ;  ";
                     $q_sex1=mysql_query($str_sex);
                     $count_sex1 =mysql_num_rows($q_sex1);
                     $total_sex1_new  +=  intval( $count_sex1 );
                 ##-- หญิง
                    $str_sex="SELECT  DISTINCT HN    FROM  $tb_main  WHERE  HN='$HN_new'  AND   Sex='2'  ;  ";
                     $q_sex2=mysql_query($str_sex);
                     $count_sex2 =mysql_num_rows($q_sex2);
                     $total_sex2_new  +=  intval( $count_sex2 );
                  ##-- ระดับการศึกษา--   
                  $str_edu1_new="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=1 AND  HN='$HN_new' ;"; ##   1 	ไม่ระบุ
                 $total_edu1_new  +=  count_sum($str_edu1_new,$connect);
                $str_edu6_new="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=6 AND  HN='$HN_new' ;"; ##   6 	ไม่ได้ศึกษาเลย
                 $total_edu6_new  +=  count_sum($str_edu6_new,$connect);
                 $str_edu2_new="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=2 AND  HN='$HN_new' ;"; ##   2	ประถมศึกษา
                 $total_edu2_new  +=  count_sum($str_edu2_new,$connect);
                  $str_edu7_new="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=7 AND  HN='$HN_new' ;"; ##  
                 $total_edu7_new  +=  count_sum($str_edu7_new,$connect);
                  $str_edu3_new="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=3 AND  HN='$HN_new' ;"; ##  # 3 	มัธยาศึกษาตอนปลาย/ปวช.
                 $total_edu3_new  +=  count_sum($str_edu3_new,$connect);
                 $str_edu4_new="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=4 AND  HN='$HN_new' ;"; ##  # 4 	ปวส
                 $total_edu4_new  +=  count_sum($str_edu4_new,$connect);
                  $str_edu5_new="SELECT   DISTINCT HN    FROM  ".$tb_main." WHERE  education_id=5 AND  HN='$HN_new' ;"; ##  # 5 	ปริญญาตรีขึ้นไป
                 $total_edu5_new  +=  count_sum($str_edu5_new,$connect);
                 
                  $str_pay1_new="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=1   AND  HN='$HN_new'  ;  ";
                  $count_pay1_new +=  count_sum( $str_pay1_new ,$connect);
                   $str_pay2_new="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=2   AND  HN='$HN_new'  ;  ";
                  $count_pay2_new +=  count_sum( $str_pay2_new ,$connect);
                   $str_pay3_new="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=3   AND  HN='$HN_new'  ;  ";
                  $count_pay3_new +=  count_sum( $str_pay3_new ,$connect);
                   $str_pay4_new="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=4   AND  HN='$HN_new'  ;  ";
                  $count_pay4_new +=  count_sum( $str_pay4_new ,$connect);
                   $str_pay5_new="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=5   AND  HN='$HN_new'  ;  ";
                  $count_pay5_new +=  count_sum( $str_pay5_new ,$connect);
                  $str_pay6_new="SELECT     DISTINCT     HN    FROM  ".$tb_main."    WHERE  payment_id=6   AND  HN='$HN_new'  ;  ";
                  $count_pay6_new +=  count_sum( $str_pay6_new ,$connect);
                  
 $str_occ1_new="SELECT  DISTINCT     HN     FROM  ".$tb_main."   WHERE  occupational_id=1  AND  HN='$HN_new' ;  "; 
$count_occ1_new  +=  count_sum( $str_occ1_new ,$connect);
$str_occ9_new ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=9  AND   HN='$HN_new' ;  "; 
$count_occ9_new  +=  count_sum($str_occ9_new  ,$connect);
$str_occ2_new ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=2  AND   HN='$HN_new'  ;  "; 
$count_occ2_new  +=  count_sum($str_occ2_new  ,$connect);
$str_occ10_new  ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=10  AND   HN='$HN_new'  ;  "; 
$count_occ10_new  +=  count_sum($str_occ10_new  ,$connect);
$str_occ11_new="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=11  AND   HN='$HN_new'  ;  "; 
$count_occ11_new  +=  count_sum($str_occ11_new  ,$connect);
$str_occ3_new ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=3  AND   HN='$HN_new'  ;  "; 
$count_occ3_new  +=  count_sum($str_occ3_new  ,$connect);
$str_occ4_new ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=4  AND   HN='$HN_new'  ;  "; 
$count_occ4_new  +=  count_sum($str_occ4_new  ,$connect);
$str_occ5_new ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=5  AND   HN='$HN_new'  ;  "; 
$count_occ5_new  +=  count_sum($str_occ5_new  ,$connect);
$str_occ6_new ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=6  AND   HN='$HN_new'  ;  "; 
$count_occ6_new  +=  count_sum($str_occ6_new  ,$connect);
$str_occ7_new  ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=7  AND  HN='$HN_new'  ;  "; 
$count_occ7_new  +=  count_sum($str_occ7_new  ,$connect);
$str_occ8_new ="SELECT  DISTINCT     HN     FROM  ".$tb_main." WHERE  occupational_id=8  AND   HN='$HN_new'  ;  "; 
$count_occ8_new  +=  count_sum($str_occ8_new  ,$connect);

            }//end while-----======================---------------------------จำนวนผู้ป่วยใหม่ทั้งหมด------------------
             
            #-- จำนวนผู้ป่วยใหม่ทั้งหมด
           //   $total_all_new;
           //echo "<br>";
            $per_all_new  = round(   ($total_all_new /$total_all ) *100 , 2 );
            //echo  "<br>";
             
             
         ##--- ชาย  
        $total_sex1_new;
     //echo "<br>";
         $c1_new=($total_sex1_new/$check_row_new)*100;
         $cal1_new=round($c1_new , 2); 
         ##--- หญิง
        $total_sex2_new;  
    //echo "<br>";
    $c2_new=($total_sex2_new/$check_row_new)*100;
    $cal2_new=round($c2_new , 2);     
         ##-- ระดับการศึกษา
           $total_edu1_new;
     //echo  "<br>";
        $cal_edu1_new = cal_percen($total_edu1_new , $total_all_new );  //คำนวณออกมาเป็น %
        $cal_edu6_new = cal_percen($total_edu6_new , $total_all_new );  //คำนวณออกมาเป็น %
         $cal_edu2_new = cal_percen($total_edu2_new , $total_all_new ); #ประถมศึกษา
        $cal_edu7_new = cal_percen($total_edu7_new , $total_all_new ); # ม.ต้น
        $cal_edu3_new = cal_percen($total_edu3_new , $total_all_new ); # ม.ปลาย
        $cal_edu4_new = cal_percen($total_edu4_new , $total_all_new ); # ปวส
        $cal_edu5_new = cal_percen($total_edu5_new , $total_all_new ); # ปริญญาตรี
        
             //$count_pay1 ; //ต้นสังกัดข้าราชการ
             $cal_pay1_new = cal_percen($count_pay1_new ,  $total_all_new);
             $cal_pay2_new = cal_percen($count_pay2_new , $total_all_new);
             $cal_pay3_new = cal_percen($count_pay3_new ,  $total_all_new);
              $cal_pay4_new = cal_percen($count_pay4_new ,  $total_all_new);
              $cal_pay5_new = cal_percen($count_pay5_new , $total_all_new);
              $cal_pay6_new = cal_percen($count_pay6_new ,  $total_all_new);
    //echo   $cal_edu6_new = cal_percen($total_edu6_new , $total_all_new );  //คำนวณออกมาเป็น %
               $cal_occ1_new  =   cal_percen( $count_occ1_new  ,  $total_all_new);
               $cal_occ9_new  =   cal_percen( $count_occ9_new  ,  $total_all_new);
               $cal_occ2_new  =   cal_percen( $count_occ2_new  ,  $total_all_new);
               $cal_occ10_new  =   cal_percen( $count_occ10_new  ,  $total_all_new);
               $cal_occ11_new  =   cal_percen( $count_occ11_new  ,  $total_all_new);
               $cal_occ3_new  =   cal_percen( $count_occ3_new  ,  $total_all_new);
               $cal_occ4_new  =   cal_percen( $count_occ4_new  ,  $total_all_new);
               $cal_occ5_new  =   cal_percen( $count_occ5_new  ,  $total_all_new);
               $cal_occ6_new  =   cal_percen( $count_occ6_new  ,  $total_all_new);
                $cal_occ7_new  =   cal_percen( $count_occ7_new  ,  $total_all_new);
                 $cal_occ8_new  =   cal_percen( $count_occ8_new  ,  $total_all_new);
     //echo  "<br>";
        }// end if###-----------------------------------
                          
      }   
      elseif( $e > $cur_date )
      {
                       //echo ">";
                       ?>
                                 <script type="text/javascript">
                                   alert('Check Date-Month-Year!!');
                                   window.close();
                                 </script>
                       <?php
      }
        
}//end if
    include('pdf_content.php');  # โหลด content PDF report
?>
