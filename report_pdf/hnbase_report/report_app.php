<?php
require_once("../config.php");
define('FPDF_FONTPATH','font/');
require('../fpdf.php');

class PDF extends FPDF
{
var $angle=0;
       function  header_($x_absolute,$y_absolute) //หน้าโปรแกรม
	   {
	   
	                $this->SetFont('angsana','B',12);
					$this->setXY( $x_absolute + 160 , $y_absolute - 20 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  1' )  );
					
	   
	   
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
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'hmp-recruitment system' )  );
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


	   
	   function   footer_($x_absolute,$y_absolute,$r)
	   {
	   
	   
	               $this->SetFont('angsana','I',12);
						$this->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 41 );
						$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );

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
 

$id_employee=$_GET['id_employee'];

if( !empty($id_employee)  )
{
/*### query*/
$tb='tb_employee';
$str_query="select * from $tb where `id_employee`=".$id_employee;
$result=mysql_query($str_query);
while( $row=mysql_fetch_object($result)  )
{//begin

    /*
    $prename=$row->prename;
    $name=$row->name;
    $lastname=$row->lastname;
    $nickname=$row->nickname;
    $id_peson=$row->id_peson;
    $id_passport=$row->id_passport;
    $id_code_person=$row->id_code_person;
    */
    $firstname=$row->firstname;
    $lastname=$row->lastname;
    $callname=$row->callname;
    $birth_date=$row->birth_date;
    $birth_place=$row->birth_place;
    $tr38_1=$row->tr38_1;
    $address=$row->address;
    $mobile=$row->mobile;
    $friends_relatives=$row->friends_relatives;
    $mobile_contact=$row->mobile_contact;
    $notice=$row->notice;
    $PASSPORT_NO=$row->PASSPORT_NO;
    $iss_passport=$row->iss_passport;
    $exp_passport=$row->exp_passport;
    $iss_visa=$row->iss_visa;
    $exp_visa=$row->exp_visa;
    $register_date=$row->register_date;
    $next_register_date=$row->next_register_date;
    $hm_code=$row->hm_code;
    $line_section=$row->line_section;
    $start_work_date=$row->start_work_date;
    $work_permit=$row->work_permit;
    $iss_date_workpermit=$row->iss_date_workpermit;
    $exp_date_workpermit=$row->exp_date_workpermit;
    $number_social_security=$row->number_social_security;
    $date_signup=$row->date_signup;
    
}//end while


//##  file for upload document 


/*
$tb_str_query_join=" SELECT * FROM  ".$tb." ";
$tb_str_query_join .=  " JOIN ".$tb_join;
$tb_str_query_join  .=  "  ON  ".$tb.".id_employee=".$tb_join.".id_tb_person";
$tb_str_query_join  .=  " WHERE  ".$tb.".id_employee=".$id_employee."; ";

$result2=mysql_query($tb_str_query_join);
while( $row=mysql_fetch_object($result2)  )
{
   $doc_38_1=$row->doc_38_1;
}
*/

//## picture query
$tb_join="tb_document"; //tb join
$path_file="../../hnbase/upload/";
$str_doc="SELECT * FROM ".$tb_join."  WHERE  id_tb_person=".$id_employee." ;";
$query_doc=mysql_query($str_doc);
while( $row=mysql_fetch_object($query_doc) )
{
     $doc_38_1=$row->doc_38_1;
     $doc_passport=$row->doc_passport;
     $doc_visa=$row->doc_visa;
     $doc_for_permission=$row->doc_for_permission;
     $doc_pay_permission=$row->doc_pay_permission;
     $doc_permission=$row->doc_permission;
}
    
 /*
$pdf->setXY( 10, 10 +  ($r*0)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874', ''.$doc_38_1.''  ) );
*/


//สร้างหน้าเอกสาร

$x_absolute=25; //พิกัด X
$y_absolute=25; //พิกัด Y
$r=7;  //ระยะห่าง
//$pdf->header_number($x_absolute,$y_absolute,1);
//$pdf->title1_($x_absolute,$y_absolute); //หัวโปรแกรม
$pdf->head_table(70,20,25,'b');//หัวโปรแกรม




/*## ประวัติพนักงาน  */
$pdf->SetFont('angsana','BU',20);

$pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ' First Name (ชื่อ-สกุล) : '.$firstname.'   '.$lastname.'') );

$pdf->setXY( $x_absolute, $y_absolute +  ($r*2)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Call Name (ชื่อเล่น) : ' .$callname ) );

$pdf->setXY( $x_absolute, $y_absolute +  ($r*3)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Birth Date (วัน-เดือน-ปี เกิด) : ' .$pdf->DMY_eng_format($birth_date).''  ));  //helper function

$pdf->setXY( $x_absolute, $y_absolute +  ($r*4)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Birth Place (ภูมิลำเนาเดิม) : ' .$birth_place.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*5)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'TR38/1 No (เลขที่ ทร.38/1) : ' .$tr38_1.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*6)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Address (ที่อยู่) : ' .$address.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*7)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Mobile (มือถือ) : ' .$mobile.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*8)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Friends/Relatives (เพื่อน/ญาติ) : ' .$friends_relatives.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*9)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Mobile (เบอร์ติดต่อ) : ' .$mobile_contact.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*10)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Notice (ข้อมูล/หมายเหตุอื่นๆ ) : ' .$notice.''  ));



