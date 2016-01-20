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
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[1] ) , LRT , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , TLR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , TLR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , TLR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , TLR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[1] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[2] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[2] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[3] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[3] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[4] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[4] ) , LR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  $result_give_yes[5] ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LR , 1 , 'C' , false );

$pdf->Cell( 30  , 7 , iconv( 'UTF-8','cp874' , '') , LBR , 0 , 'C' , false );
$pdf->Cell( 50  , 7 , iconv( 'UTF-8','cp874' ,  $arr_give[5] ) , LBR , 0 , 'L' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' ,  '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 15  , 7 , iconv( 'UTF-8','cp874' , '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 20  , 7 , iconv( 'UTF-8','cp874' , '' ) , LBR , 0 , 'C' , false );
$pdf->Cell( 10  , 7 , iconv( 'UTF-8','cp874' , '' ) , LBR , 1 , 'C' , false );

//footer
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');

 $pdf->Output();
?>