<?php
require_once("../config.php");
require_once("pdf_class.php"); //class PDF

class  query2 #// case 2 Non-compliance,ADR,Midication errors,DRPs
{
     protected  $str_="";
     //protected  $_tb="";
     protected  $query_="";
     protected   $num_ =0;
    public   function __construct() 
            {
        
    }
    public function query_($str)
    {
           $this->_str=$str;
           $this->query_  =  mysql_query( $this->_str ) or die('Can\'t  query MYSQL server!! ');
           return mysql_num_rows($this->query_);
    }
    public    function   date_eng_format($begin) //formdate date เปลี่ยนจาก วันที่ไทย เป็น eng
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
}

//http://127.0.0.1/report_pdf/appendix_report/query_case2.php?begin=03-11-2542&end=07-11-2557

 $begin=trim($_GET['begin']);
//echo "<br>";
 $end=trim($_GET['end']);
//echo "<br>";

$tb1="`07-noncompliance`";

$esn=new  query2();

 $b=$esn->date_eng_format($begin);
 $e=$esn->date_eng_format($end);

#-- ให้บริการแก่ผู่้ป่วย(ครั้ง)
 $str_sum="SELECT   *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'   ; ";  
  $count_sum=$esn->query_($str_sum);   //calculate (ครั้ง)
 
 #-- ให้บริการแก่ผู่้ป่วย(ราย)
  $str_patien="SELECT  `HN`,  COUNT(`HN`)    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND   '$e_conv'    GROUP   BY   `HN`   ; "; 
  $count_patien=$esn->query_($str_patien);  //calculate (ราย)
   
