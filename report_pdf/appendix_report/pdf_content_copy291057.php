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
if( !empty($b)  && !empty($e)   )
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
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 1 ข้อมูล Demographic ของผู้ป่วยที่เข้ารับบริการ' ));
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
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_all ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_all_new.'/'.$per_all_new.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '  อายุเฉลี่ย ณ วันเข้ารับบริการครั้งแรก (ปี)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $cal_av_old  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '  จำนวนผู้ป่วยแยกตามเพศ (ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ชาย' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $total_sex1.'/'.$cal1.'%'  ),LR, 0  ,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $total_sex1_new.'/'.$cal1_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- หญิง' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $total_sex2.'/'.$cal2.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_sex2_new.'/'.$cal2_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนผู้ป่วยแยกตามที่มา (ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ไม่ได้ลงบันทึก' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- Refer' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- OPD GP' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- OPD med' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- OPD อื่นๆ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนผู้ป่วยแยกตามระดับการศึกษา (ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ไม่ได้ลงบันทึก' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ไม่ระบุ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $total_edu1.'/'.$cal_edu1.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_edu1_new.'/'.$cal_edu1_new.'%'   ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ไม่ได้ศึกษาเลย' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,   $total_edu6.'/'.$cal_edu6.'%'    ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,   $total_edu6_new.'/'.$cal_edu6_new.'%'   ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ประถมศึกษา' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $total_edu2.'/'.$cal_edu2.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_edu2_new.'/'.$cal_edu2_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-มัธยมศึกษาตอนต้น' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_edu7.'/'.$cal_edu7.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_edu7_new.'/'.$cal_edu7_new.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-มัธยมศึกษาตอนปลาย/ปวช.' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $total_edu3.'/'.$cal_edu3.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_edu3_new.'/'.$cal_edu3_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-อนุปริญญา/ปวส.' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $total_edu4.'/'.$cal_edu4.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_edu4_new.'/'.$cal_edu4_new.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ปริญญาตรีขึ้นไป' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_edu5.'/'.$cal_edu5.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $total_edu5_new.'/'.$cal_edu5_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , ''.'จำนวนผู้ป่วยแยกตามสิทธิ์การรักษา (ราย/ร้อยละ)' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ไม่ได้ลงบันทึก' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-เบิกต้นสังกัด/ข้าราชการ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay1.'/'.$cal_pay1.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_pay1_new.'/'.$cal_pay1_new.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ชำระเงิน' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay2.'/'.$cal_pay2.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay2_new.'/'.$cal_pay2_new.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ประกันสังคม' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay3.'/'.$cal_pay3.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_pay3_new.'/'.$cal_pay3_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-บัตรทองโรงพยาบาล' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay4.'/'.$cal_pay4.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay4_new.'/'.$cal_pay4_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-บัตรทองส่งตัวมา' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_pay5.'/'.$cal_pay5.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_pay5_new.'/'.$cal_pay5_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-พระภิกษุ/สามเณร' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay6.'/'.$cal_pay6.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_pay6_new.'/'.$cal_pay6_new.'%'   ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'-ผู้พิการ/ทุพลภาพ' ),LRB,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--'  ),LRB,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LRB,1,C,true     );

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

/*
if( !empty($begin)  && !empty($end)   )
{    
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$begin.' ถึง '.$end ));
}
*/

##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   )
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 

$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 1 ข้อมูล Demographic ของผู้ป่วยที่เข้ารับบริการ' ));
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
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '--' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ไม่ระบุ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,   $count_occ1.'/'.$cal_occ1.'%'    ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_occ1_new.'/'.$cal_occ1_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ไม่มีอาชีพ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ9.'/'.$cal_occ9.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ9_new.'/'.$cal_occ9_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- รับราชการ/รัฐวิสาหกิจ/พนักงานของรัฐ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ2.'/'.$cal_occ2.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ2_new.'/'.$cal_occ2_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ครู-อาจารย์' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ10.'/'.$cal_occ10.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ10_new.'/'.$cal_occ10_new.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- บุคลากรสาธารณสุข' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ11.'/'.$cal_occ11.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ11_new.'/'.$cal_occ11_new.'%'   ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ข้าราชการบำนาญ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ3.'/'.$cal_occ3.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_occ3_new.'/'.$cal_occ3_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- เกษตรกรรม' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ4.'/'.$cal_occ4.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ4_new.'/'.$cal_occ4_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- ค้าขาย/นักธุรกิจ' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ5.'/'.$cal_occ5.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ5_new.'/'.$cal_occ5_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- นักบวช' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ6.'/'.$cal_occ6.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ6_new.'/'.$cal_occ6_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- พนักงาน/ลูกจ้างหน่วยงานของเอกชน' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_occ7.'/'.$cal_occ7.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ7_new.'/'.$cal_occ7_new.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'- นักเรียน/นักศึกษา' ),LRB,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_occ8.'/'.$cal_occ8.'%'  ),LRB,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_occ8_new.'/'.$cal_occ8_new.'%' ),LRB,1,C,true     );
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');

$pdf->Output();


?>