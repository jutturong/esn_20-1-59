<?php
require_once("../config.php");
define('FPDF_FONTPATH','font/');
require('../fpdf.php');



##===== new class 
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


class esncall
	{ //begin
	
     var   $total_age=0; 
     var   $total=0;
     var   $str_query="";
     var   $_query=0;	
     var   $cur_yr ="";

function  explode_date($date) //explode วัน เดือน ปี ที่เป็น THAI
{
      if( !empty($date) )
       {
                $ex=explode('-',$date);
                return  $ex[2]-543;
       }
      else 
      {
      	   return '';
      }

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
    
function  next_date_format($begin)  // นับวันที่หลังจาก วันสุดท้ายของการ select  d-m*-y
{
   
       if( !empty($begin) )
        {
              $ex=explode('-',$begin);
              $y=$ex[2]-543;
              $m=$ex[1];
             $d=$ex[0]+1;
             return   $y.'-'.$m.'-'.$d;
          }   
          else
          {
               return  '';
          }

  }
  
  function  str_table($tb_main,$tb_join,$b_conv,$e_conv) //string ผู้ป่วยเก่า    //DISTINCT $tb_main.`HN`
  {
  	
 /* Example query DB   */	 	
/*   
  	SELECT DISTINCT `04-monitoring`.`HN`
FROM `04-monitoring`
LEFT JOIN `tb_appendix1` ON `04-monitoring`.`HN` = `tb_appendix1`.`HN`
WHERE `04-monitoring`.`MonitoringDate`
BETWEEN '1460-10-01'
AND '2014-10-24'
LIMIT 0 , 30
*/

  	 /* string query  */  // $str_old =" SELECT * FROM `04-monitoring` LEFT JOIN `tb_appendix1` ON `04-monitoring`.`HN` = `tb_appendix1`.`HN` WHERE  `04-monitoring`.`MonitoringDate` BETWEEN  '$b_conv' AND   '$e_conv'  ; "; //ผู้ป่วยเก่า
        $str_old =" SELECT  DISTINCT  $tb_main.`HN`   FROM $tb_main LEFT JOIN $tb_join ON $tb_main.`HN` = $tb_join.`HN` WHERE  $tb_main.`MonitoringDate` BETWEEN  '$b_conv' AND   '$e_conv'  ; "; //ผู้ป่วยเก่า 
      //echo "<br>";     
       return mysql_query($str_old);
  }
  function  count_rows($query) // count from query
  {
       return  mysql_num_rows($query);
       
  }

  
##------ add new function   from  query_report_esn ---
             
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
/*
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
 */

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

##----- call value for field in  table
function  call_value($tb_main,$tb_join,$b_conv,$e_conv,$prop,$val) //เรียกข้อมุลในการ query จาก field ต่างๆของ table
{
      $this->str_query= " SELECT  DISTINCT  $tb_main.`HN`   FROM $tb_main LEFT JOIN $tb_join ON $tb_main.`HN` = $tb_join.`HN` WHERE  $tb_main.`MonitoringDate` BETWEEN  '$b_conv' AND   '$e_conv' AND $tb_join.`$prop` = '$val' ; ";
      //$query_=  mysql_query($this->str_query) or die('query fail!!');
      $this->_query =  mysql_query( $this->str_query );
      return   mysql_num_rows($this->_query);
        
}

function  av_age($tb_main,$tb_join,$b_conv,$e_conv,$prop ) //ค่าเฉลี่ย อายุ
{//begin   
  //return   $this->str_query= " SELECT  DISTINCT  $tb_main.`HN`   FROM $tb_main LEFT JOIN $tb_join ON $tb_main.`HN` = $tb_join.`HN` WHERE  $tb_main.`MonitoringDate` BETWEEN  '$b_conv' AND   '$e_conv' AND $tb_join.`$prop` = '$val' ; ";
    $this->str_query= " SELECT    *    FROM $tb_main LEFT JOIN $tb_join ON $tb_main.`HN` = $tb_join.`HN` WHERE  $tb_main.`MonitoringDate` BETWEEN  '$b_conv' AND   '$e_conv'  GROUP BY  $tb_main.`HN`   ; ";
    $this->_query=  mysql_query($this->str_query) or die('MYSQL QUERY FALSE!!');
     $this->cur_yr=date('Y');
      while($row= mysql_fetch_object($this->_query))
      {
             $br=$row->birthdate;
             $ex=explode('-',$br);          
             if( !empty($ex[0]) )
             {
                   $this->total_age  +=   $this->cur_yr - $ex[0];
                
                 $this->total++;
             }
          
      }
                  //echo  $this->total_age;
                  //echo "<br>";                
                  //echo $this->total;
                   return  round($this->total_age / $this->total ,2 );
     
} //end
  
  
}//end class 


//http://127.0.0.1/report_pdf/appendix_report/query_report_esn_merge.php?begin=01-10-2450&end=24-10-2550


    
 $esn=new esncall();
 
 $begin=trim($_GET['begin']);
//echo "<br>";
 $end=trim($_GET['end']);
//echo "<br>";

  
  ##--YEAR current
  $y_cur=date('Y'); //ปีัปัจจุบัน
//echo "<br>";

//echo "<br>";

//echo $y_cur;
  $y_e=$esn->explode_date($end);
 //echo "<br>";


#-- convert DATE ---
  $b_conv=$esn->date_eng_format($begin);
 //echo "<br>";
  $e_conv=$esn->date_eng_format($end);
 //echo "<br>";
 
 ##-- vAR  TABLE
 $tb_main="`04-monitoring`";
 $tb_join="`tb_appendix1`";
 
#-- convert DATE ---



if(  !empty($b_conv)   &&  !empty( $e_conv )    )
{//begin if
   if( $y_e  <= $y_cur )//มีทั้งผู้ป่วยเก่า และผู้ป่วยใหม่ 
    {
       
       ##=======================ผู้ป่วยเก่า                    
         $old_query=$esn->str_table($tb_main,$tb_join,$b_conv,$e_conv);  ##DATA
         $total_all=$esn->count_rows($old_query); //นับจำนวนของคนไข้เก่า  ##DATA
       
       //อายุเฉลี่ย  
        $cal_av_old = $esn->av_age($tb_main,$tb_join,$b_conv,$e_conv,'birthdate') ; ## อายุเฉลี่ย
          
         // เพศของผู้ป่วย  เพศชาย
         $total_sex1=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'sex',1); //test call old patien   
         $c1=($total_sex1/$total_all)*100;
         $cal1=round($c1 , 2); 
           // เพศของผู้ป่วย  เพศหญิง
          $total_sex2=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'sex',2); //test call old patien   
          $c2=($total_sex2/$total_all)*100;
          $cal2=round($c2 , 2); 
          
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
          $total_edu1=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'education_id',1); ##    1  ไม่ระบุ   
          $cal_edu1 =$esn->cal_percen($total_edu1 ,  $total_all);  
          $total_edu6=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'education_id',6); ##  6 ไม่ได้ศึกษาเลย  
          $cal_edu6=$esn->cal_percen($total_edu6 ,  $total_all);  
          $total_edu2=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'education_id',2); ##  2 	ประถมศึกษา
          $cal_edu2=$esn->cal_percen($total_edu2 ,  $total_all);  
          $total_edu7=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'education_id',7); ##   7 	มัธยมศึกษาตอนต้น
          $cal_edu7=$esn->cal_percen($total_edu7 ,  $total_all);  
          $total_edu3=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'education_id',3);##   3 	มัธยมศึกษาตอนปลาย
          $cal_edu3=$esn->cal_percen($total_edu3 ,  $total_all);  
          $total_edu4=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'education_id',4); ##   4 ปวส
          $cal_edu4=$esn->cal_percen($total_edu4 ,  $total_all);  
          $total_edu5=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'education_id',4);  ##   ปริญญาตรีขึ้นไป
          $cal_edu5=$esn->cal_percen($total_edu5 ,  $total_all);  
          
            /* -- สิทธิการรักษา    SELECT * FROM `payment`  
 payment_id 	payment 	
1 	เบิกต้นสังกัด/ข้าราชการ
2 	ชำระเงิน
3 	ประกันสังคม
4 	บัตรทองโรงพยาบาล
5 	บัตรทองส่งตัวมา
6 	พระภิกษุ/สามเณร
*/
          
          $count_pay1=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'payment_id',1); ##  1 	เบิกต้นสังกัด/ข้าราชการ
          $cal_pay1=$esn->cal_percen($count_pay1 ,  $total_all);  
         $count_pay2=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'payment_id',2); ##  2 	ชำระเงิน
          $cal_pay2=$esn->cal_percen($count_pay2 ,  $total_all);  
          $count_pay3=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'payment_id',3); ##  3 	ประกันสังคม
          $cal_pay3=$esn->cal_percen( $count_pay3 ,  $total_all);   
           $count_pay4=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'payment_id',4); ## 4 	บัตรทองโรงพยาบาล
           $cal_pay4=$esn->cal_percen( $count_pay4 ,  $total_all);   
           $count_pay5=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'payment_id',5); ## 5 	บัตรทองส่งตัวมา
           $cal_pay5=$esn->cal_percen(  $count_pay5 ,  $total_all);   
           $count_pay6=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'payment_id',6); ## 6 	พระภิกษุ/สามเณร
           $cal_pay6=$esn->cal_percen(  $count_pay6 ,  $total_all);    
 
             #----- จํานวนผู้ป่วยแยกตามอาชีพ   //SELECT * FROM `occupational` LIMIT 0 , 30
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
           $count_occ1=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',1); ## 1 ไม่ระบุ
           $cal_occ1=$esn->cal_percen(  $count_occ1 ,  $total_all);    
           $count_occ9=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',9); ## 9 	ไม่มีอาชีพ
           $cal_occ9=$esn->cal_percen(  $count_occ9 ,  $total_all);  
           $count_occ2=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',2); ## 2 	รับราชการ/รัฐวิสาหกิจ/พนักงานของรัฐ
           $cal_occ2=$esn->cal_percen(   $count_occ2 ,  $total_all);  
           $count_occ10=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',10); # 10 	ครู-อาจารย์
           $cal_occ10=$esn->cal_percen(   $count_occ10 ,  $total_all);    
           $count_occ11=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',11); # 11 	บุคลากรสาธารณสุข
           $cal_occ11=$esn->cal_percen(    $count_occ11 ,  $total_all);       
           $count_occ3=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',3); # 3 	ข้าราชการบำนาญ
           $cal_occ3=$esn->cal_percen(   $count_occ3 ,  $total_all);       
           $count_occ4=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',4); # 4 	เกษตรกรรม
           $cal_occ4=$esn->cal_percen(   $count_occ4 ,  $total_all); 
           $count_occ5=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',5); # 5 	ค้าขาย/นักธุรกิจ
           $cal_occ5=$esn->cal_percen( $count_occ5 ,  $total_all); 
           $count_occ6=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',6); # 6 	นักบวช
           $cal_occ6=$esn->cal_percen($count_occ6 ,  $total_all); 
           $count_occ7=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',7); # 7 	พนักงาน/ลูกจ้างหน่วยงานเอกชน
           $cal_occ7=$esn->cal_percen( $count_occ7 ,  $total_all); 
           $count_occ8=$esn->call_value($tb_main,$tb_join,$b_conv,$e_conv,'occupational_id',8); # 8 	นักเรียน/นักศึกษา
            $cal_occ8=$esn->cal_percen( $count_occ8 ,  $total_all); 
            
       ##=======================ผู้ป่วยใหม่
         $next_date=$esn->next_date_format($end); //วันที่ เริ่มต้นของผู้ป่วยใหม่  ##DATA
         $dmy_cur=date('Y'.'-'.'m'.'-'.'d'); //วันเดิอน ปี ปัจจุบัน       ##DATA
         $new_query=$esn->str_table($tb_main,$tb_join,$next_date,$dmy_cur); 
       
       
       $total_all_new =$esn->count_rows($new_query);     
       $per_all_new  = round(   ($total_all_new /$total_all_new ) *100 , 2 );
       
        $total_sex1_new=$esn->call_value($tb_main,$tb_join,$next_date,$dmy_cur,'sex',1); 
        $cal1_new=round( ($total_sex1_new/$total_all_new)*100 ,2);
       
         $total_sex2_new=$esn->call_value($tb_main,$tb_join,$next_date,$dmy_cur,'sex',2); 
         $cal2_new=round( ($total_sex2_new/$total_all_new)*100 ,2);
       
          //การศึกษา
          $total_edu1_new=$esn->call_value($tb_main,$tb_join,$next_date,$dmy_cur,'education_id',1); ##    1  ไม่ระบุ   
          $cal_edu1_new =$esn->cal_percen($total_edu1_new , $total_all_new);  
          $total_edu6_new=$esn->call_value($tb_main,$tb_join,$next_date,$dmy_cur,'education_id',6); ##  6 ไม่ได้ศึกษาเลย  
          $cal_edu6_new=$esn->cal_percen($total_edu6_new , $total_all_new);  
          $total_edu2_new=$esn->call_value($tb_main,$tb_join,$next_date,$dmy_cur,'education_id',2); ##  2 	ประถมศึกษา
          $cal_edu2_new=$esn->cal_percen($total_edu2_new , $total_all_new);  
         $total_edu7_new=$esn->call_value($tb_main,$tb_join,$next_date,$dmy_cur,'education_id',7); ##   7 	มัธยมศึกษาตอนต้น
          $cal_edu7_new=$esn->cal_percen( $total_edu7_new,  $total_all_new );  
          $total_edu3_new=$esn->call_value($tb_main,$tb_join,$next_date,$dmy_cur,'education_id',3);##   3 	มัธยมศึกษาตอนปลาย
          $cal_edu3_new=$esn->cal_percen($total_edu3_new ,  $total_all_new );  
          $total_edu4_new=$esn->call_value($tb_main,$tb_join,$next_date,$dmy_cur,'education_id',4); ##   4 ปวส
          $cal_edu4_new=$esn->cal_percen($total_edu4 ,$total_all_new );  
          $total_edu5_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'education_id',4);  ##   ปริญญาตรีขึ้นไป
          $cal_edu5_new =$esn->cal_percen($total_edu5_new ,  $total_all_new );  
          
                      /* ##สิทธิการรักษา    SELECT * FROM `payment`  
 payment_id 	payment 	
1 	เบิกต้นสังกัด/ข้าราชการ
2 	ชำระเงิน
3 	ประกันสังคม
4 	บัตรทองโรงพยาบาล
5 	บัตรทองส่งตัวมา
6 	พระภิกษุ/สามเณร
*/
          
          $count_pay1_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'payment_id',1); ##  1 	เบิกต้นสังกัด/ข้าราชการ
          $cal_pay1_new=$esn->cal_percen($count_pay1_new ,  $total_all_new );  
         $count_pay2_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'payment_id',2); ##  2 	ชำระเงิน
          $cal_pay2_new=$esn->cal_percen($count_pay2 ,  $total_all_new);  
          $count_pay3_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'payment_id',3); ##  3 	ประกันสังคม
          $cal_pay3_new=$esn->cal_percen( $count_pay3 ,  $total_all_new);   
           $count_pay4_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'payment_id',4); ## 4 	บัตรทองโรงพยาบาล
           $cal_pay4_new=$esn->cal_percen( $count_pay4 ,  $total_all_new);   
           $count_pay5_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'payment_id',5); ## 5 	บัตรทองส่งตัวมา
           $cal_pay5_new=$esn->cal_percen(  $count_pay5 ,  $total_all_new);   
           $count_pay6_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'payment_id',6); ## 6 	พระภิกษุ/สามเณร
           $cal_pay6_new=$esn->cal_percen(  $count_pay6 ,  $total_all_new);    
   
                        #----- จํานวนผู้ป่วยแยกตามอาชีพ   //SELECT * FROM `occupational` LIMIT 0 , 30
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
           $count_occ1_new=$esn->call_value($tb_main,$tb_join,$tb_join,next_date,$dmy_cur,'occupational_id',1); ## 1 ไม่ระบุ
           $cal_occ1_new=$esn->cal_percen(  $count_occ1 ,  $total_all_new );    
           $count_occ9_new=$esn->call_value($tb_main,$tb_join,$tb_join,next_date,$dmy_cur,'occupational_id',9); ## 9 	ไม่มีอาชีพ
           $cal_occ9_new=$esn->cal_percen(  $count_occ9 , $total_all_new );  
           $count_occ2_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',2); ## 2 	รับราชการ/รัฐวิสาหกิจ/พนักงานของรัฐ
           $cal_occ2_new=$esn->cal_percen(   $count_occ2 , $total_all_new );  
           $count_occ10_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',10); # 10 	ครู-อาจารย์
           $cal_occ10_new=$esn->cal_percen(   $count_occ10 ,  $total_all_new );    
           $count_occ11_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',11); # 11 	บุคลากรสาธารณสุข
           $cal_occ11_new=$esn->cal_percen(    $count_occ11 , $total_all_new );       
           $count_occ3_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',3); # 3 	ข้าราชการบำนาญ
           $cal_occ3_new=$esn->cal_percen(   $count_occ3 ,  $total_all_new );       
           $count_occ4_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',4); # 4 	เกษตรกรรม
           $cal_occ4_new=$esn->cal_percen(   $count_occ4 ,  $total_all_new ); 
           $count_occ5_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',5); # 5 	ค้าขาย/นักธุรกิจ
           $cal_occ5_new=$esn->cal_percen( $count_occ5 ,  $total_all_new ); 
           $count_occ6_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',6); # 6 	นักบวช
           $cal_occ6_new=$esn->cal_percen($count_occ6 ,  $total_all_new ); 
           $count_occ7_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',7); # 7 	พนักงาน/ลูกจ้างหน่วยงานเอกชน
           $cal_occ7_new=$esn->cal_percen( $count_occ7 ,  $total_all_new ); 
           $count_occ8_new=$esn->call_value($tb_main,$tb_join,next_date,$dmy_cur,'occupational_id',8); # 8 	นักเรียน/นักศึกษา
           $cal_occ8_new=$esn->cal_percen( $count_occ8 ,  $total_all_new ); 
           
           
        ##-------- ADD New data ------------
             $b=$esn->conv_dmy_eng($begin);
          // echo "<br>";       
             $e=$esn->conv_dmy_eng($end);
          //  echo "<br>"; 
            
      ##--- REPORT PDF-----    
       include('pdf_content.php');  # โหลด content PDF report
       
    } 
  elseif( $y_e > $cur_date )
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



 

?> 