$pdf->setXY( $x_absolute, $y_absolute +  ($r*11)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'PASSPORT NO (เลขที่หนังสือเดินทาง ) : ' .$PASSPORT_NO.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*12)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'PASS Iss. (วันที่ออกพาสปอร์ต ) : ' .$pdf->DMY_eng_format($iss_passport).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*13)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'PASS Exp. (วันที่หมดอายุพาสปอร์ต ) : ' .$pdf->DMY_eng_format($exp_passport).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*14)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'VISA Iss. (วันที่ออกวีซ่า ) : ' .$pdf->DMY_eng_format($iss_visa).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*15)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'VISA Exp. (วันที่หมดอายุวีซ่า ) : ' .$pdf->DMY_eng_format($exp_visa).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*16)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , '90 Report Date. (วันที่รายงานตัว ) : ' .$pdf->DMY_eng_format($register_date).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*17)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Next 90 Report Date. (วันที่รายงานตัว ) : ' .$pdf->DMY_eng_format($next_register_date).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*18)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'HM CODE (รหัสพนักงาน ) : ' .$hm_code.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*19)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Line/Section (แผนก ) : ' .$line_section.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*20)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Start Work Date (วันที่เข้าทำงาน ) : ' .$pdf->DMY_eng_format($start_work_date).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*21)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Work Permit N (เลขที่ใบอนุญาต ทำงาน ) : ' .$work_permit.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*22)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Work Permit Iss. Date (วันที่ขออนุญาตทำงน ) : ' .$pdf->DMY_eng_format($iss_date_workpermit).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*23)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'Work Permit Exp. Date (วันที่ใบอนุญาตทำงานหมดอายุ ) : ' .$pdf->DMY_eng_format($exp_date_workpermit).''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*24)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , '(เลขที่ประกันสังคม ) : ' .$number_social_security.''  ));

$pdf->setXY( $x_absolute, $y_absolute +  ($r*25)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , '(วันที่ขึ้นทะเบียน ) : ' .$pdf->DMY_eng_format($date_signup).''  ));




//$pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
//$pdf->SetFont('angsana','',16);
//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ''.$doc_38_1.'') );
//$pdf->Image('../Line_A-512.png',10,12,30,0,'','http://www.select2web.com');


if( !empty($doc_38_1)   )
{
    $pdf->AddPage(); //ขึ้นหน้าบรรทัดใหม่
//$pdf->Image($path_file.$doc_38_1,10,12,200,0,'',''.$path_file.$doc_38_1.'');
$pdf->RotatedImage($path_file.$doc_38_1,0,270,210,210,90); //RotatedImage($file,$x,$y,$w,$h,$angle)
}



if( !empty($doc_passport)   )
{
    $pdf->AddPage(); //ขึ้นหน้าบรรทัดใหม่
//$pdf->Image($path_file.$doc_38_1,10,12,200,0,'',''.$path_file.$doc_38_1.'');
$pdf->RotatedImage($path_file.$doc_passport,0,270,210,210,90); //RotatedImage($file,$x,$y,$w,$h,$angle)
}

//	doc_visa

if( !empty($doc_visa)   )
{
    $pdf->AddPage(); //ขึ้นหน้าบรรทัดใหม่
//$pdf->Image($path_file.$doc_38_1,10,12,200,0,'',''.$path_file.$doc_38_1.'');
$pdf->RotatedImage($path_file.$doc_visa,0,270,210,210,90); //RotatedImage($file,$x,$y,$w,$h,$angle)
}

//doc_for_permission

if( !empty($doc_for_permission)   )
{
    $pdf->AddPage(); //ขึ้นหน้าบรรทัดใหม่
//$pdf->Image($path_file.$doc_38_1,10,12,200,0,'',''.$path_file.$doc_38_1.'');
$pdf->RotatedImage($path_file.$doc_for_permission,0,270,210,210,90); //RotatedImage($file,$x,$y,$w,$h,$angle)
}

//	doc_pay_permission

if( !empty($doc_pay_permission)   )
{
    $pdf->AddPage(); //ขึ้นหน้าบรรทัดใหม่
//$pdf->Image($path_file.$doc_38_1,10,12,200,0,'',''.$path_file.$doc_38_1.'');
$pdf->RotatedImage($path_file.$doc_pay_permission,0,270,210,210,90); //RotatedImage($file,$x,$y,$w,$h,$angle)
}





$pdf->Output();

}//end if


?>