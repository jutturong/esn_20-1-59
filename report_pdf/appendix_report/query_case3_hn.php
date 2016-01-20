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
    
    public  function  query_tb($hn,$fname,$wr) #query  table
    {
        /*
        SELECT HN, count( `GiveInformation1` )
                                           FROM `06_giveinformation`
                                           WHERE `HN` = 'AA0096'
                                           GROUP BY `GiveInformation1`
                                           HAVING `GiveInformation1` = 'Y'
        */       
       return  $this->str_  =  "    SELECT  $fname
                                           FROM `06_giveinformation`
                                           WHERE `HN` = '$hn'                                    
                                            AND   `$fname` = 'Y'   ".$wr;
    }
}


  
 $esn=new query3();

 $begin=trim($_REQUEST['begin']);
 $end=trim($_REQUEST['end']);
 
  $b_conv=$esn->date_eng_format($begin);
  $e_conv=$esn->date_eng_format($end);
  
  
  
 #$hn=trim($_REQUEST["hn"]); //ของเดิม
 $hn=trim($_REQUEST["HN"]);
 //echo "<br>";
$fname="GiveInformation1";
$result_give_yes[]=array();


if(  strlen($hn) == 6  )
{
$z=1;
while($z<=5)
{
      $fname="GiveInformation".$z;   //AND  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  "; 
      $wr=" AND  `MonitoringDate`   BETWEEN  ' $b_conv'  AND '$e_conv'  ";
      $strQue_= $esn->query_tb($hn,$fname,$wr);
      //echo "<br>";  
     $que = mysql_query($strQue_)  or  die('Can \'t  connect  MYSQL SERVER !!! ');
     $result_give_yes[$z]=  mysql_num_rows($que);
     //echo "<br>";
      $z++;
}
}

    


    $arr_give=array('- What \'s your disease?' ,'- What \'s treatment?','- How to manage the side effect?','- Bring medication to each visit?','- How to correct be havior?','- Ohter');

     #http://esn.com/report_pdf/appendix_report/query_case3_hn.php?begin=03-11-2542&end=07-11-2557&HN=AA0096
    #http://www.esn.com/report_pdf/appendix_report/query_case3_hn.php?begin=03-11-2542&end=07-11-2557&HN=AA0096
      include("report_case3_hn.php");  //ปรับปรุง
?>