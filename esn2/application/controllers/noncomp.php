<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noncomp extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
//var  $tb_main="07-noncompliance";
var  $tb_main="noncompliance_1";
           
  
#96=CT  imaging

  /*
  //ขยายจาก  laboratorytype โดย Lab Group=General
1=Weight
2=Height
3=BSA
4=Body Temperature
5=Respiratory Rate
6=Heart Rate
7=Blood Pressure
   */

       public function __construct()
       {
                
         parent::__construct();
         // $this->load->library('encrypt');
         $this->load->helper('date');
         $this->load->model('user_model');
         $this->load->library('session');
         
       }
       # http://localhost/ci/index.php/general/loadGeneral/
       
       public  function loadGeneral()
       {
           $tb=$this->tb_main;
           $tb_sub="laboratorytype";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
         
           $name=array(1,2,3,4,5,6,7);
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
       
       public  function loadnoncomp()
       {
           //http://localhost/ci/index.php/noncomp/loadnoncomp
           
           $tb=$this->tb_main;
           $objquery=$this->db->get($tb,10,0);
           $this->db->order_by('MonitoringDate','DESC');
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             echo json_encode($va_arr);
       }
       
         public  function loadnoncompHN()
       {
           //http://localhost/ci/index.php/noncomp/loadnoncompHN/ES0597
           $HN=trim($this->uri->segment(3));
           $tb=$this->tb_main;
           $objquery=$this->db->get_where($tb,array("HN"=>$HN));
          // $this->db->order_by('MonitoringDate','DESC');
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             echo json_encode($va_arr);
       }
       
      public function insertNoncomp()
      {
          //http://localhost/ci/index.php/noncomp/insertNoncomp/
          echo  $HN_non=$this->input->get_post('HN_non');
          echo "<br>";
          
          echo  $MonitoringDate_non=$this->input->get_post('MonitoringDate_non');
          echo "<br>";
          
          echo  $DRPselection1 = $this->input->get_post('DRPselection1'); //Non Compliance Type
          echo "<br>";
          echo  $NonComplianceDrug1=$this->input->get_post('NonComplianceDrug1'); //Drug/Product :
          echo "<br>";
          echo  $NonComplianceDetail1=$this->input->get_post('NonComplianceDetail1'); //Detail :
          echo "<br>";
          echo  $Action1=$this->input->get_post('Action1'); //Action
          echo  "<br>";       
          echo  $Response1=$this->input->get_post('Response1'); //Result
          echo  "<br>"; 
          echo  $ResponseDetail1=$this->input->get_post('ResponseDetail1'); //Result detail :
          echo  "<br>";
          echo  $Cause1_1=$this->input->get_post('Cause1_1'); //สาเหตุจากตัวผู้ป่วย 
          echo  "<br>";
          echo  $Cause1_2=$this->input->get_post('Cause1_2');  //สาเหตุจากโรค
          echo  "<br>";        
          echo  $Cause1_3=$this->input->get_post('Cause1_3');    //สาเหตุจากยา
          echo  "<br>";
          echo   $Cause1_4=$this->input->get_post('Cause1_4');  //สาเหตุจากผู้ดูแล
          echo  "<br>";
          echo  $Cause1_5=$this->input->get_post('Cause1_5'); //สาเหตุอื่นๆ
          echo "<br>";
          echo  $followup_non=$this->input->get_post('followup_non');  //follow up
          echo "<br>";
          echo  $week_non=$this->input->get_post('week_non');  // week 
          $conv_week_non=$this->user_model->databox_conv($week_non);  
          
          $tb=$this->tb_main;
          $this->db->set('HN',$HN_non);
          $this->db->set('MonitoringDate',$MonitoringDate_non);          
          $this->db->set('DRPselection1',$DRPselection1);
          $this->db->set('NonComplianceDrug1',$NonComplianceDrug1);
          $this->db->set('NonComplianceDetail1',$NonComplianceDetail1);
          $this->db->set('Action1',$Action1);
          $this->db->set('Response1',$Response1);
          $this->db->set('ResponseDetail1',$ResponseDetail1);
          $this->db->set('Cause1_1',$Cause1_1);
          $this->db->set('Cause1_2',$Cause1_2);
          $this->db->set('Cause1_3',$Cause1_3);
          $this->db->set('Cause1_4',$Cause1_4);
          $this->db->set('Cause1_5',$Cause1_5);
          $this->db->set('followup',$followup_non);
          $this->db->set('dmyweek',$conv_week_non);
          
          $this->db->insert($tb);
          
      }
      
      public function fetchNoncomp()
      {
           
         
          
        
          $HN=$this->uri->segment(3);
          $d=$this->uri->segment(4);
          $m=$this->uri->segment(5);
          $y=$this->uri->segment(6);
          $MonitoringDate_=$d."/".$m."/".$y;
          
        /*
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
          */
          
          $tb=$this->tb_main;
          $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate_));
        //  $query=$this->db->get_where($tb,array('HN'=>$HN));
          $row=$query->row();
              if( $row )
              {
                  echo json_encode(array(
                      'HN_non'=>$HN,
                      'MonitoringDate_non'=>$MonitoringDate_,
                      'DRPselection1'=>$row->DRPselection1,
                      'NonComplianceDrug1'=>$row->NonComplianceDrug1,
                      'NonComplianceDetail1'=>$row->NonComplianceDetail1,
                      'ResponseDetail1'=>$row->ResponseDetail1,
                      'Cause1_1'=>$row->Cause1_1,                   
                      'Cause1_4'=>$row->Cause1_4,
                      'Cause1_3'=>$row->Cause1_3,
                      'Cause1_5'=>$row->Cause1_5,
                      'Cause1_2'=>$row->Cause1_2,
                      'followup_non'=>$row->followup,
                      'week_non'=>$row->dmyweek,
                      
                  ));
              }
         
              /*
          echo json_encode(array(
              'HN_non'=>$HN,
              'MonitoringDate_non'=>$MonitoringDate,
              
          ));
          */
              
          
          /*
          $tb=$this->tb_main;
          $this->db->where('HN',$HN);
          $this->db->where('MonitoringDate',$MonitoringDate);
          $this->db->update($tb)
            */
           
           
       }
      
      public function updateNoncomp()
      {
          #http://localhost/ci/index.php/noncomp/updateNoncomp/
          
          /*
          $HN=$this->uri->segment(3);
          $d=$this->uri->segment(4);
          $m=$this->uri->segment(5);
          $y=$this->uri->segment(6);
          $MonitoringDate_=$d."/".$m."/".$y;
          */
          
          
          
          echo  $HN_non=$this->input->get_post('HN_non');
          echo "<br>";
          
          echo  $MonitoringDate_non=$this->input->get_post('MonitoringDate_non');
          echo "<br>";
          
          
          echo  $DRPselection1 = $this->input->get_post('DRPselection1'); //Non Compliance Type
          echo "<br>";
          echo  $NonComplianceDrug1=$this->input->get_post('NonComplianceDrug1'); //Drug/Product :
          echo "<br>";
          echo  $NonComplianceDetail1=$this->input->get_post('NonComplianceDetail1'); //Detail :
          echo "<br>";
          echo  $Action1=$this->input->get_post('Action1'); //Action
          echo  "<br>";       
          echo  $Response1=$this->input->get_post('Response1'); //Result
          echo  "<br>"; 
          echo  $ResponseDetail1=$this->input->get_post('ResponseDetail1'); //Result detail :
          echo  "<br>";
          echo  $Cause1_1=$this->input->get_post('Cause1_1'); //สาเหตุจากตัวผู้ป่วย 
          echo  "<br>";
          echo  $Cause1_2=$this->input->get_post('Cause1_2');  //สาเหตุจากโรค
          echo  "<br>";        
          echo  $Cause1_3=$this->input->get_post('Cause1_3');    //สาเหตุจากยา
          echo  "<br>";
          echo   $Cause1_4=$this->input->get_post('Cause1_4');  //สาเหตุจากผู้ดูแล
          echo  "<br>";
          echo  $Cause1_5=$this->input->get_post('Cause1_5'); //สาเหตุอื่นๆ
          echo "<br>";
          echo  $followup_non=$this->input->get_post('followup_non');  //follow up
          echo "<br>";
          echo  $week_non=$this->input->get_post('week_non');  // week 
          $conv_week_non=$this->user_model->databox_conv($week_non);  
          
          
          /*
          $tb=$this->tb_main;
          $this->db->set('HN',$HN_non);
          $this->db->set('MonitoringDate',$MonitoringDate_non);          
          $this->db->set('DRPselection1',$DRPselection1);
          $this->db->set('NonComplianceDrug1',$NonComplianceDrug1);
          $this->db->set('NonComplianceDetail1',$NonComplianceDetail1);
          $this->db->set('Action1',$Action1);
          $this->db->set('Response1',$Response1);
          $this->db->set('ResponseDetail1',$ResponseDetail1);
          $this->db->set('Cause1_1',$Cause1_1);
          $this->db->set('Cause1_2',$Cause1_2);
          $this->db->set('Cause1_3',$Cause1_3);
          $this->db->set('Cause1_4',$Cause1_4);
          $this->db->set('Cause1_5',$Cause1_5);
          //$this->db->set('followup',$followup_non);
          //$this->db->set('dmyweek',$conv_week_non);
          
          
          $this->db->insert($tb);
           
           */
          
          $data=array(
              'DRPselection1'=>$DRPselection1,
              'NonComplianceDrug1'=>$NonComplianceDrug1,
              'NonComplianceDetail1'=>$NonComplianceDetail1,
              'Action1'=>$Action1,
              'Response1'=>$Response1,
              'ResponseDetail1'=>$ResponseDetail1,
              'Cause1_1'=>$Cause1_1,
              'Cause1_2'=>$Cause1_2,
              'Cause1_3'=>$Cause1_3,
              'Cause1_4'=>$Cause1_4,
              'Cause1_5'=>$Cause1_5,
              'followup'=>$followup_non,
              'week'=>$conv_week_non,             
          );
        
          $tb=$this->tb_main;
          $this->db->where('HN',$HN_non);
          $this->db->where('MonitoringDate',$MonitoringDate_non);
          $this->db->update($tb,$data);
          
      }
      
       public function delNon()
       {
            //http://localhost/ci/index.php/noncomp/delNon/  
                         
              // $MonitoringDate=trim($this->input->get_post('MonitoringDate'));            
             //  $HN=trim($this->input->get_post('HN'));                
              $HN=trim($this->uri->segment(3));
              //25/08/2554
              
              $d=trim($this->uri->segment(4));
              $m=trim($this->uri->segment(5));
              $Y=trim($this->uri->segment(6));
              $MonitoringDate=$d."/".$m."/".$Y;
              
              $tb=$this->tb_main; 
              
               if ( $HN != ''  &&  $d == '' )
               {
                        //$this->db->where('MonitoringDate',$MonitoringDate );           
                        $this->db->where('HN',$HN );
                        $ck=$this->db->delete($tb);
               }
                elseif( $HN != ''  &&  $d  != '' ) {
                                 
                        $this->db->where('HN',$HN );
                        $this->db->where('MonitoringDate',$MonitoringDate );  
                        $ck=$this->db->delete($tb);

                }
              
                            
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
      
   public  function   option_drug()   #http://localhost/ci/index.php/noncomp/option_drug
   {
          $tb_m="drug";
          $objquery=$this->db->get($tb_m);
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
                 array_push($va_arr,$row);
            }
            echo json_encode($va_arr);
   }
   
    public  function   ComplianceType() #http://localhost/ci/index.php/noncomp/ComplianceType
    {
         //$arr=array(0=>'No',1=>'Over dosage',2=>'Under dosage',3=>'Not compliance with the life style',4=>'Incorrect technique');
    }
       
