<!-- http://localhost/ci/index.php/general/loadGeneral/ -->
<script type="text/javascript">
    function submitTDM()
    {
       
        $('#fr_tdm').form('submit',{
           // url:'<?=base_url()?>index.php/tdm/saveTDM',
             url:url,
            //#http://localhost/ci/index.php/blood/saveBlood 
            onSubmit:function(){
                //alert('t');
            },
            success:function(data)
            {
               //alert(data);
               $('#win_tdm').window('close');
               $('#dg_tdm').datagrid('reload');
            }
        });   
    }
</script>


<table id="dg_tdm" class="easyui-datagrid" style="width:1600px;" data-options=" 
       iconCls:'icon-print',
       //http://localhost/ci/index.php/tdm/loadTdm/
       url:'<?=base_url()?>index.php/tdm/loadTdm/',
       columns:[[
            { field:'MonitoringDate',title:'MonitoringDate',width:100   },
            { field:'HN',title:'HN',width:80   },
           // { field:'Lab',title:'Lab',width:50   },
             { field:'Lab_detail',title:'Lab',width:200   },
            { field:'AnalysisDate',title:'AnalysisDate',width:100   },
            { field:'Ward',title:'Ward',width:100 },
            { field:'Indication',title:'Indication',width:100 },
            { field:'Vd',title:'Vd',width:90 },
            { field:'Cl',title:'Cl',width:90 },
            { field:'CLUnit',title:'CLUnit',width:90 },
            { field:'Ke',title:'Ke',width:90 },
            { field:'KeUnit',title:'KeUnit',width:90 },
            { field:'T1div2',title:'T1/2',width:90 },
            { field:'T1div2Unit',title:'T1/2Unit',width:90 },
            { field:'Assessment',title:'Assessment',width:90 },
            { field:'Interpretation',title:'Interpretation',width:300 },
            { field:'NB',title:'NB',width:200 },
            { field:'drug',title:'drug',width:50 },
            { field:'dmy_interpret',title:'Interpret Date',width:100 },
            { field:'dmy_followup',title:'Follow Up',width:100  },
            { field:'week',title:'week',width:50  },
            
               ]],
        toolbar:[ { text:'เพิ่มข้อมูล Drug level',iconCls:'icon-add',handler:function()
                     { 
                           //alert('t'); 
                           
                           $('#win_tdm').window('open');
                           url = '<?=base_url()?>index.php/tdm/saveTDM'; 
                     } 
                   } 
                   ,
                   {
                     text:' ลบข้อมูล Drug level ', iconCls:'icon-remove',handler:function()
                     {
                        var  row=$('#dg_tdm').datagrid('getSelected');
                        if( row )
                        {
                            //alert(row);
                            //http://localhost/ci/index.php/general/callGEN_HN/ES0597
                            
                            $.post('<?=base_url()?>index.php/tdm/delTDM',{ MonitoringDate: row.MonitoringDate , Lab: row.Lab, HN: row.HN },function(data)
                            {
                              var ck=data.result;
                              if( ck == 1 )
                              {
                               var  ms =$.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลแล้ว','info');
                                  if (ms )
                                   {   $('#dg_tdm').datagrid('reload');   }
                                
                              }
                              else if (ck == 0 )
                              {
                               var  ms= $.messager.alert('สถานะการลบข้อมูล','เกิดข้อผิดพลาด','error');
                                  if(ms ){  $('#dg_tdm').datagrid('reload'); }
                                
                              }
                              
                            },'json');
                        }
                     }
                      
                   }
                   ,
                   {
                     text:'Reload ข้อมูล' , iconCls:' icon-reload ' ,
                      handler:function(data){ 
                          $('#dg_tdm').datagrid('reload');
                     }
                   },
                   {
                     text:' แก้ไขข้อมูล ',
                     iconCls:' icon-cut ',
                     handler:function(data){
                        
                        var  row=$('#dg_tdm').datagrid('getSelected');
                        if( row )
                        {
                           //url= '<?=base_url()?>index.php/tdm/updateTDM/' +  row.HN + '/' + row.MonitoringDate ;            
                           $('#win_tdm').window('open');
                           $('#fr_tdm').form('load', '<?=base_url()?>index.php/tdm/fetchTDM/' +  row.HN  + '/' + row.MonitoringDate );
                           url = '<?=base_url()?>index.php/tdm/updateTDM/' +  row.HN + '/' +  row.MonitoringDate;
                           
                           /*
                           $('#fr_tdm').form('load',{
                               HN_tdm:'HN',                              
                           });
                           */
                        }
                     },
                   }
                   ]       
               
       ">
    
</table>


