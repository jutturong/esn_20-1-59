<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        function   fr_insert()
        {
            $('#win_noncomp').window('open');
            url ='<?=base_url()?>index.php/noncomp/insertNoncomp/';
            
        }
        function  saveNon(url)
        {
            $('#fr_noncomp').form('submit',{
                url:url,
                success:function(result)
                {
                    //alert(result);
                    $("#win_noncomp").window('close');
                    $('#dg_noncomp').datagrid('reload');
                }
            });
        }
    </script>
    
</head>

<body>
    
    
    
    <div style="margin:10px 0 10px 0;"></div>
    <div class="easyui-panel" title="ตารางหลักก Non Compliance" style="width:1000px;height:200px;padding:10px;"
            data-options="
            iconCls:'icon-print',
            size:'large',
            closable:false,
            ">
       
        
        <table id="dg_noncomp" class="easyui-datagrid" data-options="
              
               url:'<?=base_url()?>index.php/noncomp/loadnoncomp',
               fitColumns:true,
               rownumbers:true,
               sigleSelect:true,
               
                columns:[[  
                   { field:'HN',title:'HN' },
                   { field:'MonitoringDate',title:'MonitoringDate'   },
                   { field:'DRPselection1',title:'Non Compliance Type' },
                   { field:'NonComplianceDrug1',title:'Drug/Product' },
                   { field:'NonComplianceDetail1',title:'Detail' },
                   { field:'Action1',title:'Action' },       
                   { field:'Response1',title:'Result' }, 
                   { field:'ResponseDetail1',title:'Result detail' },  
                   { field:'Cause1_1',title:'สาเหตุจากตัวผู้ป่วย' },  
                   { field:'Cause1_2',title:'สาเหตุจากโรค' }, 
                   { field:'Cause1_3',title:'สาเหตุจากยา' }, 
                   { field:'Cause1_4',title:'สาเหตุจากผู้ดูแล' }, 
                   { field:'Cause1_5',title:'สาเหตุอื่นๆ' }, 
                   { field:'followup_non',title:'follow up' }, 
                   { field:'week_non',title:'week' }, 
                    
                ]],
                toolbar:[ 
                {  text:'Reload',iconCls:'icon-reload',handler:function(data){ $('#dg_noncomp').datagrid('reload'); }  },           
                
                {  text:'เพิ่มข้อมูล Non Compliance',iconCls:'icon-add' , handler:function()
                                  {
                                      // $.messager.alert('ok'); 
                                         fr_insert();
                                  }  },
                            {  text:'ลบข้อมูล' ,  iconCls:'icon-remove',handler:function()
                                {
                                  var row = $('#dg_noncomp').datagrid('getSelected');
                                  if(row)
                                    {
                                      
                                      // alert(row.HN); //HN
                                      //  alert(row.MonitoringDate);
                                      var  url='<?=base_url()?>index.php/noncomp/delNon/' +  row.HN +  '/'  +  row.MonitoringDate ;
                                      //alert(url);
                                      
                                      
                                       $.post( url ,function(data)
                                       {
                                          //alert(data.result);
                                          if( data.result == 1  )
                                          {
                                            $.messager.alert('Status datagrid',' ข้อมูลถูกลบแล้ว ','info');
                                            $('#dg_noncomp').datagrid('reload');
                                          }
                                          else if( data.result == 0  )
                                          {
                                             $.messager.alert('Status datagrid',' ไม่สามารถลบข้อมูลได้ ','error');
                                             $('#dg_noncomp').datagrid('reload');
                                          }
                                          
                                       },'json');
                                      
                                       
                                       
                                    }
                                } 
                            },
                            {
                               text:'แก้ไขข้อมูล',iconCls:'icon-edit',handler:function(data){
                                    var row = $('#dg_noncomp').datagrid('getSelected');
                                    if( row )
                                    {
                                        
                                         $('#win_noncomp').window('open');                                                                       
                                        // var  _url_='<?=base_url()?>index.php/noncomp/fetchNoncomp/'   +  row.HN  + '/' + row.MonitoringDate;
                                         
                                         
                                         $('#fr_noncomp').form('load','<?=base_url()?>index.php/noncomp/fetchNoncomp/'  +  row.HN  + '/' + row.MonitoringDate );
                                         
                                          _url='<?=base_url()?>index.php/noncomp/updateNoncomp/'   +  row.HN  + '/' + row.MonitoringDate;
                                         
                                    }     
                               }
                            }
                            ],
            
               ">
            
        </table>
        
        
    </div>
    
    <div id="win_noncomp" class="easyui-window" title="เพิ่มข้อมูล/แก้ไขข้อมูล Non Compliance" data-options="
         modal:true,
         closed:true,
         iconCls:'icon-large-smartart',
         size:'large',
         " 
         style="width:600px;height:600px;padding:10px;">
                        <form id="fr_noncomp" class="easyui-form" method="post" data-options="novalidate:true">
                            <table cellpadding="5">
                                <tr>
                                    <td>
                                        HN :
                                    </td>
                                    <td>
                                      <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_non" name="HN_non" data-options="iconCls:'icon-man',readonly:true " required="require" >
                                    </td>
                                </tr>
                                <tr>
                                    
                                    
                <tr>
                    <td>
                       MonitoringDate : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_non" name="MonitoringDate_non"  required="true">
                    </td>
                </tr>
                
                <tr> 
                                    <td>
                                        Non Compliance Type :
                                    </td>
                                    <td>
                                         <select class="easyui-combobox" name="DRPselection1" id="DRPselection1" style="width:200px;height: 30px" >
                                                <option value=0>No</option>
                                                <option value=1>Over dosage</option>
                                                 <option value=2>Under dosage</option>
                                                 <option value=3>Not compliance with the life style</option>
                                                 <option value=4>Incorrect technique</option>
                                        </select>
                                        
                                        <a href="#" class="easyui-linkbutton"  data-options=" iconCls:'icon-print' " >View</a>  
                                        <a href="#"  class="easyui-linkbutton"  data-options=" iconCls:'icon-add' " >Add</a>
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td> Drug/Product : </td>
                                    <td>
                                        <input class="easyui-combobox" name="NonComplianceDrug1" id="NonComplianceDrug1"  style="height: 30px;" data-options="
                                               url:'<?=base_url()?>index.php/noncomp/option_drug',
                                               method:'post',
                                               valueField:'Drug',
                                               textField:'Drug',
                                               panelHeight:'auto',
                                               " />
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td> Detail : </td>
                                    <td>
                                        <input class="easyui-textbox"  id="NonComplianceDetail1" name="NonComplianceDetail1" style="width:200px;height: 30px;"  data-options=" iconCls:'icon-man'   " >
                                     </td>
                                </tr>
                                
                                 <tr>
                                    <td> Action : </td>
                                    <td>
                                        <input  type="radio" name="Action1" id="Action1_use" value="1" /> Prevent
                                        <input  type="radio" name="Action1" id="Action1_no"  value="2"/> Correct 
                                     </td>
                                </tr>
                                
                                <tr>
                                    <td> Intervention : </td>
                                    <td>
                                        <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-print',size:'large' "  style="height:30px" >Click To Add Intervention</a>
                                     </td>
                                </tr>
                                
                                  <tr>
                                    <td> Result : </td>
                                    <td>
                                        <input  type="radio" name="Response1" id="Response1_Resolved"  value="1" /> Resolved
                                        <input  type="radio" name="Response1" id="Response1_Improved" value="2"/> Improved 
                                        <input  type="radio" name="Response1" id="Response1_Not_Improved" value="3" /> Not Improved
                                        <input  type="radio" name="Response1" id="Response1_N/A" value="4"/> N/A 
                                        <br>
                                        <input class="easyui-textbox" style="width:300px;height: 40px" data-options=" iconCls:'icon-man' " id="ResponseDetail1" name="ResponseDetail1" />
                                     </td>
                                </tr>
                                
                                       <tr>
                                    <td> Cause : </td>
                                    <td>
                                        <input  type="checkbox" name="Cause1_1"  value="Y" />  สาเหตุจากตัวผู้ป่วย
                                        <input  type="checkbox" name="Cause1_4" value="Y" /> สาเหตุจากตัวผู้ดูแล
                                        <br>
                                         <input  type="checkbox" name="Cause1_3" value="Y" />  สาเหตุจากยา
                                          <input  type="checkbox" name="Cause1_5" value="Y" />  สาเหตุอื่นๆ
                                          <br>
                                           <input  type="checkbox" name="Cause1_2" value="Y" />  สาเหตุจากโรค
                                     </td>
                                       </tr>
                                       
                                       <tr>
                                           <td>
                                               Follow Up :
                                           </td>
                                           <td>
                                               <input class="easyui-numberbox" id="followup_non"  name="followup_non"  style="width:50px;height: 30px;" />
                                           </td>
                                       </tr>
                                       
                                       <tr>
                                           <td>
                                               week :
                                           </td>
                                           <td>
                                               <input class="easyui-datebox" id="week_non" name="week_non"  style="height: 30px;" >
                                           </td>
                                       </tr>
                                       
                                       
                                       <tr>
                                           <td colspan="2">
                                               <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-add',size:'large' "  style="height:30px" onclick="saveNon()" >บันทึก/แก้ไข </a>
                                           <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-remove',size:'large' "    style="height:30px"  onclick=" $('#win_noncomp').window('close');">ปิด </a>
                                           </td>
                                       </tr>
                                       
                                       
                                       
                            </table>
                        </form>    
    </div>
    
</body>
</html>
    