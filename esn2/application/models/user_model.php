<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
 
    function  checklogin($sess_login) #ตรวจสอบการ login
    {
        #echo  "check to login";
        if( $sess_login != 'Y' )
        {
            redirect('welcome/index/');
        }
    }
    function  convertDate($dmy)
    {
        //echo  $dmy;
        if( strlen($dmy) > 0 )
        {
           $ex1=explode(" ",$dmy);
           //echo $ex1[0];
           $ex2=explode("/",$ex1[0]);
           return $ex2[2]."-".$ex2[0]."-".$ex2[1];
            
        }
    }
    function model_insert($fname,$val) //check การ insert ข้อมูลใน table
    {
        if( $fname != "" &&  $val != ""  )
        {
            return   $this->db->set($fname,$val );
        }
         else
         {
            return false;
         }
    }
    
    //$this->user_model->model_checkupdate('id_appendix1',$id_appendix1_up,'drug_epilepsy_detail',$drug_epilepsy_detail,$tb);
    function model_checkupdate($id,$idf,$fname,$fva,$tb) //check  ค่าสำหรับการ update ใน table
    {            
         if( $idf > 0  &&  $fva  !=  ""  )  
         {    
            $object=array($fname=>$fva); 
            $this->db->where($id,$idf); 
            //$check=$this->db->update($tb, $object); 
            return  $this->db->update($tb, $object); 
            
            /*
            if( $check )
             {
               //echo  $ck_status="ok";
               //echo "<br>";
             }else
             {
               echo   $ck_status="false";
               echo "<br>";
             }
             * 
             */
             
         }
         
   function  databox_conv($dmy)// change  date format  y-m-d
    {
        if( strlen($dmy) > 0 )
        {
            //echo "T";
            $ex=explode("/",$dmy);
            return  $ex[2]."-".$ex[0]."-".$ex[1]; 
        }
    }
        
    }//end function
    
    function  authensystem()
    {
        # $this->load->model('user_model');
        # $this->user_model->authensystem();
        
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
             
             
    }
 
}

?>