<div id="win_tdm" class="easyui-window" title="Progress AND Action ( เพิ่มข้อมูล/แก้ไขข้อมูล )" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:500px;height:600px;padding:10px;">
    <form id="fr_tdm" method="post" class="easyui-form">
            <table cellpadding="5">
                <tr>
                    <td>
                        HN :
                    </td>
                    <td>
                        <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_tdm" name="HN_tdm" data-options="iconCls:'icon-man',readonly:true " required="require" >
            
                    </td>
                </tr>
                
                <tr>
                    <td>
                       MonitoringDate : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_tdm" name="MonitoringDate_tdm"  required="true">
                    </td>
                </tr>
                
                
                
                <!--
                <tr>
                    <td>
                       BUN : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="bun" name="bun" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     <td>Ca :</td>
                    <td><input class="easyui-textbox" id="ca" name="ca" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                </tr>
                -->
                
                <tr>
                   <td>
                       Drug : 
                   </td>
                   <td>
                       <!--
                       <input class="easyui-combobox" id="" name="" data-options=" 
                              iconCls:'icon-main',
                              ulr:''
                              "
                              >
                         -->
                         <select class="easyui-combobox" name="drug" id="drug" style="width:200px;height: 40px" data-options="iconCls:'icon-man' " >
                            <option value=""> เลือก </option>
                             <option value="1">Phenytoion Level - Total</option>
                             <option value="2">Sodium Valproate Level - Total</option>
                             <option value="3">Phenobarbital - Level</option>
                             <option value="4">Carbamazepine - Level</option>
                             <option value="5">Phenytoin Level - Free</option>
                             <option value="6">Sodium Valproate Level - Free</option>
                         </select>
                       
                   </td>
                </tr>
             
                <tr>
                    <td>Interpret Date :</td>
                    <td>
                        <input class="easyui-datebox" id="dmy_interpret" name="dmy_interpret" style="height: 30px" />
                    </td>
                </tr>
               
              <tr>
                    <td>Analysis Date :</td>
                    <td>
                        <input class="easyui-datebox" id="dmy_analysis" name="dmy_analysis" style="height: 30px" />
                    </td>
                </tr>
               
             
               <tr>
                    <td>Ward :</td>
                    <td>
                        <input class="easyui-textbox" id="ward" name="ward" style="height: 30px" data-options=" prompt :'Insert Ward' " />
                    </td>
                </tr> 
               
              
               <tr>
                   <td>
                       Indication : 
                   </td>
                   <td>
                       <!--
                       <input class="easyui-combobox" id="" name="" data-options=" 
                              iconCls:'icon-main',
                              ulr:''
                              "
                              >
                         -->
                         <select class="easyui-combobox" name="Indication" id="Indication" style="width:200px;height: 40px" data-options="iconCls:'icon-man' " >
                            <option value=""> เลือก </option>
                             <option value="1">Phenytoion Level - Total</option>
                             <option value="2">Sodium Valproate Level - Total</option>
                             <option value="3">Phenobarbital - Level</option>
                             <option value="4">Carbamazepine - Level</option>
                             <option value="5">Phenytoin Level - Free</option>
                             <option value="6">Sodium Valproate Level - Free</option>
                         </select>
                       
                   </td>
                </tr> 
              
                <tr>
                    <td>Pharmacoldnetic Parameters :</td>
                    <td>
                        <input class="easyui-textbox" data-options=" iconCls:'icon-lock',readonly:true " style="width: 100px;height: 30px" id="pharmacoldnetic_parameters" name="pharmacoldnetic_parameters" />
                    </td>
                </tr>
                
                <tr>
                    <td>Vd :</td>
                    <td>
                        <input class="easyui-textbox" data-options=" prompt:' Enter Vd ' " style="width: 100px;height: 30px" id="vd" name="vd" />
                        Litre
                    </td>
                </tr>
                
                <tr>
                    <td>Ke :</td>
                    <td>
                        <select class="easyui-combobox" name="ke" id="ke" style="width:100px;height: 40px" data-options="iconCls:'icon-man' " >
                            <option value=""> เลือก </option>
                             <option value="1">hr-1</option>
                             <option value="2">day-1</option>
                            
                         </select> 
                    </td>
                </tr>
                
                <tr>
                    <td>T1/2 :</td>
                    <td>
                        <select class="easyui-combobox" name="t1" id="t1" style="width:100px;height: 40px" data-options="iconCls:'icon-man' " >
                            <option value=""> เลือก </option>
                             <option value="1">hr</option>
                             <option value="2">day</option>
                            
                         </select> 
                    </td>
                </tr>
                
                <tr>
                    <td>Assessment :</td>
                    <td>
                        <select class="easyui-combobox" name="assessment" id="assessment" style="width:200px;height: 40px" data-options="iconCls:'icon-man' " >
                            <option value=""> เลือก </option>
                             <option value="1">Therapentic</option>
                             <option value="2">Subtherapeutic</option>
                             <option value="3">Overtherapeutic</option>
                             <option value="4">Toxic</option>
                             <option value="5">Uninterpertation</option>
                             <option value="6">Undetectable</option>
                         </select> 
                    </td>
                </tr>
                
                
                <tr>
                    <td>Interpretation and Recommendation :</td>
                    <td>
                        <input class="easyui-textbox" data-options=" iconCls:'icon-lock',readonly:true " style="width: 100px;height: 30px" id="Interpretation" name="Interpretation" />
                     
                    </td>
                </tr>
                
                <tr>
                    <td>N.B. :</td>
                    <td>
                        <input class="easyui-textbox" data-options=" prompt:' Enter N.B. ' " style="width: 150px;height: 30px" id="nb" name="nb" />
                       
                    </td>
                </tr>
                
                <tr>
                    <td>Follow Up :</td>
                    <td>
                       <!-- <input class="easyui-textbox" data-options=" prompt:' Enter Follow Up ' " style="width: 140px;height: 30px" id="followup" name="followup" /> -->
                       <input class="easyui-datebox" id="followup" name="followup" style="height: 30px" />
                    </td>
                </tr>
                
                 <tr>
                    <td>week :</td>
                    <td>
                        <input class="easyui-textbox" data-options=" prompt:' Enter week  ' " style="width: 100px;height: 30px" id="week" name="week" />
                       
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                       
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'  " onclick="submitTDM();"> เพิ่มข้อมูล / แก้ไขข้อมูล </a>
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove'  " onclick="javascript:$('#win_tdm').window('close');">ปิดหน้าต่าง</a>
                    </td>
                    </tr>
                
            </table>
        </form>     
</div>




