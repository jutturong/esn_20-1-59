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
                               $('#dlg_eeg').window('close');
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
    <th field="Value">Value</th>
    <th field="Lab">Lab</th>
   
        
    </thead>   
</table>

<div id="toolbar_eeg">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">เพิ่มข้อมูล</a>
   <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">แก้ไขข้อมูล</a> -->
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">ลบข้อมูล</a>   
</div>





<div id="dlg_eeg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
     closed="true" buttons="#dlg-buttons" data-options="modal:true">
   
    <form id="fm_eeg" method="post" novalidate>
        <div class="fitem">
            <label>HN : </label>
           <!-- <input  class="easyui-textbox" id="HN_eeg" name="HN_eeg"   > -->
            <input class="easyui-textbox" style="width:30%" id="HN_EEG" name="HN_EEG" data-options="iconCls:'icon-man',readonly:true " required="require" >
            
        </div>
        <div class="fitem">
            <label>Date : </label>
            <input  class="easyui-datebox" id="MonitoringDate" name="MonitoringDate" required="true">
        </div>
        
        <div class="fitem">
            <label>EEG Result : </label>
            <select class="easyui-combobox"  style="width:200px;" id="Value_EEG" name="Value_EEG" required="true">
                <option value="">Not done</option>
                <option value="1">Position</option>
                <option value="2">Negative</option>
                
            </select>
            
        </div>
        
        <!--
        <div class="fitem">
            <label>Last Name:</label>
            <input name="lastname" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Phone:</label>
            <input name="phone" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Email:</label>
            <input name="email" class="easyui-textbox" validType="email">
        </div>
        -->
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-add" onclick="saveUser()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_eeg').dialog('close')" style="width:90px">Cancel</a>
</div>