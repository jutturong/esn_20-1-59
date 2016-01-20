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
					//$this->setXY( $x_absolute + 160 , $y_absolute - 20 );  //สำหรับแนวตั้ง
					$this->setXY( $x_absolute + 240 , $y_absolute - 20 );//สำหรับแนวนอน
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  '.$page )  );
					
	   
	   
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
					//$this->setXY( $x_absolute + 20 , $y_absolute - 10 ); //สำหรับแนวตั้ง
					$this->setXY( $x_absolute + 80 , $y_absolute - 10 ); //สำหรับแนวนอน
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 2) แบบบันทึกการติดตามการรักษา ' )  );
	   }
	   
	    function  title3_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					//$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->setXY( $x_absolute + 80 , $y_absolute - 10 ); //สำหรับแนวนอน
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 3) แบบบันทึกการนอนรักษาพยาบาล' )  );
	   }
	   
	   	    function  title4_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					//$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->setXY( $x_absolute + 80 , $y_absolute - 10 ); //สำหรับแนวนอน
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 4) แบบบันทึกการรักษาพยาบาลในห้องพยาบาลฉุกเฉิน' )  );
	   }

	   	    function  title5_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					//$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->setXY( $x_absolute + 80 , $y_absolute - 10 ); //สำหรับแนวนอน
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 5) แบบบันทึกการเยี่ยมบ้านของผู้ป่วย' )  );
	   }
	   
	   	    
			 function  title6_($x_absolute,$y_absolute)
	   {
	   			    $this->SetFont('angsana','B',18);
					//$this->setXY( $x_absolute + 20 , $y_absolute - 10 );
					$this->setXY( $x_absolute + 80 , $y_absolute - 10 ); //สำหรับแนวนอน
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 6) แบบบันทึกการเสียชีวิตของผู้ป่วย' )  );
	   }


	   
	   function   footer_($x_absolute,$y_absolute,$r)
	   {
	   
	   
	                    $this->SetFont('angsana','I',12);
					//	$this->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 41 );  //สำหรับแนวตั้ง
						$this->setXY( $x_absolute + 100 , $y_absolute + ($r*20) + 24 );
						$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );

	   }

}

 
$pdf=new PDF('L','mm','A4');  //ของเดิม   P – แนวตั้ง (default)   L – แนวนอ
//$pdf=new FPDF( 'L' , 'mm' , 'A4' );


//$pdf->Cell(0,10,'a');

 
 $pdf->SetMargins( 10,25,1 );
 
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');
 
//สร้างหน้าเอกสาร
//$pdf->AddPage();
 

//$pdf->Cell(0,10,'t');

// กำหนดฟอนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 12
//$pdf->SetFont('angsana','',12);
// พิมพ์ข้อความลงเอกสาร
//$pdf->setXY( 10, 10  );
//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อังสนา ตัวธรรมดา ขนาด 12' ) );


 
/*$pdf->SetFont('angsana','B',16);
$pdf->setXY( 10, 20  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อังสนา ตัวหนา ขนาด 16' )  );
*/

 
/*$pdf->SetFont('angsana','I',24);
$pdf->setXY( 10, 30  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อังสนา ตัวเอียง ขนาด 24' )  );
*/

 
/*$pdf->SetFont('angsana','BI',32);
$pdf->setXY( 10, 40  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อังสนา ตัวหนาเอียง ขนาด 32' )  );
*/


##-------------report appendix 

// กำหนดฟอนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 12

// พิมพ์ข้อความลงเอกสาร
//$pdf->setXY( 90, 10  );
//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'แสดงรายละเอียดของ appendix 1' ) );

//echo  "<br>";




