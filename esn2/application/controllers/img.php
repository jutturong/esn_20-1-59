<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Img extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
var  $tb_main="04__monitoring";
            //`04__monitoring`
  
#96=CT  imaging

  
       public function __construct()
       {
                
         parent::__construct();
         // $this->load->library('encrypt');
         $this->load->helper('date');
         $this->load->model('user_model');
         $this->load->library('session');
         
       }
      
      # http://localhost/ci/index.php/img/loadIMG/
       public  function loadIMG()
       {
           $tb=$this->tb_main;
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
           $name=array(96,97,100);
           $this->db->where_in('Lab',$name);
           $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            $this->db->order_by('MonitoringDate','DESC');
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
       public function  callIMG_HN()
       {
          #http://localhost/ci/index.php/img/callIMG_HN/HU3128
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
           $name=array(96,97,100);
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
       
       public  function imagingresult()
       {
          #http://localhost/ci/index.php/img/imagingresult
           $tb="imagingresult";
           $obj=$this->db->get($tb);
           $va_arr = array(); 
           foreach($obj->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
       }
       
       public function saveIMG()
       {
         #http://localhost/ci/index.php/img/saveIMG 
              
             
            $HN_img= $this->input->get_post('HN_img'); 
            //echo "<br>";
            $MonitoringDate_img=$this->input->get_post('MonitoringDate_img');
            
            $conv_MonitoringDate=$this->user_model->databox_conv($MonitoringDate_img);  
            //echo "<br>";
            $Value_img=$this->input->get_post('Value_img');    
            //echo "<br>";
            //$Lab=96;  
            $img_result=$this->input->get_post('img_result');
            //echo "<br>";
            $tb=$this->tb_main; 
            
            
            $this->db->set('MonitoringDate', $conv_MonitoringDate );
            $this->db->set('HN', $HN_img );
            $this->db->set('Value', $img_result );
           // $this->db->set('Lab', 96 );
            $this->db->set('Lab', $Value_img );
            $this->db->set('Clinic', 'Epilepsy Clinic' );           
            $this->db->insert($tb);
            
            
       }
       
       public function delIMG()
       {
                
                
                $MonitoringDate=trim($this->input->get_post('MonitoringDate'));
                
                $tb=$this->tb_main;
                
                
                
                $this->db->where('MonitoringDate',$MonitoringDate);
                $ck=$this->db->delete($tb);
                if($ck)
                {
                    echo 1;
                }
                else
                {
                    echo 0;
                }
                
       }
}
?>       