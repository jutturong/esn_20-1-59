 <?
 require_once("../config.php");
define('FPDF_FONTPATH','font/');
require('../fpdf.php');

class PDF extends FPDF
{

       function  header_($x_absolute,$y_absolute) //เลขหน้า
	   {
	   
	                $this->SetFont('angsana','B',12);
					$this->setXY( $x_absolute + 160 , $y_absolute - 20 );
					$this->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  1' )  );
					
	   
	   
	   }
	   
	   function  header_number($x_absolute,$y_absolute,$page) //เลขหน้า
	   {
	   
	                $this->SetFont('angsana','B',12);
					$this->setXY( $x_absolute + 160 , $y_absolute - 20 );
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

}

 
    $appen=trim($_GET['appen']);  //เรียก appendix
    $id_appendix=trim($_GET['id_appendix']); // id_appendix
 
 
$pdf=new PDF('P','mm','A4');  //ของเดิม



//$pdf->Cell(0,10,'a');
$pdf->SetMargins( 25,25,5 );


// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');
 
//สร้างหน้าเอกสาร
$pdf->AddPage();


if(   $id_appendix > 0 )
{  //if

	             
				    $tb="tb_appendix1";
				    $query="select *  from  $tb   
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
					$result=mysql_query($query);
					
					//left  join  main_amphur  on $tb.amphur_id = main_amphur.amphur_id
					//left join  province  on  $tb.district_id  = main_district.district_id
					
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
						
						$prov_name=$row->prov_name;
						$amphur_id=$row->amphur_id; //อำเภอ
						
						$a="select  *  from  main_amphur where  amphur_id=$amphur_id;";
						$q_a=mysql_query($a);
						while($row_2=mysql_fetch_object($q_a) )
						{
						     $amphur_name=$row_2->amphur_name;
							 
						}
						
						$district_id=$row->district_id;
						
						$b="select  *  from  main_district  where  district_id=$district_id;";
						$q_b=mysql_query($b);
						while($row_3=mysql_fetch_object($q_b) )
						{
						     $district_name=$row_3->district_name;
							 
						}

                         $zipcode=$row->zipcode;
						 $address=$row->address;
						 $telephone=$row->telephone;
						 $birthdate=$row->birthdate;
						 $age=$row->age;
						 
						 $occupational_id=$row->occupational_id;
						 $occupational=$row->occupational;
						 
						 $education=$row->education;
						 
						 $payment=$row->payment;
						 
						 $age_payment=$row->age_payment;
						 
						 $age_sick=$row->age_sick;
						 
						 $epilepsy_first=$row->epilepsy_first;
						 
						 $epilepsy_first_content=$row->epilepsy_first_content;
						 
						 $detail_epilepsy_first=$row->detail_epilepsy_first;
						 
						 $current_epilepsy=$row->current_epilepsy;
						 
						 $other_current_epilepsy=$row->other_current_epilepsy;
						 
						 $ever_EEG=$row->ever_EEG;
						 
						 $results_EEG=$row->results_EEG;
						 
						 $ever_CT_MRI=$row->ever_CT_MRI;
						 
						 $result_CT_MRI=$row->result_CT_MRI;
						 
						 $nature_CT_MRI=$row->nature_CT_MRI ;
						 
						 $CTMRI=$row->CTMRI;
						 
						 $other_Nature_CT_MRI=$row->other_Nature_CT_MRI;
						 
						 $drug_id=$row->drug_id;
						 
						 $drug=$row->drug;
						 
						 $drug_other =$row->drug_other;
						 
						 $disease_drug_id =$row->disease_drug_id;
						 
						 $disease_drug=$row->disease_drug;
						 
						 $disease_drug_other=$row->disease_drug_other;
						 
						 $allergic=$row->allergic;
						 
						 $allergic_detail=$row->allergic_detail;
						 
						 $drug_epilepsy =$row->drug_epilepsy;
						 
						 $drug_epilepsy_detail=$row->drug_epilepsy_detail;
						 
						 $nature_drug_epilepsy_id=$row->nature_drug_epilepsy_id;
						 
						 $nature_drug_epilepsy=$row->nature_drug_epilepsy;
						 
						 $Nature_drug_epilepsy_other=$row->Nature_drug_epilepsy_other;
						 
						 $stimulate_epilepsy_id=$row->stimulate_epilepsy_id;
						 
						 $stimulate_epilepsy=$row->stimulate_epilepsy;
						 
						 $stimulate_epilepsy_other=$row->stimulate_epilepsy_other;
						 
						 $interview_date=$row->interview_date;
						 
						 $interview_name=$row->interview_name;
						 
						 $interview_lastname=$row->interview_lastname;
						
					}
					
		 
		  $x_absolute=30; //พิกัด X
          $y_absolute=25; //พิกัด Y
		  $r=7;  //ระยะห่าง

				
##---------------------------------- Appendix 1 -------------------------------------------------------------------------------------------------				
					//$pdf->SetFont('angsana','B',12);
					//$pdf->setXY( $x_absolute + 160 , $y_absolute - 20 );
					//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  1' )  );
					