public function saveGEN()
       {
         #http://localhost/ci/index.php/img/saveIMG 
    /*      
1=Weight
2=Height
3=BSA
4=Body Temperature
5=Respiratory Rate
6=Heart Rate
7=Blood Pressure
   */
    
            $HN_gen= $this->input->get_post('HN_gen'); 
          // echo "<br>";
            $MonitoringDate_gen=$this->input->get_post('MonitoringDate_gen');
            
            $conv_MonitoringDate=$this->user_model->databox_conv($MonitoringDate_gen);  
           //echo "<br>";
            
            $weight=$this->input->get_post('weight');//1=Weight
           //echo "<br>";
           
            $height=$this->input->get_post('height');//2=Height
           //echo "<br>";
           
            $bsa=$this->input->get_post('bsa'); //3=BSA
           //echo "<br>";
           
           $rr=$this->input->get_post('rr'); //5=Respiratory Rate
           //echo "<br>";
           
           $hr=$this->input->get_post('hr'); //6=Heart Rate
           //echo "<br>";
           
           $bp=$this->input->get_post('bp'); //7=Blood Pressure
           //echo "<br>";
           
           $bt=$this->input->get_post('bt'); //4=Body Temperature
           //echo "<br>";
            
           $tb=$this->tb_main; 
            
            /*
            $this->db->set('MonitoringDate', $conv_MonitoringDate );
            $this->db->set('HN', $HN_img );
            $this->db->set('Value', $img_result );
           // $this->db->set('Lab', 96 );
            $this->db->set('Lab', $Value_img );
            $this->db->set('Clinic', 'Epilepsy Clinic' );           
            $this->db->insert($tb);
            */
                    
           /*      
1=Weight
2=Height
3=BSA
4=Body Temperature
5=Respiratory Rate
6=Heart Rate
7=Blood Pressure
   */
           
           if( $weight != "" )  //$weight=$this->input->get_post('weight');//1=Weight
           {
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_gen );
                $this->db->set('Lab', 1 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $weight );
                $this->db->insert($tb);
           }
           if( $height != "" ) //$height=$this->input->get_post('height');//2=Height
           {
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_gen );
                $this->db->set('Lab', 2 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $height );
                $this->db->insert($tb);
           }
           if( $bsa != "" ) //$bsa=$this->input->get_post('bsa'); //3=BSA
           {
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_gen );
                $this->db->set('Lab', 3 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $bsa );
                $this->db->insert($tb);
           }
           if( $rr != "" ) // $rr=$this->input->get_post('rr'); //5=Respiratory Rate
           {
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_gen );
                $this->db->set('Lab', 5 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $rr );
                $this->db->insert($tb);
           }
           if( $hr != "" ) // $hr=$this->input->get_post('hr'); //6=Heart Rate
           {
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_gen );
                $this->db->set('Lab', 6 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hr );
                $this->db->insert($tb);
           }
           if( $bp != "" ) //  $bp=$this->input->get_post('bp'); //7=Blood Pressure
           {
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_gen );
                $this->db->set('Lab', 7 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hr );
                $this->db->insert($tb);
           }
           if( $bt != "" ) //$bt=$this->input->get_post('bt'); //4=Body Temperature
           {
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_gen );
                $this->db->set('Lab', 4 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hr );
                $this->db->insert($tb);
           }
           
       }
       
       public function delGEN()
       {
                
                
               $MonitoringDate=trim($this->input->get_post('MonitoringDate'));
               //echo "<br>";
               $Lab=trim($this->input->get_post('Lab'));
               //echo "<br>";
               $HN=trim($this->input->get_post('HN')); 
               
                $tb=$this->tb_main;
                
                
               
              //  $this->db->where('MonitoringDate',$MonitoringDate );
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
       
       
        public function  callGEN_HN()
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
           $tb=$this->tb_main;;
          //  $tb="04_monitoring";
          // $tb="monitoring_04";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96','HN'=>$HN));
           $name=array(1,2,3,4,5,6,7);
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
      
}
?>