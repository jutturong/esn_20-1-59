<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blood extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
var  $tb_main="04__monitoring";
            //`04__monitoring`
  
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
         
         //in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)
         
       }
       # http://localhost/ci/index.php/blood/loadBlood/
       public  function loadBlood()
       {
           $tb=$this->tb_main;
           $tb_sub="laboratorytype";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
         
           $name=array(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22);
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
public function saveBlood()
       {
         #http://localhost/ci/index.php/blood/saveBlood 
    
           $tb=$this->tb_main; 
           $HN_blood= $this->input->get_post('HN_blood'); 
          //echo "<br>";
                $MonitoringDate_blood=$this->input->get_post('MonitoringDate_blood');
           $conv_MonitoringDate=$this->user_model->databox_conv($MonitoringDate_blood);  
          //echo "<br>";
           $hb=$this->input->get_post('hb'); //8
          //echo "<br>";  
          if( $hb != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 8 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hb );
                $this->db->insert($tb);             
          }  
           $hct=$this->input->get_post('hct'); //9
          if( $hct != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 9 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hb );
                $this->db->insert($tb);             
          }
          
          $wbc=$this->input->get_post('wbc'); //10
           if( $wbc != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 10 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hb );
                $this->db->insert($tb);             
          }
          
          $platelet=$this->input->get_post('platelet');  //11
          if( $platelet != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 11 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $platelet );
                $this->db->insert($tb);             
          }
          
          $blast=$this->input->get_post('blast'); 
         
          if( $blast != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 12 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $blast );
                $this->db->insert($tb);             
          }
          
          $band=$this->input->get_post('band');
          if( $band != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 13 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $band );
                $this->db->insert($tb);             
          }
          
          $pmn=$this->input->get_post('pmn');
          if( $pmn != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 14 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $pmn );
                $this->db->insert($tb);             
          }
          
          $anc=$this->input->get_post('anc');
          if( $anc != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 15 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $pmn );
                $this->db->insert($tb);             
          }
          
          $L=$this->input->get_post('L');
          if( $L != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 16 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $L );
                $this->db->insert($tb);             
          }
          $M=$this->input->get_post('M');
          if( $M != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 17 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $M );
                $this->db->insert($tb);             
          }
          
           $E=$this->input->get_post('E');
          if( $E != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 18 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $E );
                $this->db->insert($tb);             
          }
          
            $B=$this->input->get_post('B');
          if( $B != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 19 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $B );
                $this->db->insert($tb);             
          }
          
          $inr=$this->input->get_post('inr');
          if( $inr != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 20 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $inr );
                $this->db->insert($tb);             
          }
          
          $pt=$this->input->get_post('pt');
          if( $pt != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 21 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $pt );
                $this->db->insert($tb);             
          }
          
          $aptt=$this->input->get_post('aptt');
           if( $aptt != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_blood );
                $this->db->set('Lab', 22 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $aptt );
                $this->db->insert($tb);             
          }
          
          
          
       }
       
       public function delBlood()
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
       
       
        public function  callBlood_HN()
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
           $name=array(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22);
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