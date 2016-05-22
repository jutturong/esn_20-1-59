<?ob_start()?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    var  $title=" Epilepsy Clinic Database | KhonKaen University "; //The Entrar-shadow Website form | w3layouts
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
        
        
        #----------- รายการยาทั้งหมด (05-treatment) ---------------------------------
          public  function call_treatment()
        {
             #http://drugstore.kku.ac.th/esn2/index.php/welcome/call_treatment/
               $id_treatment=$this->uri->segment(3);
               
               
               // $q=$this->input->get_post('q');
                $tb="05_treatment"; 
                
              //  $this->db->like("Drug_ProductID",$q);
                $q=$this->db->get_where($tb,array("id_treatment"=> $id_treatment));
                foreach($q->result() as $row )
                {
                        $rows[]=$row;
                    
                }
                echo  json_encode($rows);
        }
        public  function sr_treatment()
        {
             #http://drugstore.kku.ac.th/esn2/index.php/welcome/sr_treatment
                $q=$this->input->get_post('q');
                $tb="05_treatment"; 
                $this->db->like("Drug_ProductID",$q);
                $q=$this->db->get($tb,20);
                foreach($q->result() as $row )
                {
                        $rows[]=$row;
                    
                }
                echo  json_encode($rows);
        }
        public  function  treatment() // เรียกดูรายการยาทั้งหมดจาก table  `05-treatment`
        {
            #http://drugstore.kku.ac.th/esn2/index.php/welcome/treatment
            
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
             
             
             
            $tb="05_treatment";
            $fname1="Clinic";
            $va1="Epilepsy Clinic";
            //$this->db->order_by("MonitoringDate","desc");
            //id_treatment
            $this->db->order_by("id_treatment","desc");
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
               //$ant_ck="บันทึกสำเร็จ";
                     echo "1";  
               /*
               echo <<<INFO
<div style="padding:0 50px">
<p>Date : $MonitoringDate </p>
<p>Drug/ProductID : $Drug_ProductID </p>
<p>DosageRegimen : $DosageRegimen </p>
<p>Amount : $Amount </p>
<p>สถานะการบันทึก : $ant_ck </p>
</div>
INFO;
               */
               
           }
           else
           {
                 echo "0";
                //$ant_ck="บันทึกไม่สำเร็จ";
           }
                       

       

        }
        
        function  fetch_treatment()
        {
            #http://drugstore.kku.ac.th/esn2/index.php/welcome/fetch_treatment/16384
                   $id_treatment=$this->uri->segment(3);
               if(    $id_treatment  >  0   )
                   
               {
                     $tb="05_treatment";
                     $this->db->order_by("id_treatment","DESC");
                     $q=$this->db->get_where($tb,array("id_treatment"=>$id_treatment));
                     foreach($q->result() as $row)
                     {
                          $rows[]=$row;
                     }
                     echo  json_encode($rows);
               }
            
        }
        
        function update_tr()
        {
            #http://drugstore.kku.ac.th/esn2/index.php/welcome/update_tr
              $id_treatment=trim($this->input->get_post("id_treatment"));
             //echo "<br>";
               $MonitoringDate=trim($_REQUEST["MonitoringDate"]);          
             //echo "<br>";
               $Drug_ProductID=trim($_REQUEST["Drug_ProductID"]);
             //echo "<br>";
               $DosageRegimen=trim($_REQUEST["DosageRegimen"]);
             //echo "<br>";
              $Amount=trim($_REQUEST["Amount"]);
             //echo "<br>";
             if(   $id_treatment  >  0  &&  !empty($id_treatment)   )
             {
                      $tb="05_treatment";
                                        $data=array(
                                  'MonitoringDate'=>$MonitoringDate,
                                  'Drug_ProductID'=>$Drug_ProductID,
                                  'DosageRegimen'=>$DosageRegimen,
                                  'Amount'=>$Amount,
                              );
                          $this->db->where("id_treatment",$id_treatment);              
                          $ck=$this->db->update($tb,$data);
                          if( $ck )
                          {
                                echo "1";
                          }
                          else
                          {
                               echo "0";
                          }
                          
                          
             }
            
            
        }
        
        function del_treatment()   #http://drugstore.kku.ac.th/esn2/index.php/welcome/del_treatment/16386
        {
              $id_treatment=$this->uri->segment(3);
               if(    $id_treatment  >  0   )
               {
                    $tb="05_treatment";
                    $this->db->where("id_treatment", $id_treatment );
                    $ck=$this->db->delete($tb);
                    if( $ck )
                    {
                         echo "1";
                    }else
                    {
                         echo "0";
                    }
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
        
        public function saveEEG()
        {
             // echo "T";
                  $HN_EEG= $this->input->get_post('HN_EEG');
                //echo "<br>";
                 $MonitoringDate_eeg=$this->input->get_post('MonitoringDate_eeg');
              //  echo "<br>";
                
                if(    strlen( $MonitoringDate_eeg )  >  0  )
                {
                      $ex=explode("/",$MonitoringDate_eeg);
                       $conv_date=$ex[2]."-".$ex[0]."-".$ex[1];
                     // echo "<br>";
                }
                
                 $Value_EEG=$this->input->get_post("va_eeg");
                //echo "<br>";
                 $Lab=95;
               
               
                 /*
                $data=array(
                    'MonitoringDate'=>$conv_date,
                    'HN'=>$HN_EEG,
                    'Value'=>$Value_EEG,
                    'Lab'=>$Lab,
                );
                
                  $tb="04__monitoring";
                  $ck=$this->db->insert($tb,$data);
                  */
                 
                    $tb="04__monitoring";
                    
                    $this->db->set("MonitoringDate",$conv_date);
                    $this->db->set("HN",$HN_EEG);
                    $this->db->set("Value",$Value_EEG);
                    $this->db->set("Lab",$Lab);
                    $ck=$this->db->insert($tb);
                  
                  if( $ck )
                  {
                       echo "1";
                  }
                  else
                  {
                       echo "0";
                  }
        }
     
        
        ##----------- EEG -----------------------------
        function  call_hn_eeg()
        {
            //  http://drugstore.kku.ac.th/esn2/index.php/welcome/call_hn_eeg/ES0597
            $tb="04__monitoring";
            $tbj1="laboratorytype";
            $tbj2="listvalue_eeg";
            $HN=$this->uri->segment(3);
           // $this->db->order_by("")
            $this->db->join($tbj1,$tb.".Lab=".$tbj1.".LabCode","left");
            $this->db->join($tbj2,$tb.".Value=".$tbj2.".id_value");
            $q=$this->db->get_where($tb,array($tb.".HN"=>$HN,$tb.".Lab"=>"95"));
            foreach($q->result() as $row)
            {
                $rows[]=$row;
            }
            echo  json_encode($rows);
            
        }
        
        function  del_eeg()
        {
            //  http://drugstore.kku.ac.th/esn2/index.php/welcome/del_eeg/ES0597
               $tb="04__monitoring";
               $date=$this->uri->segment(3);
               $HN=$this->uri->segment(4);
               $this->db->where("MonitoringDate",$date);
               $this->db->where("HN",$HN);
               $ck=$this->db->delete($tb);
               if( $ck )
               {
                   echo "1";
               }
               else
               {
                   echo "0";
               }
        }
        
        #---------------- IMG-------------------------------------
        function saveIMG()
        {
            //  http://drugstore.kku.ac.th/esn2/index.php/welcome/saveIMG
              $HN_img= $this->input->get_post('HN_img'); 
             //echo "<br>";
                $MonitoringDate_img=$this->input->get_post('MonitoringDate_img');
             //echo "<br>";
                     if(    strlen( $MonitoringDate_img )  >  0  )
                {
                      $ex=explode("/",$MonitoringDate_img);
                        $conv_date=$ex[2]."-".$ex[0]."-".$ex[1];
                      //echo "<br>";
                }
        
    
            $Value_img=$this->input->get_post('Value_img');    
         // echo "<br>";
           //$Lab=96;  
            $img_result=$this->input->get_post('img_result');
        // echo "<br>";
                
                
            $tb="04__monitoring";
            
           
            $this->db->set('MonitoringDate', $conv_date );
            $this->db->set('HN', $HN_img );
            $this->db->set('Value', $img_result );
           // $this->db->set('Lab', 96 );
            $this->db->set('Lab', $Value_img );
            $this->db->set('Clinic', 'Epilepsy Clinic' );           
           $ck= $this->db->insert($tb);
            if( $ck )
            {
                echo "1";
            }else
            {
                echo "0";
            }
    
                         
        }
     
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

?>