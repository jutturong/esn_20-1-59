<?php
require_once("../config.php");
require_once("pdf_class.php"); //class PDF

class  query3 #// case 2 Non-compliance,ADR,Midication errors,DRPs
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
    public  function  check_query($str) //ใช้สำหรับ check  การ query
    {
         return   mysql_query( $str) or die("Can 't  connect MYSQL SERVER!!");
    }
}

//http://127.0.0.1/report_pdf/appendix_report/query_case3.php?begin=03-11-2542&end=07-11-2557

$esn=new  query3();
 $begin=trim($_GET['begin']);
 $end=trim($_GET['end']);
 
  $b_conv=$esn->date_eng_format($begin);
  $e_conv=$esn->date_eng_format($end);
  
$b=$esn->date_eng_format($begin);
 $e=$esn->date_eng_format($end);
  
##------------------ giveinformation ---------------
$tb1_=" `06_giveinformation`";
$i=1;
$arr_give=array('- What \'s your disease?' ,'- What \'s treatment?','- How to manage the side effect?','- Bring medication to each visit?','- How to correct be havior?','- Ohter');
$givearr=array();
$result_give_yes=array();
$result_give_no=array();
while($i<=5)//push array in  $givearr
{ 
 $g='`GiveInformation'.$i.'`';
 array_push($givearr,$g);
$i++;
}
foreach($givearr as  $key=> $va)
{
            $str1="SELECT *  FROM  $tb1_   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $va='Y';";  //Yes
            $result_give_yes[$key]=$esn->query_($str1);    //Yes
   
            $str1_="SELECT *  FROM  $tb1_   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $va='N';";  //No
             $result_give_no[$key]=$esn->query_($str1_);   //No

}

#------------------------------ `07-noncompliance`-------------------------------------------
//++++++++`Action1`  
//1=Prevent,
//2=Correct
//++++++++`DRPselection1`    
// 1=Over dosage  , 
// 2=Under dosage ,
// 3=Not compliance with the life style,
// 4= Incorrect technique
$tb_non="`07-noncompliance`";
$f_non="DRPselection1";
$arr_non=array(1=>'Over dosage',2=>'Under dosage',3=>'Not compliance with the life style',4=>'Incorrect technique');
$arr_result_non_all=array();//ค่าทั้งหมดของ Non-compliance

#-- ผลลัพธ์ของการจัดการปัญหา --
// field =  `Response1`
/*
1=Resolved
2=Improved
3=Not Improved
4=N/A
*/
$f_res1="`Response1`";
$arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');
$arr_res1_all[][]=array();

