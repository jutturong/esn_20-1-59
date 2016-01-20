<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
    $(function()
    {
        $('#dg_progress').datagrid({
            url:'<?=base_url()?>index.php/progressnote/loadprogress/',
            rownumbers:true,
            fitColumns:true,
            title:'Progress Note',
            iconCls:'icon-print',
            singleSelect:true,
            columns:[[
                { field:'MonitoringDate',title:'MonitoringDate'  },
                { field:'HN',title:'HN' },
                { field:'From',title:'From' },
                { field:'UserName',title:'ชื่อ' },           
                { field:'UserSurname',title:'นามสกลุ' },
                { field:'Progress',title:'Progress Note' },
            ]],
            toolbar:[
                /*
                { 
                     text:'เพิ่มข้อมูล',iconCls:'icon-add',handler:function()
                           {   
                               $('#win_progress').window('open');
                           }   
                },
                */
               
                { text:'Reload',iconCls:'icon-reload',handler:function(){  $('#dg_progress').datagrid('reload');  }     },
                {
                    text:'ลบข้อมูล',iconCls:'icon-remove',handler:function()
                    {
                       //------------------------------------
                           var  row=$('#dg_progress').datagrid('getSelected');
                        if( row )
                        {
                            //alert(row);
                            //http://localhost/ci/index.php/general/callGEN_HN/ES0597
                            
                            $.post('<?=base_url()?>index.php/progressnote/delprogress',{ MonitoringDate: row.MonitoringDate , HN: row.HN },function(data)
                            {
                              var ck=data.result;
                              if( ck == 1 )
                              {
                               var  ms =$.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลแล้ว','info');
                                  if (ms )
                                   {   $('#dg_progress').datagrid('reload');   }
                                
                              }
                              else if (ck == 0 )
                              {
                               var  ms= $.messager.alert('สถานะการลบข้อมูล','เกิดข้อผิดพลาด','error');
                                  if(ms ){  $('#dg_progress').datagrid('reload'); }
                                
                              }
                              
                            },'json');
                        }   
                       //------------------------------------
                    }
                 },
                 {
                     text:'แก้ไขข้อมูล',iconCls:'icon-edit',handler:function()
                    {
                        var  row= $('#dg_progress').datagrid('getSelected');
                        if(row)
                        {
                                $.messager.alert('STATUS','เรียกข้อมูลสำเร็จแล้ว','Info');
                               //$('#dg_progress').datagrid('load');
                                $('#fr_progress').form('load', '<?=base_url()?>index.php/progressnote/fetchprogress/' +  row.HN  + '/' + row.MonitoringDate );
                        }
                    } 
                     
                 }
            ]    
        });
    });
</script>

<script type="text/javascript">
   function  insertProgress(url)
   {
      
               $('#fr_progress').form('submit',{
                   //url:'<?=base_url()?>index.php/progressnote/insertprogress/',
                   url:url,
                   onSubmit:function(data)
                    {
                        //alert('t');
                    },
                   success:function(data)
                    {
                        //alert('t2');
                        //alert(data);
                       /* 
                        if( $data == 1 )
                        {
                            $.messager.alert('Status','บันทึกข้อมูลสำเร็จ','Info');
                           
                        }
                        else if ( $data == 0 )
                        {
                            $.messager.alert('Status','ไม่สามารถบันทึกข้อมูลได้','error');
                            
                        }
                        */
                            $.messager.alert('Status',data,'Info');
                            $('#dg_progress').datagrid('reload');
                            $('#Progress').textbox('clear');
                    }
               });
  
   }
   
   function  clear_fr()
   {
      // $('#fr_progress').form('clear');
       $('#Progress').textbox('clear');
       $('#MonitoringDate_pro').datebox('clear');
       
   }

</script>

</head>

<body>
    
  
    <div style="padding:5px 0;">   
        <form id="fr_progress"  method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td> HN :</td>
                <td>  <input class="easyui-textbox" id="HN_pro" name="HN_pro" style="width:100px;height:30px"   data-options="required:true,iconCls:'icon-man',validType:length[4,4] " ></input>   </td>
            </tr>
            <tr>
                <td> MonitoringDate :</td>
                <td>  <input class="easyui-datebox" id="MonitoringDate_pro" name="MonitoringDate_pro" data-options="required:false" ></input>   </td>
            </tr>
            <tr>
                <td>
                    Progress Note :
                </td>
                 <td>
                     <input class="easyui-textbox" id="Progress" name="Progress" data-options="prompt:'Enter Progress Note',required:false " style="width:400px;height:60px" /> 
                </td>
                
            </tr>
            
            <tr>
                <td>
                    From :
                </td>
                 <td>
                     <input class="easyui-textbox" id="From" name="From"  style="width:90px;height:30px" /> 
                     <input class="easyui-textbox" id="UserName" name="UserName" data-options="iconCls:'icon-man'  " style="width:100px;height:30px" /> 
                    -
                    <input class="easyui-textbox" id="UserSurname" name="UserSurname" data-options="iconCls:'icon-man'  " style="width:150px;height:30px" /> 
                </td>
                
            </tr>
            
            <tr>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'"  style="width:100px;height: 50px" onClick="insertProgress('<?=base_url()?>index.php/progressnote/insertprogress/')" >Insert</a>
                     <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-man'"  style="width:100px;height: 50px" onClick="insertProgress('<?=base_url()?>index.php/progressnote/updateprogress/')" >Update</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-reload'" style="width:80px;height: 50px" onclick="clear_fr()">Clear</a>
                </td>
            </tr>
            
        
        </table>
            </form>
        
    </div>
     
        
    <table id="dg_progress" class="easyui-datagrid" style="width:1200px">
        
    </table>
    
    
    <div class="easyui-window" id="win_progress" data-options="modal:true,closed:true,title:' เพิ่มข้อมูล / ปรับปรุงข้อมูล    Progress Note',iconCls:'icon-print' " style="width:400px;height:400px">
        <table>
            <tr>
                <td>  </td>
                <td>  </td>
            </tr>
        </table>
    </div>
    
    
</body>
</html>