//******** รายละเอียดเพิ่ม
  /*
      $pdf->Cell( 5  , 10 , iconv( 'UTF-8','cp874' , 'ชื่อ' ),'TLB');
	   5 คือ  ความกว้างด้าน x
	   10 คือ ความกว้างด้าน y
	   T คือ เส้นด้าน TOP
	   L คือ  เส้นด้าน LEFT
	   ฺB  คือ  เส้น  Bottom
	   
	   Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
	   
	   $pdf->Cell( 5  , 10 , iconv( 'UTF-8','cp874' , 'ชื่อ' ),'TLB');
	   
	   
	   คำอธิบาย
สำหรับพิมพ์ข้อความลงในเอกสาร pdf

พารามิเตอร์
w : (ตัวเลข) ความกว้างของกล่องข้อความ ถ้าระบุเป็น 0 กล่องจะกว้างไปจนถึงกั้นขวาของกระดาษ
h : (ตัวเลข) ความสูงของกล่องข้อความ ค่าดีฟอลต์เป็น 0
txt : (ตัวหนังสือ) ข้อความที่ต้องการพิมพ์
border : เส้นขอบของกล่องข้อความ

ค่าที่เป็นไปได้
0 : ไม่มีขอบ
1 : มีขอบ
นอกจากเป็น 0 1 แล้วเรายังระบุได้ด้วยว่าเอาเฉพาะกรอบด้านไหนได้ด้วย
L: ขอบซ้าย
T: ขอบบน
R: ขอบขวา
B: ขอบล่าง
ln : (ตัวเลข) ระบุว่าหลังจากพิมพ์ข้อความในกล่องเสร็จแล้ว ให้เลื่อนเคอเซ่อร์ไปทางไหน

ค่าที่เป็นไปได้
0: ปล่อยไว้ที่เดิม
1: เลื่อนไปเริ่มต้นที่บรรทัดใหม่
2: เลื่อนลงไปด้านล่างของกล่องข้อความ
align : (ตัวหนังสือ) จัดเรียงข้อความภายในกล่อง

ค่าที่เป็นไปได้
L or ค่าว่าง : ชิดซ้าย (default value)
C: จัดกึ่งกลาง
R: ชิดขวา
fill : (true/false) แรเงากล่องข้อความหรือไม่หรือไม่ สำหรับสีที่จะใช้ในการแรเงานั้นกำหนดได้ด้วยคำสั่ง SetFillColor ซึ่งจะอธิบายในบทต่อๆ ไป

ค่าที่เป็นไปได้
false : ไม่แรเงา (default)
true : แรเงา
link : (ตัวหนังสือ) URL เว็บไซต์ ในกรณีเราต้องการพิมพ์ข้อความนี้ให้เป็นไฮเปอร์ลิ้งก์
	         0        10          iconv          
    Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
  */
 // พิมพ์ข้อความลงเอกสาร  มีกรอบด้วย


// พิมพ์ข้อความลงเอกสาร  มีกรอบ พารามิเตอร์ระบุอย่างนี้ก็ได้
//$pdf->Cell( 40  , 10 , iconv( 'UTF-8','cp874' , 'นามสกุล' ) , 'TBR' );

//		$pdf->Cell( 50  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่ติดตามผู้ป่วย :' ),'L','0','C');  ==========> ตัวอย่างการใช้
//		$pdf->Cell( 50  ,  15 , iconv( 'UTF-8','cp874' , ''.$date_follow_patient.'' ),'R','1','L');  =========> ตัวอย่างการใช้



$appen=trim($_GET['appen']);
$id_appendix=trim($_GET['id_appendix']);


