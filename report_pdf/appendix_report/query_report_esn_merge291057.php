<?php
require_once("../config.php");



	
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


 

  
 //http://127.0.0.1/report_pdf/appendix_report/query_report_esn_merge.php?begin=01-10-2540&end=24-10-2556  test product 
    
 
   $b=trim($_GET['begin']);
 //echo "<br>";
   $e=trim($_GET['end']);
 //echo  "<br>";

  
  ##--YEAR current
  $y_cur=date('Y'); //ปีัปัจจุบัน
//echo "<br>";
  $dmy_cur=date('Y'.'-'.'m'.'-'.'d'); //วันเดิอน ปี ปัจจุบัน

//echo $y_cur;
  $y_e=explode_date($e);
//echo "<br>";


#-- convert DATE ---
  $b_conv=date_eng_format($b);
//echo "<br>";
  $e_conv=date_eng_format($e);
//echo "<br>";
#-- convert DATE ---



if(  !empty($b_conv)   &&  !empty( $e_conv )    )
{

    if( $y_e  <= $y_cur )//มีทั้งผู้ป่วยเก่า และผู้ป่วยใหม่ 
    {
     
        
       ##--ผู้ป่วยเก่า-- 
        $str_old =" SELECT * FROM `04-monitoring` LEFT JOIN `tb_appendix1` ON `04-monitoring`.`HN` = `tb_appendix1`.`HN` WHERE  `04-monitoring`.`MonitoringDate` BETWEEN  '$b_conv' AND   '$e_conv'  ; "; //ผู้ป่วยเก่า 
        $query_or=mysql_query($str_old);
    echo   $check_row = mysql_num_rows( $query_or); //จำนวนของผู้ป่วยเก่าทั้งหมด
    echo "<br>";   
       
       ##--ผู้ป่วยใหม่
      $next_date=next_date_format($e); //วันที่ เริ่มต้นของผู้ป่วยใหม่
      $str_new =" SELECT * FROM `04-monitoring` LEFT JOIN `tb_appendix1` ON `04-monitoring`.`HN` = `tb_appendix1`.`HN` WHERE  `04-monitoring`.`MonitoringDate` BETWEEN  '$next_date' AND   '$dmy_cur'  ; "; //ผู้ป่วยเก่า 
       $query_new=mysql_query($str_new); 
       
     echo  $check_row_new = mysql_num_rows( $query_new ); //จำนวนของผู้ป่วยใหม่ทั้งหมด
     echo "<br>";
     
    }
    elseif( $y_e > $y_cur  )//การระบุข้อมูลผิดพลาด
    {
        ?>
                 <script type="text/javascript">
                                   alert('Check Date-Month-Year!!');
                                   window.close();
                  </script>
             
             
        <?php
    }  

}//end if


?> 