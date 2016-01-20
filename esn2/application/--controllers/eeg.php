<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eeg extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
var  $tb_main="04__monitoring";
     
   # http://localhost/ci/index.php/eeg/callEEG/
       public function __construct()
       {
                
         parent::__construct();
         // $this->load->library('encrypt');
         $this->load->helper('date');
         $this->load->model('user_model');
         //  $this->load->library('session');
         
       } 
       
       public function testcallEEG()
       {
           #http://localhost/ci/index.php/eeg/testcallEEG
            //$tb=$this->tb_main;
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'95'));
          
         
           $tb=$this->tb_main;
           $tbj1="laboratorytype2";
          // $objquery= $this->db->get($tbj1);
          $objquery= $this->db->get_where($tb,array('Lab'=>'95'));//$tb.'.Clinic'=>'Epilepsy Clinic',
          $this->db->join($tbj1,$tbj1.".LabCode=".$tb.".Lab","right");
          
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
           
          
           /*
           $tb=$this->tb_main;
           $tbj1="laboratorytype2";
           $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'95'));
           $this->db->join($tb,$tbj1.".LabCode=".$tb.".Lab","right");
            $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
            echo json_encode($va_arr);
           */
           
           /*
            $tb=$this->tb_main;
            $tbj1="laboratorytype2";
            $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'95'));
            $this->db->join($tbj1,$tb.".Lab=".$tbj1.".LabCode","left");
             $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
            * 
            */
       }
       
       public function  callEEG()
       {
          #http://localhost/ci/index.php/eeg/callEEG
           /*
                    EEG =95  ดูใน value จะมีค่า 0,1,2 ให้เทียบในตาราง EEGresult
                     //ตัวอย่างทดสอบ  CQ1312
                    select  * from  `monitoring_04`
                    where  Lab = 95   and  HN='CQ1312'
            */
           
             //$tb="04__monitoring";         
             //  $tb="04_monitoring";
             // $tb="monitoring_04";
           $tb=$this->tb_main;
           $tbj1="laboratorytype2";
           $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'95'));
           $this->db->join($tbj1,$tb.".Lab=".$tbj1.".LabCode","left");
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            $this->db->order_by('MonitoringDate','DESC');
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
           
           
       }
       public function  callEEG_HN()
       {
          #http://localhost/ci/index.php/eeg/callEEG
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
           $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'95','HN'=>$HN));
          
           // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'));
            $this->db->order_by('MonitoringDate','DESC');
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
               
                 array_push($va_arr,$row);
            }
             
            
             echo json_encode($va_arr);
           
           
       }
       public function saveEEG()
       {
           
               /*
                $firstname = htmlspecialchars($_REQUEST['firstname']);
                $lastname = htmlspecialchars($_REQUEST['lastname']);
                $phone = htmlspecialchars($_REQUEST['phone']);
                $email = htmlspecialchars($_REQUEST['email']);

                include 'conn.php';

                $sql = "insert into users(firstname,lastname,phone,email) values('$firstname','$lastname','$phone','$email')";
                $result = @mysql_query($sql);
                if ($result){
                        echo json_encode(array(
                                'id' => mysql_insert_id(),
                                'firstname' => $firstname,
                                'lastname' => $lastname,
                                'phone' => $phone,
                                'email' => $email
                        ));
                } else {
                        echo json_encode(array('errorMsg'=>'Some errors occured.'));
                }
              */
             
             $HN_EEG= $this->input->get_post('HN_EEG');
            //echo "<br>";
            $MonitoringDate=$this->input->get_post('MonitoringDate');
             $conv_MonitoringDate=$this->user_model->databox_conv($MonitoringDate);
            //echo "<br>";
            $Value_EEG=$this->input->get_post('Value_EEG');
            //echo "<br>";
            $Lab=95;
            //$tb="04_monitoring";
            
            
            /*
                $data=array(
                    'MonitoringDate'=>$conv_MonitoringDate,
                    'HN'=>$HN_EEG,
                    'Value'=>$Value_EEG,
                    'Lab'=>$Lab,
                );
                
                //$this->db->insert('mytable', $data);
               $tb="04__monitoring";
                $ck=$this->db->insert($tb,$data);
                if( $ck )
                {
                    echo "OK";
                }else
                {
                    echo "false";
                }
              */
            
           // $tb="04__monitoring";
            //$this->db->set('name', $name);
            //$this->db->set('title', $title);
            $tb=$this->tb_main;
            
            $this->db->set('MonitoringDate', $conv_MonitoringDate );
            $this->db->set('HN', $HN_EEG );
            $this->db->set('Value', $Value_EEG );
            $this->db->set('Lab', 95 );
            $this->db->set('Clinic', 'Epilepsy Clinic' );           
            $this->db->insert($tb);
            
       }
       
       public function delEEG()
       {
                //echo "delEEG";          
               // $id = intval($_REQUEST['id']);

               
               /*
                $sql = "delete from users where id=$id";
                $result = @mysql_query($sql);
                if ($result){
                        echo json_encode(array('success'=>true));
                } else {
                        echo json_encode(array('errorMsg'=>'Some errors occured.'));
                }
                
                */
                
                $MonitoringDate=trim($this->input->get_post('MonitoringDate'));
                //echo json_encode(array('success'=>true));
               // echo  $MonitoringDate;
                $tb=$this->tb_main;
                
                //$this->db->where('id', $id);
                //$this->db->delete('mytable'); 
                // $tb="04__monitoring";
                
                /*
                $this->db->where($tb,array('MonitoringDate'=>$MonitoringDate));
                $ck=$this->db->delete($tb);
                if($ck)
                {
                    echo 1;
                }
                else
                {
                    echo 0;
                }
                */
                
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
       public function loadEEG()
       {
           $MonitoringDate=trim($this->input->get_post('MonitoringDate'));
           $tb=$this->tb_main;
           //$obj=$this->db->get_where($tb,array('MonitoringDate'=>$MonitoringDate));
           
           $items = array();
            foreach($obj->result() as $row )
            {
                array_push($items, $row);
            }
            $result["rows"] = $items;
            echo json_encode($result);
       }
}
?>