if (  $appen  >  0   &&  $id_appendix  )
{ //==========================if (  $appen  >  0   &&  $id_appendix  )
     
	             
switch(	$appen )
{ //===========================switch(	$appen )

       case 2:
	   {  //=========>case 2			
					
/*				    $query="select *  from  $tb   
					left join  province  on  $tb.prov_id  = province.prov_id
					left join  occupational  on $tb.occupational_id=occupational.occupational_id
					left join  education   on  $tb.education_id  =  education.education_id
					left  join   payment   on  $tb.payment_id  =  payment.payment_id
					left  join  epilepsy_first  on  $tb.epilepsy_first  =  epilepsy_first.epilepsy_first_id
					left  join  ctmri   on  $tb.nature_CT_MRI  =  ctmri.id_CTMRI
					left  join  drug  on  $tb.drug_id = drug.drug_id
					left  join  disease_drug  on  $tb.disease_drug_id = disease_drug.disease_drug_id 
					left  join   nature_drug_epilepsy   on  $tb.nature_drug_epilepsy_id=nature_drug_epilepsy.nature_drug_epilepsy_id
					left  join   stimulate_epilepsy        on  $tb.stimulate_epilepsy_id=stimulate_epilepsy.stimulate_epilepsy_id
					where  $tb.id_appendix1=$id_appendix";
*/					
					
					   $tb="tb_appendix2";
								  
								   $query="select *  from  $tb   
								       left join  tb_appendix1  on  tb_appendix1.id_appendix1=$tb.id_appendix1
					                where  $tb.id_appendix2=$id_appendix";

					
					$result=mysql_query($query);
					while( $row=mysql_fetch_object($result)  )
					{
					    $HN=$row->HN;
						$person_id=$row->person_id;
						$ep_no=$row->ep_no;	
						$name=$row->name;
						$surname=$row->surname;
						$sex=$row->sex; //เพศ เพศ 1=ชาย 2=หญิง
						
						if( $sex == 1 )
						{
						    $sex_detail="ชาย";
						}
						elseif( $sex == 2   )
						{
						     $sex_detail="หญิง";
						}
							$address=$row->address;
							$telephone=$row->telephone;
						    $birthdate=$row->birthdate;
						    $age=$row->age;
							
							
							
					     $date_follow_patient=$row->date_follow_patient;
						 $count_ep=$row->count_ep;
					     $compare_lasttime=$row->compare_lasttime; 
						 $ep_lasttime=$row->ep_lasttime;
						 $weight=$row->weight; 
						 $medicine_level=$row->medicine_level;
						 $medicine=$row->medicine;
						 $problem=$row->problem;
						 $date_record=$row->date_record;

                    }	   


$pdf->AddPage();

//====#####################=== heading content  ของ  report
$pdf->SetFont('angsana','B',16);
       $cell_y=10;	
	   
	   			 
		 $pdf->Cell( 17  , $cell_y , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',false); //$pdf->Cell( 10  , 10 , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',true); ถ้าเป็น true จะเป็นการแลเงาทึบ
		// $pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , 'นามสกุล' ),'TLB');
		 $pdf->Cell( 33  , $cell_y , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน' ),'1','0','C',false);
		 $pdf->Cell( 20  , $cell_y, iconv( 'UTF-8','cp874' , 'Epilepsy No' ),'1','0','C',false);
		 $pdf->Cell( 35  ,$cell_y , iconv( 'UTF-8','cp874' , 'ชื่อ-นามสกุล' ),'1','0','C',false);
		 $pdf->Cell( 10  , $cell_y , iconv( 'UTF-8','cp874' , 'เพศ' ),'1','0','C',false);
		  $pdf->Cell( 20  , $cell_y , iconv( 'UTF-8','cp874' , 'อายุ' ),'1','0','C',false); //'1','1'==>ขึ้นบรรทัดใหม่,'C',false
		   $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี เกิด' ),'1','0','C',false);
		  $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'เบอร์โทรศัพท์' ),'1','0','C',false);
		  $pdf->Cell( 60  , $cell_y , iconv( 'UTF-8','cp874' , 'ที่อยู่' ),'1','1','C',false);  // 1,1=>คือขึ้นบรรทัดใหม่
		
//====#####################===  heading content  ของ  report	 

//$pdf->Ln();//คำสั่งสำหรับขึ้นบรรทัดใหม่

//======================> content ============================================================
$pdf->SetFont('angsana','',16);	
		
		
		$y_v=20;
		//$pdf->Cell( 17  , $cell_y_plus , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','T',false );
		$pdf->Cell( 17  , $y_v , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','L',false );
		
		
		$pdf->Cell( 33  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$person_id.'' ),'1','0','L',false);
		$pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$ep_no.'' ),'1','0','L',false);
		$pdf->Cell( 35  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$name.'  '.$surname.'' ),'1','0','L',false);
		
		
		$pdf->Cell( 10  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$sex_detail.'' ),'1','0','L',false);
		  
		  $pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$age.'' ),'1','0','C',false);
		  
		   $pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$birthdate.'' ),'1','0','C',false);
		
		$pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$telephone.'' ),'1','0','C',false);
		
		$pdf->MultiCell( 60  ,  20 , iconv( 'UTF-8','cp874' , ''.$address.'' ),'1','1');
		
//$pdf->Ln();//คำสั่งสำหรับขึ้นบรรทัดใหม่

		$max_width=255; //ระยะสุดของขอบ
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่ติดตามผู้ป่วย : '.$date_follow_patient.'' ),'LBR','1','L');
		//$pdf->Cell( 50  ,  15 , iconv( 'UTF-8','cp874' , ''.$date_follow_patient.'' ),'RB','1','L');
		
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'จำนวนครั้งของอาการชักในช่วง 1 เดือนที่ผ่านมา (ครั้ง/เดือน) : '.$count_ep.'' ),'LBR','1','L');
//		$pdf->Cell( 10  ,  15 , iconv( 'UTF-8','cp874' , ''.$count_ep.'' ),'RBT','1','L');
		
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'ระยะเวลาที่เป็นเมื่อเทียบกับครั้งก่อน : '.$compare_lasttime.'' ),'LBR','1','L');
//		$pdf->Cell( 100  ,  15 , iconv( 'UTF-8','cp874' , 'ระดับความรุนแรงเมื่อเทียบกับครั้งก่อน :' ),'LBT','0','L');
//		$pdf->Cell( 10  ,  15 , iconv( 'UTF-8','cp874' , ''.$compare_lasttime.'' ),'RBT','1','L');

		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'ระดับความรุนแรงของอาการชักเมื่อเทียบกับครั้งก่อน : '.$ep_lasttime.'' ),'LBR','1','L');
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'น้ำหนัก : '.$weight.' กิโลกรัม' ),'LBR','1','L');
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'ระดับยาในเลือด : '.$medicine_level.'' ),'LBR','1','L');
		
		
//======================> content ============================================================


		 
		  $x_absolute=30; //พิกัด X
          $y_absolute=25; //พิกัด Y
		  $page="1";
		  $r=7;  //ระยะห่าง
				
