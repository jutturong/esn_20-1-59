<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
   $begin=trim($_GET['begin']);
  //echo "<br>";
   $end=trim($_GET['end']);

 //echo "<br>"; 

   $HN=trim($_GET['HN']);

$checkreport=trim($_GET['checkreport']);
//echo "<br>";

if(  !empty($begin)  &&  !empty($end)  &&  !empty($checkreport)   )
{
    switch($checkreport)
    {
        case 1:
        {
            //echo  "Demographic";
           // header( "query_report_esn_merge.php?begin=' + $begin + '&end=' +  $end" );
           // exit(0);
            ?>
<script type="text/javascript">
    window.location.assign("query_report_esn_merge.php?begin=<?=$begin?>&end=<?=$end?>&HN=<?=$HN?>");
</script>
    <?php
            break;
        }
        case 2: //Non-compliance,ADR,Midication errors,DRPs
        {
            //echo  "Drug Related Problem";
            //query_case2.php
                        ?>
<script type="text/javascript">
    window.location.assign("query_case2.php?begin=<?=$begin?>&end=<?=$end?>&HN=<?=$HN?>");
</script>
    <?php
            break;
        }
        case 3:
        {
           // echo  "Pharmacist Action";

        	if( empty($HN)  )
        	{
                                    ?>
<script type="text/javascript">
    window.location.assign("query_case3.php?begin=<?=$begin?>&end=<?=$end?>&HN=<?=$HN?>");
</script>
    <?php
            }
            else
            {
               #http://www.esn.com/report_pdf/appendix_report/query_case3_hn.php?begin=03-11-2542&end=07-11-2557&HN=AA0096
            	?>
<script type="text/javascript">
    window.location.assign("query_case3_hn.php?begin=<?=$begin?>&end=<?=$end?>&HN=<?=$HN?>");
</script>
                <?php
            }
            break;
        }
        
    }
    
}
 

?>