					//$pdf->header_($x_absolute,$y_absolute);
					$page=1;
					$pdf->header_number($x_absolute,$y_absolute,$page);
				//	$pdf->SetFont('angsana','B',18);
				//	$pdf->setXY( $x_absolute + 20 , $y_absolute - 10 );
				//	$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 1) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา (first visit)' )  );
				
				    $pdf->title1_($x_absolute,$y_absolute); //หัวโปรแกรม
					//$va=" (Appendix 1) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา (first visit) ";
					//$pdf->title1_($x_absolute,$y_absolute,$va);  //หัวโปรแกรม
					

 				   $pdf->SetFont('angsana','',16);
				   $pdf->setXY( $x_absolute, $y_absolute  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'HN : '.$HN.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน : '.$person_id.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*2)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Epilepsy No : '.$ep_no.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*3)   );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ชื่อ - นามสกุล : '.$name.'  '.$surname.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*4) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เพศ : '.$sex_detail.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*5) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'จังหวัด : '.$prov_name.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*6) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อำเภอ : '.$amphur_name.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*7) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตำบล : '.$district_name.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*8) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รหัสไปรษณีย์ : '. $zipcode.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*9) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ที่อยู่ : '. $address.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*10) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'โทรศัพท์ : '. $telephone.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*11) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี เกิด : '. $birthdate.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*12) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อายุ : '.$age.' ปี' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*13) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อาชีพ : '.$occupational ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*14) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระดับการศึกษา : '.$education ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*15) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'สิทธิทางการรักษา  : '.$payment ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*16) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เริ่มมีอาการชักเมื่ออายุ  : '.$age_payment.' ปี' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*17) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ชักมาแล้ว  : '.$age_sick.' ปี' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*18) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รูปแบบการชักที่เป็นครั้งแรก  : '.$epilepsy_first_content ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*19) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รูปแบบการชักที่เป็นครั้งแรก  : '.$epilepsy_first_content ) );

				   
				    if( $epilepsy_first == 8 )
					{
									   
									    $pdf->setXY( $x_absolute, $y_absolute + ($r*20) );
				                        $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อื่นๆ ระบุ ( รูปแบบการชักที่เป็นครั้งแรก ) : '.$detail_epilepsy_first ) );

					
					}
					
					if(  $current_epilepsy > 0  )
					{
					        $c="select  *  from   epilepsy_first  where  epilepsy_first_id=$current_epilepsy;";
							$q_c=mysql_query($c);
								while($row_3=mysql_fetch_object($q_c) )
								{
									 $epilepsy_first_content=$row_3->epilepsy_first_content;
									 
								}
					
					}
					
					$pdf->setXY( $x_absolute, $y_absolute + ($r*21) );
				    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน   : '.$epilepsy_first_content ) );

				    if(  strlen($other_current_epilepsy) > 0 )
					{
						 $pdf->setXY( $x_absolute, $y_absolute + ($r*22) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อื่นๆ ระบุ ( รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน ) : '.$other_current_epilepsy ) );
					}		
					
                            switch($ever_EEG)
							{
							   case 1:
							   {
							       $ever_EEG_d="เคย";
							      break;
							   }
							   case  2:
							   {
							        $ever_EEG_d="ไม่เคย";
							      break;
							   }
							}

						 $pdf->setXY( $x_absolute, $y_absolute + ($r*23) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เคยตรวจ EEG มาก่อนหรือไม่ : '.$ever_EEG_d ) );
						 
						 
						// $results_EEG
						                            switch($results_EEG)
							{
							   case 1:
							   {
							       $results_EEG_d="ปกติ";
							      break;
							   }
							   case  2:
							   {
							        $results_EEG_d="ผิดปกติ";
							      break;
							   }
							}
							
							
						 $pdf->setXY( $x_absolute, $y_absolute + ($r*24) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ผลการตรวจ EEG : '.$results_EEG_d ) );

                         //ever_CT_MRI
						 switch($ever_CT_MRI)
							{
							   case 1:
							   {
							       $ever_CT_MRI_d="เคย";
							      break;
							   }
							   case  2:
							   {
							        $ever_CT_MRI_d="ไม่เคย";
							      break;
							   }
							}
						 
						 $pdf->setXY( $x_absolute, $y_absolute + ($r*25) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เคยตรวจ CT/MRI มาก่อนหรือไม่ : '.$ever_CT_MRI_d ) );

						 //$result_CT_MRI
							switch($result_CT_MRI)
							{
							   case 1:
							   {
							       $result_CT_MRI_d="ปกติ";
							        break;
							   }
							   case  2:
							   {
							        $result_CT_MRI_d="ไม่ปกติ";
							      break;
							   }
							}
 
						 $pdf->setXY( $x_absolute, $y_absolute + ($r*26) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ผลการตรวจ CT/MRI : '.$result_CT_MRI_d ) );

                          //$CTMRI
						  
						  $pdf->setXY( $x_absolute, $y_absolute + ($r*27) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ลักษณะความผิดปกติจาก CT/MRI : '.$CTMRI ) );
						 
						
						
						
						 if( $nature_CT_MRI  == 14  )
						 {
						    		 $pdf->setXY( $x_absolute, $y_absolute + ($r*28) );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อื่นๆ ระบุ ( ลักษณะความผิดปกติจาก CT/MRI ) : '.$other_Nature_CT_MRI ) );
						 }

						 			 $pdf->setXY( $x_absolute, $y_absolute + ($r*29) );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความแรงและแบบแผนการใช้ยา : '.$drug ) );

                         if( $drug_id == 9 )
						 {
						 			 $pdf->setXY( $x_absolute, $y_absolute + ($r*30) );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อื่นๆ ระบุ( ยาที่ได้รับ ) : '.$drug_other ) );
						 }
						 
			
			
			     //   $pdf->SetFont('angsana','I',12);
				//	$pdf->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 40 );
				//	$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );
			        $pdf->footer_($x_absolute,$y_absolute,$r);  //footer
					
					
					
			$pdf->AddPage();  //ขึ้นหน้าใหม่	
			
				
			             //$pdf->SetFont('angsana','B',12);
					
					
					//$pdf->setXY( $x_absolute + 160 , $y_absolute - 20 );
					//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  2' )  );
					
					//$pdf->SetFont('angsana','B',18);
					//$pdf->setXY( $x_absolute + 20 , $y_absolute - 10 );
					//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(Appendix 1) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา (first visit)' )  );
						 //$pdf->header_($x_absolute,$y_absolute);
						  $pdf->header_number($x_absolute,$y_absolute,2);
						  $pdf->title1_($x_absolute,$y_absolute);

 				  		 	
            $pdf->SetMargins( 25,25,10 );
								
							
							
							         $pdf->SetFont('angsana','',16);	
									 $pdf->setXY( $x_absolute, $y_absolute + ($r) );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'โรคร่วมของอื่่นๆ ของผู้ป่วย : '.$disease_drug ) );

						  if( $disease_drug_id == 5 )
						  {
						  			 $pdf->setXY( $x_absolute, $y_absolute + ($r*2) );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระุบุ (โรคร่วมของอื่่นๆ ของผู้ป่วย) : '.$disease_drug_other ) );
						  }
						  
						      switch($allergic)
							  {
							      case 1:
								  {
								       $allergic_d="ไม่เคย";
								    break;
								  }
								  case  2:
								  {
								      $allergic_d="เคย";
								    break;
								  }
							  } 
							 		 $pdf->setXY( $x_absolute, $y_absolute + ($r*3) );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ประวัติการแพ้ยา : '.$allergic_d ) );
 
							  if ( $allergic == 2 )
							  {
							  		 $pdf->setXY( $x_absolute, $y_absolute + ($r*4) );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เคยแพ้ยา : '.$allergic_detail ) );

							  }
							  
							  if( $drug_epilepsy > 0 )
							  {
							       $d="select  *   from   drug  where  drug_id=$drug_epilepsy";
								   $q_d=mysql_query($d);
								   while($row_4=mysql_fetch_object($q_d) )
									{
										 $drug=$row_4->drug;
										 
									}
							  		 $pdf->setXY( $x_absolute, $y_absolute + ($r*5) );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ยากันชักที่แพ้ : '.$drug ) );
							  } 
							  
		//	$pdf=new FPDF('P','mm','A4');
 
		
			
							  
							  
							   if( $drug_epilepsy == 9 )
								  {
								  	 $pdf->setXY( $x_absolute, $y_absolute  + ($r*6)  );
				        			 $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อื่นๆ (ยากันชักที่แพ้) : '.$drug_epilepsy_detail ) );
								  }
								  
	
		 
		 

 							  if( $nature_drug_epilepsy_id == 6 )
							  {
								   $pdf->setXY( $x_absolute, $y_absolute + ($r*7)  );
				        	       $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อื่นๆ ระุบุ ( ลักษณะการแพ้ยากันชัก ) : '.$Nature_drug_epilepsy_other ) );
							  }
							  
							  
							  
							      $pdf->setXY( $x_absolute, $y_absolute + ($r*8) );
				        	      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'สิ่งที่กระตุ้นให้เกิดอาการชัก : '.$stimulate_epilepsy ) );
								  
							if(  $stimulate_epilepsy_id == 5 )
							{
								  $pdf->setXY( $x_absolute, $y_absolute + ($r*9) );
				        	      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อื่นๆ ระบุ ( สิ่งที่กระตุ้นให้เกิดอาการชัก ) : '.$stimulate_epilepsy_other ) );

							
							}
							
								  $pdf->setXY( $x_absolute, $y_absolute + ($r*10) );
				        	      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันที่สัมภาษณ์  : '.$interview_date ) );

								  $pdf->setXY( $x_absolute, $y_absolute + ($r*11) );
				        	      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ผู้กรอกข้อมูล  : '.$interview_name.'  '.$interview_lastname ) );


                       //  $pdf->SetFont('angsana','I',12);
					//	$pdf->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 40 );
					//	$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );
					$pdf->footer_($x_absolute,$y_absolute,$r);  //footer
					
					
					
##---------------------------------- Appendix 2 -------------------------------------------------------------------------------------------------				
				    
					
					$tb2="tb_appendix2";
				    $ap2="select  *  from   $tb2  
					
					where  id_appendix1=$id_appendix;";
				       // $pdf->SetFont('angsana','I',12);
						//$pdf->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 40 );
					//	$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );   
					
					$q_qpp2=mysql_query($ap2);
				    while($row=mysql_fetch_object($q_qpp2))
					{
					     $date_follow_patient=$row->date_follow_patient;
						 $count_ep=$row->count_ep;
					     $compare_lasttime=$row->compare_lasttime; 
						 $ep_lasttime=$row->ep_lasttime;
						 $weight=$row->weight; 
						 $medicine_level=$row->medicine_level;
						 $medicine=$row->medicine;
						 $problem=$row->problem;
					}		
					
					$pdf->AddPage();  //ขึ้นหน้าใหม่	
						
				   //$pdf->header_($x_absolute,$y_absolute);
				   $pdf->header_number($x_absolute,$y_absolute,3);
				   $pdf->title2_($x_absolute,$y_absolute);
				   
				   
				   $pdf->SetFont('angsana','',16);	
				   $pdf->setXY( $x_absolute, $y_absolute  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'HN : '.$HN.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน : '.$person_id.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*2)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Epilepsy No : '.$ep_no.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*3)   );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ชื่อ - นามสกุล : '.$name.'  '.$surname.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*4) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เพศ : '.$sex_detail.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*5) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ที่อยู่ : '. $address.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*6) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'โทรศัพท์ : '. $telephone.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*7) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี เกิด : '. $birthdate.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*8) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อายุ : '.$age.' ปี' ) );

						
						
						 $pdf->setXY( $x_absolute, $y_absolute + ($r*9) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี ที่ติดตามผู้ป่วย : '.$date_follow_patient ) );
						
						  $pdf->setXY( $x_absolute, $y_absolute + ($r*10) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '่จำนวนครั้งของอาการชักในช่วง 1 เดือนที่ผ่านมา : '.$count_ep.' ครั้ง ' ) );

						 $pdf->setXY( $x_absolute, $y_absolute + ($r*11) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระยะเวลาที่เป็นเมื่อเทียบกับครั้งก่อน : '.$compare_lasttime ) );

						 $pdf->setXY( $x_absolute, $y_absolute + ($r*12) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระดับความรุนแรงของอาการชักเมื่อเทียบกับครั้งก่อน : '.$ep_lasttime ) );

						 $pdf->setXY( $x_absolute, $y_absolute + ($r*13) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'น้ำหนัก : '.$weight.' กิโลกรัม ' ) );

						 $pdf->setXY( $x_absolute, $y_absolute + ($r*14) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระดับยาในเลือด : '.$medicine_level ) );
						 
						  $pdf->setXY( $x_absolute, $y_absolute + ($r*15) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ยาที่ได้รับ : '.$medicine ) );

						  $pdf->setXY( $x_absolute, $y_absolute + ($r*16) );
				         $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ปัญหาการใช้ยาที่เกิดขึ้น : '.$problem ) );



						$pdf->footer_($x_absolute,$y_absolute,$r);
						
						
##---------------------------------- Appendix 3 -------------------------------------------------------------------------------------------------				

				   $pdf->AddPage();  //ขึ้นหน้าใหม่	
						
				   //$pdf->header_($x_absolute,$y_absolute);
				   $pdf->header_number($x_absolute,$y_absolute,4);
				   $pdf->title3_($x_absolute,$y_absolute);

				   
				   $pdf->SetFont('angsana','',16);	
				   $pdf->setXY( $x_absolute, $y_absolute  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'HN : '.$HN.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน : '.$person_id.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*2)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Epilepsy No : '.$ep_no.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*3)   );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ชื่อ - นามสกุล : '.$name.'  '.$surname.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*4) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เพศ : '.$sex_detail.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*5) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ที่อยู่ : '. $address.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*6) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'โทรศัพท์ : '. $telephone.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*7) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี เกิด : '. $birthdate.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*8) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อายุ : '.$age.' ปี' ) );







					$tb3="tb_appendix3";
				    $ap3="select  *  from   $tb3  
					left  join   admit_epilepsy  on  $tb3.id_admit=admit_epilepsy.id_admit
					left  join    pay_status       on   $tb3.id_pay = pay_status.id_pay 
					left  join   type_pay        on  $tb3.id_type_pay=type_pay.id_type_pay
					where  id_appendix1=$id_appendix;";
				       // $pdf->SetFont('angsana','I',12);
						//$pdf->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 40 );
					//	$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );   
					
					$q_qpp3=mysql_query($ap3);
				    while($row_3=mysql_fetch_object($q_qpp3))
					{
                             $date_admit=$row_3->date_admit;
							 $date_pay=$row_3->date_pay;
							 
							 $id_admit=$row_3->id_admit;
							 $admit_detail=$row_3->admit_detail;
                             $detail_admit=$row_3->detail_admit;
							 
							 $preservation=$row_3->preservation;
							 
							 $id_pay=$row_3->id_pay;
							 
							 $detail=$row_3->detail;
							 $detail_pay=$row_3->detail_pay;
							 
							 $id_type_pay=$row_3->id_type_pay;
							 $type_pay=$row_3->type_pay;
							 
							 $other_id_type_pay=$row_3->other_id_type_pay;
					}	


                   $pdf->setXY( $x_absolute, $y_absolute + ($r*9) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี ที่เข้านอนรักษา : '.$date_admit ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*10) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี ที่จำหน่าย : '.$date_pay ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*11) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา : '.$admit_detail ) );

				   if( 	$id_admit == 9 )
				   {
				   	  $pdf->setXY( $x_absolute, $y_absolute + ($r*12) );
				      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ' อื่นๆ ระุบุ ( รูปแบบการชักฯ ) : '.$detail_admit ) );
				   }
				   
				   	  $pdf->setXY( $x_absolute, $y_absolute + ($r*13) );
				      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ' สรุปการรักษาที่ได้รับ : '.$preservation ) );

				   	
					  $pdf->setXY( $x_absolute, $y_absolute + ($r*14) );
				      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ' สถานะจำหน่าย : '.$detail ) );
					  
					  $pdf->setXY( $x_absolute, $y_absolute + ($r*15) );
				      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ' รายละเอียดเพิ่มเติม : '.$detail_pay ) );

					  $pdf->setXY( $x_absolute, $y_absolute + ($r*16) );
				      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ' ประเภทจำหน่าย : '.$type_pay ) );

                     if(  $id_type_pay == 6 )
					 {
					      $pdf->setXY( $x_absolute, $y_absolute + ($r*17) );
				          $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ' อื่นๆ : '.$other_id_type_pay ) );
  
					 
					 } 


						
					
