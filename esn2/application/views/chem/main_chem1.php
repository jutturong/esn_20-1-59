<!-- http://localhost/ci/index.php/general/loadGeneral/ -->
<script type="text/javascript">
    function submitChem1()
    {
        //$.messager.alert('t');
        /*
        $('#fr_general').form({
            url:'<?=base_url()?>index.php/general/saveGEN',
            success:function(){
                alert('t');
            }
            
        });
        */
        $('#fr_chem1').form('submit',{
            url:'<?=base_url()?>index.php/chem/saveChem1',
            //#http://localhost/ci/index.php/blood/saveBlood 
            onSubmit:function(){
                //alert('t');
            },
            success:function(data)
            {
               //alert(data);
               $('#win_chem1').window('close');
               $('#dg_chem1').datagrid('reload');
            }
        });   
    }
</script>


<table id="dg_chem1" class="easyui-datagrid" data-options=" 
       iconCls:'icon-print',
       url:'<?=base_url()?>index.php/chem/loadChem1/',
       columns:[[
            { field:'MonitoringDate',title:'Date',width:100   },
            { field:'HN',title:'HN',width:100   },
          //  { field:'Lab',title:'Lab',width:100   },
             { field:'Lab_detail',title:'Lab',width:100   },
            { field:'Value',title:'Value',width:100   },
            
               ]],
        toolbar:[ { iconCls:'icon-add',handler:function()
                     { 
                           //alert('t'); 
                           
                           $('#win_chem1').window('open');
                     } 
                   } 
                   ,
                   {
                     iconCls:'icon-remove',handler:function()
                     {
                        var  row=$('#dg_chem1').datagrid('getSelected');
                        if( row )
                        {
                            //alert(row);
                            //http://localhost/ci/index.php/general/callGEN_HN/ES0597
                            $.post('<?=base_url()?>index.php/chem/delChem1',{ MonitoringDate: row.MonitoringDate , Lab: row.Lab, HN: row.HN },function(data)
                            {
                              var ck=data.result;
                              if( ck == 1 )
                              {
                               var  ms =$.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลแล้ว','info');
                                  if (ms )
                                   {   $('#dg_chem1').datagrid('reload');   }
                                
                              }
                              else if (ck == 0 )
                              {
                               var  ms= $.messager.alert('สถานะการลบข้อมูล','เกิดข้อผิดพลาด','error');
                                  if(ms ){  $('#dg_chem1').datagrid('reload'); }
                                
                              }
                              
                            },'json');
                        }
                     }
                      
                   }
                   ]       
               
       ">
    
</table>


<div id="win_chem1" class="easyui-window" title="Chem. 1 (เพิ่มข้อมูล)" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:500px;height:600px;padding:10px;">
    <form id="fr_chem1" method="post" class="easyui-form">
            <table cellpadding="5">
                <tr>
                    <td>
                        HN :
                    </td>
                    <td>
                        <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_chem1" name="HN_chem1" data-options="iconCls:'icon-man',readonly:true " required="require" >
            
                    </td>
                </tr>
                
                <tr>
                    <td>
                       Date : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_chem1" name="MonitoringDate_chem1"  required="true">
                    </td>
                </tr>
                
                <tr>
                    <td>
                       BS : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="bs" name="bs" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     <td>Cl :</td>
                    <td><input class="easyui-textbox" id="cl" name="cl" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mEq/L</td>
               
                </tr>
                
                <tr>
                    <td>
                       BUN : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="bun" name="bun" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     <td>Ca :</td>
                    <td><input class="easyui-textbox" id="ca" name="ca" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                </tr>
                
                 <tr>
                    <td>
                       SCr : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="scr" name="scr" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     <td>P :</td>
                    <td><input class="easyui-textbox" id="p" name="p" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                </tr>
                 
              <tr>
                    <td>
                       CLCr : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="clcr" name="clcr" style="width:70px;height:30px" type="text"  data-options="iconCls:'icon-lock','readonly':true " ></input> mL/min</td>
               
                     <td>TP :</td>
                    <td><input class="easyui-textbox" id="tp" name="tp" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> g/dL</td>
               
                </tr>
                
                 <tr>
                    <td>
                       Uric acid : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="uric" name="uric" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add' " ></input> mg/dL</td>
               
                     <td>Alb :</td>
                    <td><input class="easyui-textbox" id="alb" name="alb" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> g/dL</td>
               
                </tr>
              
                 <tr>
                    <td>
                       Na : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="na" name="na" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add' " ></input> mEq/L</td>
               
                     
                </tr>
                
               <tr>
                    <td>
                       K : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="k" name="k" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add' " ></input> mEq/L</td>
               
                     
                </tr>
                
                 <tr>
                    <td>
                        HCO<sub>3</sub> : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="hco" name="hco" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add' " ></input> mEq/L</td>
               
                     
                </tr>
              
                
              
                
                
               
                
                <tr>
                    <td colspan="2">
                       
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-picture'  " onclick="submitChem1();">เพิ่มข้อมูล</a>
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove'  " onclick="javascript:$('#win_chem1').window('close');">ปิดหน้าต่าง</a>
                    </td>
                    </tr>
                
            </table>
        </form>     
</div>