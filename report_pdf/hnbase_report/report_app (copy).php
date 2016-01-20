<?php
require_once("../config.php");
define('FPDF_FONTPATH','font/');
require('../fpdf.php');

class PDF extends FPDF
{

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
	   			    $this->SetFont('angsana','B',18);
					$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 1) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา (first visit)' )  );
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
           function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                 // Arial italic 8
                $this->SetFont('angsana','I',8);
                // Page number
                $this->Cell(0,10,'HN system',0,0,'R');
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
 

$id_tb_person=$_GET['id_tb_person'];

if( !empty($id_tb_person)  )
{
/*### query*/
$tb_main='tb_person';
$str_query="select * from `tb_person` where `id_tb_person`=".$id_tb_person;
$result=mysql_query($str_query);
while( $row=mysql_fetch_object($result)  )
{//begin
    $prename=$row->prename;
    $name=$row->name;
    $lastname=$row->lastname;
    $nickname=$row->nickname;
    $id_peson=$row->id_peson;
    $id_passport=$row->id_passport;
    $id_code_person=$row->id_code_person;
}//end while

$prename=$pdf->str_prename($prename);

//สร้างหน้าเอกสาร

$x_absolute=25; //พิกัด X
$y_absolute=25; //พิกัด Y
$r=7;  //ระยะห่าง
//$pdf->header_number($x_absolute,$y_absolute,1);
//$pdf->title1_($x_absolute,$y_absolute); //หัวโปรแกรม


/*## ประวัติพนักงาน  */
$pdf->SetFont('angsana','BU',20);
$pdf->setXY( $x_absolute, $y_absolute  );     
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ประวัติพนักงาน' ) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ชื่อ - นามสกุล : '.$prename.$name.'   '.$lastname ) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*2)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'ชื่อเล่น : ' .$nickname) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*3)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'ID(ประกอบเอกสาร) : ' .$id_peson) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*4)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'เลขที่พาสปอร์ต : ' .$id_passport) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*5)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'รหัสพนักงาน : ' .$id_code_person) );

/*## ประสพการทำงาน  */
$pdf->SetFont('angsana','BU',20);
//$pdf->setXY( $x_absolute, $y_absolute  );   
$pdf->setXY( $x_absolute, $y_absolute +  ($r*6)  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ประสพการทำงาน' ) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*7)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'จำนวนปีที่ทำ (ปี) กรอกข้อมูลการทำงานอย่างน้อย 2 ที่ : '.$pdf->str_query('tb_experience',$id_tb_person,'count_experience')));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*8)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'ทำงานที่ไหนมาก่อน : '.$pdf->str_query('tb_experience',$id_tb_person,'before_workplace')));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*9)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'ทำงานที่ไหนมาก่อน (ทำงานที่เดิม) : '.$pdf->str_query('tb_experience',$id_tb_person,'workplace')));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*10)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'ประเภทงาน : '.$pdf->str_query('tb_experience',$id_tb_person,'work_type')));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*11)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'จำนวน (ปี) : '.$pdf->str_query('tb_experience',$id_tb_person,'count_year')));

/*## ความสามารถพิเศษ  */
$pdf->SetFont('angsana','BU',20);
$pdf->setXY( $x_absolute, $y_absolute +  ($r*12)  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ความสามารถพิเศษ' ) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*13)  );
$pdf->SetFont('angsana','',16);
$id_communication_skills=$pdf->str_query('tb_talent',$id_tb_person,'communication_skills');
//str_communication_skills($id)
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'ทักษะการสื่้อสาร (ภาษาไทย) : '.$pdf->str_communication_skills($id_communication_skills)));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*14)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'อื่นๆ ระบุ : '.$pdf->str_query('tb_talent',$id_tb_person,'other')));

/*## วีซ่า (visa)  */
$pdf->SetFont('angsana','BU',20);
$pdf->setXY( $x_absolute, $y_absolute +  ($r*15)  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วีซ่า (visa)' ) );
$pdf->SetFont('angsana','',16);
$pdf->setXY( $x_absolute, $y_absolute +  ($r*16)  );
$date_visa_expire=$pdf->str_query('tb_visa',$id_tb_person,'date_visa_expire');
//convert_data_format($date)//เปลี่ยนรูปแบบวันเดือนปีเป็น ปี/เดือน/วัน
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'วันที่วีซ่า หมดอายุ (ใหม่) : '.$pdf->convert_data_format($date_visa_expire)));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*17)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'จำนวนวันที่เหลือ : '.$pdf->str_query('tb_visa',$id_tb_person,'count_date_visa').' วัน'));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*18)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'สถานที่ออกวีซ่า : '.$pdf->str_query('tb_visa',$id_tb_person,'place_visa')));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*19)  );
$date_visa=$pdf->str_query('tb_visa',$id_tb_person,'date_visa');
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'วันที่ออกวีซ่า : '.$pdf->convert_data_format($date_visa)));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*20)  );
$date_report=$pdf->str_query('tb_visa',$id_tb_person,'date_report');
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'วันที่รายงานตัวครั้งล่าสุด : '.$pdf->convert_data_format($date_report)));