$pdf->footer_($x_absolute,$y_absolute,$r);



##---------------------------------- Appendix 4 -------------------------------------------------------------------------------------------------				
				   $pdf->AddPage();  //ขึ้นหน้าใหม่	
						
				   //$pdf->header_($x_absolute,$y_absolute);
				   $pdf->header_number($x_absolute,$y_absolute,5);
				   $pdf->title4_($x_absolute,$y_absolute);

				   
				   $pdf->SetFont('angsana','',16);	
				   $pdf->setXY( $x_absolute, $y_absolute  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'HN : '.$HN.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน : '.$person_id.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*2)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Epilepsy No : '.$ep_no.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*3)   );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ชื่อ - นามสกุล : '.$name.'  '.$surname.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*4) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เพศ : '.$sex_detail.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*5) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ที่อยู่ : '. $address.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*6) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'โทรศัพท์ : '. $telephone.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*7) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี เกิด : '. $birthdate.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*8) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อายุ : '.$age.' ปี' ) );
				   
				   
				    $tb4="tb_appendix4";
				    $ap4="select  *  from   $tb4  
					left  join  admit_epilepsy   on  $tb4.id_admit  =  admit_epilepsy.id_admit
					left   join   receiving_treatment     on   $tb4.id_treatment = receiving_treatment.id_treatment
					where  id_appendix1=$id_appendix;";
				       // $pdf->SetFont('angsana','I',12);
						//$pdf->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 40 );
					//	$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );   
					
					$q_qpp4=mysql_query($ap4);
				    while($row=mysql_fetch_object($q_qpp4))
					{
                         // $date_visit=$row->date_visit;
						 // $problem=$row->problem;
						 $date_ICU=$row->date_ICU;
						 $id_admit=$row->id_admit;
						 $detail_admit=$row->detail_admit;
						 $id_treatment=$row->id_treatment;
						 
						 $admit_detail=$row->admit_detail;
						 
						 $detail_admit=$row->detail_admit ;
						 $treatment=$row->treatment;
					}
					
					
					
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*9) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี ที่เข้ารักษาในห้องฉุกเิฉิน : '.$date_ICU ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*10) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้ารักษาในห้องฉุกเฉิน : '.$admit_detail ) );

                       //$detail_admit
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*11) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้ารักษาในห้องฉุกเฉิน : '.$detail_admit ) );
                      
					  //	treatment
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*12) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ผลการรักษา : '.$treatment ) );
	