#--Non-compliance
// 1.Over dosage
// 2.Under dosage
// 3.Non compliance with the life style
// 4.Incorrect technique

  $b_conv=$esn->date_eng_format($begin);
  $e_conv=$esn->date_eng_format($end);
   
  // 1.Over dosage
  $prop1="`DRPselection1`";
  $va1=1;
  //จำนวนของผู้ป่วย
  $str="SELECT   DISTINCT  `HN`     FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop1='$va1' ; ";  
  $count_over=$esn->query_($str);  
  $cal_over= round(  ( $count_over/$count_patien)*100,2   );
  //จำนวนครั้ง
    $str_all="SELECT    `HN`     FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop1='$va1' ; ";  
    $count_over_all=$esn->query_($str_all);  
    $cal_over_all=round(  ( $count_over_all/$count_sum)*100,2   );
    
   // 2.Under dosage
  $va2=2;
  $str2="SELECT   DISTINCT  `HN`     FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop1='$va2' ; ";  
    $count_under=$esn->query_($str2);   //จำนวนของผู้ป่วย
   $cal_under= round(  (  $count_under/$count_patien)*100,2   );
  //จำนวนครั้ง
    $str2_all="SELECT   *     FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop1='$va2' ; ";  
    $count2_under_all=$esn->query_($str2_all);  
   $cal_under_all=round(  (  $count2_under_all/$count_sum)*100,2   );
   
  // 3.Non compliance with the life style 
  $va3=3;
  $str3="SELECT   DISTINCT  `HN`     FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop1='$va3' ; ";  
  $count_non=$esn->query_($str3);  //จำนวนของผู้ป่วย
  $cal_non= round(  (   $count_non/$count_patien)*100,2   );
  //จำนวนครั้ง
    $str3_all="SELECT    `HN`     FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop1='$va3' ; ";  
    $count3_non_all=$esn->query_($str3_all);  
    $cal_non_all=round(  (  $count3_non_all/$count_sum)*100,2   );
   
  // 4.Incorrect technique
  $va4=4;
  $str4="SELECT   DISTINCT  `HN`     FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop1='$va4' ; ";  
   $count_in=$esn->query_($str4);  //จำนวนของผู้ป่วย
  $cal_in=round(  (   $count_in/$count_patien)*100,2   );
  //จำนวนครั้ง
    $str4_all="SELECT    `HN`     FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop1='$va4' ; ";  
    $count_in_all=$esn->query_($str4_all);  
   $cal_in_all=round(  (  $count_in_all/$count_sum)*100,2   );
   
   
   
    // IncorrectedTechnique1=Preparation
   #ทั้งหมด
    $prop2="`IncorrectedTechnique1`";
    $va6=1;
    $str5_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop2='$va6'   ; ";  
    $count_Preparation_all=$esn->query_($str5_all);
    $cal_Preparation_all=round(  (    $count_Preparation_all/$count_patien)*100,2   );
   #ผู้ป่วย
    $str5_="SELECT  DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop2='$va6'   ; ";  
    $count_Preparation=$esn->query_($str5_);
     $cal_Preparation_=round(  (     $count_Preparation/$count_sum)*100,2   );
  
  // IncorrectedTechnique2=Inhalation
      #ทั้งหมด
    $prop3="`IncorrectedTechnique2`";
    $va7=1;
    $str6_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop3='$va7'   ; ";  
    $count_Inhalation_all=$esn->query_($str6_all);
    $cal_Inhalation_all=round(  (    $count_Inhalation_all/$count_patien)*100,2   );
      #ผู้ป่วย
    $str6_="SELECT  DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop3='$va7'   ; ";  
    $count_Inhalation=$esn->query_($str6_);
     $cal_Inhalation_=round(  (    $count_Inhalation/$count_sum)*100,2   );  
     
      // IncorrectedTechnique3=Rinse
      #ทั้งหมด
    $prop4="`IncorrectedTechnique3`";
    $str7_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND    $prop4='$va7'   ; ";  
    $count_Rinse_all=$esn->query_($str7_all);
    $cal_Rinse_all=round(  (    $count_Rinse_all/$count_patien)*100,2   );
    #ผู้ป่วย
    $str7_="SELECT  DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop4='$va7'   ; ";  
    $count_Rinse=$esn->query_($str7_);
     $cal_Rinse_=round(  (    $count_Rinse/$count_sum)*100,2   );  
     
       // IncorrectedTechnique4=EmptyTest
     #ทั้งหมด
    $prop5="`IncorrectedTechnique4`";
    $str8_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND    $prop5='$va7'   ; ";  
    $count_EmptyTest_all=$esn->query_($str8_all);
    $cal_EmptyTest=round(  (    $count_EmptyTest_all/$count_patien)*100,2   );
    #ผู้ป่วย
    $str8_="SELECT  DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $prop5='$va7'   ; ";  
    $count_EmptyTest=$esn->query_($str8_);
     $cal_EmptyTest_=round(  (    $count_EmptyTest/$count_sum)*100,2   );  
     
    
     //Cause1_1=สาเหตุจากตัวผู้ป่วย     
      $prop6="`Cause1_1`";
      #ทั้งหมด
      $str9_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND    $prop6='$va7'   ; ";  
        $count_Cause1_1_all=$esn->query_($str9_all);
        $cal_Cause1_1=round(  (    $count_EmptyTest_all/$count_patien)*100,2   );      
      #ผู้ป่วย
       $str9_="SELECT   DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND    $prop6='$va7'   ; ";  
       $count_Cause1_1=$esn->query_($str9_);
       $cal_Cause1_1_=round(  (    $count_Cause1_1/$count_sum)*100,2   );  
               
     //Cause1_2=สาเหตุจากโรค
      $prop7="`Cause1_2`";
      #ทั้งหมด
      $str10_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND    $prop7='$va7'   ; ";  
       $count_Cause1_2_all=$esn->query_( $str10_all);
        $cal_Cause1_2=round(  (   $count_Cause1_2_all/$count_patien)*100,2   ); 
       #ผู้ป่วย
       $str10_="SELECT   DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND     $prop7='$va7'   ; ";  
      $count_Cause1_2=$esn->query_($str10_);     
      $cal_Cause1_2_=round(  (    $count_Cause1_2/$count_sum)*100,2   );  
      
      //Cause1_3=สาเหตุจากยา
      $prop8="`Cause1_3`";
       #ทั้งหมด
      $str11_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND    $prop8='$va7'   ; ";  
      $count_Cause1_3_all=$esn->query_( $str11_all );
      $cal_Cause1_3=round(  (   $count_Cause1_3_all/$count_patien)*100,2   ); 
       #ผู้ป่วย
       $str11_="SELECT   DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND     $prop8='$va7'   ; ";  
      $count_Cause1_3=$esn->query_( $str11_);     
       $cal_Cause1_3_=round(  (    $count_Cause1_3/$count_sum)*100,2   );  
       
      //Cause1_4=สาเหตุจากผู้ดูแล
      $prop9="`Cause1_4`";
       #ทั้งหมด
      $str12_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND    $prop9='$va7'   ; ";  
      $count_Cause1_4_all=$esn->query_( $str12_all );
      $cal_Cause1_4=round(  (   $count_Cause1_4_all/$count_patien)*100,2   ); 
       #ผู้ป่วย
       $str12_="SELECT   DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND     $prop9='$va7'   ; ";  
         $count_Cause1_4=$esn->query_(  $str12_ );     
       $cal_Cause1_4_=round(  (    $count_Cause1_4/$count_sum)*100,2   );  
       
      //Cause1_5=สาเหตุอื่นๆ
      $prop10="`Cause1_5`";
            #ทั้งหมด
      $str13_all="SELECT    *    FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND    $prop10='$va7'   ; ";  
     $count_Cause1_5_all=$esn->query_( $str13_all );
      $cal_Cause1_5=round(  (   $count_Cause1_5_all/$count_patien)*100,2   ); 
       #ผู้ป่วย
       $str13_="SELECT   DISTINCT  `HN`   FROM   ".$tb1." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND     $prop10='$va7'   ; ";   
       $count_Cause1_5=$esn->query_(   $str13_  );     
       $cal_Cause1_5_=round(  (    $count_Cause1_5/$count_sum)*100,2   );  
    
       # Medication errors =>   SELECT   `DRPselection4`   FROM `10-medicationerror` 
      #`DRPselection4` 
          $err1 ="Prescribing error";
          $err2="Trancribing error";
          $err3="Dispensing error";
          $err4="Administration error";
          $err5= "Unclear order";
          $tb_err="`10-medicationerror` ";
          $f_err="`DRPselection4`";
          $count_err_all=array();
          $count_err_pa=array();
          $cal_DRP_all=array();
           $cal_DRP=array();
           $va_DRP_all=array(); //จำนวนครั้ง
           $va_DRP_count=array(); //จำนวนผู้ป่วย
        //$arr_err=array(1=>'Prescribing error',2=>'Trancribing error',3=>'Dispensing error',4=>'Administration error',5=>'Unclear order');
        $arr_err=array(1=>$err1,2=>$err2,3=>$err3,4=>$err4,5=>$err5);
        foreach($arr_err  as $key=>$val )
        {
          
         #----------------------------------- จำนวนครั้ง
            // echo   $str14_="SELECT   DISTINCT   `DRPselection4`     FROM   ".$tb_err." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $f_err='$key'   ; ";  
              $str14_="SELECT   *    FROM   ".$tb_err." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $f_err='$key'    ; ";  
           // echo "<br>";
               $count_err_all[$key]=$esn->query_($str14_);   
           //echo "<br>"; 
              $cal_DRP_all[$key]=round(  (    $count_err_all[$key]/$count_patien)*100,2   ); 
              //echo "<br>";
              $va_DRP_all[$key]= $count_err_all[$key].'/'.$cal_DRP_all[$key].'%';
           //echo "<br>";
          #------------------------------------- จำนวนผู้ป่วย
            $str15_="SELECT   *    FROM   ".$tb_err." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $f_err='$key'    GROUP  BY  `HN`  ; ";  
         //   $str15_="SELECT   DISTINCT  `HN`    FROM   ".$tb_err." WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $f_err='$key'    ; ";  
            //echo "<br>"; 
          $count_err_pa[$key] = $esn->query_($str15_);   
         // echo "<br>"; 
           $cal_DRP[$key]=round(  (    $count_err_pa[$key] /$count_sum)*100,2   ); 
          //  echo "<br>"; 
       $va_DRP_count[$key]= $count_err_pa[$key].'/'.$cal_DRP[$key].'%';
 //echo "<br>"; 
        }
  
       #  Other DRPs ->   `DRPselection3`
        $tb_othter="`09-otherdrp`";
        $f16=" `DRPselection3`";
        $count_other_all=array(); 
         $cal_other_all=array();
         $va_other=array();
         
         $count_other_=array(); 
         $cal_other_=array();
         $va_other_=array();
         
        $i=1;
        do{
           
          
            # จำนวนครั้ง
             $str16="SELECT  *  FROM  $tb_othter   WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $f16='$i'    ; ";  
           //echo "<br>";
          $count_other_all[$i]=$esn->query_( $str16); 
           //echo "<br>";
           $cal_other_all[$i]=round(  (    $count_other_all[$i]/$count_patien)*100,2   );  
           // echo "<br>";
            $va_other[$i]=$count_other_all[$i].'/'.$cal_other_all[$i].'%';
           // echo "<br>";
           
           
            #จำนวนคนไข้
          $str16_="SELECT  *   FROM  $tb_othter   WHERE  `MonitoringDate`  BETWEEN  ' $b_conv'  AND '$e_conv'   GROUP BY   `HN`  HAVING  $f16=$i  ; ";  
         // echo "<br>";
            $count_other_[$i] = $esn->query_( $str16_); 
           // echo "<br>"; 
             $cal_other_[$i]=round(  (    $count_other_[$i]/$count_sum)*100,2   );  
            $va_other_[$i]=$count_other_[$i].'/'.$cal_other_[$i].'%';
         // echo "<br>"; 
          
          $i++;  
        }while($i<=8);
        
      
      #http://127.0.0.1/report_pdf/appendix_report/query_case2.php?begin=03-11-2542&end=07-11-2557
      #http://www.esn.com/report_pdf/appendix_report/query_case2.php?begin=03-11-2542&end=07-11-2557
      include("report_case2.php");  //PDF content report
   
?>

