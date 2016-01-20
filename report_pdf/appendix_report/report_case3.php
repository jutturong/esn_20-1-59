<?php
##---- PDF ---
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

$x_absolute=25; //พิกัด X
$y_absolute=20; //พิกัด Y
$r=7;  //ระยะห่าง

##-- PAGE 1   
##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  1' )  );
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

##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   ) //ให้ convert จาก date thai เป็น Eng ก่อน แล้วค่อย convert กลับเป็น วัน-เดือน-ปี ไทย งงปะ 55555
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 
##--หัวตาราง
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 3 รายละเอียดผลลัพธ์ของการจัดการปัญหาที่เกี่ยวข้องกับการใช้ยาโดยเภสัชกร' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่เกี่ยวข้องกับการใช้ยา' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , 'บทบาทเภสัชกรในการจัดการปัญหา' ) , LRT , 0 , 'C' , true );
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหาที่จัดการ' ) , 1 , 1 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหา' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 60  , 7 , iconv( 'UTF-8','cp874' , 'ผลลัพธ์ของการจัดการปัญหา' ) , LRT , 1 , 'C' , true );
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR, 0  ,C,true     );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'เกี่ยวข้องกับการใช้ยา' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , '' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'ที่จัดการ' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Resdved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Improved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'NotImproved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , 'N/A' ) , TLRB , 1 , 'C' , true );

#-- Content ---
//$pdf->SetFillColor(255,255, 255);
//-- Give Information
$pdf->SetFont('angsana','',14);
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'Give Information') , TLR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[0] ) , LRT , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[0] ) , LRT , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , TLR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , TLR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , TLR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , TLR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[1] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[2] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[3] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[4] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[5] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[5] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//--- Non-compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'Non-compliance'),LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//=========================1.Over dosage
#$arr_non=array(1=>'Over dosage',2=>'Under dosage',3=>'Not compliance with the life style',4=>'Incorrect technique');
#$arr_non[1]=Over dosage
#arr_non=array(1=>'Over dosage',2=>'Under dosage',3=>'Not compliance with the life style',4=>'Incorrect technique');
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '1. '.$arr_non[1]  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','I',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  'ทั้งหมด' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_result_non_all[1] ) , LR , 0 , 'C' , false );  
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[1][4] ) , LR , 1 , 'C' , false );

 

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); 
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '  กับผู้ป่วย' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#Adjust for appropriate therapy  
#$name_adj="- Adjust for appropriate therapy";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_adj  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[1][1]  ) , LR , 0 , 'C' , false ); //arr_adj_sub
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[1][4] ) , LR , 1 , 'C' , false );

// #Correct technique of administration = Y or N (1 or 0);
// $name_corr="- Correct technique of administration";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_corr ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_corr_sub[1][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[1][4] ) , LR , 1 , 'C' , false );

//#Improve compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_im ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_im[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_im_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[1][4] ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_drug ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_drug[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_drug_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[1][4] ) , LR , 1 , 'C' , false );

//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_life[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_life_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[1][4] ) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_tox[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_tox_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[1][4] ) , LR , 1 , 'C' , false );

//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_pre[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_pre_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[1][4] ) , LR , 1 , 'C' , false );

//#กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[1][4]  ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[1][4]  ) , LR , 1 , 'C' , false );

//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[1][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[1][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[1][4]  ) , LR , 1 , 'C' , false );

//#Suggest changing medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sug  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[1][4]  ) , LR , 1 , 'C' , false );


//#Suggest laboratory
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sugl  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[1][4]  ) , LR , 1 , 'C' , false );


//==========================2.Under dosage
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '2. '.$arr_non[2]  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','I',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  'ทั้งหมด' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_result_non_all[2] ) , LR , 0 , 'C' , false );  
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[2][4] ) , LR , 1 , 'C' , false );

#2.Prevent
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','B',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '- Prevent' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act1_all[2][1] ) , LR , 0 , 'C' , false ); //$arr_act1_all
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][1][4] ) , LR , 1 , 'C' , false );

#- กับผู้ป่วย
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '  กับผู้ป่วย' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#Adjust for appropriate therapy  
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_adj  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[2][1]  ) , LR , 0 , 'C' , false ); //arr_adj_sub
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[2][4] ) , LR , 1 , 'C' , false );

