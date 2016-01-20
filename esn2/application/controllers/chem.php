<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chem extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
var  $tb_main="04__monitoring";
            //`04__monitoring`
  
// chem1 23 to 36 

 

       public function __construct()
       {
                
         parent::__construct();
         // $this->load->library('encrypt');
         $this->load->helper('date');
         $this->load->model('user_model');
         $this->load->library('session');
         
         //in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)
         
       }
       # http://localhost/ci/index.php/chem/loadChem1/
       public  function loadChem1()
       {
           $tb=$this->tb_main;
           $tb_sub="laboratorytype";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
         
           //// chem1 23 to 36 
           $name=array(23,24,25,26,27,28,29,30,31,32,33,34,35,36);
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
       
       

       # http://localhost/ci/index.php/chem/loadChem2/
       public  function loadChem2()
       {
           $tb=$this->tb_main;
           $tb_sub="laboratorytype";
          // $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic','Lab'=>'96'));
         
           ###-------------------chem2     37 to 47
           $name=array(37,38,39,40,41,42,43,44,45,46,47);
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
       
       
       public function saveChem1()
       {
         #http://localhost/ci/index.php/blood/saveBlood   
           $tb=$this->tb_main; 
           $HN_chem1= $this->input->get_post('HN_chem1');          
           $MonitoringDate_chem1=$this->input->get_post('MonitoringDate_chem1');
           $conv_MonitoringDate=$this->user_model->databox_conv($MonitoringDate_chem1);  

           /*               
LabCode
LabGroup
Lab
23
3
Blood Sugar
24
3
Urea Nitrogen
25
3
Creatinine
26
3
Uric Acid
27
3
Sodium
28
3
Potassium
29
3
Bicarbonate
30
3
Chloride
31
3
Calcium
32
3
Phosphorus
33
3
A1C
34
3
Cholesterol
35
3
Total Protein
36
3
Albumin
*/
           
           $bs=$this->input->get_post('bs'); //23
           if( $bs != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 23 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $bs );
                $this->db->insert($tb);             
          } 
          
          $bun=$this->input->get_post('bun'); //24
          if( $bun != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 24 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $bun );
                $this->db->insert($tb);             
          }
          
          $scr=$this->input->get_post('scr'); //25
          if( $scr != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 25 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $scr );
                $this->db->insert($tb);             
          }
          
          $uric=$this->input->get_post('uric'); //26
          if( $uric != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 26 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $uric );
                $this->db->insert($tb);             
          }
          
          $na=$this->input->get_post('na'); //27
          if( $na != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 27 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $na );
                $this->db->insert($tb);             
          }
          
          
           $k=$this->input->get_post('k'); //28
          if( $k != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 28 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $k );
                $this->db->insert($tb);             
          }
          
          $hco=$this->input->get_post('hco'); //29
          if( $hco != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 29 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hco );
                $this->db->insert($tb);             
          }
          
          
          $cl=$this->input->get_post('cl'); //30
          if( $cl != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 30 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $cl );
                $this->db->insert($tb);             
          }
          
          
         $ca=$this->input->get_post('ca'); //31
           if( $ca != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 31 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $ca );
                $this->db->insert($tb);             
          }
         
          $p=$this->input->get_post('p'); //32
          if( $p != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 32 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $p );
                $this->db->insert($tb);             
          }
         
          $tp=$this->input->get_post('tp'); //35
          if( $tp != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 35 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $tp );
                $this->db->insert($tb);             
          }
          
          $alb=$this->input->get_post('alb'); //36
          if( $alb != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem1 );
                $this->db->set('Lab', 36 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $alb );
                $this->db->insert($tb);             
          }
          
          
       }
       
        public function saveChem2()
       {
         #http://localhost/ci/index.php/blood/saveBlood   
           $tb=$this->tb_main; 
           $HN_chem2= $this->input->get_post('HN_chem2');          
           $MonitoringDate_chem2=$this->input->get_post('MonitoringDate_chem2');
           $conv_MonitoringDate=$this->user_model->databox_conv($MonitoringDate_chem2);  

        $chol=$this->input->get_post('tb');
         if( $chol != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 34 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $chol );
                $this->db->insert($tb);             
          }  
        $a1c=$this->input->get_post('a1c');
        if( $chol != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 33 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $a1c );
                $this->db->insert($tb);             
          }
          
          
           //###-------------------chem2     37 to 47
           
         $tb_chem=$this->input->get_post('tb');
         if( $tb_chem != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 37 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $tb_chem );
                $this->db->insert($tb);             
          }
          
        $db=$this->input->get_post('db');
         if( $db != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 38 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $db );
                $this->db->insert($tb);             
          } 
          
         $alt=$this->input->get_post('alt');
          if( $alt != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 39 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $alt );
                $this->db->insert($tb);             
          }
          
          $ast=$this->input->get_post('ast');
           if( $ast != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 40 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $ast );
                $this->db->insert($tb);             
          }
          
          $alp=$this->input->get_post('alp');
          if( $alp != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 41 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $alp );
                $this->db->insert($tb);             
          }
          
          $ck=$this->input->get_post('ck');
          if( $ck != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 42 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $ck );
                $this->db->insert($tb);             
          }
          
          $ckmb=$this->input->get_post('ckmb');
          if( $ckmb != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 43 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $ckmb );
                $this->db->insert($tb);             
          }
          
          $trop_t=$this->input->get_post('trop_t');
           if( $ckmb != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 44 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $trop_t );
                $this->db->insert($tb);             
          }
          
          $tg=$this->input->get_post('tg');
          if( $tg != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 45 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $tg );
                $this->db->insert($tb);             
          }
          
          $hdl=$this->input->get_post('hdl');
           if( $hdl != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 46 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $hdl );
                $this->db->insert($tb);             
          }
          $ldl=$this->input->get_post('ldl');
          if( $ldl != "" )
          {             
                $this->db->set('MonitoringDate', $conv_MonitoringDate );
                $this->db->set('HN', $HN_chem2 );
                $this->db->set('Lab', 47 );
                $this->db->set('Clinic', 'Epilepsy Clinic' );  
                $this->db->set('Value', $ldl );
                $this->db->insert($tb);             
          }
          
       }
       
       public function delChem1()
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
       
       public function delChem2()
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
       
        public function  callChem1_HN()
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
           //$name=array(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22);
           $name=array(23,24,25,26,27,28,29,30,31,32,33,34,35,36);
           
           
           
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
       
       public function  callChem2_HN()
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
           //$name=array(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22);
           // $name=array(23,24,25,26,27,28,29,30,31,32,33,34,35,36);
           $name=array(37,38,39,40,41,42,43,44,45,46,47);
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