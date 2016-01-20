<?ob_start()?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
    var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
   
    
    public function __construct()
    {
        //$this->_mcrypt_exists = FALSE;
  
        
        
        parent::__construct();
       
        $this->load->model('user_model');
       // $this->load->library('encryption');
       // $this->encryption;
      //  $this->load->library('session');
       //  $this->_mcrypt_exists = FALSE;
    }
    
    
    public function index() // หน้าแรกเริ่มต้นของโปรแกรม
	{
		//$this->load->view('welcome_message');
                $data['title']= $this->title;
                $data['name_app1']=$this->name_app1;
                $data["login_title"]="ESN system";
          
            
                $arr_login=array(
                    'sess_username'=>'',
                    'sess_lastname'=>'',
                    'sess_usertype'=>'',
                    'sess_usercode'=>'',
                    'sess_login'=>'N'
                );
                                          
                $this->session->unset_userdata($arr_login);
                $this->session->sess_destroy();
                
                #echo  $this->session->userdata('sess_login');
                
                $this->load->view('login',$data); //ของเดิม
                               
                #$this->load->view('js_login',$data);
          
         
                
	}
        
 
        
        public   function  log_login() #log file รายละเอียดสำหรับการ login
        {
            echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
             $sess_username=$this->session->userdata('sess_username'); //ตัวอย่างวิธีเรียกใช้
            //echo  "<br>";
             $sess_lastname=$this->session->userdata('sess_lastname');
            //echo  "<br>";
             $sess_usertype=$this->session->userdata('sess_usertype');
            //echo  "<br>";
             $sess_usercode=$this->session->userdata('sess_usercode');
            //echo "<br>";
             $sess_login=$this->session->userdata('sess_login');
            // $this->user_model->checklogin($sess_login);
        }  
        public  function tbuser() //user สำหรับการ login เข้าใช้งาน
        {
               $tb="user";
               $objquery = $this->db->get($tb);              
               $va_arr = array(); 
            foreach($objquery->result() as $row )
            {
                $va_arr[]=$row;
            }
            echo json_encode($va_arr);
            
        }
        public  function checklogin()
        {
  
           echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
           $us= htmlspecialchars( $this->input->get_post('us') );       
           //echo "<br>";
           $ps=  htmlspecialchars( $this->input->get_post('ps') );
           //echo "<br>";
            
             /*
              $data['title']= $this->title;  //เดิม
             $this->load->view('home',$data);  //เดิม 
            */
             
             
             
            /* 
             $tb="user";           
             $obj=$this->db->get_where($tb,array('UserCode'=>$us,'Password'=>$ps));
             echo $obj->num_rows();

            echo <<<INFO
<div style="padding:0 50px">
  <p> Usercode : $us </p>           
  <p> Login Success !! </p>                               
</div>
INFO;
     */
            
            
            $tb="user";
            $obj = $this->db->get_where($tb,array('UserName'=>$us,'Password'=>$ps));
            $ck= $obj->num_rows();
            //echo $ck;
            if($ck==1)
            {
                //echo"login";
                foreach($obj->result() as $row)
                {
                    $UserSurname=$row->UserSurname;
                    //echo"<br>";
                    $Unused=$row->Unused;
                    //echo"<br>";
                    $UserType=$row->UserType;// แบ่งเป็น 1 หรือ 2  อ.สุณีเป็น 1
                    //echo"<br>";
                    $UserCode=$row->UserCode;
                    //echo "<br>";
                    
                }
                
                $arr_login=array(
                    'sess_username'=>$us,
                    'sess_lastname'=>$UserSurname,
                    'sess_usertype'=>$UserType,
                    'sess_usercode'=>$UserCode,
                    'sess_login'=>'Y'
                );
                $this->session->set_userdata($arr_login); 
                
                $data['sess_username']=$this->session->userdata('sess_username'); //ชื่อผู้สัมภาษณ์
                $data['sess_lastname']=$this->session->userdata('sess_lastname'); //นามสกุลผู้สัมภาษณ์
                $data['sess_usercode']=$this->session->userdata('sess_usercode'); 
                
             // echo $this->session->userdata('sess_username'); //ตัวอย่างวิธีเรียกใช้
                
                
                $data['title']= $this->title;  //เดิม
                $this->load->view('home',$data);  //เดิม 
                 
            }else
            {
                //echo "false";
                redirect('welcome/index/','refresh');
            }
    
        }
        public   function  callHN() //call all System  (12_progress) เรียกการค้นหาจาก HN number ทั้งหมด
        {
             
            $data['sess_username']=$this->session->userdata('sess_username'); //ตัวอย่างวิธีเรียกใช้
            //echo  "<br>";
             $sess_lastname=$this->session->userdata('sess_lastname');
            //echo  "<br>";
             $sess_usertype=$this->session->userdata('sess_usertype');
            //echo  "<br>";
             $sess_usercode=$this->session->userdata('sess_usercode');
            //echo "<br>";
             $sess_login=$this->session->userdata('sess_login');
             
             $this->user_model->checklogin($sess_login);
            
            $q = isset($_POST['q']) ? strval($_POST['q']) : '';
            
             $tb1="12_progress";
             $fname1="Clinic";
             $tb2="01_demographic";
             $va1="Epilepsy Clinic";   
             $on1="12_progress.HN=01_demographic.HN";
             $where1="12_progress.Clinic";
             $lk1="12_progress.HN";
             $va_arr = array();            
             $this->db->select('*');
             $this->db->distinct('HN');
            // $this->db->join($tb2,$on1,"left");
             $this->db->join($tb2, $on1 );
             $this->db->like($lk1,$q);
             $this->db->order_by("MonitoringDate","desc");
             $query=$this->db->get_where($tb1,array($where1=>$va1),20,0);  
            // $query=$this->db->get($tb1,15,0);  
              
             
             
             
             foreach($query->result() as $row )
             {
                 $va_arr[]=$row;
             }
             echo json_encode($va_arr);
           
        }
        
        public  function  treatment() // เรียกดูรายการยาทั้งหมดจาก table  `05-treatment`
        {
            $tb="05_treatment";
            $fname1="Clinic";
            $va1="Epilepsy Clinic";
            $this->db->order_by("MonitoringDate","desc");
            //$objquery=$this->db->get($tb,10,0);          
            $objquery=$this->db->get($tb,10,0); 
            
            
            //$this->db->limit(10,0);
           
            $va_arr = array(); 
            foreach($objquery->result() as $row )
            {
                $va_arr[]=$row;
            }
            echo json_encode($va_arr);
        }
        
        public function insert_treatment()//บันทึกรายการยาทั้งหมด  $tb="05_treatment";
        {
            $MonitoringDate=htmlspecialchars($_REQUEST["MonitoringDate"]);          
            $Drug_ProductID=htmlspecialchars($_REQUEST["Drug_ProductID"]);
            $DosageRegimen=htmlspecialchars($_REQUEST["DosageRegimen"]);
            $Amount=htmlspecialchars($_REQUEST["Amount"]);
            
            
            $tb="05_treatment";
            
            $data=array(
                'MonitoringDate'=>$MonitoringDate,
                'Drug_ProductID'=>$Drug_ProductID,
                'DosageRegimen'=>$DosageRegimen,
                'Amount'=>$Amount,
            );
            
           $insert_ck= $this->db->insert($tb,$data);
           if (  $insert_ck   )
           {
               $ant_ck="บันทึกสำเร็จ";
               
               echo <<<INFO
<div style="padding:0 50px">
<p>Date : $MonitoringDate </p>
<p>Drug/ProductID : $Drug_ProductID </p>
<p>DosageRegimen : $DosageRegimen </p>
<p>Amount : $Amount </p>
<p>สถานะการบันทึก : $ant_ck </p>
</div>
INFO;
               
           }
           else
           {
               $ant_ck="บันทึกไม่สำเร็จ";
           }
                       

       

        }
        
        public function test2()
        {
            $name = htmlspecialchars($_REQUEST['name']);
$email = htmlspecialchars($_REQUEST['email']);
$phone = htmlspecialchars($_REQUEST['phone']);
$file = $_FILES['file']['name'];

echo <<<INFO
<div style="padding:0 50px">
<p>Name: $name</p>
<p>Email: $email</p>
<p>Phone: $phone</p>
<p>File: $file</p>
</div>
INFO;
        }
        
        public function  selProvince() // select จังหวัดทั้งหมด
        {
            //SELECT * FROM cleft.province;
            $tb="province";
            $objquery=$this->db->get($tb);
            $va_arr = array(); 
            foreach($objquery->result() as $row )
            {
                $va_arr[]=$row;
            }
            echo json_encode($va_arr);
        }
        
        
        public function  sqlAmphur() // select อำเภอ
        {
           $prov_id=$this->uri->segment(3);          
           $tb="amphur";
           $str="SELECT  *  FROM  $tb  WHERE  AMPHUR_CODE  LIKE('$prov_id%'); ";
           $objquery=$this->db->query($str);
            
            $va_arr = array(); 
            foreach($objquery->result() as $row )
            {
                $va_arr[]=$row;
            }
            echo json_encode($va_arr);
            
        } 
        public function sqldistrict()//เลือกอำเภอ
        {
            $tb="district";
            $DISTRICT_CODE=$this->uri->segment(3); 
            $str="SELECT  *  FROM  $tb  WHERE  DISTRICT_CODE  LIKE('$DISTRICT_CODE%'); ";
            $objquery=$this->db->query($str);
            
            $va_arr = array(); 
            foreach($objquery->result() as $row )
            {
                $va_arr[]=$row;
            }
            echo json_encode($va_arr);
        }
     
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

?>