/*## พาสปอร์ต (passport)  */
$pdf->SetFont('angsana','BU',20);
$pdf->setXY( $x_absolute, $y_absolute +  ($r*21)  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'พาสปอร์ต (passport)' ) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*22)  );
$date_passport_expire_begin=$pdf->str_query('tb_passport',$id_tb_person,'date_passport_expire_begin');
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'วันที่ passport หมดอายุ (ใหม่) : '.$pdf->convert_data_format($date_passport_expire_begin)));
$date_passport_expire=$pdf->str_query('tb_passport',$id_tb_person,'date_passport_expire');
$pdf->setXY( $x_absolute, $y_absolute +  ($r*23)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'วันที่passport หมดอายุ : '.$pdf->convert_data_format($date_passport_expire)));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*24)  );
//count_date_passport
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'จำนวนวันของ passport : '.$pdf->str_query('tb_passport',$id_tb_person,'count_date_passport').' วัน'));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*25)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'สถานที่ออก passport : '.$pdf->str_query('tb_passport',$id_tb_person,'place_passport')));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*26)  );
$date_passport=$pdf->convert_data_format($pdf->str_query('tb_passport',$id_tb_person,'date_passport'));
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'วันที่ออกpassport : '.$date_passport));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*27)  );
$date_report=$pdf->convert_data_format($pdf->str_query('tb_passport',$id_tb_person,'date_report'));
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'วันที่รายงานตัวครั้งล่าสุด : '.$date_passport));



/*## ขออนุญาติทำงาน และ ขออนุมัติทำงาน  */
$pdf->SetFont('angsana','BU',20);
$pdf->setXY( $x_absolute, $y_absolute +  ($r*28)  );
//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ขออนุญาติทำงาน และ ขออนุมัติทำงาน' ) );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ขออนุญาติทำงาน' ) );
$pdf->setXY( $x_absolute, $y_absolute +  ($r*29)  );
$pdf->SetFont('angsana','',16);
$date_permission=$pdf->convert_data_format($pdf->str_query('tb_permission',$id_tb_person,'date_permission'));
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'วันที่ขออนุญาติทำงาน : '.$date_permission));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*30)  );
$authoriz_sjj=$pdf->str_query('tb_permission',$id_tb_person,'authoriz_sjj');
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'ออกให้โดย สจจ. : '.$authoriz_sjj));
$authoriz_sjk=$pdf->str_query('tb_permission',$id_tb_person,'authoriz_sjk');
$pdf->setXY( $x_absolute, $y_absolute +  ($r*31)  );
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'ออกให้โดย สจก. : '.$authoriz_sjk));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*32)  );
$shot=$pdf->str_query('tb_permission',$id_tb_person,'date_shot');
$date_shot=$pdf->convert_data_format($shot);
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'กำหนดนัดอื่น : '.$date_shot));
$pdf->setXY( $x_absolute, $y_absolute +  ($r*33)  );
$remark=$pdf->str_query('tb_permission',$id_tb_person,'remark');
$pdf->MultiCell( 0  , 1 , iconv( 'UTF-8','cp874' , 'หมายเหตุ : '.$remark));

//$pdf->Footer();
//##-------- กันหน้า 2-----------------------
//## ข้อมูลทักษะและประสพการทำงาน (หัวข้อย่อยของ  ขออนุญาติทำงาน และ ขออนุมัติทำงาน)  Modify code 11-3-57
//$pdf->header_number($x_absolute,$y_absolute +  ($r*39),2);
//$pdf->title1_($x_absolute,$y_absolute); //หัวโปรแกรม
$pdf->SetFont('angsana','B',18);
$pdf->setXY( $x_absolute, $y_absolute + ($r*36) );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ข้อมูลทักษะและประสพการทำงาน' ) );

$pdf->SetFont('angsana','',16);
$pdf->Ln(5);
$study=$pdf->str_query('tb_permission',$id_tb_person,'study');
$pdf->Cell( 30  , 5 , iconv( 'UTF-8','cp874' , 'ระดับการศึกษา : '.$study ) ,0, 1,'L' );

//$pdf->Ln();
$academy=$pdf->str_query('tb_permission',$id_tb_person,'academy');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'สถานศึกษา : '.$academy ) ,0, 1,'L' );

$aptitude=$pdf->str_query('tb_permission',$id_tb_person,'aptitude');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'ความถนัดความสามารถในการทำงาน : '.$aptitude ) ,0, 1,'L' );