// #Correct technique of administration = Y or N (1 or 0);
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LRB , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_corr ) , BLR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr[2] ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_corr_sub[2][1]  ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[2][2] ) , LBR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[2][3] ) , LBR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[2][4] ) , LBR , 1 , 'C' , false );

//footer
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');


##-----PAGE 2------------------------
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

##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   ) //ให้ convert จาก date thai เป็น Eng ก่อน แล้วค่อย convert กลับเป็น วัน-เดือน-ปี ไทย งงปะ 55555
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 
##--หัวตาราง
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 3 รายละเอียดผลลัพธ์ของการจัดการปัญหาที่เกี่ยวข้องกับการใช้ยาโดยเภสัชกร' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่เกี่ยวข้องกับการใช้ยา' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , 'บทบาทเภสัชกรในการจัดการปัญหา' ) , LRT , 0 , 'C' , true );
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหาที่จัดการ' ) , 1 , 1 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหา' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 60  , 7 , iconv( 'UTF-8','cp874' , 'ผลลัพธ์ของการจัดการปัญหา' ) , LRT , 1 , 'C' , true );
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR, 0  ,C,true     );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'เกี่ยวข้องกับการใช้ยา' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , '' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'ที่จัดการ' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Resdved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Improved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'NotImproved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , 'N/A' ) , TLRB , 1 , 'C' , true );


##---- CONTENT PAGE 2 ----------------------
//#Improve compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_im ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_im[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_im_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[2][4] ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_drug ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_drug[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_drug_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[2][4] ) , LR , 1 , 'C' , false );

//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_life[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_life_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][4] ) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_tox[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_tox_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][4] ) , LR , 1 , 'C' , false );

//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_pre[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_pre_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][4] ) , LR , 1 , 'C' , false );

//#กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Suggest changing medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sug  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Suggest laboratory
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sugl  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[2][4]  ) , LR , 1 , 'C' , false );


/*
 #2.Prevent
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','B',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '- Prevent' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act1_all[2][1] ) , LR , 0 , 'C' , false ); //$arr_act1_all
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][1][4] ) , LR , 1 , 'C' , false );
 */

#2. Under Dosage ->Correct
#$arr_act1=array(1=>'Prevent',2=>'Correct');
#$arr_act1_all[][]=array();
#$arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');  
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','B',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '- Correct' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act1_all[2][2] ) , LR , 0 , 'C' , false ); 
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[2][2][4] ) , LR , 1 , 'C' , false );

# กับผู้ป่วย
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); 
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '  กับผู้ป่วย' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#Adjust for appropriate therapy  
#$name_adj="- Adjust for appropriate therapy";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_adj  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[2][1]  ) , LR , 0 , 'C' , false ); //arr_adj_sub
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[2][4] ) , LR , 1 , 'C' , false );

// #Correct technique of administration = Y or N (1 or 0);
// $name_corr="- Correct technique of administration";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_corr ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_corr_sub[2][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[2][4] ) , LR , 1 , 'C' , false );

//#Improve compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_im ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_im[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_im_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[2][4] ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_drug ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_drug[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_drug_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[2][4] ) , LR , 1 , 'C' , false );

//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_life[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_life_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][4] ) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_tox[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_tox_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][4] ) , LR , 1 , 'C' , false );

//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_pre[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_pre_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][4] ) , LR , 1 , 'C' , false );

//#กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_life[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_life_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[2][4] ) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LBR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LRB , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_tox[2] ) , LRB , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_tox_sub[2][1] ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][2]  ) , LBR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][3] ) , LBR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[2][4] ) , LBR , 1 , 'C' , false );

//footer
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');


## PAGE 3
$pdf->AddPage();
##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  3' )  );
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

