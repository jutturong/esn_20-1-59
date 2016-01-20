<!-- http://localhost/ci/index.php/general/loadGeneral/ -->
<script type="text/javascript">
    function submitChem2()
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
        $('#fr_chem2').form('submit',{
            url:'<?=base_url()?>index.php/chem/saveChem2',
            //#http://localhost/ci/index.php/blood/saveBlood 
            onSubmit:function(){
                //alert('t');
            },
            success:function(data)
            {
               //alert(data);
               $('#win_chem2').window('close');
               $('#dg_chem2').datagrid('reload');
            }
        });   
    }
</script>


<table id="dg_chem2" class="easyui-datagrid" data-options=" 
       iconCls:'icon-print',
       url:'<?=base_url()?>index.php/chem/loadChem2/',
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
                           
                           $('#win_chem2').window('open');
                     } 
                   } 
                   ,
                   {
                     iconCls:'icon-remove',handler:function()
                     {
                        var  row=$('#dg_chem2').datagrid('getSelected');
                        if( row )
                        {
                            //alert(row);
                            //http://localhost/ci/index.php/general/callGEN_HN/ES0597
                            $.post('<?=base_url()?>index.php/chem/delChem2',{ MonitoringDate: row.MonitoringDate , Lab: row.Lab, HN: row.HN },function(data)
                            {
                              var ck=data.result;
                              if( ck == 1 )
                              {
                               var  ms =$.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลแล้ว','info');
                                  if (ms )
                                   {   $('#dg_chem2').datagrid('reload');   }
                                
                              }
                              else if (ck == 0 )
                              {
                               var  ms= $.messager.alert('สถานะการลบข้อมูล','เกิดข้อผิดพลาด','error');
                                  if(ms ){  $('#dg_chem2').datagrid('reload'); }
                                
                              }
                              
                            },'json');
                        }
                     }
                      
                   }
                   ]       
               
       ">
    
</table>


<div id="win_chem2" class="easyui-window" title="Chem. 2 (เพิ่มข้อมูล)" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:500px;height:600px;padding:10px;">
    <form id="fr_chem2" method="post" class="easyui-form">
            <table cellpadding="5">
                <tr>
                    <td>
                        HN :
                    </td>
                    <td>
                        <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_chem2" name="HN_chem2" data-options="iconCls:'icon-man',readonly:true " required="require" >
            
                    </td>
                </tr>
                
                <tr>
                    <td>
                       Date : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_chem2" name="MonitoringDate_chem2"  required="true">
                    </td>
                </tr>
                
                <tr>
                    <td>
                       TB : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="tb" name="tb" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     <td>LDL :</td>
                    <td><input class="easyui-textbox" id="ldl" name="ldl" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                </tr>
                
                <tr>
                    <td>
                       DB : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="db" name="db" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     <td>A1C :</td>
                    <td><input class="easyui-textbox" id="a1c" name="a1c" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
               
                </tr>
                
                 <tr>
                    <td>
                       ALT : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="alt" name="alt" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> U/L</td>
               
                     <td>CK :</td>
                    <td><input class="easyui-textbox" id="ck" name="ck" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> U/L</td>
               
                </tr>
                
              <tr>
                    <td>
                       AST : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="ast" name="ast" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> U/L</td>
               
                     <td>CK-MB :</td>
                    <td><input class="easyui-textbox" id="ckmb" name="ckmb" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> U/L</td>
               
                </tr>
                
             <tr>
                    <td>
                       ALP : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="alp" name="alp" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> U/L</td>
               
                     <td>Trop-T :</td>
                    <td><input class="easyui-textbox" id="trop_t" name="trop_t" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> U/L</td>
               
                </tr> 
                
                
                 <tr>
                    <td>
                       Chol : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="chol" name="chol" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     
                </tr> 
                
                <tr>
                    <td>
                       TG : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="tg" name="tg" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     
                </tr> 
                
               
                <tr>
                    <td>
                       HDL : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="hdl" name="hdl" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> mg/dL</td>
               
                     
                </tr> 
                
                
                <tr>
                    <td colspan="2">
                       
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-picture'  " onclick="submitChem2();">เพิ่มข้อมูล</a>
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove'  " onclick="javascript:$('#win_chem2').window('close');">ปิดหน้าต่าง</a>
                    </td>
                    </tr>
                
            </table>
        </form>     
</div>