//====================================  head + footer  + page =====================				
				  $pdf->header_number($x_absolute,$y_absolute,$page);
				  $pdf->title2_($x_absolute,$y_absolute);
				  $pdf->footer_($x_absolute,$y_absolute,$r);
//====================================  head + footer  + page =====================				


$pdf->AddPage();
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'ยาที่ได้รับ : '.$medicine.'' ),'LBRT','1','L');
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'ปัญหาการใช้ยาที่เกิดขึ้น : '.$problem.'' ),'LBR','1','L');
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่บันทึกข้อมูล : '.$date_record.'' ),'LBR','1','L');
//======================> content ============================================================


		 
		  $x_absolute=30; //พิกัด X
          $y_absolute=25; //พิกัด Y
		  $page="2";
		  $r=7;  //ระยะห่าง
				
//====================================  head + footer  + page =====================				
				  $pdf->header_number($x_absolute,$y_absolute,$page);
				  $pdf->title2_($x_absolute,$y_absolute);
				  $pdf->footer_($x_absolute,$y_absolute,$r);
//====================================  head + footer  + page =====================				

				   	
$pdf->Output();


                break;
          } //end  case 2
//-----------------------------------------------------------------case 2		  
		  case 3:
		  {
						  $pdf->AddPage();
						  
		 
		 					   $tb="tb_appendix3";
								  
								   $query="select *  from  $tb   
								       left join  tb_appendix1  on  tb_appendix1.id_appendix1=$tb.id_appendix1
									   
									   
					left  join   admit_epilepsy  on  $tb.id_admit=admit_epilepsy.id_admit
					left  join    pay_status       on   $tb.id_pay = pay_status.id_pay 
					left  join   type_pay        on  $tb.id_type_pay=type_pay.id_type_pay
									   
									   
									   
									   
					                where  $tb.id_appendix3=$id_appendix";

					
					$result=mysql_query($query);
					while( $row=mysql_fetch_object($result)  )
					{

					    $HN=$row->HN;
						$person_id=$row->person_id;
						$ep_no=$row->ep_no;	
						$name=$row->name;
						$surname=$row->surname;
						$sex=$row->sex; //เพศ เพศ 1=ชาย 2=หญิง
						
						if( $sex == 1 )
						{
						    $sex_detail="ชาย";
						}
						elseif( $sex == 2   )
						{
						     $sex_detail="หญิง";
						}
							$address=$row->address;
							$telephone=$row->telephone;
						    $birthdate=$row->birthdate;
						    $age=$row->age;
							
							
							
							
							
							 $date_admit=$row->date_admit;
							 $date_pay=$row->date_pay;
							 
							 $id_admit=$row->id_admit;
							 $admit_detail=$row->admit_detail;
                             $detail_admit=$row->detail_admit;
							 
							 $preservation=$row->preservation;
							 
							 $id_pay=$row->id_pay;
							 
							 $detail=$row->detail;
							 $detail_pay=$row->detail_pay;
							 
							 $id_type_pay=$row->id_type_pay;
							 
							 $detail=$row->detail; //สถานะจำหน่าย
							 
							 $type_pay=$row->type_pay; //รายละเอียดประเภทจำหน่าย
							 
							 $other_id_type_pay=$row->other_id_type_pay;

		 					 $date_record=$row->date_record;
		            }
		 
		 
		
$pdf->SetFont('angsana','B',16);
       $cell_y=10;	
	   
	   			 
		 $pdf->Cell( 17  , $cell_y , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',false); //$pdf->Cell( 10  , 10 , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',true); ถ้าเป็น true จะเป็นการแลเงาทึบ
		// $pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , 'นามสกุล' ),'TLB');
		 $pdf->Cell( 33  , $cell_y , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน' ),'1','0','C',false);
		 $pdf->Cell( 20  , $cell_y, iconv( 'UTF-8','cp874' , 'Epilepsy No' ),'1','0','C',false);
		 $pdf->Cell( 35  ,$cell_y , iconv( 'UTF-8','cp874' , 'ชื่อ-นามสกุล' ),'1','0','C',false);
		 $pdf->Cell( 10  , $cell_y , iconv( 'UTF-8','cp874' , 'เพศ' ),'1','0','C',false);
		  $pdf->Cell( 20  , $cell_y , iconv( 'UTF-8','cp874' , 'อายุ' ),'1','0','C',false); //'1','1'==>ขึ้นบรรทัดใหม่,'C',false
		   $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี เกิด' ),'1','0','C',false);
		  $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'เบอร์โทรศัพท์' ),'1','0','C',false);
		  $pdf->Cell( 60  , $cell_y , iconv( 'UTF-8','cp874' , 'ที่อยู่' ),'1','1','C',false);
		