$pdf->footer_($x_absolute,$y_absolute,$r);

##---------------------------------- Appendix 5 -------------------------------------------------------------------------------------------------				
				   $pdf->AddPage();  //ขึ้นหน้าใหม่	
						
				   //$pdf->header_($x_absolute,$y_absolute);
				   $pdf->header_number($x_absolute,$y_absolute,6);
				   $pdf->title5_($x_absolute,$y_absolute);

				   
				   $pdf->SetFont('angsana','',16);	
				   $pdf->setXY( $x_absolute, $y_absolute  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'HN : '.$HN.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน : '.$person_id.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*2)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Epilepsy No : '.$ep_no.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*3)   );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ชื่อ - นามสกุล : '.$name.'  '.$surname.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*4) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เพศ : '.$sex_detail.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*5) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ที่อยู่ : '. $address.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*6) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'โทรศัพท์ : '. $telephone.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*7) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี เกิด : '. $birthdate.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*8) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อายุ : '.$age.' ปี' ) );



				    $tb5="tb_appendix5";
				    $ap5="select  *  from   $tb5  
					
					where  id_appendix1=$id_appendix;";
				       // $pdf->SetFont('angsana','I',12);
						//$pdf->setXY( $x_absolute + 50 , $y_absolute + ($r*30) + 40 );
					//	$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '- EEC โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก' )  );   
					
					$q_qpp5=mysql_query($ap5);
				    while($row=mysql_fetch_object($q_qpp5))
					{
                          $date_visit=$row->date_visit;
						  $problem=$row->problem;
					}		


				   $pdf->setXY( $x_absolute, $y_absolute + ($r*9) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี ที่เยี่ยมบ้าน : '.$date_visit ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*10) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ปัญหาที่พบ : '.$problem ) );