##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   ) //ให้ convert จาก date thai เป็น Eng ก่อน แล้วค่อย convert กลับเป็น วัน-เดือน-ปี ไทย งงปะ 55555
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 
##--หัวตาราง
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 3 รายละเอียดผลลัพธ์ของการจัดการปัญหาที่เกี่ยวข้องกับการใช้ยาโดยเภสัชกร' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่เกี่ยวข้องกับการใช้ยา' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , 'บทบาทเภสัชกรในการจัดการปัญหา' ) , LRT , 0 , 'C' , true );
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหาที่จัดการ' ) , 1 , 1 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหา' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 60  , 7 , iconv( 'UTF-8','cp874' , 'ผลลัพธ์ของการจัดการปัญหา' ) , LRT , 1 , 'C' , true );
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR, 0  ,C,true     );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'เกี่ยวข้องกับการใช้ยา' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , '' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'ที่จัดการ' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Resdved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Improved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'NotImproved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , 'N/A' ) , TLRB , 1 , 'C' , true );
##--หัวตาราง

##---- CONTENT-----------------------------------
//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_pre[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_pre_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[2][4] ) , LR , 1 , 'C' , false );

//#กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Suggest changing medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sug  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[2][4]  ) , LR , 1 , 'C' , false );

//#Suggest laboratory
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sugl  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[2][4]  ) , LR , 1 , 'C' , false );

#-----------------#3. Not compliance---------------------------------------------------------------------------------
#3. Not compliance with the life style ($arr_non[3]=ot compliance with the life style)
#$arr_non=array(1=>'Over dosage',2=>'Under dosage',3=>'Not compliance with the life style',4=>'Incorrect technique');
#$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '3. '.$arr_non[3]  ),LR , 0 , 'C' , false );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '3. '.'Not compliance'  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','I',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  'ทั้งหมด' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_result_non_all[3] ) , LR , 0 , 'C' , false );  
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[3][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[3][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[3][4] ) , LR , 1 , 'C' , false );

$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'with the life style'  ),LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );  
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#3.Prevent
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','B',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '- Prevent' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act1_all[3][1] ) , LR , 0 , 'C' , false ); //$arr_act1_all
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[3][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[3][1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[3][1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[3][1][4] ) , LR , 1 , 'C' , false );

#กับผู้ป่วย
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); 
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '  กับผู้ป่วย' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#Adjust for appropriate therapy  
#$name_adj="- Adjust for appropriate therapy";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_adj  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[3][1]  ) , LR , 0 , 'C' , false ); //arr_adj_sub
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[3][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[3][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[3][4] ) , LR , 1 , 'C' , false );

// #Correct technique of administration = Y or N (1 or 0);
// $name_corr="- Correct technique of administration";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_corr ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_corr_sub[3][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[3][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[3][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[3][4] ) , LR , 1 , 'C' , false );

//#Improve compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_im ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_im[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_im_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[3][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[3][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[3][4] ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_drug ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_drug[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_drug_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[3][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[3][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[3][4] ) , LR , 1 , 'C' , false );

//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_life[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_life_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[3][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[3][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[3][4] ) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_tox[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_tox_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[3][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[3][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[3][4] ) , LR , 1 , 'C' , false );

//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_pre[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_pre_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[3][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[3][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[3][4] ) , LR , 1 , 'C' , false );

//#กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add[3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[3][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[3][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[3][4]  ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage[3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[3][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[3][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[3][4]  ) , LR , 1 , 'C' , false );

//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf[3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[3][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[3][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[3][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis[3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[3][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[3][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[3][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Suggest changing medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sug  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug[3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[3][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[3][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[3][4]  ) , LR , 1 , 'C' , false );

//#Suggest laboratory
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sugl  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl[3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl_sub[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[3][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[3][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[3][4]  ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 1 , 'C' , false );


$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LBR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LBR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LBR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LBR , 1 , 'C' , false );

//footer
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');


#-- PAGE 4 -
$pdf->AddPage();
##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  4' )  );
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

##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   ) //ให้ convert จาก date thai เป็น Eng ก่อน แล้วค่อย convert กลับเป็น วัน-เดือน-ปี ไทย งงปะ 55555
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 

##--หัวตาราง
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 3 รายละเอียดผลลัพธ์ของการจัดการปัญหาที่เกี่ยวข้องกับการใช้ยาโดยเภสัชกร' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่เกี่ยวข้องกับการใช้ยา' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , 'บทบาทเภสัชกรในการจัดการปัญหา' ) , LRT , 0 , 'C' , true );
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหาที่จัดการ' ) , 1 , 1 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหา' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 60  , 7 , iconv( 'UTF-8','cp874' , 'ผลลัพธ์ของการจัดการปัญหา' ) , LRT , 1 , 'C' , true );
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR, 0  ,C,true     );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'เกี่ยวข้องกับการใช้ยา' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , '' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'ที่จัดการ' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Resdved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Improved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'NotImproved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , 'N/A' ) , TLRB , 1 , 'C' , true );
##--หัวตาราง



