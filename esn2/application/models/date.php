<?php
class  Date  extends CI_Model {
    var $title   = '';
    var $content = '';
    var $date    = '';
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function  conv_date($dmy)// change  date format  y-m-d
    {
        if( strlen($dmy) > 0 )
        {
            //echo "T";
            $ex=explode("/",$dmy);
            return  $ex[2]."-".$ex[0]."-".$ex[1]; 
        }
    }
    function conv_date_time($dmy)
    {
        if( strlen($dmy) > 0 )
        {
            $ex1=  explode(" ",$dmy);
            //echo $ex1[0];
            $dmy=explode("/",$ex1[0]);
            $dmy1= $dmy[2]."-".$dmy[0]."-".$dmy[1];
            
            return  $dmy1." ".$ex1[1];
        }
    }
    
    function  ck_insert($id_diagnosis,$fup,$fname,$tb)
    {
        if( !empty($fname) )
        {
               $this->db->where("id_diagnosis",$id_diagnosis);
               $data=array($fup=>$fname);
               return $this->db->update($tb,$data);
        }
    }
    
    function conv_date_time_check($dmy,$fname,$id_diagnosis)
    {
        /*
         if( strlen($Sampling_Time_up) > 0 )
                {                  
                    $pos=strpos($Sampling_Time_up,":");
                    if($pos > 1 )
                    {
                        $ex1=  explode(" ",$Sampling_Time_up);
                       
                        if( strlen($ex1[1]) > 0 )
                        {
                           echo  $conv_Sampling_Time_up=$this->date->conv_date($ex1[0])." ".$ex1[1];
                           $this->date->ck_insert($id_diagnosis,"sampling_time",$conv_Sampling_Time_up,$tb);
                        }
                    }
                    else
                    {
                        $conv_Sampling_Time_up=$this->date->conv_date($Sampling_Time_up);
                         $this->date->ck_insert($id_diagnosis,"sampling_time",$conv_Sampling_Time_up,$tb);
                    }
                }
           */
        
        if( strlen($dmy) > 0 )
        {
            $pos=strpos($dmy,":");
            if($pos > 1 )
                    {
                        $ex1=  explode(" ",$dmy);
                        if( strlen($ex1[1]) > 0 )
                        {
                           $conv_Sampling_Time_up=$this->date->conv_date_time($ex1[0])." ".$ex1[1];
                          return $this->date->ck_insert($id_diagnosis,$fname,$conv_Sampling_Time_up,$tb);
                        }
                    }
            else
                    {
                         //$conv_Sampling_Time_up=$this->date->conv_date($dmy);
                         
                        
                         if( strlen($dmy) > 0 && !empty($dmy) )
                         {
                             $ex1=explode("/",$dmy);
                           return  $ex1[2]."-".$ex1[0]."-".$ex1[1];        
                         }
                         //$this->date->ck_insert($id_diagnosis,$fname,$conv_Sampling_Time_up,$tb);
                    }
        }
        
    }
    
    function  cv_date()
    {
        echo "test modal";
    }
}
?>