//====#####################===  heading content  ของ  report	 


//$pdf->Ln();//คำสั่งสำหรับขึ้นบรรทัดใหม่


$pdf->SetFont('angsana','',16);	
		
		
		$y_v=20;
		//$pdf->Cell( 17  , $cell_y_plus , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','T',false );
		$pdf->Cell( 17  , $y_v , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','L',false );
		
		
		$pdf->Cell( 33  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$person_id.'' ),'1','0','L',false);
		$pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$ep_no.'' ),'1','0','L',false);
		$pdf->Cell( 35  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$name.'  '.$surname.'' ),'1','0','L',false);
		
		
		$pdf->Cell( 10  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$sex_detail.'' ),'1','0','L',false);
		  
		  $pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$age.'' ),'1','0','C',false);
		  
		   $pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$birthdate.'' ),'1','0','C',false);
		
		$pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$telephone.'' ),'1','0','C',false);
		
		$pdf->MultiCell( 60  ,  20 , iconv( 'UTF-8','cp874' , ''.$address.'' ),'1','1');
		

		$max_width=255; //ระยะสุดของขอบ
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่เข้านอนรักษา : '.$date_admit.'' ),'LBR','1','L');
		//$pdf->Cell( 50  ,  15 , iconv( 'UTF-8','cp874' , ''.$date_follow_patient.'' ),'RB','1','L');
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่จำหน่าย : '.$date_pay.'' ),'LBR','1','L');
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'รูปแบบการชักที่เป็นอยู่ ณ วันที่นอนรักษา : '.$admit_detail.' '.$detail_admit ),'LBR','1','L');
		
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'สรุปการรักษาที่ได้รับ : '.$preservation.'' ),'LBR','1','L');
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'สถานะจำหน่าย : '.$detail.'' ),'LBR','1','L');
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'รายละเอียดเพิ่มเติม : '.$detail_pay.'' ),'LBR','1','L');

	

		
		  $x_absolute=30; //พิกัด X
          $y_absolute=25; //พิกัด Y
		  $page="1";
		  $r=7;  //ระยะห่าง
				
//====================================  head + footer  + page =====================				
				  $pdf->header_number($x_absolute,$y_absolute,$page);
				  $pdf->title3_($x_absolute,$y_absolute);
				  $pdf->footer_($x_absolute,$y_absolute,$r);
						  
					
						  
						  
						  
						  
					$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'ประเภทจำหน่าย : '.$type_pay.' '.$other_id_type_pay.'' ),'LBRT','1','L');
					
					$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่บันทึกข้อมูล : '.$date_record.'' ),'LBR','1','L');

					
							  $x_absolute=30; //พิกัด X
          $y_absolute=25; //พิกัด Y
		  $page="2";
		  $r=7;  //ระยะห่าง
				