#-----CONTENT-----------
#----------------------------4.Incorrect technique -------------------------------------------------------
$pdf->SetFont('angsana','B',13); //ใส่ตัวอักษรเอียง
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '4. '.$arr_non[4]  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','I',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  'ทั้งหมด' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_result_non_all[4] ) , LR , 0 , 'C' , false );  
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[4][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_res1_all[4][4] ) , LR , 1 , 'C' , false );

#4.Prevent
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','B',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '- Prevent' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act1_all[4][1] ) , LR , 0 , 'C' , false ); //$arr_act1_all
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[4][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[4][1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[4][1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[4][1][4] ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); 
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '  กับผู้ป่วย' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#Adjust for appropriate therapy  
#$name_adj="- Adjust for appropriate therapy";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_adj  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[4][1]  ) , LR , 0 , 'C' , false ); //arr_adj_sub
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[4][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[4][4] ) , LR , 1 , 'C' , false );

// #Correct technique of administration = Y or N (1 or 0);
// $name_corr="- Correct technique of administration";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_corr ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_corr_sub[4][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[4][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[4][4] ) , LR , 1 , 'C' , false );

//#Improve compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_im ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_im[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_im_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[4][4] ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_drug ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_drug[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_drug_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[4][4] ) , LR , 1 , 'C' , false );

//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_life[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_life_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[4][4] ) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_tox[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_tox_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[4][4] ) , LR , 1 , 'C' , false );

//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_pre[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_pre_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[4][4] ) , LR , 1 , 'C' , false );

//#4.กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Suggest changing medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sug  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Suggest laboratory
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sugl  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[4][4]  ) , LR , 1 , 'C' , false );

#-Correct--
#$arr_act1=array(1=>'Prevent',2=>'Correct');
#$arr_act1_all[][]=array();
#$arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');  
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','B',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '- Correct' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act1_all[4][2] ) , LR , 0 , 'C' , false ); 
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[4][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[4][2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[4][2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_act_res[4][2][4] ) , LR , 1 , 'C' , false );

#4. กับผู้ป่วย--
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); 
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '  กับผู้ป่วย' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#Adjust for appropriate therapy  
#$name_adj="- Adjust for appropriate therapy";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_adj  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[4][1]  ) , LR , 0 , 'C' , false ); //arr_adj_sub
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[4][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_adj_sub[4][4] ) , LR , 1 , 'C' , false );

// #Correct technique of administration = Y or N (1 or 0);
// $name_corr="- Correct technique of administration";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_corr ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_corr_sub[4][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[4][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_corr_sub[4][4] ) , LR , 1 , 'C' , false );

//#Improve compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_im ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_im[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_im_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_im_sub[4][4] ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_drug ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_drug[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_drug_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_drug_sub[4][4] ) , LR , 1 , 'C' , false );

//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_life[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_life_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_life_sub[4][4] ) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_tox[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_tox_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_tox_sub[4][4] ) , LR , 1 , 'C' , false );

//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_pre[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_pre_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[4][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[4][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_pre_sub[4][4] ) , LR , 1 , 'C' , false );

//#กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_add_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_add_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LRB , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LBR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage[4]  ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dosage_sub[4][1] ) , BLR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[4][2]   ) , BLR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[4][3]  ) , BLR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dosage_sub[4][4]  ) , BLR , 1 , 'C' , false );

//footer
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');


#-- PAGE 5
$pdf->AddPage();
##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  5' )  );
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

##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   ) //ให้ convert จาก date thai เป็น Eng ก่อน แล้วค่อย convert กลับเป็น วัน-เดือน-ปี ไทย งงปะ 55555
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 