#-- Prevent &&  Correct
$f_act1="`Action1`";
$arr_act1=array(1=>'Prevent',2=>'Correct');
$arr_act1_all[][]=array();

 $arr_act_res[][][]=array();
 
 #Adjust for appropriate therapy   = Y or N (1 or 0);
 //`InterventionPT1_1`=Adjust for appropriate therapy
 $f_adj="`InterventionPT1_1`"; //Adjust for appropriate therapy
 $name_adj="- Adjust for appropriate therapy";
 $arr_adj[]=array();
 $arr_adj_sub[][]=array();
 
 #Correct technique of administration = Y or N (1 or 0);
 //`InterventionPT1_2`=Correct technique of administration
 $f_corr="`InterventionPT1_2`"; 
 $name_corr="- Correct technique of administration";
 $arr_corr[]=array();
 $arr_corr_sub[][]=array();
 
  #Correct technique of administration = Y or N (1 or 0);
 //`InterventionPT1_2`=Correct technique of administration
 $f_corr="`InterventionPT1_2`"; 
 $name_corr="- Correct technique of administration";
 $arr_corr[]=array();
 $arr_corr_sub[][]=array();
  
  //`InterventionPT1_3`=Improve compliance
  $f_im="`InterventionPT1_3`"; 
 $name_im="- Improve compliance";
 $arr_im[]=array();
 $arr_im_sub[][]=array();
 
   //`InterventionPT1_4`=Inform drug related problems
  $f_drug="`InterventionPT1_4`"; 
 $name_drug="- Inform drug related problems";
 $arr_drug[]=array();
 $arr_drug_sub[][]=array();
 
    //`InterventionPT1_5`=Life style modification
  $f_life="`InterventionPT1_5`"; 
 $name_life="- Life style modification";
 $arr_life[]=array();
 $arr_life_sub[][]=array();
 
     //`InterventionPT1_6`=Monitor efficacy and toxicity
  $f_tox="`InterventionPT1_6`"; 
 $name_tox="- Monitor efficacy and toxicity";
 $arr_tox[]=array();
 $arr_tox_sub[][]=array();
  
      //`InterventionPT1_7`=Prevention of Advers drug reaction
  $f_pre="`InterventionPT1_7`"; 
 $name_pre="- Prevention of Advers drug reaction";
 $arr_pre[]=array();
 $arr_pre_sub[][]=array();
 
 //`InterventionDoctor1_1`=Add new medication
   $f_add="`InterventionDoctor1_1`"; 
 $name_add="- Add new medication";
 $arr_add[]=array();
 $arr_add_sub[][]=array();
 
  //`InterventionDoctor1_2`=Adjust dosage regimen
   $f_dosage="`InterventionDoctor1_2`"; 
 $name_dosage="- Adjust dosage regimen";
 $arr_dosage[]=array();
 $arr_dosage_sub[][]=array();
 
   //`InterventionDoctor1_3`=Confrim prescription
   $f_conf="`InterventionDoctor1_3`"; 
 $name_conf="- Confrim prescription";
 $arr_conf[]=array();
 $arr_conf_sub[][]=array();
 
    //`InterventionDoctor1_4`=Discontinue medication
   $f_dis="`InterventionDoctor1_4`"; 
 $name_dis="- Discontinue medication";
 $arr_dis[]=array();
 $arr_dis_sub[][]=array();
 
     //`InterventionDoctor1_5`=Inform drug related problems
   $f_rel="`InterventionDoctor1_5`"; 
 $name_rel="- Inform drug related problems";
 $arr_rel[]=array();
 $arr_rel_sub[][]=array();
 
      //`InterventionDoctor1_6`=Suggest changing medication
   $f_sug="`InterventionDoctor1_6`"; 
 $name_sug="- Suggest changing medication";
 $arr_sug[]=array();
 $arr_sug_sub[][]=array();
  
       //`InterventionDoctor1_6`=Suggest laboratory
   $f_sugl="`InterventionDoctor1_7`"; 
 $name_sugl="- Suggest laboratory";
 $arr_sugl[]=array();
 $arr_sugl_sub[][]=array();
 