//====================================  head + footer  + page =====================				
				  $pdf->header_number($x_absolute,$y_absolute,$page);
				  $pdf->title3_($x_absolute,$y_absolute);
				  $pdf->footer_($x_absolute,$y_absolute,$r);

					
						  $pdf->Output();		  
		  
		     break;
		  }  
		 case 4:
		 {
		      
			  						  $pdf->AddPage();
						  
		 
		 					   $tb="tb_appendix4";
								  
								   $query="select *  from  $tb   
								       left join  tb_appendix1  on  tb_appendix1.id_appendix1=$tb.id_appendix1
									   
									   
					left  join  admit_epilepsy   on  $tb.id_admit  =  admit_epilepsy.id_admit
					left   join   receiving_treatment     on   $tb.id_treatment = receiving_treatment.id_treatment
									   
									   
									   
									   
					                where  $tb.id_appendix4=$id_appendix";

					
					$result=mysql_query($query);
					while( $row=mysql_fetch_object($result)  )
					{

					    $HN=$row->HN;
						$person_id=$row->person_id;
						$ep_no=$row->ep_no;	
						$name=$row->name;
						$surname=$row->surname;
						$sex=$row->sex; //เพศ เพศ 1=ชาย 2=หญิง
						
						if( $sex == 1 )
						{
						    $sex_detail="ชาย";
						}
						elseif( $sex == 2   )
						{
						     $sex_detail="หญิง";
						}
							$address=$row->address;
							$telephone=$row->telephone;
						    $birthdate=$row->birthdate;
						    $age=$row->age;
							
							
							
						 $date_ICU=$row->date_ICU;
						 $id_admit=$row->id_admit;
						 $detail_admit=$row->detail_admit;
						 $id_treatment=$row->id_treatment;
						 
						 $admit_detail=$row->admit_detail;  //รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้ารักษาในห้องฉุกเฉิน
						 
						 $detail_admit=$row->detail_admit ;
						 $treatment=$row->treatment; //ผลการรักษา
	
					     $date_record=$row->date_record;
						 
						 $summary_treatment=$row->summary_treatment; //สรุปการรักษาที่ได้รับ

			       }// end  while
			  
			  
			  
$pdf->SetFont('angsana','B',16);
       $cell_y=10;	
	   
	   			 
		 $pdf->Cell( 17  , $cell_y , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',false); //$pdf->Cell( 10  , 10 , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',true); ถ้าเป็น true จะเป็นการแลเงาทึบ
		// $pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , 'นามสกุล' ),'TLB');
		 $pdf->Cell( 33  , $cell_y , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน' ),'1','0','C',false);
		 $pdf->Cell( 20  , $cell_y, iconv( 'UTF-8','cp874' , 'Epilepsy No' ),'1','0','C',false);
		 $pdf->Cell( 35  ,$cell_y , iconv( 'UTF-8','cp874' , 'ชื่อ-นามสกุล' ),'1','0','C',false);
		 $pdf->Cell( 10  , $cell_y , iconv( 'UTF-8','cp874' , 'เพศ' ),'1','0','C',false);
		  $pdf->Cell( 20  , $cell_y , iconv( 'UTF-8','cp874' , 'อายุ' ),'1','0','C',false); //'1','1'==>ขึ้นบรรทัดใหม่,'C',false
		   $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี เกิด' ),'1','0','C',false);
		  $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'เบอร์โทรศัพท์' ),'1','0','C',false);
		  $pdf->Cell( 60  , $cell_y , iconv( 'UTF-8','cp874' , 'ที่อยู่' ),'1','1','C',false);
		
//====#####################===  heading content  ของ  report	 


//$pdf->Ln();//คำสั่งสำหรับขึ้นบรรทัดใหม่


$pdf->SetFont('angsana','',16);	
		
		
		$y_v=20;
		//$pdf->Cell( 17  , $cell_y_plus , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','T',false );
		$pdf->Cell( 17  , $y_v , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','L',false );
		
		
		$pdf->Cell( 33  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$person_id.'' ),'1','0','L',false);
		$pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$ep_no.'' ),'1','0','L',false);
		$pdf->Cell( 35  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$name.'  '.$surname.'' ),'1','0','L',false);
		
		
		$pdf->Cell( 10  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$sex_detail.'' ),'1','0','L',false);
		  
		  $pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$age.'' ),'1','0','C',false);
		  
		   $pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$birthdate.'' ),'1','0','C',false);
		
		$pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$telephone.'' ),'1','0','C',false);
		
		$pdf->MultiCell( 60  ,  20 , iconv( 'UTF-8','cp874' , ''.$address.'' ),'1','1');


		$max_width=255; //ระยะสุดของขอบ
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่เข้าการรักษาในห้องฉุกเฉิน : '.$date_ICU.'' ),'LBR','1','L');
		//$pdf->Cell( 50  ,  15 , iconv( 'UTF-8','cp874' , ''.$date_follow_patient.'' ),'RB','1','L');

		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้ารักษาในห้องฉุกเฉิน : '.$admit_detail.' '.$detail_admit.'' ),'LBR','1','L');


		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'สรุปผลการรักษาที่ได้รับ : '.$summary_treatment.'' ),'LBR','1','L');

		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'ผลการรักษา : '.$treatment.'' ),'LBR','1','L');
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่บันทึกข้อมูล : '.$date_record.'' ),'LBR','1','L');
	  
		  $x_absolute=30; //พิกัด X
          $y_absolute=25; //พิกัด Y
		  $page="1";
		  $r=7;  //ระยะห่าง
				
