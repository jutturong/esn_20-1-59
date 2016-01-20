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
    
    public  function  query_tb($fname) #query  table
    {
       
        /*
SELECT DISTINCT (
HN
)
FROM `06_giveinformation`
LIMIT 0 , 30

         */      
        /*
                return  $this->str_  =  "    SELECT  $fname
                                           FROM `06_giveinformation`
                                           WHERE `HN` = '$hn'                                    
                                            AND   `$fname` = 'Y' ;  ";
        */
        
       return  $this->str_  =  "    SELECT  
                                             DISTINCT ( HN )
                                           FROM   ".$fname;
                                                                    
    }
}



$esn=new query3();


$result_give_yes[]=array();



 $begin=trim($_REQUEST['begin']);
 $end=trim($_REQUEST['end']); 
$b_conv=$esn->date_eng_format($begin);
$e_conv=$esn->date_eng_format($end);

 $tb="`06_giveinformation`";
 $field_name="GiveInformation1";
 $fname=$tb."   WHERE   `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  AND  ";
 #  WHERE   `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'        
 
// echo  $esn->query_tb($fname);
  


$z=1;
while($z<=5)
{
      $fname_  = "   GiveInformation".$z." ='Y'  ;";
    #echo  $strQue_= $esn->query_tb($hn,$fname);
     $strQue_ =  $esn->query_tb($fname.$fname_);
      $que = mysql_query($strQue_)  or  die('Can \'t  connect  MYSQL SERVER !!! ');  
      $result_give_yes[$z]=  mysql_num_rows($que);
      $z++;
      // echo "<br>";
    } 
  $arr_give=array('- What \'s your disease?' ,'- What \'s treatment?','- How to manage the side effect?','- Bring medication to each visit?','- How to correct be havior?','- Ohter');
 #http://esn.com/report_pdf/appendix_report/query_case3_distinct_hn.php?begin=03-11-2542&end=07-11-2557
    include("report_case3_hn.php");  //ปรับปรุง
?>

