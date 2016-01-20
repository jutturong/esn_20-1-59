<?php
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



?>