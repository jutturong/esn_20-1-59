<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Otherdrp extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";

var  $tb_main="#mysql50#09-otherdrp";  
//var  $tb_main="otherdrp";


 

       public function __construct()
       {
                
         parent::__construct();
         // $this->load->library('encrypt');
         $this->load->helper('date');
         $this->load->model('user_model');
         $this->load->library('session');
         
         //in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)
         
       }
       # http://localhost/ci/index.php/otherdrp/loadOtherdrp/
       public  function loadOtherdrp()
       {
          // http://drugstore.kku.ac.th/esn2/index.php/otherdrp/loadOtherdrp/
           $tb=$this->tb_main;
          // $tb_sub="laboratorytype";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
         
           //// chem1 23 to 36 
           //$name=array(23,24,25,26,27,28,29,30,31,32,33,34,35,36);
           //$this->db->where_in('Lab',$name);
            
           
           //$objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
          // $this->db->join($tb_sub,$tb.'.Lab='.$tb_sub.'.LabCode','left');
          
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            //$this->db->order_by('MonitoringDate','DESC');
           $objquery=$this->db->get($tb,10,0);
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
       public function  view_otherdrp()
       {
            // http://drugstore.kku.ac.th/esn2/index.php/otherdrp/view_otherdrp/09/07/2552
            $s1=$this->uri->segment(3);
            $s2=$this->uri->segment(4);
            $s3=$this->uri->segment(5);
            $dmy=$s1."/".$s2."/".$s3;
            //echo $dmy;
             $q=$this->db->get_where($this->tb_main,array("MonitoringDate"=>$dmy));
              // $q=$this->db->get_where($this->tb_main);
             foreach($q->result() as $row)
             {
                   $rows[]=$row;
             }
             echo  json_encode($rows);
              
       }
       
       # http://localhost/ci/index.php/otherdrp/loadOtherdrpHN/ES0597
       public  function loadOtherdrpHN()
       {
           $tb=$this->tb_main;
          // $tb_sub="laboratorytype";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
         
           //// chem1 23 to 36 
           //$name=array(23,24,25,26,27,28,29,30,31,32,33,34,35,36);
           //$this->db->where_in('Lab',$name);
            
           
           //$objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
          // $this->db->join($tb_sub,$tb.'.Lab='.$tb_sub.'.LabCode','left');
          
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            //$this->db->order_by('MonitoringDate','DESC');
           $HN=trim($this->uri->segment(3));
           $objquery=$this->db->get_where($tb,array("HN"=>$HN),10,0);
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
       
       public  function loadADRHN()
       {
           $HN=$this->uri->segment(3);
           $tb=$this->tb_main;
          // $tb_sub="laboratorytype";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
         
           //// chem1 23 to 36 
           //$name=array(23,24,25,26,27,28,29,30,31,32,33,34,35,36);
           //$this->db->where_in('Lab',$name);
            
           
           //$objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
          // $this->db->join($tb_sub,$tb.'.Lab='.$tb_sub.'.LabCode','left');
          
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            //$this->db->order_by('MonitoringDate','DESC');
          $objquery=$this->db->get_where($tb,array("HN"=>$HN));
          // $objquery=$this->db->get($tb,10,0);
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }

       # http://localhost/ci/index.php/chem/loadChem2/
       public  function loadChem2()
       {
           $tb=$this->tb_main;
           $tb_sub="laboratorytype";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
         
           ###-------------------chem2     37 to 47
           $name=array(37,38,39,40,41,42,43,44,45,46,47);
           $this->db->where_in('Lab',$name);
            
           
           $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
           $this->db->join($tb_sub,$tb.'.Lab='.$tb_sub.'.LabCode','left');
          
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            $this->db->order_by('MonitoringDate','DESC');
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
     
       
       #    /medication/insertMedi
       public function  insertMedi()
       {
                    
           echo $HN_medi=trim($this->input->get_post('HN_medi'));
           echo "<br>";
           echo $MonitoringDate_medi=trim($this->input->get_post('MonitoringDate_medi'));
           echo "<br>";
           echo  $DRPselection4=trim($this->input->get_post('DRPselection4'));
           echo "<br>";
           echo  $MedicationErrorDrug4=trim($this->input->get_post('MedicationErrorDrug4'));
           echo "<br>";  
           echo $MedicationErrorDetail=  addslashes($this->input->get_post('MedicationErrorDetail'));
           echo "<br>";
           echo $Action4=addslashes($this->input->get_post('Action4'));
           echo "<br>";
           echo $Response4=  addslashes($this->input->get_post('Response4'));
           echo "<br>";
           echo  $ResponseDetail4=  addslashes($this->input->get_post('ResponseDetail4'));
           echo "<br>";
           $followup_medi=$this->input->get_post('followup_medi');  
           $week_medi=$this->input->get_post('week_medi');
           $conv_week_medi=$this->user_model->databox_conv($week_medi);  
           
           
           
           /*
                $this->db->set('HN', $HN_adr );
                $this->db->set('MonitoringDate', $MonitoringDate_adr );
                $this->db->set('DRPselection2', $DRPselection2 );
                $this->db->set('DRPDrug2', $DRPDrug2 );
                $this->db->set('ADRDetail2', $ADRDetail2 );
                $this->db->set('Action2', $Action2 );
                $this->db->set('Response2', $Response2 );
                $this->db->set('ResponseDetail2', $ResponseDetail2 );
                $this->db->set('followup_adr', $followup_adr );
                $this->db->set('week_adr', $conv_week_adr );              
                $this->db->insert($tb); 
            */    
            
           $this->db->set('HN', $HN_medi );
           $this->db->set('MonitoringDate', $MonitoringDate_medi );
           $this->db->set('DRPselection4', $DRPselection4 );
           $this->db->set('MedicationErrorDrug4',$MedicationErrorDrug4);
           $this->db->set('MedicationErrorDetail',$MedicationErrorDetail);
           $this->db->set('Action4',$Action4);
           $this->db->set('Response4',$Response4);
           $this->db->set('ResponseDetail4',$ResponseDetail4);
           $this->db->set('followup',$followup_medi);
           $this->db->set('week',$conv_week_medi);
            
           $tb=$this->tb_main; 
           $this->db->insert($tb); 
           
       }
      
        public function  insertdrp()
       {
                    
           echo $HN_drp=trim($this->input->get_post('HN_drp'));
           echo "<br>";
           echo $MonitoringDate_drp=trim($this->input->get_post('MonitoringDate_drp'));
           echo "<br>";
           echo $DRPselection3=trim($this->input->get_post('DRPselection3'));
           echo "<br>";
           $DRPDrug3=$this->input->get_post('DRPDrug3');
           $DRPDetail3=addslashes($this->input->get_post('DRPDetail3'));
           $Action3=$this->input->get_post('Action3');
           $Response3=$this->input->get_post('Response3');
         echo  $ResponseDetail3=$this->input->get_post('ResponseDetail3');
         echo "<br>";
         
         
           $followup_drp=$this->input->get_post('followup_drp');  
           $week_drp=$this->input->get_post('week_drp');
           $conv_week_drp=$this->user_model->databox_conv($week_drp);  
          
          
          
           $this->db->set('HN', $HN_drp );
           $this->db->set('MonitoringDate', $MonitoringDate_drp );
           $this->db->set('DRPselection3', $DRPselection3 );
           $this->db->set('DRPDrug3',$DRPDrug3);
           $this->db->set('DRPDetail3',$DRPDetail3);
           $this->db->set('Action3',$Action3 );
           $this->db->set('Response3',$Response3);
           $this->db->set('ResponseDetail3',$ResponseDetail3 );
           $this->db->set('followup',$followup_drp );
           $this->db->set('week',$conv_week_drp );
           
           $tb=$this->tb_main; 
           $this->db->insert($tb); 
           
       }
       
       public  function  deldrp()
       {
           $tb=$this->tb_main;
           $HN=trim($this->uri->segment(3));
           $d=trim($this->uri->segment(4));
           $m=trim($this->uri->segment(5));
           $y=trim($this->uri->segment(6));
           //$MonitoringDate=trim($this->uri->segment(4));
           $MonitoringDate=$d."/".$m."/".$y;
           
           $this->db->where('HN',$HN);
         //  $this->db->where('MonitoringDate',$MonitoringDate);
           $ck=$this->db->delete($tb);
           if($ck)
           {
               echo json_encode(array("success"=>1));
           }
           elseif(!$ck)
           {
               echo json_encode(array("success"=>0));
           }
       }
       
       public function saveChem1()
       {
         #http://localhost/ci/index.php/blood/saveBlood   
           $tb=$this->tb_main; 
           $HN_chem1= $this->input->get_post('HN_chem1');          
           $MonitoringDate_chem1=$this->input->get_post('MonitoringDate_chem1');
           $conv_MonitoringDate=$this->user_model->databox_conv($MonitoringDate_chem1);  

           /*               
LabCode
LabGroup
Lab
23
3
Blood Sugar
24
3
Urea Nitrogen
25
3
Creatinine
26
3
Uric Acid
27
3
Sodium
28
3
Potassium
29
3
Bicarbonate
30
3
Chloride
31
3
Calcium
32
3
Phosphorus
33
3
A1C
34
3
Cholesterol
35
3
Total Protein
36
3
Albumin
*/
           
           $bs=$this->input->get_post('bs'); //23
           if( $bs != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 23 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $bs );
                $this->db->insert($tb);             
          } 
          
          $bun=$this->input->get_post('bun'); //24
          if( $bun != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 24 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $bun );
                $this->db->insert($tb);             
          }
          
          $scr=$this->input->get_post('scr'); //25
          if( $scr != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 25 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $scr );
                $this->db->insert($tb);             
          }
          
          $uric=$this->input->get_post('uric'); //26
          if( $uric != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 26 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $uric );
                $this->db->insert($tb);             
          }
          
          $na=$this->input->get_post('na'); //27
          if( $na != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 27 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $na );
                $this->db->insert($tb);             
          }
          
          
           $k=$this->input->get_post('k'); //28
          if( $k != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 28 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $k );
                $this->db->insert($tb);             
          }
          
          $hco=$this->input->get_post('hco'); //29
          if( $hco != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 29 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hco );
                $this->db->insert($tb);             
          }
          
          
          $cl=$this->input->get_post('cl'); //30
          if( $cl != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 30 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $cl );
                $this->db->insert($tb);             
          }
          
          
         $ca=$this->input->get_post('ca'); //31
           if( $ca != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 31 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $ca );
                $this->db->insert($tb);             
          }
         
          $p=$this->input->get_post('p'); //32
          if( $p != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 32 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $p );
                $this->db->insert($tb);             
          }
         
          $tp=$this->input->get_post('tp'); //35
          if( $tp != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 35 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $tp );
                $this->db->insert($tb);             
          }
          
          $alb=$this->input->get_post('alb'); //36
          if( $alb != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 36 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $alb );
                $this->db->insert($tb);             
          }
          
          
       }
       
        public function saveTDM()
       {
         #http://localhost/ci/index.php/blood/saveBlood   
           //$tb=$this->tb_main; 
           $tb="13_tdm2"; 
           $HN_tdm= $this->input->get_post('HN_tdm');          
           $MonitoringDate_tdm=$this->input->get_post('MonitoringDate_tdm');
           $conv_MonitoringDate=$this->user_model->databox_conv($MonitoringDate_tdm);  

    
           /*
          $drug=$this->input->get_post('drug');          
          if( $drug != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN',  $HN_tdm );
                $this->db->set('Lab', 34 );      
                $this->db->insert($tb);             
          }
          */
          
           /*
           $dmy_interpret=$this->input->get_post('dmy_interpret');
           $conv_dmy_interpret=$this->user_model->databox_conv($dmy_interpret); 
            if( $conv_dmy_interpret != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN',  $HN_tdm );
                $this->db->set('HN',  $HN_tdm );   
                $this->db->insert($tb);             
          }
          */
           
           $dmy_analysis=$this->input->get_post('dmy_analysis');
           $conv_dmy_analysis=$this->user_model->databox_conv($dmy_analysis);          
           $ward=$this->input->get_post('ward');
           $Indication=$this->input->get_post('Indication'); 
           $vd=$this->input->get_post('vd');
           $ke=$this->input->get_post('ke');
           $t1=$this->input->get_post('t1');
           $assessment=$this->input->get_post('assessment');
           $Interpretation=$this->input->get_post('Interpretation');
           $nb=$this->input->get_post('nb');
           
           $drug=$this->input->get_post('drug');
           $dmy_interpret=$this->input->get_post('dmy_interpret');
           $conv_dmy_interpret=$this->user_model->databox_conv($dmy_interpret); 
           $followup=$this->input->get_post('followup');
           $conv_followup=$this->user_model->databox_conv($followup);
           $week=$this->input->get_post('week'); 
           
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN',  $HN_tdm );
                $this->db->set('AnalysisDate',  $conv_dmy_analysis );  
                $this->db->set('Ward',  $ward ); 
                $this->db->set('Indication',  $Indication );
                $this->db->set('Vd',  $vd );
                $this->db->set('Ke',  $ke );
                $this->db->set('T1div2',  $t1 );
                $this->db->set('Assessment',  $assessment );              
                $this->db->set('Interpretation',  $Interpretation );
                $this->db->set('NB', $nb );
                
                $this->db->set('drug',$drug);
                $this->db->set('dmy_interpret',$conv_dmy_interpret);
                $this->db->set('dmy_followup',$conv_dmy_interpret);
                $this->db->set('week',$week);
                
                $this->db->insert($tb);             
         
          
       }
       
       public  function  tb_user()
       {
           //  http://drugstore.kku.ac.th/esn2/index.php/otherdrp/tb_user
           $tb="user";
           $q=trim($this->input->get_post("q"));
           $this->db->like("UserName",$q);
           $q=$this->db->get($tb);
           foreach($q->result() as $row)
           {
                $rows[]=$row;
           }
           echo json_encode($rows);
           
       }
       
       public   function  view_drp()
       {
              $tb="";
           
       }
       public  function   tb_drug()
       {
           //  http://drugstore.kku.ac.th/esn2/index.php/otherdrp/tb_drug
             $tb="drug";
             $q=trim($this->input->get_post("q"));
             $this->db->like("Drug",$q);
             $query=$this->db->get($tb);
             foreach( $query->result() as $row )
             {
                 $rows[]=$row;
             }
             echo json_encode($rows);
       
       }
       public function delTDM()
       {
                
                
               $MonitoringDate=trim($this->input->get_post('MonitoringDate'));
               //echo "<br>";
               $Lab=trim($this->input->get_post('Lab'));
               //echo "<br>";
               $HN=trim($this->input->get_post('HN')); 
               
                $tb=$this->tb_main;
                
                
               
                $this->db->where('MonitoringDate',$MonitoringDate );
              //  $this->db->where('Lab',$Lab );
                $this->db->where('HN',$HN );
                $ck=$this->db->delete($tb);
               
                
                //$ck=$this->db->delete($tb , array('MonitoringDate' => $MonitoringDate ,'Lab'=>$Lab , 'HN'=>$HN )); 
               
 
                
                if($ck)
                {
                    //echo 1;
                    echo json_encode(array('result'=>'1'));
                }
                else
                {
                    //echo 0;
                    echo json_encode(array('result'=>'0'));
                }
                
                
                
                
       }
       
       public function delChem2()
       {
                
                
               $MonitoringDate=trim($this->input->get_post('MonitoringDate'));
               //echo "<br>";
               $Lab=trim($this->input->get_post('Lab'));
               //echo "<br>";
               $HN=trim($this->input->get_post('HN')); 
               
                $tb=$this->tb_main;
                
                
               
                $this->db->where('MonitoringDate',$MonitoringDate );
                $this->db->where('Lab',$Lab );
                $this->db->where('HN',$HN );
                $ck=$this->db->delete($tb);
               
                
                //$ck=$this->db->delete($tb , array('MonitoringDate' => $MonitoringDate ,'Lab'=>$Lab , 'HN'=>$HN )); 
               
 
                
                if($ck)
                {
                    //echo 1;
                    echo json_encode(array('result'=>'1'));
                }
                else
                {
                    //echo 0;
                    echo json_encode(array('result'=>'0'));
                }
                
                
                
                
       }
       
        public function  callTdm_HN()
       {
          #http://localhost/ci/index.php/tdm/callTdm_HN/ES0597
           /*
                    EEG =95  ดูใน value จะมีค่า 0,1,2 ให้เทียบในตาราง EEGresult
                     //ตัวอย่างทดสอบ  CQ1312
                    select  * from  `monitoring_04`
                    where  Lab = 95   and  HN='CQ1312'
            */
           //$HN="ES0597";
           $HN=$this->uri->segment(3);
           //$tb="04__monitoring";
           $tb=$this->tb_main;;
          //  $tb="04_monitoring";
          // $tb="monitoring_04";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96','HN'=>$HN));
           //$name=array(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22);
          // $name=array(23,24,25,26,27,28,29,30,31,32,33,34,35,36);
           
           
           
           //$this->db->where_in('Lab',$name);
           //$objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','HN'=>$HN));
           $objquery=$this->db->get_where($tb,array('HN'=>$HN));
           //$this->db->or_where($tb,array('Clinic'=>'Epilepsy Clinic','HN'=>$HN,'Lab'=>'96'));
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            $this->db->order_by('MonitoringDate','DESC');
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
           
           
       }
       
       public function  callChem2_HN()
       {
          #http://localhost/ci/index.php/general/callGEN_HN/ES0597
           /*
                    EEG =95  ดูใน value จะมีค่า 0,1,2 ให้เทียบในตาราง EEGresult
                     //ตัวอย่างทดสอบ  CQ1312
                    select  * from  `monitoring_04`
                    where  Lab = 95   and  HN='CQ1312'
            */
           //$HN="ES0597";
           $HN=$this->uri->segment(3);
           //$tb="04__monitoring";
           $tb=$this->tb_main;
          //  $tb="04_monitoring";
          // $tb="monitoring_04";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96','HN'=>$HN));
           //$name=array(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22);
           // $name=array(23,24,25,26,27,28,29,30,31,32,33,34,35,36);
           $name=array(37,38,39,40,41,42,43,44,45,46,47);
           $this->db->where_in('Lab',$name);
           $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','HN'=>$HN));
           //$this->db->or_where($tb,array('Clinic'=>'Epilepsy Clinic','HN'=>$HN,'Lab'=>'96'));
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            $this->db->order_by('MonitoringDate','DESC');
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
           
           
       }
       
      
       
       public function  fetchdrp()
       {
           //http://localhost/ci/index.php/tdm/fetchTDM/ES0597/                              
           $HN=$this->uri->segment(3);                     
           //$MonitoringDate=$this->uri->segment(4);          
          $d=$this->uri->segment(4);
          $m=$this->uri->segment(5);
          $y=$this->uri->segment(6);
          $MonitoringDate_drp=$d."/".$m."/".$y;
           
           
           
           
           $tb=$this->tb_main;
           $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate_drp));
           //$query=$this->db->get_where($tb,array('HN'=>$HN));
           $row=$query->row();
              if( $row )
              {
                  echo json_encode(array(
                      'HN_drp'=>$HN,
                      'MonitoringDate_drp'=>$MonitoringDate_drp,
                      'DRPselection3'=>$row->DRPselection3,
                      'DRPDrug3'=>$row->DRPDrug3,
                      'DRPDetail3'=>$row->DRPDetail3,
                      'Action3'=>$row->Action3,
                      'Response3'=>$row->Response3,
                      'ResponseDetail3'=>$row->ResponseDetail3,
                  ));
              }
           
       }
       
       public function  updateMedi()
       {
                    
           echo $HN_medi=trim($this->input->get_post('HN_medi'));
           echo "<br>";
           echo $MonitoringDate_medi=trim($this->input->get_post('MonitoringDate_medi'));
           echo "<br>";
           echo  $DRPselection4=trim($this->input->get_post('DRPselection4'));
           echo "<br>";
           echo  $MedicationErrorDrug4=trim($this->input->get_post('MedicationErrorDrug4'));
           echo "<br>";  
           echo $MedicationErrorDetail=  addslashes($this->input->get_post('MedicationErrorDetail'));
           echo "<br>";
           echo $Action4=addslashes($this->input->get_post('Action4'));
           echo "<br>";
           echo $Response4=  addslashes($this->input->get_post('Response4'));
           echo "<br>";
           echo  $ResponseDetail4=  addslashes($this->input->get_post('ResponseDetail4'));
           echo "<br>";
           $followup_medi=$this->input->get_post('followup_medi');  
           $week_medi=$this->input->get_post('week_medi');
           $conv_week_medi=$this->user_model->databox_conv($week_medi);  
           $tb=$this->tb_main; 
           
           
           
           /* 
           $this->db->set('HN', $HN_medi );
           $this->db->set('MonitoringDate', $MonitoringDate_medi );
           $this->db->set('DRPselection4', $DRPselection4 );
           $this->db->set('MedicationErrorDrug4',$MedicationErrorDrug4);
           $this->db->set('MedicationErrorDetail',$MedicationErrorDetail);
           $this->db->set('Action4',$Action4);
           $this->db->set('Response4',$Response4);
           $this->db->set('ResponseDetail4',$ResponseDetail4);
           $this->db->set('followup',$followup_medi);
           $this->db->set('week',$conv_week_medi);                   
           $this->db->insert($tb);             
            */
           
           $data=array(
               'DRPselection4'=>$DRPselection4,
               'MedicationErrorDrug4'=>$MedicationErrorDrug4,
               'MedicationErrorDetail'=>$MedicationErrorDetail,
               'Action4'=>$Action4,
               'Response4'=>$Response4,
               'Response4'=>$Response4,
               'ResponseDetail4'=>$ResponseDetail4,
               'followup'=>$followup_medi,
               'week'=>$conv_week_medi,
           );
           
           $this->db->where('HN',$HN_medi);
           $this->db->where('MonitoringDate',$MonitoringDate_medi);
           $this->db->update($tb,$data);
           
       }
       
         public function  updatedrp()
       {
                    
            $HN_drp=trim($this->input->get_post('HN_drp'));
           //echo "<br>";
           echo $MonitoringDate_drp=trim($this->input->get_post('MonitoringDate_drp'));
           echo "<br>";
   
             $DRPselection3=trim($this->input->get_post('DRPselection3'));
            //echo "<br>";
            
             $DRPDrug3=$this->input->get_post('DRPDrug3');
           $DRPDetail3=addslashes($this->input->get_post('DRPDetail3'));
           $Action3=$this->input->get_post('Action3');
           $Response3=$this->input->get_post('Response3');
           $ResponseDetail3=$this->input->get_post('ResponseDetail3');
         //echo "<br>";
         
         
           $followup_drp=$this->input->get_post('followup_drp');  
           $week_drp=$this->input->get_post('week_drp');
           $conv_week_drp=$this->user_model->databox_conv($week_drp);  
           
           $data=array(
              'DRPselection3'=>$DRPselection3, 
              'DRPDrug3'=>$DRPDrug3,
              'DRPDetail3'=>$DRPDetail3,  
              'Action3'=>$Action3,
              'Response3'=>$Response3,
              'ResponseDetail3'=>$ResponseDetail3,
             // 'followup_'=>$followup_drp,
             // 'week_'=>$conv_week_drp,
               
           );
           
          $this->db->where('HN',$HN_drp);
          $this->db->where('MonitoringDate',$MonitoringDate_drp); //MonitoringDate
           $tb=$this->tb_main;
           $this->db->update($tb,$data);
           
       }
       
       public  function  updateTDM()
       {
         //http://localhost/ci/index.php/tdm/updateTDM/ES0597/
         //  $HN=$this->uri->segment(3);
         //  $MonitoringDate=$this->uri->segment(4);
           
           
           /*
            $data = array(
               'title' => $title,
               'name' => $name,
               'date' => $date
            );

$this->db->where('id', $id);
$this->db->update('mytable', $data); 
            */
           
           $tb=$this->tb_main;
           $HN_tdm=$this->input->get_post('HN_tdm');
           $MonitoringDate_tdm=$this->input->get_post('MonitoringDate_tdm');
           $conv_MonitoringDate_tdm=$this->user_model->databox_conv($MonitoringDate_tdm);  
           
           $ward=$this->input->get_post('ward');
          // $drug=$this->input->get_post('drug');
           $Indication=$this->input->get_post('Indication');
          //pharmacoldnetic_parameters
           $vd=$this->input->get_post('vd');
           $ke=$this->input->get_post('ke');
           $t1=$this->input->get_post('t1');
           $assessment=$this->input->get_post('assessment');
           $Interpretation=$this->input->get_post('Interpretation');
           $nb=$this->input->get_post('nb');
           $data = array(
               'Ward' => $ward,
               'Indication'=>$Indication,
               'Vd'=>$vd,
               'Ke'=>$ke,
               'T1div2'=>$t1,
               'Assessment'=>$assessment,
               'Interpretation'=>$Interpretation,
               'NB'=>$nb,
            );
           
           $this->db->where('HN', $HN_tdm);
           $this->db->where('MonitoringDate', $conv_MonitoringDate_tdm );          
           $this->db->update($tb, $data); 
           
       }
       
        public  function  updateADR()
        {
           $tb=$this->tb_main;
           $HN_adr=$this->input->get_post('HN_adr');
           $MonitoringDate_adr=$this->input->get_post('MonitoringDate_adr');
           
           
           
          
          
           echo  $DRPselection2=trim($this->input->get_post('DRPselection2'));
           echo  "<br>";
           echo  $DRPDrug2=trim($this->input->get_post('DRPDrug2'));
           echo "<br>";
           echo $ADRDetail2=trim($this->input->get_post('ADRDetail2'));
           echo "<br>";
           echo  $Action2=trim($this->input->get_post('Action2'));
           echo "<br>";
           echo  $Response2=trim($this->input->get_post('Response2'));
           echo "<br>";
           echo  $ResponseDetail2=trim($this->input->get_post('ResponseDetail2'));
           echo "<br>";
           echo  $followup_adr=trim($this->input->get_post('followup_adr'));
           echo "<br>";
           echo  $week_adr=trim($this->input->get_post('week_adr'));
           echo "<br>";
           echo  $conv_week_adr=$this->user_model->databox_conv($week_adr);  
           echo "<br>";
           
            $data = array(
               'DRPselection2'=>$DRPselection2,
               'DRPDrug2'=>$DRPDrug2, 
               'ADRDetail2'=>$ADRDetail2,
               'Action2'=>$Action2,
               'Response2'=>$Response2,
               'ResponseDetail2'=>$ResponseDetail2,
               'followup_adr'=>$followup_adr,
               'week_adr'=>$conv_week_adr, 
            );
           
           $this->db->where('HN', $HN_adr );
           $this->db->where('MonitoringDate', $MonitoringDate_adr );          
           $this->db->update($tb, $data); 
        }
       
       function fetchADR()
       {
           $tb=$this->tb_main;
           $HN_adr=$this->uri->segment(3);
        
           
           
           
          $d=$this->uri->segment(4);
          $m=$this->uri->segment(5);
          $y=$this->uri->segment(6);
          $MonitoringDate_adr=$d."/".$m."/".$y;
           
           $query=$this->db->get_where($tb,array('HN'=>$HN_adr,'MonitoringDate'=>$MonitoringDate_adr));
           //$query=$this->db->get_where($tb,array('HN'=>$HN_adr));
           $row=$query->row();
             if( $row )
             {
                  echo json_encode(array(
                      'HN_adr'=>$HN_adr,
                      'MonitoringDate_adr'=>$MonitoringDate_adr,
                      'DRPselection2'=>$row->DRPselection2,
                      'DRPDrug2'=>$row->DRPDrug2,
                      'ADRDetail2'=>$row->ADRDetail2,
                      'Action2'=>$row->Action2,
                      'Response2'=>$row->Response2,
                      'ResponseDetail2'=>$row->ResponseDetail2,
                      'followup_adr'=>$row->followup_adr,
                      'week_adr'=>$row->week_adr,
                      
                  ));
             }
           
       }
      
}
?>