foreach($arr_non as $key => $val )
{ 
      #-- ทั้งหมด Over dosage  , 
    $str_non_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  ; ";
    //$esn->check_query($str);
    
    ##-- ทั้งหมด  Over dosage=>Resolved
    $arr_result_non_all[$key]=$esn->query_( $str_non_all ); //ค่าทั้งหมด   
           foreach($arr_res1 as  $key_sub => $va_sub )
           {
                     $str_res1_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND  $f_res1 =  $key_sub  ; ";
                // echo "   ";
                    $arr_res1_all[$key][$key_sub]= $esn->query_( $str_res1_all ); //ค่าทั้งหมด   
                    
                   
               // echo "<br>";
           }
           
           //$f_non="DRPselection1";
           //$f_act1="`Action1`";
           #---#--  Over dosage=>Prevent
            foreach(  $arr_act1  as  $key_sub_2 =>  $val_sub_2 )//
                    {
                        $str_act1_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND    $f_act1= $key_sub_2 ; ";                       
                        $arr_act1_all[$key][$key_sub_2]=$esn->query_( $str_act1_all  ); //ค่าทั้งหมด   ของ Prevent
                           ##---- Over dosage=>Prevent=>Resolved
                           //$f_res1="`Response1`";
                            foreach($arr_res1 as $key_sub_sub=>$val_sub_sub )
                            {
                                   $str_res1_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND    $f_act1= $key_sub_2  AND  $f_res1=$key_sub_sub  ; ";    
                                 // echo "<br>";
                                   $arr_act_res[$key][$key_sub_2][$key_sub_sub]=$esn->query_( $str_res1_all ); 
                                  //echo "<br>";
                            }
                    }
           
          #Adjust for appropriate therapy   = Y or N (1 or 0);
          $str_adj_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND  $f_adj=1 ; ";           
          $arr_adj[$key]= $esn->query_( $str_adj_all );   //ผลรวมทั้งหมด
         // echo "<br>"; 
          # Over dosage=> Adjust for appropriate therapy=>Resolved
           foreach($arr_res1 as $key_adj_sub=>$val_sub_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
                            {
                                   $str_adj_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'    AND  $f_adj=1  AND  $f_res1=$key_adj_sub  ; ";    
                                // $arr_adj_sub[][][]
                                 // $arr_act_res[$key][$key_sub_2][$key_sub_sub]=$esn->query_( $str_res1_all ); 
                                 // $arr_adj_sub[$key][$key_adj_sub]=$esn->query_(  $str_adj_sub ); 
                                  $arr_adj_sub[$key][$key_adj_sub]=$esn->query_(  $str_adj_sub ); 
                                 // echo "<br>";
                                  //$arr_corr_sub[$key][$key_adj_sub]
                            }
                            
         #Correct technique of administration = Y or N (1 or 0);
            $str_corr_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND  $f_corr=1 ; ";                         
            $arr_corr[$key]= $esn->query_( $str_corr_all );   //ผลรวมทั้งหมด
                      foreach($arr_res1 as $key_corr_sub=>$val_corr_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
                            {
                                   $str_corr_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND  $f_corr=1    AND  $f_res1=$key_corr_sub  ; ";    
                                // $arr_adj_sub[][][]
                                 // $arr_act_res[$key][$key_sub_2][$key_sub_sub]=$esn->query_( $str_res1_all ); 
                                  $arr_corr_sub[$key][$key_corr_sub]=$esn->query_( $str_corr_sub ); 
                             //  echo  $esn->query_( $str_corr_sub ); 
                            //    echo "<br>";
                            }
       # `InterventionPT1_3`=Improve compliance
       /*
     //`InterventionPT1_3`=Improve compliance
  $f_im="`InterventionPT1_3`"; 
 $name_im="- Improve compliance";
 $arr_im[]=array();
 $arr_im_sub[][]=array();
        */                          
    $str_im_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND  $f_im=1 ; ";                           
   // echo "   ";
     $arr_im[$key] = $esn->query_( $str_im_all );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_im_sub=>$val_im_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_im_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND     $f_im=1   AND  $f_res1=$key_im_sub  ; ";    
                     $arr_im_sub[$key][$key_im_sub] =  $esn->query_( $str_im_sub );   //ผลรวมทั้งหมด
                   
       }
    
       /*
          //`InterventionPT1_4`=Inform drug related problems
   $f_drug="`InterventionPT1_4`"; 
 $name_drug="- Inform drug related problems";
 $arr_drug[]=array();
 $arr_drug_sub[][]=array();
   */
     $str_drug_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND  $f_drug=1 ; ";                           
   // echo "   ";
     $arr_drug[$key] = $esn->query_( $str_drug_all );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_drug_sub=>$val_drug_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_drug_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND    $f_drug=1   AND  $f_res1=$key_drug_sub  ; ";    
                     $arr_drug_sub[$key][$key_drug_sub] =  $esn->query_(  $str_drug_sub );   //ผลรวมทั้งหมด
                   
       }  
       
   /*    
           //`InterventionPT1_5`=Life style modification
  $f_life="`InterventionPT1_5`"; 
 $name_life="- Life style modification";
 $arr_life[]=array();
 $arr_life_sub[][]=array();
  */
        $str_life_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND  $f_life=1 ; ";                           
   // echo "   ";
     $arr_life[$key] = $esn->query_( $str_life_all );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_life_sub=>$val_life_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_life_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND   $f_life=1   AND  $f_res1=$key_life_sub  ; ";    
                     $arr_life_sub[$key][$key_life_sub] =  $esn->query_(  $str_life_sub );   //ผลรวมทั้งหมด
                   
       }      
       
       /*
            //`InterventionPT1_6`=Monitor efficacy and toxicity
  $f_tox="`InterventionPT1_6`"; 
 $name_tox="- Monitor efficacy and toxicity";
 $arr_tox[]=array();
 $arr_tox_sub[][]=array();
 */
         $str_tox_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND  $f_tox=1 ; ";                           
   // echo "   ";
     $arr_tox[$key] = $esn->query_( $str_tox_all );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_tox_sub=>$val_tox_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_tox_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND   $f_tox=1   AND  $f_res1=$key_tox_sub  ; ";    
                     $arr_tox_sub[$key][$key_tox_sub] =  $esn->query_(   $str_tox_sub  );   //ผลรวมทั้งหมด
                   
       }  
      
       /*
             //`InterventionPT1_7`=Prevention of Advers drug reaction
  $f_pre="`InterventionPT1_7`"; 
 $name_pre="- Prevention of Advers drug reaction";
 $arr_pre[]=array();
 $arr_pre_sub[][]=array();
 */
             $str_pre_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND   $f_pre=1 ; ";                           
   // echo "   ";
     $arr_pre[$key] = $esn->query_(  $str_pre_all  );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_pre_sub=>$val_pre_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_pre_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND   $f_pre=1  AND  $f_res1= $key_pre_sub  ; ";    
                     $arr_pre_sub[$key][$key_pre_sub] =  $esn->query_(  $str_pre_sub );   //ผลรวมทั้งหมด
                   
       }     
  
       /*
        //`InterventionDoctor1_1`=Add new medication
   $f_add="``InterventionDoctor1_1``"; 
 $name_add="- Prevention of Advers drug reaction";
 $arr_add[]=array();
 $arr_add_sub[][]=array();
 */
      $str_add_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND    $f_add=1 ; ";                           
   // echo "   ";
     $arr_add[$key] = $esn->query_(  $str_add_all  );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_add_sub=>$val_add_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_add_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND    $f_add=1  AND  $f_res1= $key_add_sub  ; ";    
                     $arr_add_sub[$key][$key_add_sub] =  $esn->query_(   $str_add_sub  );   //ผลรวมทั้งหมด
                   
       }        
 
       /*
         //`InterventionDoctor1_2`=Adjust dosage regimen
   $f_dosage="`InterventionDoctor1_2`"; 
 $name_dosage="- Adjust dosage regimen";
 $arr_dosage[]=array();
 $arr_dosage_sub[][]=array();
 */
         $str_dosage_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND     $f_dosage=1 ; ";                           
   // echo "   ";
     $arr_dosage[$key] = $esn->query_(  $str_dosage_all  );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_dosage_sub=>$val_dosage_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_dosage_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND    $f_dosage=1  AND  $f_res1= $key_dosage_sub  ; ";    
                     $arr_dosage_sub[$key][$key_dosage_sub] =  $esn->query_(   $str_dosage_sub  );   //ผลรวมทั้งหมด
                   
       }   
     
     /*  
          //`InterventionDoctor1_3`=Confrim prescription
   $f_conf="`InterventionDoctor1_3`"; 
 $name_conf="- Confrim prescription";
 $arr_conf[]=array();
 $arr_conf_sub[][]=array();
  */
              $str_conf_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND      $f_conf=1 ; ";                           
   // echo "   ";
     $arr_conf[$key] = $esn->query_(   $str_conf_all  );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_conf_sub=>$val_conf_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_conf_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND     $f_conf=1   AND  $f_res1=$key_conf_sub  ; ";    
                     $arr_conf_sub[$key][$key_conf_sub] =  $esn->query_(   $str_conf_sub  );   //ผลรวมทั้งหมด
                   
       }    
       
       /*
           //`InterventionDoctor1_4`=Discontinue medication
   $f_dis="`InterventionDoctor1_4`"; 
 $name_dis="- Discontinue medication";
 $arr_dis[]=array();
 $arr_dis_sub[][]=array();
   */
     $str_dis_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND      $f_dis=1 ; ";                           
   // echo "   ";
     $arr_dis[$key] = $esn->query_(    $str_dis_all  );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_dis_sub=>$val_dis_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_dis_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND     $f_dis=1   AND  $f_res1=$key_dis_sub  ; ";    
                     $arr_dis_sub[$key][$key_dis_sub] =  $esn->query_(   $str_dis_sub );   //ผลรวมทั้งหมด
                   
       }       
     
   /*    
            //`InterventionDoctor1_5`=Inform drug related problems
   $f_rel="`InterventionDoctor1_5`"; 
 $name_rel="- Inform drug related problems";
 $arr_rel[]=array();
 $arr_rel_sub[][]=array();
 */
      $str_rel_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND      $f_rel=1 ; ";                           
   // echo "   ";
     $arr_rel[$key] = $esn->query_(   $str_rel_all  );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_rel_sub=>$val_rel_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_rel_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND     $f_rel=1   AND  $f_res1=$key_rel_sub  ; ";    
                     $arr_rel_sub[$key][$key_rel_sub] =  $esn->query_(   $str_rel_sub  );   //ผลรวมทั้งหมด
                   
       }   
       
     /*  
             //`InterventionDoctor1_6`=Suggest changing medication
   $f_sug="`InterventionDoctor1_6`"; 
 $name_sug="- Suggest changing medication";
 $arr_sug[]=array();
 $arr_sug_sub[][]=array();
   */
           $str_sug_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND      $f_sug=1 ; ";                           
   // echo "   ";
     $arr_sug[$key] = $esn->query_(  $str_sug_all );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_sug_sub=>$val_sug_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_sug_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND      $f_sug=1   AND  $f_res1=$key_sug_sub  ; ";    
                     $arr_sug_sub[$key][$key_sug_sub] =  $esn->query_(    $str_sug_sub  );   //ผลรวมทั้งหมด
                   
       }     
  
       /*
              //`InterventionDoctor1_6`=Suggest laboratory
   $f_sugl="`InterventionDoctor1_7`"; 
 $name_sugl="- Suggest laboratory";
 $arr_sugl[]=array();
 $arr_sugl_sub[][]=array();
 */
                 $str_sugl_all="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'  AND      $f_sugl=1 ; ";                           
   // echo "   ";
     $arr_sugl[$key] = $esn->query_(  $str_sugl_all  );   //ผลรวมทั้งหมด
       foreach($arr_res1 as $key_sugl_sub=>$val_sugl_sub ) //$f_res1="`Response1`";  &&   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');   
       {
             $str_sugl_sub="SELECT * FROM $tb_non   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  `$f_non`='$key'   AND      $f_sugl=1   AND  $f_res1=$key_sugl_sub  ; ";    
                     $arr_sugl_sub[$key][$key_sugl_sub] =  $esn->query_(    $str_sugl_sub  );   //ผลรวมทั้งหมด
                   
       }    
       
       
       
}//end foreach level1


 #--5.ADRs -----------------------------------------
 $tb_adr="`08-adr`";
 $f_res= "`Response2`";   //`Response2`  1,2,3,4   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');
  $f_adr="`Action2`";   // 1=Prevent ; 2 =Correct   #$arr_act1=array(1=>'Prevent',2=>'Correct');
 $name_adr="ADRs";

 // -- ADRs  ทั้งหมด
 $str_adr_all="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'    ; ";     
 $sum_adr =  $esn->query_( $str_adr_all  );   //ผลรวมทั้งหมด  ADRs  ทั้งหมด
 $adr_res1=array();  //นับจำนวน ของ   $arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');
 $adr_act=array(); // ADRs   1=Prevent ; 2 =Correct  ผลรวม
 $adr_sub4[][]=array(); //Prevent,Correct=>(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');

 // InterventionPT2-1 -  InterventionPT2-4  ข้อมูลเป็นแบบ BLOB
 //`InterventionPT2-1`=Adjustj for appropriate therapy
