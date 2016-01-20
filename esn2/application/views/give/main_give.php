<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script type="text/javascript">
        $(function()
        {
            
            $("#dg_give").datagrid({
                url:'<?=base_url()?>index.php/give/loadgive/',
                fitColumns:true,
                rownumbers:true,
                singleSelect:true,
                columns:[[ 
                        { field:'HN',title:'HN' },
                        { field:'MonitoringDate',title:'MonitoringDate'   },
                        {  field:'GiveInformation1',title:'What\'s your disease? ' },
                        {  field:'GiveInformation2',title:'What\'s treatment? '   },
                        {  field:'GiveInformation3',title:'How to manage the side effect? '   },
                        {  field:'GiveInformation4',title:'Bring medication to each visit? '   },
                        {  field:'GiveInformation5',title:'How to correct behavior? '   },
                        {  field:'GiveInformation6',title:'Other '   },
                   ]],
               toolbar:[  
                        { text:'Reload',iconCls:'icon-reload',handler:function(){  $("#dg_give").datagrid('reload');  }  },
                        { text:'ลบ',iconCls:'icon-remove',handler:function()
                            {  
                                var  row=$('#dg_give').datagrid('getSelected');
                                if( row )
                                {
                                   // var HN=row.HN;
                                   // var MonitoringDate=row.MonitoringDate;
                                    $.post('<?=base_url()?>index.php/give/delgive',{ HN:row.HN , MonitoringDate: row.MonitoringDate  },function(data)
                                       {
                                           //alert(data.success);
                                           if( data.success == '1' )
                                           {
                                               $.messager.alert('Status','ลบข้อมูลแล้ว','info');  
                                               
                                           }  
                                           else if( data.success == '0'  )
                                           {
                                               $.messager.alert('Status','ไม่สามารถลบข้อมูล','error');   
                                           }
                                           
                                           $('#dg_give').datagrid('reload');
                                       },'json');
                                    //delgive()
                                }
                            } 
                        },
                        { text:'เพิ่มข้อมูล',iconCls:'icon-add',handler:function()
                              {
                                  $('#win_give').window('open');
                                  //http://localhost/ci/index.php/give/loadgiveHN/ES0597
                                  url='<?=base_url()?>index.php/give/insertgive/';
                                  
                              } 
                        },
                        { text:'แก้ไขข้อมูล',iconCls:'icon-edit',handler:function()
                             {
                                 //$('#win_give').window('open');
                                 //
                                 //$('#fr_give').form('load','<?=base_url()?>index.php/give/fetchgive'  );
                                 
                                    var  row=$('#dg_give').datagrid('getSelected');
                                    if( row )
                                    {
                                        $('#win_give').window('open');
                                        $('#fr_give').form('load','<?=base_url()?>index.php/give/fetchgive/' + row.HN + "/" + row.MonitoringDate  );
                                        //url='<?=base_url()?>index.php/give/fetchgive?HN=' + row.HN + "&MonitoringDate=" + row.MonitoringDate;
                                        url='<?=base_url()?>index.php/give/updategive/';

                                    }
                             } },
                       ]        
            });
        });
</script>


<script type="text/javascript">
  function  insertGive()
  {
    $(function()
    {
        //alert(url);
        $('#fr_give').form('submit',
                 {
                     //url:'<?=base_url()?>index.php/give/insertgive/' ,
                     url:url,
                     onSubmit:function(data)
                     {
                         
                     },
                     success:function(data)
                     {
                        
                        //alert(data);
                        $.messager.alert('Status',data,'info');
                         $('#win_give').window('close');
                         $('#dg_give').datagrid('reload');
                       
                     }
                 });
        
        
    });  
      
      }

</script>

</head>

<body>
    
    <div class="easyui-window" id="win_give" data-options="closed:true, iconCls:'icon-large-picture', size:'large' , modal:true,title:' เพิ่มข้อมูล/ปรับปรุง Give Information ' ,shadow:true "  style="width:500px;height: 500px" >
    <form id="fr_give" method="post">
            <table cellpadding="5">
                <tr>
                    <td>HN </td>
                    <td>
                        <input class="easyui-textbox"  name="HN_give" id="HN_give" style="height: 30px" data-options="required:true"></input>
                    </td>
                </tr>
                <tr>
                    <td>MonitoringDate</td>
                    <td>
                        <input class="easyui-datebox" id="MonitoringDate_give" name="MonitoringDate_give" ></input>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        What's your disease? 
                    </td>
                    <td>
                        <input class="easyui-validatebox" type="checkbox" value="Y" id="GiveInformation1" name="GiveInformation1"  ></input>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        What 's treatment?  
                    </td>
                    <td>
                        <input class="easyui-validatebox"  type="checkbox" value="Y" id="GiveInformation2" name="GiveInformation2" ></input>
                    </td>
                </tr>
                
                 <tr>
                    <td>
                        How to manage the side effect? 
                    </td>
                    <td>
                        <input class="easyui-switchbutton" type="checkbox" value="Y"  id="GiveInformation3" name="GiveInformation3" ></input>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Bring medication to each visit? 
                    </td>
                    <td>
                        <input class="easyui-validatebox"  type="checkbox" value="Y"  id="GiveInformation4" name="GiveInformation4" ></input>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        How to correct behavior? 
                    </td>
                    <td>
                        <input class="easyui-validatebox" type="checkbox" value="Y" id="GiveInformation5" name="GiveInformation5" ></input>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Other 
                    </td>
                    <td>
                        <input class="easyui-textbox"  style="width:200px;height: 100px" id="GiveInformation6" name="GiveInformation6" ></input>
                    </td>
                </tr>
                
                
                 <tr>
                     <td colspan="2">
                        
                         <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-print'" style="width:120px" onclick="insertGive()">Save/Update</a>
                         
                         <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" style="width:80px" onclick=" javaScript: $('#win_give').window('close'); ">Close</a>
                    </td>
                    
                </tr>
                
                
            </table>
    </form>
   </div>
    
    
    <table class="easyui-datagrid" id="dg_give">
        
    </table>
    
</body>
</html>