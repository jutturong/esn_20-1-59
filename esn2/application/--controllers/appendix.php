<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appendix extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
      
       public function __construct()
       {
                
         parent::__construct();
         // $this->load->library('encrypt');
         $this->load->helper('date');
         $this->load->model('user_model');
         //  $this->load->library('session');
         
       } 
       public function index()
	{
		//$this->load->view('welcome_message');
                $data['title']= $this->title;
                $this->load->view('login',$data);
	}
        public  function checklogin()
        {
            //echo "testing page";
             $data['title']= $this->title;
             $this->load->view('home',$data);
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
        
        public function tb_appendix1()
        {
            /*   
            $rs = mysql_query("select * from item where " . $where . " limit $offset,$rows");
                $items = array();
                while($row = mysql_fetch_object($rs))
                {
                array_push($items, $row);
                       }
                       $result["rows"] = $items;
 
                       echo json_encode($result);
             */
            
            $tb1="tb_appendix1";
            $or_1= "id_appendix1";
            $this->db->order_by($or_1,"desc");
            $query=$this->db->get($tb1,10,0);
            
            
            $items = array();
            foreach($query->result() as $row )
            {
                array_push($items, $row);
            }
            $result["rows"] = $items;
            echo json_encode($result);
        }
        
        public function HN_appendix1()
        {
            /*   
            $rs = mysql_query("select * from item where " . $where . " limit $offset,$rows");
                $items = array();
                while($row = mysql_fetch_object($rs))
                {
                array_push($items, $row);
                       }
                       $result["rows"] = $items;
 
                       echo json_encode($result);
             */
            $HN=$this->uri->segment(3);
            $tb1="tb_appendix1";
            //$or_1= "id_appendix1";
            //$this->db->order_by($or_1,"desc");
            //$this->db->like('HN', $HN);
            $query=$this->db->get_where($tb1,array('HN'=>$HN),10,0);
            
            
            $items = array();
            foreach($query->result() as $row )
            {
                array_push($items, $row);
            }
            $result["rows"] = $items;
            echo json_encode($result);
        }
       
        public function insert_app1()
        {
            //echo "insert_app1";
             $HN_app1=trim($this->input->get_post('HN_app1')); //HN number
            //echo "<br>";
             $person_id_app1=trim($this->input->get_post('person_id_app1')); //เลขที่บัตรประชาชน :
            //echo "<br>";
             $ep_no_app1=trim($this->input->get_post('ep_no_app1')); //Epilepsy Number :
            //echo  "<br>";
             $name_app1=trim($this->input->get_post('name_app1')); //ชื่อ 
            //echo  "<br>";
             $surname_app1=trim($this->input->get_post('surname_app1')); //นามสกุล 
            //echo  "<br>";
             $sex_app1=trim($this->input->get_post('sex_app1')); //1=ชาย,2=หญิง
            //echo  "<br>";
             $prov_id=trim($this->input->get_post('prov_id')); //จังหวัดเกิด
            //echo  "<br>";
             $amphur_id=trim($this->input->get_post('amphur_id')); //อำเภอเกิด
            //echo  "<br>";
             $district_id=trim($this->input->get_post('district_id')); //ตำบลเกิด
            //echo  "<br>";
             $zipcode=trim($this->input->get_post('zipcode')); //รหัสไปรษณีย์
            //echo  "<br>";
             $address=trim($this->input->get_post('address')); //ที่อยู่ 
            //echo  "<br>";
             $telephone=trim($this->input->get_post('telephone')); //เบอร์โทรศัพท์ 
            //echo "<br>";
            
            $birthdate=trim($this->input->get_post('birthdate')); //วัน-เดือน-ปี เกิด
            //echo "<br>";
            $conv_birthdate =$this->user_model->convertDate($birthdate); //model แปลงวันที่ให้อยู่ในรูป ปี-เดือน-วัน
            //echo "<br>";
            
            $age=trim($this->input->get_post('age'));
            //echo "<br>";
            
            $occupational_id=trim($this->input->get_post('occupational_id'));//อาชีพ
            //echo "<br>";
            
            $education_id=trim($this->input->get_post('education_id'));//การศึกษา
            //echo  "<br>";
            
            $payment_id=trim($this->input->get_post('payment_id')); //สิทธิการรักษา
            //echo "<br>";
            
            $age_payment=trim($this->input->get_post('age_payment')); //เริ่มชักเมื่อปี
            //echo  "<br>";
            
            $age_sick=trim($this->input->get_post('age_sick')); //ชักมาแล้ว
            //echo  "<br>";
            
            $epilepsy_first=trim($this->input->get_post('epilepsy_first')); //รูปแบบการชัก
            //echo "<br>";
            
            $detail_epilepsy_first=trim($this->input->get_post('detail_epilepsy_first')); //อื่นๆ ระบุ รูปแบบการชัก
            //echo  "<br>";
            
            $current_epilepsy=trim($this->input->get_post('current_epilepsy')); //รูปแบบการชัก ณ ปัจจุบัน
           //echo "<br>";
            $other_current_epilepsy=trim($this->input->get_post('other_current_epilepsy')); //อื่นๆ รูปแบบการชักที่ ณ ปัจจุบัน
           //echo  "<br>";
           
            $ever_EEG=trim($this->input->get_post('ever_EEG'));   //เคยตรวจ EEG มาก่อนหรือไม่ 1=เคย,2=ไม่เคย
           //echo  "<br>";
           
            $date_ever_EEG=trim($this->input->get_post('date_ever_EEG')); // วัน เดือน ปี เคยตรวจ EEG มาก่อนหรือไม่ :
           //echo  "<br>";     
            $conv_date_ever_EEG=$this->user_model->convertDate($date_ever_EEG);
           //echo  "<br>"; 
            
            $date_ever_EEG=trim($this->input->get_post('date_ever_EEG'));  //เคยตรวจ EEG มาก่อนหรือไม่ 
           //echo  "<br>";
           
            $conv_date_ever_EEG=$this->user_model->convertDate($date_ever_EEG);
           //echo  "<br>";
           
            $results_EEG=trim($this->input->get_post('results_EEG'));  //ผลการตรวจ EEG : 1=เคย,2=ไม่เคย
           //echo "<br>";
           
            $date_results_EEG=trim($this->input->get_post('date_results_EEG')); //วัน เดือน ปี ผลการตรวจ EEG :
           //echo "<br>";
            $conv_date_results_EEG =$this->user_model->convertDate($date_results_EEG);
           //echo "<br>";
           
           $ever_CT_MRI=trim($this->input->get_post('ever_CT_MRI')); //เคยตรวจ CT/MRI มาก่อนหรือไม่  1=เคย,2=ไม่เคย
          //echo "<br>";
          
           $result_CT_MRI=trim($this->input->get_post('result_CT_MRI')); //เคยตรวจ CT/MRI :
          //echo "<br>";
          $date_result_CT_MRI=trim($this->input->get_post('date_result_CT_MRI'));
          //echo "<br>";
          $conv_date_result_CT_MRI=$this->user_model->convertDate($date_result_CT_MRI);
          //echo "<br>";
          
          
  $date_ever_CT_MRI=trim($this->input->get_post('date_ever_CT_MRI')); //วัน เดือน ปี CT/MRI มาก่อนหรือไม่ เคยตรวจ 
 //echo "<br>";
 
  $conv_date_ever_CT_MRI = $this->user_model->convertDate($date_ever_CT_MRI);
 //echo "<br>";        
          
  $nature_CT_MRI=trim($this->input->get_post('nature_CT_MRI')); //ลักษณะความผิดปกติจาก CT/MRI :
 //echo "<br>"; 
 
 $other_Nature_CT_MRI=trim($this->input->get_post('other_Nature_CT_MRI'));  //อื่นๆ ระบุ :ลักษณะความผิดปกติจาก CT/MRI :
 //echo "<br>";
 
 
 $drug_id=trim($this->input->get_post('drug_id'));  //ยาที่ได้รับมาก่อนหน้านี้พร้อมระบุ
 //echo "<br>";
 
 $drug_other=trim($this->input->get_post('drug_other')); //อื่นๆ ระบุ : ยาที่ได้รับมาก่อนหน้านี้พร้อมระบุ
 //echo "<br>";
 
 $disease_drug_id=trim($this->input->get_post('disease_drug_id')); //โรคร่วมอื่นๆ ของผู้ป่วย : 
 //echo "<br>";
 
 $disease_drug_other=trim($this->input->get_post('disease_drug_other')); //โรคร่วมอื่นๆ ของผู้ป่วย อื่นๆ ระบุ :
 //echo "<br>";
 
 $allergic=trim($this->input->get_post('allergic')); //ประวัติการแพ้ยา :
 //echo "<br>";
 
 $date_allergic=trim($this->input->get_post('date_allergic')); // วัน เดือน ปี ประวัติการแพ้ยา :
 //echo "<br>";
 $conv_date_allergic= $this->user_model->convertDate($date_allergic);
 //echo "<br>";
 
 $allergic_detail=trim($this->input->get_post('allergic_detail')); //ประวัติการแพ้ยา :(กรณียาอื่นที่ไม่ใช่ยากันชัก ) :       
 //echo "<br>";
 
 $drug_epilepsy=trim($this->input->get_post('drug_epilepsy')); //ยากันชักที่แพ้ :
 //echo "<br>";
 
   $drug_epilepsy_detail=trim($this->input->get_post('drug_epilepsy_detail')); //อื่นๆ ระบุ : ยากันชักที่แพ้ :
 //echo "<br>";
 
 $nature_drug_epilepsy_id=trim($this->input->get_post('nature_drug_epilepsy_id')); //ลักษณะการแพ้ยากันชัก :
 //echo "<br>";
 
 $Nature_drug_epilepsy_other=trim($this->input->get_post('Nature_drug_epilepsy_other')); //อื่นๆ ระบุ :
 //echo "<br>";
 
  $stimulate_epilepsy_id=trim($this->input->get_post('stimulate_epilepsy_id')); //สิ่งกระตุ้นให้เกิดอาการชัก
 //echo "<br>";
 
  $stimulate_epilepsy_other=trim($this->input->get_post('stimulate_epilepsy_other')); //อื่นๆ ระบุ : สิ่งกระตุ้นให้เกิดอาการชัก
 //echo "<br>";
 
  $interview_date=trim($this->input->get_post('interview_date')); //วัน-เดือน-ปี ที่สัมภาษณ์
 //echo "<br>";
 $conv_interview_date=$this->user_model->convertDate($interview_date);
 //echo "<br>";
 

 
            $sess_username=$this->session->userdata('sess_username'); //ตัวอย่างวิธีเรียกใช้
            //echo  "<br>";
             $sess_lastname=$this->session->userdata('sess_lastname');
            //echo  "<br>";
             $sess_usertype=$this->session->userdata('sess_usertype');
            //echo  "<br>";
             $sess_usercode=$this->session->userdata('sess_usercode');
            //echo "<br>";
             $sess_login=$this->session->userdata('sess_login');
 
 
  $interview_name=$sess_username; //ชื่อผู้สัมภาษณ์
 //echo "<br>";
 
  $interview_lastname=$sess_lastname; //นามสกุล ผู้สัมภาษณ์
 //echo "<br>";
 
 
/*
 $data1 = array(
  'id_appendix1'=>NULL,  
  'HN' => $HN_app1 ,
   'person _id'=>$person_id_app1,
    'ep_no'=>$ep_no_app1,
    'name'=>$name_app1,
     'surname'=>$surname_app1,
     'sex'=>$sex_app1,
     'prov_id'=>$prov_id,
     'amphur_id'=>$amphur_id,
     'district_id'=>$district_id,
    'zipcode'=>$zipcode,
     'address'=>$address,
    'telephone'=>$telephone,
     'birthdate'=>$conv_birthdate,
     'age'=>$age,
    'occupational_id'=>$occupational_id,
     'education_id'=>$education_id,
    'payment_id'=>$payment_id,
     'age_payment'=>$age_payment,
     'age_sick'=>$age_sick,
    'epilepsy_first'=>$epilepsy_first,
     'detail_epilepsy_first'=>$detail_epilepsy_first,
     'current_epilepsy'=>$current_epilepsy,
     'other_current_epilepsy'=>$other_current_epilepsy,
     'ever_EEG'=>$ever_EEG,
     'results_EEG'=>$results_EEG,
     'ever_CT_MRI'=>$ever_CT_MRI,
     'result_CT_MRI'=>$result_CT_MRI,
    'nature_CT_MRI'=>$nature_CT_MRI,
     'other_Nature_CT_MRI'=>$other_Nature_CT_MRI,
     'drug_id'=>$drug_id,
     'drug_other'=>$drug_other,
     'disease_drug_id'=>$disease_drug_id,
     'disease_drug_other'=>$disease_drug_other,
     'allergic'=>$allergic,
     'allergic_detail'=>$allergic_detail,
     'drug_epilepsy'=>$drug_epilepsy,
     'drug_epilepsy_detail'=>$drug_epilepsy_detail,
     'nature_drug_epilepsy_id'=>$nature_drug_epilepsy_id,
     'Nature_drug_epilepsy_other'=>$Nature_drug_epilepsy_other,
     'stimulate_epilepsy_id'=>$stimulate_epilepsy_id,
     'stimulate_epilepsy_other'=>$stimulate_epilepsy_other,
     'interview_date'=>$conv_interview_date, //วัน-เดือน-ปี ที่สัมภาษณ์
     'interview_name'=>$interview_name,
     'interview_lastname'=>$interview_lastname,
     'id_user'=>$sess_usercode,
     'dmy_EEG'=>$conv_date_ever_EEG,
     'dmy_results_EEG'=>$conv_date_results_EEG,
     'dmy_ever_CT_MRI'=>$conv_date_ever_CT_MRI,     
     'dmy_result_CT_MRI'=>$conv_date_result_CT_MRI,   //เคยตรวจ CT/MRI :
     'dmy_allergic'=>$conv_date_allergic,  //วัน เดือน ปี ประวัติการแพ้ยา
);

    $tb1="tb_appendix1";
    $this->db->insert($tb1 , $data1  ); //check การ insert table
 */
 
 //$datestring = "%Y-%m-%d";
 //$cur_date=mdate($datestring);
 //$ds=date("Y-m-d");

 $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
 $time = time();

 // mdate($datestring, $time);
 
 $tb1="tb_appendix1";
 
 
 //$this->db->set('id_appendix1',NULL);
 $this->user_model->model_insert('id_appendix1',NULL);
 
 //$this->db->set('HN',$HN_app1);
 $this->user_model->model_insert('HN',$HN_app1);
 
 //$this->db->set('person_id',$person_id_app1);
 $this->user_model->model_insert('person_id',$person_id_app1);
 
 //$this->db->set('ep_no',$ep_no_app1);
 $this->user_model->model_insert('ep_no',$ep_no_app1);
 
 //$this->db->set('name',$name_app1); 
 $this->user_model->model_insert('name',$name_app1);
 
 //$this->db->set('surname',$surname_app1);
 $this->user_model->model_insert('surname',$surname_app1);
 
 //$this->db->set('interview_date',$conv_interview_date); //วัน-เดือน-ปี ที่สัมภาษณ์
 $this->user_model->model_insert('interview_date',$conv_interview_date);
 
 //$this->db->set('sex',$sex_app1); //เพศ
 $this->user_model->model_insert('sex',$sex_app1);
 
 //$this->db->set('prov_id',$prov_id); //จังหวัด  
 $this->user_model->model_insert('prov_id',$prov_id);
 
 //$this->db->set('amphur_id',$amphur_id); //อำเภอ
 $this->user_model->model_insert('amphur_id',$amphur_id);
 
 //$this->db->set('district_id',$district_id); //ตำบล
 $this->user_model->model_insert('district_id',$district_id);
 
 //$this->db->set('zipcode',$zipcode); //รหัสไปรษณีย์
 $this->user_model->model_insert('zipcode',$zipcode);
 
 //$this->db->set('address',$address);
 $this->user_model->model_insert('address',$address);
 
 //$this->db->set('telephone',$telephone);
 $this->user_model->model_insert('telephone',$telephone);
 
 //$this->db->set('birthdate',$conv_birthdate);
 $this->user_model->model_insert('birthdate',$conv_birthdate);
 
 //$this->db->set('age',$age);
 $this->user_model->model_insert('age',$age);
 
 //$this->db->set('occupational_id',$occupational_id);
 $this->user_model->model_insert('occupational_id',$occupational_id);
 
 //$this->db->set('education_id',$education_id);
 $this->user_model->model_insert('education_id',$education_id);
 
 //$this->db->set('payment_id',$payment_id); //สิทธิการรักษา 
 $this->user_model->model_insert('payment_id',$payment_id);
 
 //$this->db->set('age_payment',$age_payment); //เริ่มมีการชักเมื่อปี :
 $this->user_model->model_insert('age_payment',$age_payment);
 
 //$this->db->set('age_sick',$age_sick); //ชักมาแล้ว :
 $this->user_model->model_insert('age_sick',$age_sick);
 
 
 //$this->db->set('epilepsy_first',$epilepsy_first); //รูปแบบการชักที่เป็นครั้งแรก :
 $this->user_model->model_insert('epilepsy_first',$epilepsy_first);
 
 //$this->db->set('detail_epilepsy_first',$detail_epilepsy_first);  //อื่นๆ ระบุ : รูปแบบการชักที่เป็นครั้งแรก :
 $this->user_model->model_insert('detail_epilepsy_first',$detail_epilepsy_first);
 
 //$this->db->set('current_epilepsy',$current_epilepsy); //รูปแบบการชักที่ ณ ปัจจุบัน :
 $this->user_model->model_insert('current_epilepsy',$current_epilepsy);
 
 //$this->db->set('other_current_epilepsy',$other_current_epilepsy);  //รูปแบบการชักที่ ณ ปัจจุบัน อื่นๆ ระบุ 
 $this->user_model->model_insert('other_current_epilepsy',$other_current_epilepsy);
 
 
 //$this->db->set('ever_EEG',$ever_EEG); //เคยตรวจ EEG มาก่อนหรือไม่  ok
 $this->user_model->model_insert('ever_EEG',$ever_EEG);
 
 //$this->db->set('dmy_EEG',$conv_date_ever_EEG); //วัน เดือน ปี  เคยตรวจ EEG มาก่อนหรือไม่ 
 $this->user_model->model_insert('dmy_EEG',$conv_date_ever_EEG);
 
 //$this->db->set('results_EEG',$results_EEG); //ผลการตรวจ EEG : ok
 $this->user_model->model_insert('results_EEG',$results_EEG);
 
 //$this->db->set('dmy_results_EEG',$conv_date_results_EEG); //วัน เดือน ปี ผลการตรวจ EEG :
 $this->user_model->model_insert('dmy_results_EEG',$conv_date_results_EEG);
 
 //$this->db->set('ever_CT_MRI',$ever_CT_MRI); //เคยตรวจ CT/MRI มาก่อนหรือไม่ :
  $this->user_model->model_insert('ever_CT_MRI',$ever_CT_MRI);
 
 $this->db->set('dmy_ever_CT_MRI',$conv_date_ever_CT_MRI);  //วันเดือนปี คยตรวจ CT/MRI :
 $this->user_model->model_insert('dmy_ever_CT_MRI',$conv_date_ever_CT_MRI);
 
 
 //$this->db->set('result_CT_MRI',$result_CT_MRI); //เคยตรวจ CT/MRI
 $this->user_model->model_insert('result_CT_MRI',$result_CT_MRI);
 
 //$this->db->set('dmy_result_CT_MRI',$conv_date_result_CT_MRI ); //เคยตรวจ CT/MRI (วัน-เดือน-ปี):
  $this->user_model->model_insert('dmy_result_CT_MRI',$conv_date_result_CT_MRI);
 
 //$this->db->set('nature_CT_MRI',$nature_CT_MRI); //ลักษณะความผิดปกติจาก CT/MRI 
 $this->user_model->model_insert('nature_CT_MRI',$nature_CT_MRI);
 
 //$this->db->set('other_Nature_CT_MRI',$other_Nature_CT_MRI); //ลักษณะความผิดปกติจาก CT/MRI : อื่นๆ ระบุ :
 $this->user_model->model_insert('other_Nature_CT_MRI',$other_Nature_CT_MRI);


 //$this->db->set('drug_id',$drug_id); //าที่ได้รับมาก่อนหน้านี้พร้อมระบุ
 $this->user_model->model_insert('drug_id',$drug_id);
 
 
 //$this->db->set('drug_other',$drug_other);   //อื่นๆ ระบุ :าที่ได้รับมาก่อนหน้านี้พร้อมระบุ
 $this->user_model->model_insert('drug_other',$drug_other);
 
//$this->db->set('disease_drug_id',$disease_drug_id); // โรคร่วมอื่นๆ ของผู้ป่วย :
 $this->user_model->model_insert('disease_drug_id',$disease_drug_id);

 
//$this->db->set('disease_drug_other',$disease_drug_other); //โรคร่วมอื่นๆ ของผู้ป่วย : อื่นๆ ระบุ :
$this->user_model->model_insert('disease_drug_other',$disease_drug_other);

//$this->db->set('allergic',$allergic); //ประวัติการแพ้ยา :
$this->user_model->model_insert('allergic',$allergic);

//$this->db->set('disease_drug_other',$disease_drug_other);
$this->user_model->model_insert('disease_drug_other',$disease_drug_other);

        
//$this->db->set('dmy_allergic',$conv_date_allergic); //date_allergic  //วัน เดือน ปี ประวัติการแพ้ยา
$this->user_model->model_insert('dmy_allergic',$conv_date_allergic);

//$this->db->set('allergic_detail',$allergic_detail); //allergic_detail กรณียาอื่นที่ไม่ใช่ยากันชัก 
$this->user_model->model_insert('allergic_detail',$allergic_detail);


//$this->db->set('drug_epilepsy',$drug_epilepsy); //ยากันชักที่แพ้ :
$this->user_model->model_insert('drug_epilepsy',$drug_epilepsy);

//$this->db->set('drug_epilepsy_detail',$drug_epilepsy_detail); //ยากันชักที่แพ้ :  อื่นๆ ระบุ :
$this->user_model->model_insert('drug_epilepsy_detail',$drug_epilepsy_detail);


//$this->db->set('nature_drug_epilepsy_id',$nature_drug_epilepsy_id); // ลักษณะการแพ้ยากันชัก :
$this->user_model->model_insert('nature_drug_epilepsy_id',$nature_drug_epilepsy_id);


//$this->db->set('Nature_drug_epilepsy_other',$Nature_drug_epilepsy_other); // อื่นๆ ระบุ :ลักษณะการแพ้ยากันชัก : 
$this->user_model->model_insert('Nature_drug_epilepsy_other',$Nature_drug_epilepsy_other);


//$this->db->set('stimulate_epilepsy_id',$stimulate_epilepsy_id); // สิ่งกระตุ้นให้เกิดอาการชัก :
$this->user_model->model_insert('stimulate_epilepsy_id',$stimulate_epilepsy_id);


//$this->db->set('stimulate_epilepsy_other',$stimulate_epilepsy_other);     // อื่นๆ สิ่งกระตุ้นให้เกิดอาการชัก :
$this->user_model->model_insert('stimulate_epilepsy_other',$stimulate_epilepsy_other);

//$this->db->set('interview_date',$conv_interview_date);//วัน-เดือน-ปี ที่สัมภาษณ์  
$this->user_model->model_insert('interview_date',$conv_interview_date);
 
//$this->db->set('interview_name',$interview_name);
$this->user_model->model_insert('interview_name',$interview_name);


//$this->db->set('interview_lastname',$interview_lastname);
$this->user_model->model_insert('interview_lastname',$interview_lastname);

 $ck_insert=$this->db->insert($tb1);
 if( $ck_insert )
 {
     echo "<div style=\"padding:0 50px\">"
     . "บันทึกข้อมูลแล้ว"
             . "</div>";
 }
 elseif ( !$ck_insert )
 {
     echo "<div style=\"padding:0 50px\">";
     echo "ไม่สามารถบันทึกข้อมูลได้";
     echo "</div>";
 }
  
 
 
 
/*            
                        echo '
<div style="padding:0 50px">
<p>Name: $name</p>
<p>Email: $email</p>
<p>Phone: $phone</p>
<p>File: $file</p>
</div>
';
  */
            
        
        }
        public function del_app1()//ต้องการลบ appendix 1
        {
            
            /*            
$id = intval($_REQUEST['id']);

include 'conn.php';

$sql = "delete from users where id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
*/
            
            /*
            $id_appendix1=trim($this->uri->segment(3));         
           if(  $id_appendix1 > 0 )
           {               
               $this->db->where('id_appendix1',$id_appendix1);
               $check=$this->db->delete('tb_appendix1');                             
           }
           */
            
                $id_appendix1 = $this->uri->segment(3);
               //echo "<br>";
               // $id = intval($this->input->get_post('id'));
             if(  $id_appendix1 > 0 )
              {               
               
                  $this->db->where('id_appendix1',$id_appendix1);
                  $this->db->delete('tb_appendix1'); 
               /*
               $check=$this->db->delete('tb_appendix1'); 
                 if( $check )
                 {
                     echo "ok";
                 }else
                 {
                     echo "false";
                 }
                 */
               
               }
               /*
                $result=true;
                if( $result )
                {
                   echo json_encode(array('success'=>true));
                }
                else
                {
                   echo json_encode(array('errorMsg'=>'Some errors occured.')); 
                }  
               */ 
                
           
        }#end fucntion
     
        public function fetch_appendix1() //ใชัสำหรับเรียก tb_appendix1  จาก id
        {
           /*
            $va_arr = array(); 
            foreach($objquery->result() as $row )
            {
                $va_arr[]=$row;
            }
            echo json_encode($va_arr);
           */ 
            
                  $id_appendix1=trim($this->uri->segment(3));
                  //echo "<br>";
             if(  $id_appendix1 > 0 )
             {
                 
                 $tb="tb_appendix1";
                 $query = $this->db->get_where($tb, array('id_appendix1' => $id_appendix1 ), 10, 0);
                 $ck=$query->num_rows();
                 if( $ck > 0 )
                 {
                     $va_arr = array(); 
                     foreach($query->result() as $row )
                            {
                                $va_arr[]=$row;
                            }
                                echo json_encode($va_arr);
                 }
                  
             }
        }//end function
        
        public function update_app1() //update  appendix1
        {
            $tb="tb_appendix1";
            
            $id_appendix1_up=$this->input->get_post('id_appendix1_up'); 
            //$id_appendix1_up=$this->uri->segment(3);
                    
            $HN_app1_up=trim($this->input->get_post('HN_app1_up'));
                     
            $person_id_app1_up=trim($this->input->get_post('person_id_app1_up'));            
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'person_id',$person_id_app1_up,$tb);
            
            $ep_no_app1_up=trim($this->input->get_post('ep_no_app1_up'));                     
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'ep_no',$ep_no_app1_up,$tb);          
            
            $name_app1_up=trim($this->input->get_post('name_app1_up'));                    
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'name',$name_app1_up,$tb);
                     
            $surname_app1_up=trim($this->input->get_post('surname_app1_up'));           
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'surname',$surname_app1_up,$tb);
            
            $sex=trim($this->input->get_post('sex_app1_up'));  //ยังไม่มีการupdate
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'sex',$sex,$tb);
            
            $prov_id_up=trim($this->input->get_post('prov_id_up'));          
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'prov_id',$prov_id_up,$tb);
                       
            $amphur_id_up=trim($this->input->get_post('amphur_id_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'amphur_id',$amphur_id_up,$tb);
            
            $district_id_up=trim($this->input->get_post('district_id_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'district_id',$district_id_up,$tb);
            
            $zipcode_up=trim($this->input->get_post('zipcode_up'));
             $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'zipcode',$zipcode_up,$tb);
            
            $address=trim($this->input->get_post('address_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'address',$address,$tb);
            
            $telephone=trim($this->input->get_post('telephone_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'telephone',$telephone,$tb);
            
            $birthdate=trim($this->input->get_post('birthdate_up'));
            $conv_birthdate=$this->user_model->convertDate($birthdate);
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'birthdate',$conv_birthdate,$tb);
            
            $age=trim($this->input->get_post('age_up'));            
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'age',$age,$tb);
            
            $occupational_id=trim($this->input->get_post('occupational_id_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'occupational_id',$occupational_id,$tb);
            
            $education_id=trim($this->input->get_post('education_id_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'education_id',$education_id,$tb);
            
            $payment_id=trim($this->input->get_post('payment_id_up'));  //สิทธิการรักษา
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'payment_id',$payment_id,$tb);
            
            $age_payment=trim($this->input->get_post('age_payment_up'));  //เริ่มชักเมื่อปี
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'age_payment',$age_payment,$tb);
              
            $age_sick=trim($this->input->get_post('age_sick_up')); //ขักมาแล้ว
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'age_sick',$age_sick,$tb);
            
            $epilepsy_first=trim($this->input->get_post('epilepsy_first_up')); //รูปแบบการชักที่เป็นครั้งแรก
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'epilepsy_first',$epilepsy_first,$tb);
            
            
            $detail_epilepsy_first=trim($this->input->get_post('detail_epilepsy_first_up')); //รูปแบบการชักที่เป็นครั้งแรก อื่นๆ
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'detail_epilepsy_first',$detail_epilepsy_first,$tb);
             
            $current_epilepsy=trim($this->input->get_post('current_epilepsy_up'));     //รูปแบบการชักที่ ณ ปัจจุบั
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'current_epilepsy',$current_epilepsy,$tb);
            
            
            $other_current_epilepsy=trim($this->input->get_post('other_current_epilepsy_up')); //รูปแบบการชักที่ ณ ปัจจุบั อื่นๆ
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'other_current_epilepsy',$other_current_epilepsy,$tb);
            
            
            $ever_EEG=trim($this->input->get_post('ever_EEG_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'ever_EEG',$ever_EEG,$tb); //เคยตรวจ EEG มาก่อนหรือไม่
            
            $date_ever_EEG=trim($this->input->get_post('date_ever_EEG_up'));  //วัน เดือน ปี เคยตรวจ EEG มาก่อนหรือไม่
            $conv_date_ever_EEG=$this->user_model->convertDate($date_ever_EEG);
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'dmy_EEG',$conv_date_ever_EEG,$tb);
            
            
            $results_EEG=trim($this->input->get_post('results_EEG_up')); //ผลการตรวจ EEG
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'results_EEG',$results_EEG,$tb);
            
            $date_results_EEG=trim($this->input->get_post('date_results_EEG_up')); //(วัน-เดือน-ปี) ผลการตรวจ EEG
            $conv_date_results_EEG=$this->user_model->convertDate($date_ever_EEG);
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'dmy_results_EEG',$conv_date_results_EEG,$tb);
            
            $ever_CT_MRI=trim($this->input->get_post('ever_CT_MRI_up')); //เคยตรวจ CT/MRI มาก่อนหรือไม่ 
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'ever_CT_MRI',$ever_CT_MRI,$tb);
            
            $date_ever_CT_MRI=trim($this->input->get_post('date_ever_CT_MRI_up'));
            $conv_date_ever_CT_MRI=$this->user_model->convertDate($date_ever_CT_MRI);
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'dmy_ever_CT_MRI',$conv_date_ever_CT_MRI,$tb);
            
            //เคยตรวจ CT/MRI
            $result_CT_MRI=trim($this->input->get_post('result_CT_MRI_up')); //result_CT_MRI_up
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'result_CT_MRI',$result_CT_MRI,$tb);
            
            $date_result_CT_MRI=trim($this->input->get_post('date_result_CT_MRI_up'));
            $conv_date_result_CT_MRI=$this->user_model->convertDate($date_result_CT_MRI);           
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'dmy_result_CT_MRI',$conv_date_result_CT_MRI,$tb);
            
            
            $nature_CT_MRI=trim($this->input->get_post('nature_CT_MRI_up')); //ลักษณะความผิดปกติจาก CT/MRI
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'nature_CT_MRI',$nature_CT_MRI,$tb);
            
            
            //ลักษณะความผิดปกติจาก CT/MRI   อื่นๆ ระบุ :
            $other_Nature_CT_MRI=trim($this->input->get_post('other_Nature_CT_MRI_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'other_Nature_CT_MRI',$other_Nature_CT_MRI,$tb);
            
            
            //ยาที่ได้รับมาก่อนหน้านี้พร้อมระบุความรุนแรงและแบบแผนการใช้ยา
            $drug_id=trim($this->input->get_post('drug_id_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'drug_id',$drug_id,$tb);
            
            
            //อื่นๆ ระบุ :
            $drug_other=trim($this->input->get_post('drug_other_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'drug_other',$drug_other,$tb);
            
             //โรคร่วมอื่นๆ ของผู้ป่วย :  
            $disease_drug_id=trim($this->input->get_post('disease_drug_id_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'disease_drug_id',$disease_drug_id,$tb);
            
            $disease_drug_other=trim($this->input->get_post('disease_drug_other_up')); //ระบุโรคร่วมอื่นๆของผู้ป่วย
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'disease_drug_other',$disease_drug_other,$tb);
            
            
            $allergic=trim($this->input->get_post('allergic_up')); //ประวัติการแพ้ยา
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'allergic',$allergic,$tb);
            
            $date_allergic=trim($this->input->get_post('date_allergic')); //วัน เดือน ปี ประวัติการแพ้ยา
            $conv_date_allergic=$this->user_model->convertDate($date_allergic);
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'dmy_allergic',$conv_date_allergic,$tb);
            
            
            $allergic_detail=trim($this->input->get_post('allergic_detail_up'));
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'allergic_detail',$allergic_detail,$tb);
            
            $drug_epilepsy=trim($this->input->get_post('drug_epilepsy_up')); //ยากันชักที่แพ้
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'drug_epilepsy',$drug_epilepsy,$tb); 
            
            $drug_epilepsy_detail=trim($this->input->get_post('drug_epilepsy_detail_up')); //ระบุยากันชักที่แพ้
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'drug_epilepsy_detail',$drug_epilepsy_detail,$tb);
            
            $nature_drug_epilepsy_id=trim($this->input->get_post('nature_drug_epilepsy_id_up')); //ลักษณะการแพ้ยากันชัก
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'nature_drug_epilepsy_id',$nature_drug_epilepsy_id,$tb);
            
            $Nature_drug_epilepsy_other=trim($this->input->get_post('Nature_drug_epilepsy_other_up')); //ลักษณะของยากันชักอื่นๆ ระบุ
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'Nature_drug_epilepsy_other',$Nature_drug_epilepsy_other,$tb);
            
            $stimulate_epilepsy_id=trim($this->input->get_post('stimulate_epilepsy_id_up')); // สิ่งกระตุ้นให้เกิดอาการชัก :
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'stimulate_epilepsy_id',$stimulate_epilepsy_id,$tb);
            
            $stimulate_epilepsy_other=trim($this->input->get_post('stimulate_epilepsy_other_up'));  //สิ่งกระตุ้นให้เกิดอาการชัก  อื่นๆ
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'stimulate_epilepsy_other',$stimulate_epilepsy_other,$tb);
            
            $interview_date=trim($this->input->get_post('interview_date_up'));
            $conv_interview_date=$this->user_model->convertDate($interview_date); 
            $this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'interview_date',$conv_interview_date,$tb);
             
            /*          
        if( $id_appendix1_up > 0 ) 
        {    
            $tb="tb_appendix1";
         if( $ep_no_app1_up != '' )  
         {    
             $object=array('ep_no'=>$ep_no_app1_up);           
             $this->db->where('id_appendix1',$id_appendix1_up);
             $check=$this->db->update($tb, $object);
             if( $check )
             {
                 $ck_status="ok";
             }else
             {
                 $ck_status="false";
             }
            
         }    
             
              
        }//end if   
        
*/
            
        
        
        /*           
             echo '
<div style="padding:0 50px">
<p>Name: $name</p>
<p>Email: $email</p>
<p>Phone: $phone</p>
<p>File: $file</p>
<p>สถานะการ update : '.$ck_status.'</p>
</div>
';
   */  
        
        
           
     }
     
     
        
}

?>