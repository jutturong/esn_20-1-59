<script type="text/javascript">
function newUser(){                                                  
    $('#dlg_img').dialog('open').dialog('setTitle','เพิ่มข้อมูล Imaging');  
    //$('#fm_eeg').form('clear');
    url = '<?=base_url()?>index.php/img/saveIMG';
}

function saveUser(){
                         
                       $('#fm_img').form('submit',{ url:url, 
                           success:function(result)
                           {  
                              // $.messager.alert('Info',result,'info');
                               $('#tb_IMG').datagrid('reload');
                               $('#dlg_img').window('close');
                           }   
                                                  });
		}

function destroyUser(){
			var row = $('#tb_IMG').datagrid('getSelected');
			if (row){
                                 $.messager.confirm('Imaging','คุณต้องการลบข้อมูลหรือไม่',function(r)
                                   { 
                                       if(r)
                                       {
                                          $.post('<?=base_url()?>index.php/img/delIMG',{ MonitoringDate: row.MonitoringDate },function(result)
                                          {
                                             
                                              if(result == 1 )
                                              {
                                                $.messager.alert('สถานะการลบข้อมูล',"ข้อมูลถูกลบแล้ว",'info');
                                                $('#tb_IMG').datagrid('reload');
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
</script>


<table id="tb_IMG" title="Imaging 04-monitoring (Lab=96,97,100)"  class="easyui-datagrid" style="width: 500px;height: 400px"
       url="<?=base_url()?>index.php/img/loadIMG/"
       toolbar="#toolbar_img"
       fitColumns="true" fitColumns="true" singleSelect="true" >
    <thead>
    <th field="MonitoringDate" >Date</th>
     <th field="HN">HN</th>
     <th field="Lab">Lab</th>    
    <th field="Value">Imaging Result</th>
   
        
    </thead>   
</table>


<div id="toolbar_img">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">เพิ่มข้อมูล</a>
   <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">แก้ไขข้อมูล</a> -->
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">ลบข้อมูล</a>   
</div>





<div id="dlg_img" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
     closed="true" buttons="#dlg-buttons" data-options="modal:true">
   
    <form id="fm_img" method="post" novalidate>
        <div class="fitem">
            <label>HN : </label>
           <!-- <input  class="easyui-textbox" id="HN_eeg" name="HN_eeg"   > -->
            <input class="easyui-textbox" style="width:30%" id="HN_img" name="HN_img" data-options="iconCls:'icon-man',readonly:true " required="require" >
            
        </div>
        <div class="fitem">
            <label>Date : </label>
            <input  class="easyui-datebox" id="MonitoringDate_img" name="MonitoringDate_img" required="true">
        </div>
        
        <div class="fitem">
            <label>Lab : </label>
            <select class="easyui-combobox"  style="width:200px;" id="Value_img" name="Value_img" required="true">
                <option value="">Not done</option>
                <option value="96">96.CT brain</option>
                <option value="97">97.MRI brain</option>
                <option value="100">100.Not done</option>
                
            </select>
            
        </div>
        
        <!--
        <div class="fitem">
            <label>Imaging Result : </label>
            <select class="easyui-combobox"  style="width:200px;" id="Lab_img" name="Lab_img" required="true">
                <option value="">Not done</option>
                <option value="1">CT brain</option>
                <option value="2">MRI brain</option>
                <option value="3">Not done</option>
                
            </select>
            
        </div>
        -->
        
        <div class="fitem">
            <label>Imaging Result :</label>
            <input id="img_result" class="easyui-combobox" name="img_result" data-options="
                   valueField: 'ImagingResult',
                   textField: 'ImagingResult',
                   url:'<?=base_url()?>index.php/img/imagingresult',                 
                   "
                   >
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
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_img').dialog('close');" style="width:90px">Cancel</a>
</div>