$pdf->footer_($x_absolute,$y_absolute,$r);

##---------------------------------- Appendix 6 -------------------------------------------------------------------------------------------------				
				   $pdf->AddPage();  //ขึ้นหน้าใหม่	
						
				   //$pdf->header_($x_absolute,$y_absolute);
				   $pdf->header_number($x_absolute,$y_absolute,7);
				   $pdf->title6_($x_absolute,$y_absolute);

				   
				   $pdf->SetFont('angsana','',16);	
				   $pdf->setXY( $x_absolute, $y_absolute  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'HN : '.$HN.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เลขที่บัตรประชาชน : '.$person_id.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*2)  );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Epilepsy No : '.$ep_no.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*3)   );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ชื่อ - นามสกุล : '.$name.'  '.$surname.'' ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*4) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เพศ : '.$sex_detail.'' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*5) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ที่อยู่ : '. $address.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*6) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'โทรศัพท์ : '. $telephone.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*7) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี เกิด : '. $birthdate.'' ) );

                   $pdf->setXY( $x_absolute, $y_absolute + ($r*8) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อายุ : '.$age.' ปี' ) );
				   
				   $pdf->setXY( $x_absolute, $y_absolute + ($r*9) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน เดือน ปี  ที่เสียชีวิต : '.$date_dead ) );

				   $pdf->setXY( $x_absolute, $y_absolute + ($r*10) );
				   $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'สาเหตุการเสียชีวิต : '.$result_dead ) );
				   

$pdf->footer_($x_absolute,$y_absolute,$r);


  $pdf->Output();

} //end if

?>