<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Give extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";


var  $tb_main="06_giveinformation"; //06_giveinformation
 


 

       public function __construct()
       {
                
         parent::__construct();
         // $this->load->library('encrypt');
         $this->load->helper('date');
         $this->load->model('user_model');
         $this->load->library('session');
         
         //in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)
         
       }
       
       
       
       # http://localhost/ci/index.php/give/loadgive/
       public  function loadgive()
       {
           $tb=$this->tb_main;
          
           $objquery=$this->db->get($tb,10,0);
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
      # http://localhost/ci/index.php/give/loadgiveHN/ES0597
       public  function loadgiveHN()
       {
           $tb=$this->tb_main;
           $HN=$this->uri->segment(3);
           $objquery=$this->db->get_where($tb,array("HN"=>$HN));
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
       public function  updategive()
       {
          $tb=$this->tb_main;
          $HN_give=trim($this->input->get_post('HN_give'));
          //echo "<br>";
          $MonitoringDate_give=trim($this->input->get_post('MonitoringDate_give'));
          //echo "<br>";  
          
         
          $GiveInformation1=trim($this->input->get_post('GiveInformation1'));
          $GiveInformation2=trim($this->input->get_post('GiveInformation2'));
          $GiveInformation3=trim($this->input->get_post('GiveInformation3'));
          $GiveInformation4=trim($this->input->get_post('GiveInformation4'));
          $GiveInformation5=trim($this->input->get_post('GiveInformation5'));
          $GiveInformation6=trim($this->input->get_post('GiveInformation6'));
          
         if(  $GiveInformation1 == ""  )
         {
              $GiveInformation1="N";
         }
         
         
         if( $GiveInformation2 == "" )
          {
               
              $GiveInformation2="N";
          }
         
          
          if( $GiveInformation3 == "" )
          {
              $GiveInformation3="N";
          }
         
          
          if( $GiveInformation4 == "" )
          {
              $GiveInformation4="N";
          }
         
         
         if( $GiveInformation5 == "" )
          {
              $GiveInformation5="N";
          }
         
          
           $data=array(
              "GiveInformation1"=>$GiveInformation1, 
              "GiveInformation2"=>$GiveInformation2, 
              "GiveInformation3"=>$GiveInformation3,  
              "GiveInformation4"=>$GiveInformation4, 
              "GiveInformation5"=>$GiveInformation5, 
              "GiveInformation6"=>$GiveInformation6,  
           );
           $this->db->where("HN",$HN_give);
           $this->db->where("MonitoringDate",$MonitoringDate_give);
           $ck=$this->db->update($tb,$data);
           
             if( $ck )
              {
                  echo "ปรับปรุงข้อมูลสำเร็จ";
              }
              elseif( !$ck )
              {
                  echo "ไม่สามารถปรับปรุงข้อมูลได้";
              }
           
           
       }
       
       public  function insertgive()
      {
          $tb=$this->tb_main;
          $HN_give=trim($this->input->get_post('HN_give'));
          //echo "<br>";
          $MonitoringDate_give=trim($this->input->get_post('MonitoringDate_give'));
          //echo "<br>";  
          
         
          $GiveInformation1=trim($this->input->get_post('GiveInformation1'));
          $GiveInformation2=trim($this->input->get_post('GiveInformation2'));
          $GiveInformation3=trim($this->input->get_post('GiveInformation3'));
          $GiveInformation4=trim($this->input->get_post('GiveInformation4'));
          $GiveInformation5=trim($this->input->get_post('GiveInformation5'));
          $GiveInformation6=trim($this->input->get_post('GiveInformation6'));
          
          
          
          
          $this->db->set("HN",$HN_give);
          $this->db->set("MonitoringDate",$MonitoringDate_give);
          
         if(  $GiveInformation1 == "Y"  )
         {
              $this->db->set("GiveInformation1",$GiveInformation1 );
         }else
         {
             $this->db->set("GiveInformation1",'N');
         }
         
         
         if( $GiveInformation2 == "Y" )
          {
               
               $this->db->set("GiveInformation2",$GiveInformation2 );
          }
         else
         {
             $this->db->set("GiveInformation2",'N');
         }
         
          if( $GiveInformation3 == "Y" )
          {
              $this->db->set("GiveInformation3",$GiveInformation3 );
          }
         else
         {
              $this->db->set("GiveInformation3","N" );
         }
         
          if( $GiveInformation4 == "Y" )
          {
              $this->db->set("GiveInformation4",$GiveInformation4 );
          }
         else
         {
              $this->db->set("GiveInformation4","N" );
         }
         
         if( $GiveInformation5 == "Y" )
          {
              $this->db->set("GiveInformation5",$GiveInformation5 );
          }
         else
         {
              $this->db->set("GiveInformation5","N" );
         }
          
         $this->db->set("GiveInformation6",$GiveInformation6 );
          
          /*
          $data=array(
              "HN"=>$HN_give,
              "MonitoringDate"=>$MonitoringDate_give ,
              "GiveInformation1"=>$GiveInformation1, 
              "GiveInformation2"=>$GiveInformation2, 
              "GiveInformation3"=>$GiveInformation3, 
              "GiveInformation4"=>$GiveInformation4, 
              "GiveInformation5"=>$GiveInformation5, 
              "GiveInformation6"=>$GiveInformation6, 
          );
          */
          
            // $ck= $this->db->insert($tb,$data);
             $ck= $this->db->insert($tb);
           
          
             if( $ck )
              {
                  echo "บันทึกข้อมูลสำเร็จ";
              }
              elseif( !$ck )
              {
                  echo "ไม่สามารถบันทึกข้อมูลได้";
              }
           
          
          
      }

       # http://localhost/ci/index.php/progressnote/loadprogress/
       public  function loadprogress()
       {
           $tb=$this->tb_main;
           $tbj1=$this->tb_j1;
           $this->db->join($tbj1, $tb.".From=".$tbj1.".UserCode" , "INNER");
           $objquery=$this->db->get_where($tb,array("Clinic"=>"Epilepsy Clinic"),10,0);
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
       public function  fetchprogress()
       {
           //http://localhost/ci/index.php/progressnote/fetchprogress/ES0597
          
          $HN=$this->uri->segment(3);                     
           //$MonitoringDate=$this->uri->segment(4);          
          $d=$this->uri->segment(4);
          $m=$this->uri->segment(5);
          $y=$this->uri->segment(6);
          $MonitoringDate=$d."/".$m."/".$y;
           
           $tb=$this->tb_main;
           $tbj1=$this->tb_j1;
           
           
          // $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));
           
           $this->db->join($tbj1, $tb.".From=".$tbj1.".UserCode" , "INNER");
           $objquery=$this->db->get_where($tb,array("Clinic"=>"Epilepsy Clinic","HN"=>$HN,"MonitoringDate"=>$MonitoringDate),10,0);
           
           $row=$objquery->row();
              if( $row )
              {
                  echo json_encode(array(
                      'HN_pro'=>$HN,
                      'MonitoringDate_pro'=>$MonitoringDate,
                      'Progress'=>$row->Progress,
                  ));
              }
           
       }




       # http://localhost/ci/index.php/progressnote/loadprogressHN/
       public  function loadprogressHN()
       {
           $HN=$this->uri->segment(3);
           
           $tb=$this->tb_main;
           $tbj1=$this->tb_j1;
           $this->db->join($tbj1, $tb.".From=".$tbj1.".UserCode" , "INNER");
           $objquery=$this->db->get_where($tb,array("Clinic"=>"Epilepsy Clinic","HN"=>$HN),10,0);
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
       # http://localhost/ci/index.php/progressnote/insertprogress/
      public  function insertprogress()
      {
          $tb=$this->tb_main;
          $HN_pro=  addslashes($this->input->get_post('HN_pro'));
          
          $MonitoringDate_pro=addslashes($this->input->get_post('MonitoringDate_pro'));
        // echo "<br>";
          $Progress=  addslashes($this->input->get_post('Progress'));
       //  echo "<br>";
          $From=$this->input->get_post('From');
        // echo "<br>";
          $UserName=$this->input->get_post('UserName');
       //  echo "<br>";
          $UserSurname=$this->input->get_post('UserSurname');
        // echo "<br>";
          
                $this->db->set('MonitoringDate', $MonitoringDate_pro );
                $this->db->set('HN', $HN_pro );
                $this->db->set('Clinic','Epilepsy Clinic');
                $this->db->set('From',$From);
                $this->db->set('Progress',$Progress);
              $ck=  $this->db->insert($tb);  
              if( $ck )
              {
                  echo "บันทึกข้อมูลสำเร็จ";
              }
              elseif( !$ck )
              {
                  echo "ไม่สามารถบันทึกข้อมูลได้";
              }
      }
       
       public  function updateprogress()
      {
          $tb=$this->tb_main;
          $HN_pro=  addslashes($this->input->get_post('HN_pro'));         
          $MonitoringDate_pro=addslashes($this->input->get_post('MonitoringDate_pro'));    
      // "<br>";
          $Progress=  addslashes($this->input->get_post('Progress'));     
          $From=$this->input->get_post('From');    
          $UserName=$this->input->get_post('UserName');     
          $UserSurname=$this->input->get_post('UserSurname'); 
          /*
                $this->db->set('MonitoringDate', $MonitoringDate_pro );
                $this->db->set('HN', $HN_pro );
                $this->db->set('Clinic','Epilepsy Clinic');
                $this->db->set('From',$From);
                $this->db->set('Progress',$Progress);
          */
          
              $data=array(
                  'Progress'=>$Progress,
                  
              );
              
              
              $this->db->where('MonitoringDate',$MonitoringDate_pro);
              $this->db->where('HN',$HN_pro);
              $ck=  $this->db->update($tb,$data);  
              if( $ck )
              {
                  echo "ปรับปรุงข้อมูลสำเร็จ";
              }
              elseif( !$ck )
              {
                  echo "ไม่สามารถปรับปรุงข้อมูลได้";
              }
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
       
        public  function  delgive()
       {
           $tb=$this->tb_main;
           
           /*
           $HN=trim($this->uri->segment(3));
           $d=trim($this->uri->segment(4));
           $m=trim($this->uri->segment(5));
           $y=trim($this->uri->segment(6));
           //$MonitoringDate=trim($this->uri->segment(4));
           // $MonitoringDate=$d."/".$m."/".$y;
           */
           
           $HN=trim($this->input->get_post('HN'));
           $MonitoringDate=trim($this->input->get_post('MonitoringDate'));
           
           $this->db->where('HN',$HN);
           $this->db->where('MonitoringDate',$MonitoringDate);
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
       
       
       public function  fetchgive()
       {
          
           
            $tb=$this->tb_main;
            $HN=trim($this->uri->segment(3));
                 
            $d=$this->uri->segment(4);
            $m=$this->uri->segment(5);
            $y=$this->uri->segment(6);
            
            /*
            $MonitoringDate=$d."/".$m."/".$y;
            //$query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));
            $query=$this->db->get_where($tb,array('HN'=>$HN));
            $row=$query->row();
              if( $row )
              {
                  echo json_encode(array(
                      'HN_give'=>$HN,
                      'MonitoringDate_give'=>$MonitoringDate_drp,
                      
                  ));
              }
             */ 
            
            $MonitoringDate=$d."/".$m."/".$y;
            //$query=$this->db->get_where($tb,array('HN'=>$HN));
            $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));
            $row=$query->row();
             if( $row )
              {
                  echo json_encode(array(
                      'HN_give'=>$HN,
                      'MonitoringDate_give'=>$MonitoringDate,
                      'GiveInformation1'=>$row->GiveInformation1,
                      'GiveInformation2'=>$row->GiveInformation2,
                      'GiveInformation3'=>$row->GiveInformation3,
                      'GiveInformation4'=>$row->GiveInformation4,
                      'GiveInformation5'=>$row->GiveInformation5,
                      'GiveInformation6'=>$row->GiveInformation6,
                  ));
              }
           
       }
       
       public function delprogress()
       {
 
               $HN=trim($this->input->get_post('HN')); 
               $MonitoringDate=trim($this->input->get_post('MonitoringDate'));
               
                $tb=$this->tb_main;

                $this->db->where('MonitoringDate',$MonitoringDate );
             
                $this->db->where('HN',$HN );
                $ck=$this->db->delete($tb);
 
                if($ck)
                {
                    echo json_encode(array('result'=>'1'));
                }
                else
                {                   
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
       
       public function  fetchTDM()
       {
           //http://localhost/ci/index.php/tdm/fetchTDM/ES0597/
          
           $HN=$this->uri->segment(3);
           $MonitoringDate=$this->uri->segment(4);
           $tb=$this->tb_main;
           $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));
           //$query=$this->db->get_where($tb,array('HN'=>$HN));
           $row=$query->row();
              if( $row )
              {
                  echo json_encode(array(
                      'HN_tdm'=>$HN,
                      'MonitoringDate_tdm'=>$MonitoringDate,
                      'dmy_analysis'=>$row->AnalysisDate,
                      'ward'=>$row->Ward,
                      'vd'=>$row->Vd,
                      'nb'=>$row->NB,
                      'Indication'=>$row->Indication,
                      'ke'=>$row->Ke,
                      't1'=>$row->T1div2,
                      'assessment'=>$row->Assessment,
                  ));
              }
           
       }
       
       public  function  updateTDM()
       {
         
           
           $tb=$this->tb_main;
           $HN_tdm=$this->input->get_post('HN_tdm');
           $MonitoringDate_tdm=$this->input->get_post('MonitoringDate_tdm');
           $conv_MonitoringDate_tdm=$this->user_model->databox_conv($MonitoringDate_tdm);  
           
           $ward=$this->input->get_post('ward');
       
           $Indication=$this->input->get_post('Indication');
        
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
      
}
?>