//## 11-3-57 ขออนุมัติทำงาน
$pdf->Ln();
$pdf->SetFont('angsana','BU',20);
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'ขออนุมัติทำงาน') ,0, 1,'L' );
$pdf->SetFont('angsana','',16);

//tb_authorization
$resign=$pdf->str_query('tb_authorization',$id_tb_person,'resign');
$pdf->Ln(1);
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'การลาออก : '.$resign) ,0, 1,'L' );
$date_resign=$pdf->str_query('tb_authorization',$id_tb_person,'date_resign');
//.$pdf->convert_data_format($date_report)
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'วันที่ยื่นใบลาออก : '.$pdf->convert_data_format($date_resign)) ,0, 1,'L' );
$date_authorization=$pdf->str_query('tb_authorization',$id_tb_person,'date_authorization');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'วันที่อนุมัติ : '.$pdf->convert_data_format($date_authorization)) ,0, 1,'L' );
$because_resign=$pdf->str_query('tb_authorization',$id_tb_person,'because_resign');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'สาเหตุการลาออก : '.$because_resign) ,0, 1,'L' );
$date_inform_resign=$pdf->str_query('tb_authorization',$id_tb_person,'date_inform_resign');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'วันที่แจ้งออกจากงาน : '.$pdf->convert_data_format($date_inform_resign)) ,0, 1,'L' );
$remark=$pdf->str_query('tb_authorization',$id_tb_person,'remark');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'หมายเหตุ : '.$remark) ,0, 1,'L' );


//## 12-3-57 ข้อมูลประกันสังคม  //tb_social_security
$pdf->Ln();
$pdf->SetFont('angsana','BU',20);
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'ข้อมูลประกันสังคม') ,0, 1,'L' );
$pdf->SetFont('angsana','',16);
$number_social_security=$pdf->str_query('tb_social_security',$id_tb_person,'number_social_security');
$pdf->Ln(1);
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'เลขที่ประกันสังคม : '.$number_social_security) ,0, 1,'L' );
$date_submitted=$pdf->str_query('tb_social_security',$id_tb_person,'date_submitted');
//$pdf->convert_data_format($pdf->str_query('tb_passport',$id_tb_person,'date_passport'));
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'วันที่ยื่นประกันสังคม : '.$pdf->convert_data_format($pdf->str_query('tb_social_security',$id_tb_person,'date_submitted'))) ,0, 1,'L' );
$date_pay=$pdf->str_query('tb_social_security',$id_tb_person,'date_pay');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'วันกำหนดชำระเบี้ยประกันสังคม : '.$pdf->convert_data_format($pdf->str_query('tb_social_security',$id_tb_person,'date_pay'))) ,0, 1,'L' );
$claim=$pdf->str_query('tb_social_security',$id_tb_person,'claim');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'ข้อมูลการขอใช้สิทธิ์ประกันสังคม : '.$claim) ,0, 1,'L' );
$other_social_security=$pdf->str_query('tb_social_security',$id_tb_person,'other_social_security');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'หมายเหตุอื่นๆ : '.$other_social_security) ,0, 1,'L' );

//## 12-3-57 ข้อมูลวันลา,ลากิจ,ขาด  //tb_leave_work
$pdf->Ln();
$pdf->SetFont('angsana','BU',20);
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'ข้อมูลวันลา,ลากิจ,ขาด') ,0, 1,'L' );
$pdf->SetFont('angsana','',16);
$day_work=$pdf->str_query('tb_leave_work',$id_tb_person,'day_work');
$pdf->Ln(1);
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'จำนวนวันทำงาน  : '.$day_work.' วัน') ,0, 1,'L' );
$day_summer=$pdf->str_query('tb_leave_work',$id_tb_person,'day_summer');
$pdf->Ln(1);
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'จำนวนวันพักร้อน : '.$day_work.' วัน') ,0, 1,'L' );
$day_carer=$pdf->str_query('tb_leave_work',$id_tb_person,'day_carer');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'จำนวนวันลากิจ  : '.$day_carer.' วัน') ,0, 1,'L' );
$day_sick=$pdf->str_query('tb_leave_work',$id_tb_person,'day_sick');
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' ,'จำนวนวันลาป่วย  : '.$day_sick.' วัน') ,0, 1,'L' );        
$day_absence=$pdf->str_query('tb_leave_work',$id_tb_person,'day_absence');  
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' ,'จำนวนวันขาด  : '.$day_absence.' วัน') ,0, 1,'L' ); 
$revenue=$pdf->str_query('tb_leave_work',$id_tb_person,'revenue'); 
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' ,'รายได้ : '.$revenue.' บาท') ,0, 1,'L' ); 

$pdf->Output();
}


?>