
<!-- http://localhost/ci/index.php/general/loadGeneral/ -->
<script type="text/javascript">
    function submitGEN()
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
        $('#fr_general').form('submit',{
            url:'<?=base_url()?>index.php/general/saveGEN',
            //http://localhost/ci/index.php/general/saveGEN
            onSubmit:function(){
                //alert('t');
            },
            success:function(data)
            {
               //alert(data);
               $('#win_general').window('close');
               $('#dg_general').datagrid('reload');
            }
        });   
    }
</script>


<table id="dg_general" class="easyui-datagrid" data-options=" 
       iconCls:'icon-print',
       url:'<?=base_url()?>index.php/general/loadGeneral/',
       columns:[[
            { field:'MonitoringDate',title:'Date',width:100   },
            { field:'HN',title:'HN',width:100   },
         //   { field:'Lab',title:'Lab',width:100   },
            { field:'Lab_detail',title:'Lab',width:100   },
            { field:'Value',title:'Value',width:100   },
            
               ]],
        toolbar:[ { iconCls:'icon-add',handler:function()
                     { 
                           //alert('t'); 
                           
                           $('#win_general').window('open');
                     } 
                   } 
                   ,
                   {
                     iconCls:'icon-remove',handler:function()
                     {
                        var  row=$('#dg_general').datagrid('getSelected');
                        if( row )
                        {
                            //alert(row);
                            //http://localhost/ci/index.php/general/callGEN_HN/ES0597
                            $.post('<?=base_url()?>index.php/general/delGEN',{ MonitoringDate: row.MonitoringDate , Lab: row.Lab, HN: row.HN },function(data)
                            {
                              var ck=data.result;
                              if( ck == 1 )
                              {
                               var  ms =$.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลแล้ว','info');
                                  if (ms )
                                   {   $('#dg_general').datagrid('reload');   }
                                
                              }
                              else if (ck == 0 )
                              {
                               var  ms= $.messager.alert('สถานะการลบข้อมูล','เกิดข้อผิดพลาด','error');
                                  if(ms ){  $('#dg_general').datagrid('reload'); }
                                
                              }
                              
                            },'json');
                        }
                     }
                      
                   }
                   ]       
               
       ">
    
</table>



<div id="win_general" class="easyui-window" title="General (เพิ่มข้อมูล)" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:500px;height:500px;padding:10px;">
    <form id="fr_general" method="post" class="easyui-form">
            <table cellpadding="5">
                <tr>
                    <td>
                        HN :
                    </td>
                    <td>
                        <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_gen" name="HN_gen" data-options="iconCls:'icon-man',readonly:true " required="require" >
            
                    </td>
                </tr>
                
                <tr>
                    <td>
                       Date : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_gen" name="MonitoringDate_gen" required="true">
                    </td>
                </tr>
                
                <tr>
                    <td>Weight : </td>
                    <td><input class="easyui-textbox" id="weight" name="weight" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-man'" ></input> kg.</td>
                </tr>
                <tr>
                    <td>Height : </td>
                    <td><input class="easyui-textbox" id="height" name="height" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-man'" ></input> cm.</td>
                </tr>
                <tr>
                    <td>BSA : </td>
                    <td><input class="easyui-textbox"  id="bsa" name="bsa" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-man','readonly':true " ></input> m<sup>2</sup>.</td>
                </tr>
                <tr>
                    <td>RR : </td>
                    <td><input class="easyui-textbox"  id="rr" name="rr"  style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-man' " ></input> times/min</td>
                </tr>
                <tr>
                    <td>HR : </td>
                    <td><input class="easyui-textbox" id="hr" name="hr" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-man' " ></input> bmp</td>
                </tr>
                <tr>
                    <td>BP : </td>
                    <td><input class="easyui-textbox" id="bp" name="bp" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-man' " ></input> mm Hg</td>
                </tr>
                <tr>
                    <td>BT : </td>
                    <td><input class="easyui-textbox" id="bt" name="bt" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-man' " ></input> C</td>
                </tr>
                
                <tr>
                    <td colspan="2">
                       
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-picture'  " onclick="submitGEN();">เพิ่มข้อมูล</a>
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove'  " onclick="javascript:$('#win_general').window('close');">ปิดหน้าต่าง</a>
                    </td>
                    </tr>
                
            </table>
        </form>     
</div>