##--หัวตาราง
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 3 รายละเอียดผลลัพธ์ของการจัดการปัญหาที่เกี่ยวข้องกับการใช้ยาโดยเภสัชกร' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่เกี่ยวข้องกับการใช้ยา' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , 'บทบาทเภสัชกรในการจัดการปัญหา' ) , LRT , 0 , 'C' , true );
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหาที่จัดการ' ) , 1 , 1 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหา' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 60  , 7 , iconv( 'UTF-8','cp874' , 'ผลลัพธ์ของการจัดการปัญหา' ) , LRT , 1 , 'C' , true );
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR, 0  ,C,true     );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'เกี่ยวข้องกับการใช้ยา' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , '' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'ที่จัดการ' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Resdved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Improved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'NotImproved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , 'N/A' ) , TLRB , 1 , 'C' , true );
##--หัวตาราง


#---------------------- CONTENT -------------------------------
//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_conf_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_conf_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_dis_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_dis_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_rel_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_rel_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Suggest changing medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sug  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sug_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sug_sub[4][4]  ) , LR , 1 , 'C' , false );

//#Suggest laboratory
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sugl  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl[4]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_sugl_sub[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[4][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[4][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_sugl_sub[4][4]  ) , LR , 1 , 'C' , false );


 #--5.ADRs -----------------------------------------
$pdf->SetFont('angsana','B',13); //ใส่ตัวอักษรเอียง
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , $name_adr  ),LR , 0 , 'L' , false );
$pdf->SetFont('angsana','I',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  'ทั้งหมด' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $sum_adr ) , LR , 0 , 'C' , false );  
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $adr_res1[1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $adr_res1[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $adr_res1[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $adr_res1[4] ) , LR , 1 , 'C' , false );

# 5.ADRs   Prevent
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','B',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '- Prevent' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $adr_act[1] ) , LR , 0 , 'C' , false ); //$arr_act1_all
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $adr_sub4[1][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $adr_sub4[1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $adr_sub4[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,  $adr_sub4[1][4]  ) , LR , 1 , 'C' , false );

#-- กับผู้ป่วย
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); 
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '  กับผู้ป่วย' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#Adjust for appropriate therapy  
#$name_adj="- Adjust for appropriate therapy";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_adj  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false ); //arr_adj_sub
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,''  ) , LR , 1 , 'C' , false );

// #Correct technique of administration = Y or N (1 or 0);
// $name_corr="- Correct technique of administration";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_corr ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 1 , 'C' , false );

//#Improve compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_im ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_drug ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 1 , 'C' , false );

//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $mo_adr[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,    $mo_dar_sub[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $mo_dar_sub[1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $mo_dar_sub[1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,$mo_dar_sub[1][4]) , LR , 1 , 'C' , false );

//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,   $pre_adr[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $mo_pre_sub[1][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $mo_pre_sub[1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $mo_pre_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $mo_pre_sub[1][4]  ) , LR , 1 , 'C' , false );

//#กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $mo_add[1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $mo_add_sub[1][1]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $mo_add_sub[1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $mo_add_sub[1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,  $mo_add_sub[1][4] ) , LR , 1 , 'C' , false );


//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[1][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[1][1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[1][1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[1][1][4] ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[2][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[2][1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[2][1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[2][1][4]  ) , LR , 1 , 'C' , false );

//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[3][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[3][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[3][1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[3][1][3]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[3][1][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[4][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_doc4sub[4][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[4][1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[4][1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[4][1][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[5][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[5][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[5][1][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[5][1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[5][1][4]  ) , LR , 1 , 'C' , false );

//#Suggest changing medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sug  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[6][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[6][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[6][1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[6][1][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[6][1][4]  ) , LR , 1 , 'C' , false );


//#Suggest laboratory
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sugl  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[7][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_doc4sub[7][1][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[7][1][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[7][1][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[7][1][4]  ) , LR , 1 , 'C' , false );


# 5.ADRs --Correct --
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','B',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '- Correct' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $adr_act[2] ) , LR , 0 , 'C' , false ); 
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $adr_sub4[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $adr_sub4[2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $adr_sub4[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,  $adr_sub4[2][4] ) , LR , 1 , 'C' , false );

#-- กับผู้ป่วย
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); 
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  '  กับผู้ป่วย' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

#Adjust for appropriate therapy  
#$name_adj="- Adjust for appropriate therapy";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_adj  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false ); //arr_adj_sub
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,''  ) , LR , 1 , 'C' , false );

