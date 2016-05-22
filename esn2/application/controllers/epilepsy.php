<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Epilepsy extends CI_Controller {

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
       
       
       public function  fetch_epi()
       {
           //http://drugstore.kku.ac.th/esn2/index.php/epilepsy/fetch_epi/GK3559
            // $HN="GK3559"; 
            $this->user_model->authensystem();
            
            // AND     `04__monitoring`.`Clinic`='Epilepsy Clinic' 
           $HN=$this->uri->segment(3);
          //$tb="04__monitoring";
           $tb="`04__monitoring`";
           $tbj2="`laboratorytype_detail`";
           $tbj3="`tb_epilepsy_value`";
           
           $objquery=$this->db->query(" SELECT * FROM  $tb "
                   . "LEFT JOIN `laboratorytype` ON $tb.`Lab`=`laboratorytype`.`LabCode`  "
                   ." LEFT  JOIN  $tbj2  ON    $tb.`Lab`=$tbj2.`LabCode`   "
                   . " JOIN    $tbj3   ON  $tb.`Value`=$tbj3.`id_epi_value`    "
                   . "WHERE $tb.`Lab` IN ( 64, 66, 67, 101 )      AND   $tb.`Clinic`='Epilepsy Clinic'        "
                   . "AND  $tb.`HN`='$HN'     ORDER BY $tb.`MonitoringDate` DESC   ");
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
                //$va_arr[]=$row;
                 array_push($va_arr,$row);
            }
             echo json_encode($va_arr); 
            
       }
       
       
       # http://localhost/ci/index.php/epilepsy/value_monitoring/
       # http://drugstore.kku.ac.th/esn2/index.php/epilepsy/value_monitoring/ES0597
       public function  value_monitoring()
       {
          $this->user_model->authensystem();
        
          // $HN="ES0597";
           //$tb="04-monitoring";
          //  $HN_epilepsy= $this->input->get_post('HN_epilepsy'); 
           //$tb="04__monitoring";
           $tb="`04__monitoring`";
           $tbj1="laboratorytype2";
            $tbj2="`laboratorytype_detail`";
            $tbj3="`tb_epilepsy_value`";
           
           //$this->db->join($tbj1,$tb.".Lab=".$tbj1.".Lab_value");
       //    $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'),10,0);
           
           /*
            SELECT *
FROM `laboratorytype`
WHERE `LabCode`
IN ( 64, 66, 67, 101 )
LIMIT 0 , 30
            * 
           
            * 
        SELECT * FROM `04__monitoring` LEFT JOIN `laboratorytype` ON `04__monitoring`.`Lab`=`laboratorytype`.`LabCode` WHERE `04__monitoring`.`Lab` IN ( 64, 66, 67, 101 )
            */
          
            //SELECT * FROM `04__monitoring` WHERE `Clinic`='Epilepsy Clinic' ORDER BY `Clinic` ASC 
           //  `04__monitoring`.`Clinic`='Epilepsy Clinic'    AND
          $objquery=$this->db->query(" SELECT * FROM   $tb  LEFT "
                   . "JOIN `laboratorytype` ON $tb.`Lab`=`laboratorytype`.`LabCode` "
                   ."  JOIN    $tbj2  ON  $tb.`Lab`=$tbj2.`LabCode`  "
                   . " JOIN    $tbj3   ON  $tb.`Value`=$tbj3.`id_epi_value`    "
                   . "WHERE      $tb.`Lab` IN ( 64, 66, 67, 101 )   AND   $tb.`Clinic`='Epilepsy Clinic'     ORDER BY   $tb.`MonitoringDate` DESC  Limit  0,10 ");
           //SELECT * FROM `04__monitoring` LEFT JOIN `laboratorytype` ON `04__monitoring`.`Lab`=`laboratorytype`.`LabCode` WHERE `04__monitoring`.`Lab` IN ( 64, 66, 67, 101 ) ORDER BY `04__monitoring`.`MonitoringDate` DESC Limit 0,10 
           //DELETE    FROM    `04__monitoring` WHERE `MonitoringDate`='' 
           
           //$result["total"]=$row[0];
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
                //$va_arr[]=$row;
                 array_push($va_arr,$row);
            }
             //$va_arr['add_data']='<a href="#"></a>';
            // array_push($va_arr,'<a href=""  ></a>');
            // print_r($va_arr);
            //$result["rows"]=$va_arr;
            //$result["add"]="<a href='#'  >เพิ่มข้อมูล</a>";
            
             echo json_encode($va_arr);
            //echo json_encode($result);
           
       }
       
       public function insert_epi()
       {
               $this->user_model->authensystem();

                 $HN_epilepsy=$this->input->get_post('HN_epilepsy');
             //echo  br();
                $frequency=$this->input->get_post('frequency'); //64
            // echo br();
                $clinic_response=$this->input->get_post('clinic_response'); //66
            // echo br();
                $Duration_of_Attack=$this->input->get_post('Duration_of_Attack');  //101
           //  echo  br();
              $Severity_of_Attack=$this->input->get_post('Severity_of_Attack'); //67
           //  echo  br();
             $MonitoringDate=$this->input->get_post('MonitoringDate');  //MonitoringDate->format  17/11/2551
            // echo  br();
             if(strlen( $MonitoringDate) > 0 )
             {
                        $exDate=  explode("/", $MonitoringDate );
                        $Y=$exDate[2]+543;
                      //  echo br();
                       $conDMY=$exDate[0]."/".$exDate[1]."/".$Y;
                       // echo br();
             }
                
              $tb="`04__monitoring`";
           
              
         if(    strlen(  $frequency    ) >  0  &&  $conDMY != ""  )//64     
         {    
             $this->db->set('HN', $HN_epilepsy  );   
             $this->db->set('Clinic', 'Epilepsy Clinic' );   
             $this->db->set('Lab', '64' );   
             $this->db->set('Value', $frequency ); 
             $this->db->set('MonitoringDate',$conDMY);
             $this->db->set('Clinic','Epilepsy Clinic');
             $ck64=$this->db->insert($tb);
             
             /*
                  if( $ck64 )
                    {
                        echo "บันทึกสำเร็จ frequency ";
                    }
                    else
                    {
                         echo "บันทึกล้มเหลว";
                    }
              * 
              */
             
         }
         
         if(    strlen(  $clinic_response    ) >  0    &&  $conDMY != ""    )//66     
         {    
             $this->db->set('HN', $HN_epilepsy  );   
             $this->db->set('Clinic', 'Epilepsy Clinic' );   
             $this->db->set('Lab', '66' );   
             $this->db->set('Value', $clinic_response ); 
             $this->db->set('MonitoringDate',$conDMY);
             $this->db->set('Clinic','Epilepsy Clinic');
             $ck66=$this->db->insert($tb);
             
             /*
                  if( $ck66 )
                    {
                        echo "บันทึกสำเร็จ clinic_response ";
                    }
                    else
                    {
                         echo "บันทึกล้มเหลว";
                    }
                 */   
                    
         }
         
            if(    strlen(   $Duration_of_Attack       ) >  0  &&  $conDMY != ""  )//101    
         {    
             $this->db->set('HN', $HN_epilepsy  );   
             $this->db->set('Clinic', 'Epilepsy Clinic' );   
             $this->db->set('Lab', '101' );   
             $this->db->set('Value',  $Duration_of_Attack ); 
             $this->db->set('MonitoringDate',$conDMY);
             $this->db->set('Clinic','Epilepsy Clinic');
             $ck101=$this->db->insert($tb);
             
             /*
                  if( $ck101 )
                    {
                        echo "บันทึกสำเร็จ Duration_of_Attack ";
                    }
                    else
                    {
                         echo "บันทึกล้มเหลว";
                    }
                 */   
                    
         }
         
         if(    strlen(    $Severity_of_Attack      ) >  0  &&  $conDMY != ""  )//67  
         {    
             $this->db->set('HN', $HN_epilepsy  );   
             $this->db->set('Clinic', 'Epilepsy Clinic' );   
             $this->db->set('Lab', '67' );   
             $this->db->set('Value',   $Severity_of_Attack ); 
             $this->db->set('MonitoringDate',$conDMY);
             $this->db->set('Clinic','Epilepsy Clinic');
             $ck67=$this->db->insert($tb);
             
             /*
                  if( $ck67 )
                    {
                        echo "บันทึกสำเร็จ  Severity_of_Attack ";
                    }
                    else
                    {
                         echo "บันทึกล้มเหลว";
                    }
                */    
                    
         }
         
         
    
         
         
             
             /*
              *             SELECT *
FROM `laboratorytype`
WHERE `LabCode`
IN ( 64, 66, 67, 101 )
LIMIT 0 , 30
            * 
              */
             
             
           
       }
       
}