<script type="text/javascript">
        function  call_drug1()
        {
          $(function()
           {
              // alert('t');
               $("#fr_treatment").dialog({
                   title:'แสดงรายการยาทั้งหมด ( Medication Profile ) ',
                   width:700,
                   height:500,
                   close:false,
                   cache:false,
                   modal:true
               });
           });
        }   
</script>




        

<div id="fr_treatment">           
    <div style="margin:0px 0 10px 10;"></div>
    <table class="easyui-datagrid" title=" OPD Medication Profile (รายการยาทั้งหมด) " style="width:600px;height:350px"
            data-options="rownumbers:true,pagination:true,singleSelect:true,collapsible:true,url:'<?=base_url()?>index.php/welcome/treatment/',method:'post'">   
        <thead>
            <tr>
               <!-- <th data-options="field:'itemid',width:80">Item ID</th>  -->
                <th data-options="field:'MonitoringDate',width:120">Date</th>
                <th data-options="field:'Drug_ProductID',width:250">Drug/Product</th>
                <th data-options="field:'DosageRegimen',width:100">DosageRegimen</th>
                <th data-options="field:'Amount',width:100">Amount</th>
            </tr>
        </thead>
</table>
   
 <div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" >New User</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" >Edit User</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" >Remove User</a>
</div>   
    
</div>