//`InterventionPT2-2`=Correct technique of administration
//`InterventionPT2-3`=Inform drug related problems
//`InterventionPT2-4`=Life style modification


 //`InterventionPT2-5`=Monitor efficacy and toxicity
 $adr_mo="`InterventionPT2-5`";
 $mo_adr[]=array();
 $mo_dar_sub[][]=array();
 
 //`InterventionPT2-6`=Prevention of Advers drug reaction
  $adr_pre="`InterventionPT2-6`";
 $mo_pre[]=array();
 $mo_pre_sub[][]=array();
 
 

    
 
 foreach(  $arr_res1 as $key_adr=>$val_adr    )// Loop จาก 1- 4 =>$arr_res1=array(1=>'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A');
 {
        $str_adr_arr4="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND   $f_res=$key_adr  ; ";    
     // echo "                    ";
     // echo   $val_adr;
      $adr_res1[$key_adr]=$esn->query_(  $str_adr_arr4  ); // 1 - 4  'Resolved',2=>'Improved',3=>'Not Improved',4=>'N/A'
     // echo "<br>";
 }
 
 
  //`InterventionPT2-7`=Add new medication
 $adr_add="`InterventionPT2-7`";
 $mo_add[]=array();
 $mo_add_sub[][]=array();
 
 
 # `InterventionDoctor2-1`  -  `InterventionDoctor2-7`
 $f_doc[]=array();
 $arr_doc[][]=array();
 $arr_doc4sub[][][]=array();
    for($z=1;$z<=7;$z++)
    {    
          $f_doc[$z] = " `InterventionDoctor2-$z` ";    
            foreach($arr_act1   as $key_doc => $val_doc )
            {    
                  $str_adr_add="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND $f_doc[$z]=$key_doc ;  ";               
                  $arr_doc[$z][$key_doc]=$esn->query_(  $str_adr_add );  //ผลรวม   1=Prevent ; 2 =Correct    
                  foreach( $arr_res1  as $key_doc_sub=>$val_doc_sub  )
                  {
                       $str_adr_add="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND $f_doc[$z]=$key_doc  AND  $f_res=$key_doc_sub ;  ";                    
                        $arr_doc4sub[$z][$key_doc][$key_doc_sub]=$esn->query_(    $str_adr_add  );   
                       //echo "<br>";
                  }
            }    
    }
    
 
 foreach($arr_act1 as $key_act => $val_act )//  ADRs  1=Prevent ; 2 =Correct   #$arr_act1=array(1=>'Prevent',2=>'Correct');
 {
     //echo $key_act; 
     //echo "<br>";
      $str_adr_act="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $f_adr=$key_act  ; ";  
      $adr_act[$key_act] = $esn->query_(   $str_adr_act  ); //   ADRs   1=Prevent ; 2 =Correct  ผลรวม 
      
       //`InterventionPT2-5`=Monitor efficacy and toxicity
      $str_adr_mo="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $adr_mo=$key_act  ; ";  
      $mo_adr[$key_act] = $esn->query_(   $str_adr_mo ); 

       //`InterventionPT2-6`=Prevention of Advers drug reaction
  //$adr_pre="`InterventionPT2-5`";
 //$mo_pre[]=array();
 //$mo_pre_sub[][]=array();
        $str_pre_mo="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $adr_pre=$key_act  ; ";  
    //echo "   ";
     $pre_adr[$key_act] = $esn->query_(   $str_pre_mo ); 
   //echo "<br>";
     
     
      //`InterventionPT2-7`=Add new medication
/* $adr_add="`InterventionPT2-7`";
 $mo_add[]=array();
 $mo_add_sub[][]=array();  */
      $str_adr_add="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND $adr_add=$key_act  ; ";  
    //echo "   ";
     $mo_add[$key_act] = $esn->query_(    $str_adr_add  ); 
   //echo "<br>";
    

  
        
      foreach( $arr_res1  as $key_sub_adr=>$val_sub_adr  )
      {
           //echo   $key_sub_adr;
           //echo "<br>";
        //    echo  $val_sub_adr;
        //      echo "<br>";
              $str_adr_act="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $f_adr=$key_act   AND   $f_res=$key_sub_adr  ; ";           
              $adr_sub4[$key_act][$key_sub_adr] =  $esn->query_($str_adr_act );   
              
              //`InterventionPT2-5`=Monitor efficacy and toxicity
                  $str_adr_mo="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $adr_mo=$key_act   AND   $f_res=$key_sub_adr   ; ";  
               //echo  "      ";
              // echo "<br>";
                $mo_dar_sub[$key_act][$key_sub_adr] = $esn->query_(   $str_adr_mo ); 
                //echo "<br>";
                
                       //`InterventionPT2-6`=Prevention of Advers drug reaction
  //$adr_pre="`InterventionPT2-5`";
 //$mo_pre[]=array();
 //$mo_pre_sub[][]=array();
               $str_adr_pre="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $adr_pre=$key_act   AND   $f_res=$key_sub_adr   ; ";    
               $mo_pre_sub[$key_act][$key_sub_adr] = $esn->query_(   $str_adr_pre ); 
               
               
                     //`InterventionPT2-7`=Add new medication
/* $adr_add="`InterventionPT2-7`";
 $mo_add[]=array();
 $mo_add_sub[][]=array();  */
                $str_adr_add="SELECT * FROM  $tb_adr   WHERE  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  $adr_add=$key_act   AND   $f_res=$key_sub_adr   ; ";    
                $mo_add_sub[$key_act][$key_sub_adr] = $esn->query_(  $str_adr_add ); 
               
      }
 }
     #http://127.0.0.1/report_pdf/appendix_report/query_case3.php?begin=03-11-2542&end=07-11-2557
 #http://www.esn.com/report_pdf/appendix_report/query_case3.php?begin=03-11-2542&end=07-11-2557
     #  include("report_case3.php");  //PDF content report  //ของเดิมก่อนปรับปรุง
    # include("report_case3_update2.php");  //ปรับปรุง
   include("report_case3_update2.php");  //ปรับปรุง
 
?>

