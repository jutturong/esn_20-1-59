<!-- http://localhost/ci/index.php/general/loadGeneral/ -->
<script type="text/javascript">
    function submitBlood()
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
        $('#fr_blood').form('submit',{
            url:'<?=base_url()?>index.php/blood/saveBlood',
            //#http://localhost/ci/index.php/blood/saveBlood 
            onSubmit:function(){
                //alert('t');
            },
            success:function(data)
            {
               //alert(data);
               $('#win_blood').window('close');
               $('#dg_blood').datagrid('reload');
            }
        });   
    }
</script>


<table id="dg_blood" class="easyui-datagrid" data-options=" 
       iconCls:'icon-print',
       url:'<?=base_url()?>index.php/blood/loadBlood/',
       columns:[[
            { field:'MonitoringDate',title:'Date',width:100   },
            { field:'HN',title:'HN',width:100   },
            { field:'Lab',title:'Lab',width:100   },
            { field:'Value',title:'Value',width:100   },
            
               ]],
        toolbar:[ { iconCls:'icon-add',handler:function()
                     { 
                           //alert('t'); 
                           
                           $('#win_blood').window('open');
                     } 
                   } 
                   ,
                   {
                     iconCls:'icon-remove',handler:function()
                     {
                        var  row=$('#dg_blood').datagrid('getSelected');
                        if( row )
                        {
                            //alert(row);
                            //http://localhost/ci/index.php/general/callGEN_HN/ES0597
                            $.post('<?=base_url()?>index.php/blood/delBlood',{ MonitoringDate: row.MonitoringDate , Lab: row.Lab, HN: row.HN },function(data)
                            {
                              var ck=data.result;
                              if( ck == 1 )
                              {
                               var  ms =$.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลแล้ว','info');
                                  if (ms )
                                   {   $('#dg_blood').datagrid('reload');   }
                                
                              }
                              else if (ck == 0 )
                              {
                               var  ms= $.messager.alert('สถานะการลบข้อมูล','เกิดข้อผิดพลาด','error');
                                  if(ms ){  $('#dg_blood').datagrid('reload'); }
                                
                              }
                              
                            },'json');
                        }
                     }
                      
                   }
                   ]       
               
       ">
    
</table>


<div id="win_blood" class="easyui-window" title="Blood (เพิ่มข้อมูล)" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:500px;height:500px;padding:10px;">
    <form id="fr_blood" method="post" class="easyui-form">
            <table cellpadding="5">
                <tr>
                    <td>
                        HN :
                    </td>
                    <td>
                        <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_blood" name="HN_blood" data-options="iconCls:'icon-man',readonly:true " required="require" >
            
                    </td>
                </tr>
                
                <tr>
                    <td>
                       Date : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_blood" name="MonitoringDate_blood" required="true">
                    </td>
                </tr>
                
                <tr>
                    <td>
                       Hb : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="hb" name="hb" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> g/dL</td>
               
                     <td>L :</td>
                    <td><input class="easyui-textbox" id="L" name="L" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
               
                </tr>
                
                 <tr>
                    <td>
                       Hct : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="hct" name="hct" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
               
                   <td>M :</td>
                    <td><input class="easyui-textbox" id="M" name="M" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
                
                    
                </tr>
                
                <tr>
                    <td>
                       Wbc : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="wbc" name="wbc" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> C/mm<sup>3</sup></td>
               
                      <td>E :</td>
                    <td><input class="easyui-textbox" id="E" name="E" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
                
                    
                </tr>
                
                <tr>
                    <td>
                       Platelet : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="platelet" name="platelet" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> C/mm<sup>3</sup></td>
               
                     <td>B :</td>
                    <td><input class="easyui-textbox" id="B" name="B" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
                
                </tr>
                
                <tr>
                    <td>
                       Blast : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="blast" name="blast" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
               
                     <td>INR :</td>
                    <td><input class="easyui-textbox" id="inr" name="inr" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> </td>
                
                    
                </tr>
                
                 <tr>
                    <td>
                       Band : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="band" name="band" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
               
                      <td>PT :</td>
                    <td><input class="easyui-textbox" id="pt" name="pt" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> sec</td>
                
                </tr>
                
                <tr>
                    <td>
                       PMN : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="pmn" name="pmn" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> %</td>
               
                     <td>aPTT :</td>
                    <td><input class="easyui-textbox" id="aptt" name="aptt" style="width:120px;height:30px" type="text"  data-options="iconCls:'icon-add'" ></input> sec</td>
                
                    
                </tr>
                
                 <tr>
                    <td>
                       ANC : 
                    </td>
                    
                    <td><input class="easyui-textbox" id="anc" name="anc" style="width:120px;height:30px" type="text"  data-options=" 'readonly':true " ></input> Cell</td>
               
                </tr>
               
                
                <tr>
                    <td colspan="2">
                       
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-picture'  " onclick="submitBlood();">เพิ่มข้อมูล</a>
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove'  " onclick="javascript:$('#win_blood').window('close');">ปิดหน้าต่าง</a>
                    </td>
                    </tr>
                
            </table>
        </form>     
</div>