<script type="text/javascript">
function newUser(){                                                  
    $('#dlg_eeg').dialog('open').dialog('setTitle','เพิ่มข้อมูล EEG');  
    //$('#fm_eeg').form('clear');
    url = '<?=base_url()?>index.php/eeg/saveEEG';
}
function saveUser(){
                         /*
			$('#fm_eeg').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$('#dlg_eeg').dialog('close');		// close the dialog
						$('#dlg_eeg').datagrid('reload');	// reload the user data
					}
				}
			});
                        */
                       
                       $('#fm_eeg').form('submit',{ url:url, 
                           success:function(result)
                           {  
                              // $.messager.alert('Info',result,'info');
                               $('#tb_EEG').datagrid('reload');
                               $('#dlg_eeg').dialog('close');
                           }   
                                                  });
		}
                
                
  function destroyUser(){
			var row = $('#tb_EEG').datagrid('getSelected');
			if (row){
                                 $.messager.confirm('EEG','คุณต้องการลบข้อมูลหรือไม่',function(r)
                                   { 
                                       if(r)
                                       {
                                          $.post('<?=base_url()?>index.php/eeg/delEEG',{ MonitoringDate: row.MonitoringDate },function(result)
                                          {
                                             
                                              if(result == 1 )
                                              {
                                                $.messager.alert('สถานะการลบข้อมูล',"ข้อมูลถูกลบแล้ว",'info');
                                                $('#tb_EEG').datagrid('reload');
                                              }
                                              else if(result == 0)
                                              {
                                                $.messager.alert('สถานะการลบข้อมูล',"ไม่สามารถลบข้อมูลได้",'info'); 
                                              }
                                              
                                          });  
                                       }
    
                                   });
                            
                            
                               
                                
			}
		}
                
     function editUser()
               {
			var row = $('#tb_EEG').datagrid('getSelected');
			if (row){
                            /*
				$('#dlg_eeg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = 'update_user.php?id='+row.id;
                             */ 
                            
                            /*
                             * $('#ff').form('load',{
	name:'name2',
	email:'mymail@gmail.com',
	subject:'subject2',
	message:'message2',
	language:5
});
                             */
                            
                              $('#dlg_eeg').dialog('open');
                              $('#fm_eeg').form('load',row );
                              url='<?=base_url()?>index.php/eeg/loadEEG/' + row.MonitoringDate;
                              $('#fm_eeg').form('load',{  
                                         MonitoringDate:'2015'
                                   } );
                              
			}
		}           
</script>

<table id="tb_EEG" title="EEG 04-monitoring (Lab=95)"  class="easyui-datagrid" style="width: 500px;height: 400px"
       url="<?=base_url()?>index.php/eeg/callEEG/"
       toolbar="#toolbar_eeg"
       fitColumns="true" fitColumns="true" singleSelect="true" >
    <thead>
    <th field="MonitoringDate" >MonitoringDate</th>
    <th field="HN">HN</th>
   <!-- <th field="Value">Value</th> -->
    <th field="detail_eeg">EEG Result</th>
   <!-- <th field="Lab">Lab</th> -->
    <!-- <th field="Lab_detail">Lab</th> -->
   
        
    </thead>   
</table>

<div id="toolbar_eeg">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="   $('#dlg_eeg').window('open');   ">เพิ่มข้อมูล</a>
   <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">แก้ไขข้อมูล</a> -->
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="
        //destroyUser()
           // $('#tb_EEG').datagrid('reload');
           var   row = $('#tb_EEG').datagrid('getSelected');
           if( row )
           {
                //alert('t');
                 var  MonitoringDate=row.MonitoringDate;
                 var  HN=row.HN;
                 var  url='<?=base_url()?>index.php/welcome/del_eeg/' + MonitoringDate + '/' + HN;
                  //alert ( MonitoringDate + '/'  + HN );
                  //alert( url );
                  $.post(url,function(data)
                  {
                         //  alert(data);
                         
                                          if( data == '1' )
                                         {
                                                 $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลสำเร็จ','Info');
                                                 $('#tb_EEG').datagrid('reload');
                                                 
                                                 //  var  url='http://drugstore.kku.ac.th/esn2/index.php/welcome/call_hn_eeg/ES0597'
                                                 
                                         }
                                         else if( data == '0' )
                                         {
                                                 $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลล้มเหลว','Info');
                                                 $('#tb_EEG').datagrid('reload');
                                         }
                  });
               
           }
       
       ">ลบข้อมูล</a>   
    <a href="javascript:void(0)"  class="easyui-linkbutton"  iconCls="icon-reload"   onclick="  $('#tb_EEG').datagrid('reload');  "  >Reload</a>
</div>





<div id="dlg_eeg"  title=" EEG "  class="easyui-window" style="width:400px;height:280px;padding:10px 20px"
     closed="true" buttons="#dlg-buttons" data-options="modal:false">
   
    <form id="fr_eeg"   method="post"  enctype="multipart/form-data"  novalidate="novalidate" >
          
        <div style="padding: 10px 20px"  >
           HN : 
          
            <input class="easyui-textbox" style="width:30%" id="HN_EEG" name="HN_EEG" data-options="iconCls:'icon-man',readonly:true " required="require" >
            
            
        </div>
          <div style="padding: 10px 20px"  >
            <label>Date : 
            <input  class="easyui-datebox" id="MonitoringDate_eeg" name="MonitoringDate_eeg" required="true">
            </label>
        </div>
        
          <div style="padding: 10px 20px"  >
            <label>EEG Result : 
            <select class="easyui-combobox"  style="width:200px;" id="va_eeg" name="va_eeg" required="true">
                <option value="">Not done</option>
                <option value="1">Position</option>
                <option value="2">Negative</option>
                
            </select>
            </label>
        </div>
        
        
        <div style="padding: 10px 20px"  >
            
 
            
            <input  type="submit"   onclick="
                
                
                            $('#fr_eeg').form({
                                url:'http://drugstore.kku.ac.th/esn2/index.php/welcome/saveEEG',
                                 success:function(data){
                                        //alert(data);
                                     // $('#tb_EEG').datagrid('reload');
                                         if( data == '1' )
                                         {
                                                 $.messager.alert('สถานะการบึกทึกข้อมูล','บันทึกข้อมูลสำเร็จ','Info');
                                                 $('#tb_EEG').datagrid('reload');
                                                 
                                                 //  var  url='http://drugstore.kku.ac.th/esn2/index.php/welcome/call_hn_eeg/ES0597'
                                                 
                                         }
                                         else if( data == '0' )
                                         {
                                                 $.messager.alert('สถานะการบึกทึกข้อมูล','บันทึกข้อมูลล้มเหลว','Info');
                                                 $('#tb_EEG').datagrid('reload');
                                         }
                                 }
                            });
                          
                            
                    "  />
            
            <a href="javascript:void(0)" class="easyui-linkbutton"  data-options=" iconCls:'icon-cancel' "  onclick=" $('#dlg_eeg').window('close');  "  > Close </a>
            
            
        </div>
        

    </form>
    
</div>