// #Correct technique of administration = Y or N (1 or 0);
// $name_corr="- Correct technique of administration";
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_corr ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 1 , 'C' , false );

//#Improve compliance
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_im ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LBR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $name_drug ) , LBR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LBR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,'' ) , LBR , 1 , 'C' , false );

$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');

# -- PAGE 6
$pdf->AddPage();
##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  6' )  );
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

##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   ) //ให้ convert จาก date thai เป็น Eng ก่อน แล้วค่อย convert กลับเป็น วัน-เดือน-ปี ไทย งงปะ 55555
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 

##--หัวตาราง
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 3 รายละเอียดผลลัพธ์ของการจัดการปัญหาที่เกี่ยวข้องกับการใช้ยาโดยเภสัชกร' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่เกี่ยวข้องกับการใช้ยา' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทปัญหาที่' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , 'บทบาทเภสัชกรในการจัดการปัญหา' ) , LRT , 0 , 'C' , true );
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหาที่จัดการ' ) , 1 , 1 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนปัญหา' ) , LRT , 0 , 'C' , true );
$pdf->Cell( 60  , 7 , iconv( 'UTF-8','cp874' , 'ผลลัพธ์ของการจัดการปัญหา' ) , LRT , 1 , 'C' , true );
$pdf->SetFillColor(200, 200, 200,200);
//$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR, 0  ,C,true     );
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , 'เกี่ยวข้องกับการใช้ยา' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , '' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'ที่จัดการ' ) , LRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Resdved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , 'Improved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , 'NotImproved' ) , TLRB , 0 , 'C' , true );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , 'N/A' ) , TLRB , 1 , 'C' , true );
##--หัวตาราง

# ---- CONTENT ----------
//#Life style modification
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_life ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

##----------------------------- CODE  correct 15-11-57-----------------------------
//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $mo_adr[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,    $mo_dar_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $mo_dar_sub[2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $mo_dar_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,$mo_dar_sub[2][4]) , LR , 1 , 'C' , false );

//#Monitor efficacy and toxicity
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_tox ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $mo_adr[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,    $mo_dar_sub[2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $mo_dar_sub[2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $mo_dar_sub[2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,$mo_dar_sub[2][4]) , LR , 1 , 'C' , false );


//#Prevention of Advers drug reaction
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_pre ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,   $pre_adr[2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $mo_pre_sub[2][1]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $mo_pre_sub[2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $mo_pre_sub[2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $mo_pre_sub[2][4]  ) , LR , 1 , 'C' , false );


//#กับบุคลากรทางการแพทย์
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , ' กับบุคลากรทางการแพทย์' ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , ''  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

//#Add new medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_add ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[1][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[1][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[1][2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[1][2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[1][2][4] ) , LR , 1 , 'C' , false );

//#Adjust dosage regimen
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dosage  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[2][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[2][2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[2][2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[2][2][4]  ) , LR , 1 , 'C' , false );

//#Confrim prescription
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_conf  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[3][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[3][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[3][2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[3][2][3]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[3][2][4]  ) , LR , 1 , 'C' , false );

//#Discontinue medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_dis  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[4][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_doc4sub[4][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[4][2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[4][2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[4][2][4]  ) , LR , 1 , 'C' , false );

//#Inform drug related problems
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_rel  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[5][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[5][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[5][2][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[5][2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[5][2][4]  ) , LR , 1 , 'C' , false );

//#Suggest changing medication
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sug  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[6][2]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[6][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[6][2][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[6][2][3]  ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , $arr_doc4sub[6][2][4]  ) , LR , 1 , 'C' , false );

//#Suggest laboratory
$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' ,''  ),LR , 0 , 'C' , false );
$pdf->SetFont('angsana','',14); //ใส่ตัวอักษรเอียง
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' , $name_sugl  ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc[7][2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,   $arr_doc4sub[7][2][1] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[7][2][2]   ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[7][2][3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' ,  $arr_doc4sub[7][2][4]  ) , LR , 1 , 'C' , false );

##----------------------------- CODE correct  15-11-57----------------------------
//footer
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');

 $pdf->Output();
?>