//====================================  head + footer  + page =====================				
				  $pdf->header_number($x_absolute,$y_absolute,$page);
				  $pdf->title4_($x_absolute,$y_absolute);
				  $pdf->footer_($x_absolute,$y_absolute,$r);

			  
			   $pdf->Output();	
			    
		    break;
		 } 
		 case 5:
		 {
		 
		 
			  				   $pdf->AddPage();
						  
		 
		 					   $tb="tb_appendix5";
								  
								   $query="select *  from  $tb   
								       left join  tb_appendix1  on  tb_appendix1.id_appendix1=$tb.id_appendix1
									   
									   
					                where  $tb.id_appendix5=$id_appendix";
									
												$result=mysql_query($query);
					while( $row=mysql_fetch_object($result)  )
					{

					    $HN=$row->HN;
						$person_id=$row->person_id;
						$ep_no=$row->ep_no;	
						$name=$row->name;
						$surname=$row->surname;
						$sex=$row->sex; //เพศ เพศ 1=ชาย 2=หญิง
						
						if( $sex == 1 )
						{
						    $sex_detail="ชาย";
						}
						elseif( $sex == 2   )
						{
						     $sex_detail="หญิง";
						}
							$address=$row->address;
							$telephone=$row->telephone;
						    $birthdate=$row->birthdate;
						    $age=$row->age;
							
							
						  $date_visit=$row->date_visit;
						  $problem=$row->problem;

                          $date_record=$row->date_record;
		
		           } 
				   
				   
				   
				   
$pdf->SetFont('angsana','B',16);
       $cell_y=10;	
	   
	   			 
		 $pdf->Cell( 17  , $cell_y , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',false); //$pdf->Cell( 10  , 10 , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',true); ถ้าเป็น true จะเป็นการแลเงาทึบ
		// $pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , 'นามสกุล' ),'TLB');
		 $pdf->Cell( 33  , $cell_y , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน' ),'1','0','C',false);
		 $pdf->Cell( 20  , $cell_y, iconv( 'UTF-8','cp874' , 'Epilepsy No' ),'1','0','C',false);
		 $pdf->Cell( 35  ,$cell_y , iconv( 'UTF-8','cp874' , 'ชื่อ-นามสกุล' ),'1','0','C',false);
		 $pdf->Cell( 10  , $cell_y , iconv( 'UTF-8','cp874' , 'เพศ' ),'1','0','C',false);
		  $pdf->Cell( 20  , $cell_y , iconv( 'UTF-8','cp874' , 'อายุ' ),'1','0','C',false); //'1','1'==>ขึ้นบรรทัดใหม่,'C',false
		   $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี เกิด' ),'1','0','C',false);
		  $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'เบอร์โทรศัพท์' ),'1','0','C',false);
		  $pdf->Cell( 60  , $cell_y , iconv( 'UTF-8','cp874' , 'ที่อยู่' ),'1','1','C',false);
				   
		
//$pdf->Ln();//คำสั่งสำหรับขึ้นบรรทัดใหม่


$pdf->SetFont('angsana','',16);	
		
		
		$y_v=20;
		//$pdf->Cell( 17  , $cell_y_plus , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','T',false );
		$pdf->Cell( 17  , $y_v , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','L',false );
		
		
		$pdf->Cell( 33  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$person_id.'' ),'1','0','L',false);
		$pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$ep_no.'' ),'1','0','L',false);
		$pdf->Cell( 35  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$name.'  '.$surname.'' ),'1','0','L',false);
		
		
		$pdf->Cell( 10  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$sex_detail.'' ),'1','0','L',false);
		  
		  $pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$age.'' ),'1','0','C',false);
		  
		   $pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$birthdate.'' ),'1','0','C',false);
		
		$pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$telephone.'' ),'1','0','C',false);
		
		$pdf->MultiCell( 60  ,  20 , iconv( 'UTF-8','cp874' , ''.$address.'' ),'1','1');


		
		
		$max_width=255; //ระยะสุดของขอบ
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่เยี่ยมบ้าน : '.$date_visit.'' ),'LBR','1','L');
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'ปัญหาที่พบ : '.$problem.'' ),'LBR','1','L');
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่บันทึกข้อมูล : '.$date_record.'' ),'LBR','1','L');


		  $x_absolute=30; //พิกัด X
          $y_absolute=25; //พิกัด Y
		  $page="1";
		  $r=7;  //ระยะห่าง
				
