<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {

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