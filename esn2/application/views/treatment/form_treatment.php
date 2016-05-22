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
    <div style="margin:0px 0 5px 5;"></div>
    <table  id="dg_treatment" class="easyui-datagrid" title=" OPD Medication Profile (รายการยาทั้งหมด) " style="width:600px;height:350px"
            data-options="rownumbers:true,
            pagination:true,
            singleSelect:true,
            collapsible:true,
            url:'<?=base_url()?>index.php/welcome/treatment/',
            method:'post',
            toolbar:[    
              {  text:'Delete',iconCls:'icon-cancel', handler:function()
                    {   
                             // var  id_treatment
                             //alert('t');
                             var  row=$('#dg_treatment').datagrid('getSelected');
                             if( row )
                             {
                                   //alert('t');
                                   var  id_treatment=row.id_treatment;
                                  // alert(id_treatment);
                                   var  url='<?=base_url()?>index.php/welcome/del_treatment/' +   id_treatment  ;
                                    //  alert( url );
                                     $.post(url,function(data)
                                     {
                                          // alert(data);
                                           if( data == '1'  )
                                     {
                                            $.messager.alert('สถานะการลบข้อมูล','ลบสำเร็จ','Info');
                                            //$('#dia_treatment').dialog('close');
                                            $('#dg_treatment').datagrid('reload');
                                     }
                                     else
                                     {
                                            $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลล้มเหลว','Err');
                                            //$('#dia_treatment').dialog('close');
                                            $('#dg_treatment').datagrid('reload');
                                      }
                                     });
                                   
                             }
                    }  
               },
               {
                    text:'Insert', iconCls:'icon-add', handler:function(){   $('#dia_treatment').dialog('open');   }
               },
               {    text:'Reload',iconCls:'icon-reload',handler:function(){  $('#dg_treatment').datagrid('reload');  }   },
               {   text:'Edit',iconCls:'icon-edit', handler:function()
                         {
                                   var   row=$('#dg_treatment').datagrid('getSelected');
                                   if(row)
                                   {
                                           var   id_treatment=row.id_treatment;
                                           //alert( id_treatment );
                                             if( id_treatment > 0 )
                                             {
                                                   $('#dia_treatment').dialog('open');
                                                  
                                                   $('#id_treatment').textbox('setValue',id_treatment);
                                                   var  url='http://drugstore.kku.ac.th/esn2/index.php/welcome/fetch_treatment/'  + id_treatment;
                                                    //alert(url);
                                                    $.getJSON(url,function(data)
                                                          {
                                                                    //alert(data);
                                                                     $.each(data,function(v,k)
                                                                         {
                                                                                    $('#dia_treatment').dialog('open');
                                                                                    $('#fr_drug').form('load',{
                                                                                       
                                                                                         MonitoringDate:k.MonitoringDate,
                                                                                         Drug_ProductID:k.Drug_ProductID,
                                                                                         DosageRegimen:k.DosageRegimen,
                                                                                         Amount:k.Amount,
                                                                                         
                                                                                         
                                                                                 });
                                                                         });
                                                          });
                                             }
                                   }
                         
                         }     
                },
                {
                      text:'Search',iconCls:'icon-search',handler:function()
                             {
                                    //alert('t');
                                      $('#dia_sr_treatment').dialog('open');
                                      
                                      
                             }
                }
            ]
            ">   
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
   
    <!--
 <div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" >New User</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" >Edit User</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" >Remove User</a>
</div>   
    -->
    
</div>