//====================================  head + footer  + page =====================				
				  $pdf->header_number($x_absolute,$y_absolute,$page);
				  $pdf->title5_($x_absolute,$y_absolute);
				  $pdf->footer_($x_absolute,$y_absolute,$r);

		
		
		 $pdf->Output();	
		 
		    break;
		 }
		 
		 case 6:
		 {
		 
		 
			  				   $pdf->AddPage();
						  
		 
		 					   $tb="tb_appendix6";
								  
								   $query="select *  from  $tb   
								       left join  tb_appendix1  on  tb_appendix1.id_appendix1=$tb.id_appendix1
					                where  $tb.id_appendix6=$id_appendix";

					
					$result=mysql_query($query);
					while( $row=mysql_fetch_object($result)  )
					{

					    $HN=$row->HN;
						$person_id=$row->person_id;
						$ep_no=$row->ep_no;	
						$name=$row->name;
						$surname=$row->surname;
						$sex=$row->sex; //เพศ เพศ 1=ชาย 2=หญิง
						
						if( $sex == 1 )
						{
						    $sex_detail="ชาย";
						}
						elseif( $sex == 2   )
						{
						     $sex_detail="หญิง";
						}
							$address=$row->address;
							$telephone=$row->telephone;
						    $birthdate=$row->birthdate;
						    $age=$row->age;
							
							
						  $date_dead=$row->date_dead;
						  $result_dead=$row->result_dead;
						  $date_record=$row->date_record;
							
				   }
				   
				   
$pdf->SetFont('angsana','B',16);
       $cell_y=10;	
	   
	   			 
		 $pdf->Cell( 17  , $cell_y , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',false); //$pdf->Cell( 10  , 10 , iconv( 'UTF-8','cp874' , 'HN' ),'1','0','C',true); ถ้าเป็น true จะเป็นการแลเงาทึบ
		// $pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , 'นามสกุล' ),'TLB');
		 $pdf->Cell( 33  , $cell_y , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน' ),'1','0','C',false);
		 $pdf->Cell( 20  , $cell_y, iconv( 'UTF-8','cp874' , 'Epilepsy No' ),'1','0','C',false);
		 $pdf->Cell( 35  ,$cell_y , iconv( 'UTF-8','cp874' , 'ชื่อ-นามสกุล' ),'1','0','C',false);
		 $pdf->Cell( 10  , $cell_y , iconv( 'UTF-8','cp874' , 'เพศ' ),'1','0','C',false);
		  $pdf->Cell( 20  , $cell_y , iconv( 'UTF-8','cp874' , 'อายุ' ),'1','0','C',false); //'1','1'==>ขึ้นบรรทัดใหม่,'C',false
		   $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี เกิด' ),'1','0','C',false);
		  $pdf->Cell( 30  , $cell_y , iconv( 'UTF-8','cp874' , 'เบอร์โทรศัพท์' ),'1','0','C',false);
		  $pdf->Cell( 60  , $cell_y , iconv( 'UTF-8','cp874' , 'ที่อยู่' ),'1','1','C',false);
				   
		
//$pdf->Ln();//คำสั่งสำหรับขึ้นบรรทัดใหม่


$pdf->SetFont('angsana','',16);	
		
		
		$y_v=20;
		//$pdf->Cell( 17  , $cell_y_plus , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','T',false );
		$pdf->Cell( 17  , $y_v , iconv( 'UTF-8','cp874' , ''.$HN.'' ),'1','0','L',false );
		
		
		$pdf->Cell( 33  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$person_id.'' ),'1','0','L',false);
		$pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$ep_no.'' ),'1','0','L',false);
		$pdf->Cell( 35  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$name.'  '.$surname.'' ),'1','0','L',false);
		
		
		$pdf->Cell( 10  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$sex_detail.'' ),'1','0','L',false);
		  
		  $pdf->Cell( 20  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$age.'' ),'1','0','C',false);
		  
		   $pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$birthdate.'' ),'1','0','C',false);
		
		$pdf->Cell( 30  ,  $y_v , iconv( 'UTF-8','cp874' , ''.$telephone.'' ),'1','0','C',false);
		
		$pdf->MultiCell( 60  ,  20 , iconv( 'UTF-8','cp874' , ''.$address.'' ),'1','1');



		$max_width=255; //ระยะสุดของขอบ
		
		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่เสียชีวิต: '.$date_dead.'' ),'LBR','1','L');

		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'สาเหตุการเสียชีวิต : '.$result_dead.'' ),'LBR','1','L');


		$pdf->Cell( $max_width  ,  15 , iconv( 'UTF-8','cp874' , 'วัน-เดือน-ปี ที่บันทึกข้อมูล : '.$date_record.'' ),'LBR','1','L');

		  $x_absolute=30; //พิกัด X
          $y_absolute=25; //พิกัด Y
		  $page="1";
		  $r=7;  //ระยะห่าง
				
//====================================  head + footer  + page =====================				
				  $pdf->header_number($x_absolute,$y_absolute,$page);
				  $pdf->title6_($x_absolute,$y_absolute);
				  $pdf->footer_($x_absolute,$y_absolute,$r);
				   
				   	 $pdf->Output();				
		 
		 }

   }//===========================switch(	$appen )				  
}//==========================if (  $appen  >  0   &&  $id_appendix  )			  
			  


?>